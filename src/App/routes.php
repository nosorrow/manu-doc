<?php
/*
 * Class Router
 * Маршрутизация с използване на регулярни изрази по идея на "nikic"
 * https://nikic.github.io/2014/02/18/Fast-request-routing-using-regular-expressions.html
 *
 * използване:
 * -------------------------------
 * Router::get('search/{id}', ['Admin/Folder/class@action', 'name'=>'search']);
 * Router::post('search/{id}', ['Admin/Folder/class@action', 'name'=>'search']);
 * Router::head('search/{id}', ['Admin/Folder/class@action', 'name'=>'search']);
 * Router::put('search/{id}', ['Admin/Folder/class@action', 'name'=>'search']);
 * Router::delete('search/{id}', ['Admin/Folder/class@action', 'name'=>'search']);
 * Router::any('search/{id}', ['Admin/Folder/class@action', 'name'=>'search']);
 * Router::methods(['post', 'get'],'search/{id}', ['Admin/Folder/class@action', 'name'=>'search']);
 * Router::get('route-callback/{doc:format=pdf}/{id}', [function($doc, $id){
 *   echo 'Document name: '. $doc . ' id: ' . $id;
 *  }, 'name'=>'callback']);
 *
 * Optional Parameters:
 * -------------------------------
 * Router::any('search/{id?}', ['Admin/Folder/class@action', 'name'=>'search']);
 *
 * Regular Expression Constraints:
 * -------------------------------
 * Router::get('route/{slug}/{id:[0-9]{0,5}}', ['Admin3/controller@action', 'name'=>'route']);
 * Router::get('route/{lang:(en|bg)}/{slug}/edit/{post}/{id?:\d+}', ['test/controller@route_post']);
 * Router::get('route/{slug?:^\w+((?:\.pdf))$}', ['Admin3/controller@action', 'name'=>'route']);
 *
 * File ext: match (route/document & route/document.html)
 * ------------------------------
 * Router::get('route/{slug?:format=html}', ['Admin3/controller@action', 'name'=>'route']);
 *
 * $router = new Router();
 * $route = $router->dispatch('post/55'); // return array
 */

use Core\Bootstrap\Router;
use Core\Libs\Support\Arr;

// Create Routes colection
try {

// Uncomment for Shut down your Site
    /*Router::site_down(function(){
        echo 'Сайта е в ремонт !';
        //setLayout('login')->render('dashboard/login');
        exit;
    });*/

    Router::get('/', [function () {
        if (!Core\Libs\Support\Facades\Config::getConfigFromFile('key')){
            $data['key'] = crypt_generate_key();
            return view('welcome', $data);
        }

        return view('blade.home.home');

    }, 'name'=>'home']);

// Redirect to Error page
    Router::any('page/{id}',
        [
            'ErrorPage@show',
            'name' => 'error'
        ]
    );

    Router::get('docs/{slug?:format=html}',
        [
            'DocsController@docs',
            'name' => 'docs'
        ]
    );

} catch (\Exception $e) {
    die($e->getMessage());
}
