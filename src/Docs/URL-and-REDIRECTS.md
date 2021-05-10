---
title: Url & redirects
layout: layout.hbs
---
Url & redirects
-----
##### Basic usage URL
Url Helpers:
```php
<?php 
// return https://site.com/post/2
$url = site_url('post/2');
// return https://site.com/assets/css/bootstrap
$assets = assets_url('css/bootstrap');

dump(valid_url($url));  // true
```

##### URI helpers

* route($routeName, $params = [], $request_method = null);
по подразбиране $request_method е GET;

```php
<?php 
/*
  * Router::get('page/{id}',['ErrorPage@show','name' => 'error']);
  */

$uri = route('error', [404]); //will return "page/404"
$url = site_url($uri); // https://site.com/page/404

```

пример с подаване на  аргументи в масив  

```php
<?php 
// Router::get('user/{id}/comment/{commentId}', ['Controller@method', 'name'=>'user_comments']);
// ще подреди правилно аргументите и ще върне "user/10/comment/25"
$uri = route('user_comments', ['id'=>10, 'commentId'=>25]);

// Router::get('user/{id}/comment/{commentId?}', ['Controller@method', 'name'=>'user_comments']);
// ще подреди правилно аргументите и ще върне "user/10/comment" тъй като има опционален параметър
$uri = route('user_comments', ['id'=>10]);

```

#### Redirect

Използваме helper redirect()
 
 ```php
 <?php 
// Router::get('user/{id}/comment/{commentId}', ['Controller@method', 'name'=>'user_comments']);
// Router::any('signup', ['RegistrationController@signupForm', 'signup']);

$uri = route('user_comments', ['id'=>10, 'commentId'=>25]);
redirect()->to($uri);
redirect($uri);

// или използваме на route name
redirect()->route('user_comments', ['id'=>10, 'commentId'=>25]);
// редирект към външен url адрес
redirect()->away('https://google.com');

 ```


