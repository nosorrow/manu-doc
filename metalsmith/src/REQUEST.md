---
title: Request
layout: layout.hbs
---
Request
-----
[Работа с данни от форма](#работа-с-данни-от-форма)  
[Http методи](#http-методи)  
[Други методи на класът](#други-методи-на-класът)  
[Нормализация на входящите данни](#нормализация-на-входящите-данни)  
[Сесии с Request](#сесии-с-request)  
  
##### Работа с данни от форма
View файл:
```php
<form method="post" action="<?= url('login') ?>">
    <input type="text" name="user">
    <input type="text" name="password">
    <input type="submit">
</form>
```
Контролер:
```php
<?php

namespace App\Controllers;

use Core\Controller;
use Core\Libs\Request;

class PostController extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    
    public function login(Request $request)
    {
        $user = $request->post('user');
        $pass = $request->post('password');
        
        /* .................*/
    }

}
```
##### Http методи
<b>Request</b> поддържа следните <b>http</b> методи <code>'GET', 'POST','PUT', 'PATCH', 'DELETE'</code>
```php
<?php
$request->input($key);
$request->post($key);
$request->get($key);
$request->put($key);
$request->patch($key);
$request->delete($key);
$request->postAll(); 
$request->getAll();
?>
```
PUT, PATCH, DELETE методи които не се поддържат от браузъра  използвайте hidden input:

 ```html
<input type="hidden" name="_method" value="PUT"> 
 ```
 
или helper <code>method_field($method)</code>  
```php
<?= method_field('PUT') ?>

<!-- <input type="hidden" name="_method" value="PUT"> -->
```
##### Други методи на класът

```php
<?php
$request->set_cookie(
    $name, 
    $value = '', 
    $expire = 3600, 
    $path = '/',
    $domain = '', 
    $secure = false, 
    $httponly = true
    );

$request->cookie($name);
$request->delete_cookie($name);
$request->method();
```

##### Нормализация на входящите данни
На всички Request http методи може да добавим като незадължителен аргумент за нормализация на данните, 
който предствавлява стринг от имена на php функции с разделител " | "

```php
<?php
$request->input($key, 'htmlspecialchars|strip_interval|');
```
налични са функциите:

```Textfile
string | int | float |double | bool | trim | addslashes | htmlspecialchars |
htmlentities | strip_tags | strip_interval | escapeshellcmd | escapeshellarg
html_entity_decode | urlencode | xss
```

##### Сесии с Request

Всички методи на сесиите са достъпни и в класът Request от свойството <code>session</code>

```php
<?php
$request->session->store($key, $value);
$request->session->set($key, $value); // alias of session->srore(...);
$request->session->getData($key);
$request->session->get_all();
$request->session->all(); // alias of getAll();
$request->session->has($key);
$request->session->push($key, $value);
$request->session->pull($key, $value);
$request->session->setFlash($key, $value);
$request->session->getFlash($key);
$request->session->delete($key);
$request->session->destroy();
```
