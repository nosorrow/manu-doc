<?php
/*
* $uploader = new Upload();
* $uploader->max_size = 2; // in MB
* $uploader->overwrite = false;
*
* $upload = $uploader->upload('img');
 *
* $response = ResponseFactory::makeResponse($upload , 'html'); // response , html or Json
*   if ($response->countErrors()>0) {
*        dump($response->errors());
*   } else {
*        dump($response->response());
}*/


namespace Core\Libs\Files;

use Core\Libs\Support\Facades\Config;
use Core\Libs\Request;

class Upload
{
    const UPLOAD_ERR_UNKNOWN = 'The file "%s" was not uploaded due to an unknown error.';
    /**
     * @var array
     *
     */
    public $allowed_types = [
        "jpg",
        "jpeg",
        "gif",
        "png",
        "txt",
       // "pdf",
        "zip",
        "rar",
      //  "doc",
      //  "docx"
    ];
    /**
     *  $_FILE
     * @var null
     */
    protected $files;

    /**
     * @var / false generate new filename
     * 'random' generate random finame
     */
    public $file_name;

    /**
     * @var
     */
    public $file_mime_type;

    /**
     * File name preffix | $this->preffix = date('d_M_Y_', time());
     * @var
     */
    public $preffix;
    /**
     * @var int
     */
    public $filename_length = 16;

    /**
     * @var bool
     */
    public $overwrite = true;
    /**
     *
     * @var int // in MB
     */
    public $max_size = 2; //2MB
    /**
     * @var
     */
    public $file_url;
    /**
     * @var string
     */
    public $directory;
    /**
     * @var //max files to upload
     */
    public $max_files = 3;
    /**
     * @var array
     */
    public $error = [];
    /**
     * @var
     */
    public $error_code;
    /**
     * @var
     */
    public $response;
    /**
     * @var array
     */
    protected $phpFileUploadErrors = array(
        0 => 'There is no error, the file uploaded with success',
        1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        3 => 'The uploaded file was only partially uploaded',
        4 => 'No file was uploaded',
        6 => 'Missing a temporary folder',
        7 => 'Failed to write file to disk.',
        8 => 'A PHP extension stopped the file upload.',
    );

    /**
     * Upload constructor.
     */
    public function __construct()
    {
       // $request = Request::getInstance();
        $this->directory = PUBLIC_DIR . Config::getConfigFromFile('upload_directory');
        //  $this->file_url = site_url('uploads/');
        if (strtoupper($_SERVER['REQUEST_METHOD'] == 'POST')) {
            $this->files = !empty($_FILES) ? $_FILES :null;

        }
    }

    /**
     * @param array $config
     */
    public function init(array $config)
    {
        /*
         * ['max_files'=>1,
            'directory'=>'uploads/',
            'max_size'=>2,
            'file_name'=>'random',
            'filename_length'=>8,
            'overwrite'=> false,
            'prefix'=>'prefix_'
            ]
         */
        foreach ($config as $properties => $value) {
            if (isset($config[$properties])) {
                $this->{$properties} = $config[$properties];
            }
        }
    }

    /**
     * @return mixed
     */
    protected function get_allowed_mimes()
    {
        $mimes = new Mime();
        foreach ($this->allowed_types as $value) {
            $mime[$value] = $mimes->get($value);
        }
        return $mime;
    }

    /**
     * @param string $temp
     * @param string $file_name
     * @return bool
     * @throws \Exception
     */
    public function check_mime($temp = '', $file_name = '')
    {
        if(empty($this->allowed_types)){
            return true;
        }
        $allowed_mime_types = $this->get_allowed_mimes();
        $file_name = pathinfo($file_name);
        $ext = strtolower($file_name['extension']);

        if (function_exists('mime_content_type')) {
            $file_type = mime_content_type($temp);
            $this->file_mime_type = $file_type;

        } else {
            throw new \Exception('mime_content_type fuction is not exists. Maybe fileinfo extension  is not allowed');

        }

        if (!in_array($file_type, $allowed_mime_types[$ext])) {
            $this->error[] = sprintf('The file (%s) of type (%s) is not allowed to be uploaded', $file_name['basename'], $file_type);
            return false;

        }

        return true;
    }

    protected function check_max_files_to_upload($files)
    {
        if (count($this->files[$files]['name']) > $this->max_files) {

            return false;
        }
        return true;
    }

    /**
     * @param $file_size
     * @param $file
     * @return bool
     * @throws \Exception
     */
    public function max_size($file_size, $file)
    {
        $file_size_in_mb = round($file_size / 1048576, 2); // in MB

        if ($this->max_size > intval(ini_get('upload_max_filesize'))) {
            throw new \Exception('The [max_size] properties is bigger than [upload_max_filesize] in php.ini', 500);

        }

        if ($file_size_in_mb > $this->max_size) {
            $this->error[] = sprintf('The file %s is larger then %s MB', $file, $this->max_size);

            return false;
        }

        return true;
    }

    protected function random_name($length)
    {
        $index = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $index = str_shuffle($index);
        $str = '';
        $l = strlen($index) - 1;
        for ($i = 0; $i < $length; $i++) {
            $str .= $index{mt_rand(0, $l)};
        }

        return $str;
    }

    /**
     *
     * @param $file
     * @return string
     */
    protected function generate_name($file)
    {
        $extension = '.' . strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $filename = pathinfo($file, PATHINFO_FILENAME);

        if (isset($this->file_name) && $this->file_name != 'random') {
            $name = $this->preffix . $this->file_name . $extension;

        } elseif ($this->file_name == 'random') {
            $random = $this->random_name($this->filename_length);
            $name = $this->preffix . $random . $extension;

        } else {
            $name = $this->preffix . $file;
        }

        if ($this->overwrite === false && file_exists($this->directory . $name)) {
            $i = 0;
            $filename = isset($this->file_name) ? $this->file_name :$filename;
            while (file_exists($this->directory . $name)) {
                $name = 'copy_' . $this->preffix . $filename . '-' . $i . $extension;
                $i++;
            }
        }
        return $name;
    }

    /**
     * @param $max_files
     * @return $this
     */
    public function maxFiles($max_files)
    {
        $this->max_files = $max_files;

        return $this;
    }

    /**
     * @param $files
     * @return mixed
     * @throws \Exception
     */
    public function upload($files, array $options = [])
    {
        if (!empty($options)) {
            $this->init($options);
        }

        if ($this->check_max_files_to_upload($files) !== true) {
            $this->error[] = 'Files are more than allowed';
            return $this;
        }

        if (!realpath($this->directory)) {
            mkdir($this->directory, 0777, true);
        }

        if (is_array($this->files[$files]['error'])){
            $this->moveUploadedFilesArray($files);

        } else {

            $this->moveUploadedFiles($files);
        }

        return $this;
    }

    protected function moveUploadedFilesArray($files)
    {
        foreach ($this->files[$files]['error'] as $key => $error) {
            if ($error == 0) {

                $fname = $this->files[$files]['name'][$key];
                $file_path = $this->directory . $this->generate_name($fname);
                $temp = $this->files[$files]['tmp_name'][$key];
                $size = $this->files[$files]['size'][$key];
                $size_kb = round($this->files[$files]['size'][$key] / 1024, 2);

                $response = pathinfo($file_path);

                if ($this->check_mime($temp, $fname) === true && $this->max_size($size, $fname) === true) {
                    if (move_uploaded_file($temp, $file_path)) {

                        $this->response[] = [
                            'file_name' => $response['basename'],
                            'file_path' => $response['dirname'] . '/' . $response['basename'],
                            'directory' => $response['dirname'],
                            'url' => site_url($response['dirname']) . '/' . $response['basename'],
                            'original_name' => $fname,
                            'extension' => $response['extension'],
                            'mime_type'=>$this->file_mime_type,
                            'size' => $this->files[$files]['size'][$key],
                            'size_in_kb' => $size_kb
                        ];

                    } else {
                        $this->error[] = sprintf(self::UPLOAD_ERR_UNKNOWN, $fname);
                    }
                }

            } else {
                $this->error[] = $this->phpFileUploadErrors[$error];
                $this->error_code = $error;
            }
        }

    }

    protected function moveUploadedFiles($files)
    {
        $error = $this->files[$files]['error'];

        if ($error == 0) {

            $fname = $this->files[$files]['name'];
            $file_path = $this->directory . $this->generate_name($fname);
            $temp = $this->files[$files]['tmp_name'];
            $size = $this->files[$files]['size'];
            $size_kb = round($this->files[$files]['size'] / 1024, 2);

            $response = pathinfo($file_path);

            if ($this->check_mime($temp, $fname) === true && $this->max_size($size, $fname) === true) {
                if (move_uploaded_file($temp, $file_path)) {

                    $this->response[] = [
                        'file_name' => $response['basename'],
                        'file_path' => $response['dirname'] . '/' . $response['basename'],
                        'directory' => $response['dirname'],
                        'url' => site_url($response['dirname']) . '/' . $response['basename'],
                        'original_name' => $fname,
                        'extension' => $response['extension'],
                        'mime_type'=>$this->file_mime_type,
                        'size' => $this->files[$files]['size'],
                        'size_in_kb' => $size_kb
                    ];
                } else {
                    $this->error[] = sprintf(self::UPLOAD_ERR_UNKNOWN, $fname);
                }
            }

        } else {
            $this->error[] = $this->phpFileUploadErrors[$error];
            $this->error_code = $error;
        }
    }
    /**
     * @return bool
     */
    public function hasError()
    {
        return (bool)count($this->getError());
    }

    /**
     *  true if upload is failed()
     * @return bool
     */
    public function failed()
    {
        if($this->hasError() && $this->getErrorCode() !== 4){
            return true;
        } else {
            return false;
        }

    }
    /**
     *
     * @return array
     */
    public function getError($implode = false)
    {
        if ($implode === false) {
            if (count($this->error) > 1) {
                return $this->error;

            } else {
                return $this->error[0];

            }
        } else {
            return implode(',', $this->error);

        }
    }

    /**
     * @return int
     */
    public function getErrorCode()
    {
        return (int)$this->error_code;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->files[$name];
    }

    /**
     * @param $file
     * @return mixed
     */
    public function getFile($file)
    {
        return $this->files[$file];
    }

    /**
     * @return null
     */
    public function getFiles()
    {
        return $this->files;
    }

}
