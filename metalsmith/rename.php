<?php
// C:\xampp\htdocs\MyScripts\manufacture-docs\src\App\Views\
$dir = 'build/';
//die(dirname(__DIR__, 1));

foreach (glob($dir . '*') as $files){

  //  var_dump(strstr(pathinfo($files)['filename'], '.', true));
    $dest_dir = 'C:\web\htdocs\MyScripts\manufacture-docs\src\App\Views\blade';
    $file = strtolower(realpath($files));
 //   rename($file, strtolower($file));
    $new_file_name = str_replace(".html",".blade.php",$file);

  //  rename($file, strtolower($new_file_name));

    copy($file, $dest_dir . DIRECTORY_SEPARATOR .pathinfo($new_file_name)['basename'] );
}
