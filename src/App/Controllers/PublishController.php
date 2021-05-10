<?php

namespace App\Controllers;

defined('APPLICATION_DIR') OR exit('No direct Accesss here !');

use Core\Controller;
use Core\Bootstrap\DiContainer;
use Core\Libs\Request;
use Core\Libs\Session;
use Core\Libs\Validator;
use Core\Libs\Csrf;

class PublishController extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }


}