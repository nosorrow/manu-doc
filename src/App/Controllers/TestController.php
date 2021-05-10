<?php

namespace App\Controllers;

defined('APPLICATION_DIR') OR exit('No direct Accesss here !');

use Core\Controller;
use Core\Libs\Csrf;
use Core\Libs\Images\Image;
use Core\Libs\Message;
use Core\Libs\Request;
use Core\Libs\Response;
use Core\Libs\Support\Facades\Crypt;
use Core\Libs\Support\Facades\DB;
use Core\Libs\Support\Facades\Validator as ValidatorFacade;
use Core\Libs\Uri;
use Core\Libs\Support\Facades\Url;
use Core\Libs\Validator;
use Illuminate\Pipeline\Pipeline;
use App\TimeWatch;

class TestController extends Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public function form(Image $image)
    {

        view('form-search');
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        ValidatorFacade::for($request)
            ->make('email', _t('поща'), ['required', 'email'])
            ->make('pass', '', ['required', 'min:3']);

        if (ValidatorFacade::run() === false) {
            redirect()->back();
        }
    }

    public function testBlade(Request $request, Message $message)
    {
        $m = $message->get('messages')->line('welcome app');
        echo _tn('стая', 'стаи', 11);
        echo ($m);
        $data['valid'] = (Url::full() == Url::previous()) ? 'is-valid' : null;

        view('blade.homepage', $data);
    }

    public function testStoreBlade(Request $request, Validator $validator)
    {
        echo "testStoreBlade ID: " . ($request->id);
        var_dump(($request->cookie('manufacture')));
       // die;
        $validator->for($request)
            ->make('email', 'Email address', ['required'])
      //      ->make('pass', 'Enter Password', ['required', 'min:3'])
      //      ->make('passwordconfirm', 'Confirm password', ['required', 'match:pass'])
            ->make('agree', 'Agree', ['required']);

        // $validator->message(['required' => 'Please fill this field']);

        if ($validator->run() === false) {
            redirect()->back();
        }

       $data = ['name' =>$request->post('email')];

        if (DB::table('test')->insert($data)) {
            redirect()->to('blade')->with('success', 'all is Ok!');
        }
    }

    public function ajax()
    {
        $data = DB::table('geo_city')->paginate(10);
        $data->link->setMaxPagesToShow(10);

        $data->link = sprintf($data->link);
        echo Response::json($data);
        exit;
    }

    public function search(Request $request, Csrf $csrf)
    {
        $validation = $request->validation()
            ->make('email', _t('поща'), ['required', 'email'])
            ->make('pass', _t('Парола'), ['required', 'min:4', 'max:8']);

        if ($csrf->csrf_validate() === false) {
            redirect()->to('test')->with('msg', 'Invalid CSFR tokken');
        }

        if ($validation->run() === false) {

            redirect()->back();
        }

    }
}
