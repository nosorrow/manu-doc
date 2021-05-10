---
title: Views
layout: layout.hbs
---
### VIEWS

За темпейтите на view може да използваме native php или Blade.
Изборът указваме в <code>config.php</code> в ключът <code>template_engine</code>, който може да приеме 
две стойности: <code>"php"</code> или <code>"blade"</code>

##### Native php views

```php
<?php 
class DashboardController extends Controller
{
    public function login()
    {
        $data['title'] = "The site title";
        return view('admin/form', $data);
    }
}
```
Може да използваме dot notation при извикване на view вместо directory separator

```php
<?php
class DashboardController extends Controller
{
    
    public function DashboardLogin()
    {
        $data['title'] = "The site title";
        return view('admin.form', $data);
    }
}
```

Template файлът ще е от вида:

```php

    <h1><?= $title ?></h1>
    <!-- Or -->
    <h1><?= $this->title ?></h1>

```

Escape (екраниране) на променливите с helpers
```php

    <h1><?= esc($title) ?></h1>
    <h1><?= esc($title, 'xss|strip_interval') ?></h1>

```

или escape(екраниране) на променливите 
```php

    <h1><?= $this->e($title) ?></h1>
    <h1><?= $this->e($title, 'xss|strip_interval') ?></h1>

```
###### Layout & partials
Концепцията е че всеки сайт има оформление (Layout), състоящо се от няколко части (partials)
Например базисен layout се състои от header, content, footer. Повтарящите се partials като
header и footer може да изнесем като отделен код избягвайки преповтарянето.
За целта са създадени две директории в <code>App/Views</code> - <code>leyout</code> и <code>Partials</code>
В <code>Partials</code> живее кода на частите които се повтарят в нашия сайт, като header & footer. 
В <code>layout</code> събираме тези части:

```php
<?php 

include_once APPLICATION_DIR . 'Views/Partials/header.php';
include_once $main;
include_once APPLICATION_DIR . 'Views/Partials/footer.php';

```
Променливата <code>$main</code> съдържа онази част от кода койято извикваме с <b>view('...')</b>
За да сменим layout в контролора използваме методът <code>$this->view->setLayout($layuotName)</code>
или helper <code>setLayout($layuotName)</code>

##### Blade tempalte (шаблон)

променяме в <code>config.php 
'template_engine' = 'blade'
<code>

Повече в laravel.com за използването на blade template [blade doc](https://laravel.com/docs/5.8/blade)

Blade directive:

```php
<?php

    View::blade()->directive('datetime', function ($expression) {
          return "<?php echo with({$expression})->format('Y-m-D h:i:s'); ?>";
        });

```
Пример как да ползваме blade директивите в template файлът:
```php

<?php $obj = new DateTime() ;?>

@datetime($obj)

```
