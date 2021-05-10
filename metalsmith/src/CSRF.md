---
title: CSRF
layout: layout.hbs
---
CSRF
-----
##### CSRF скрито поле с token

```php
    <?php csrf_field() ?>
   /*
    * HTML output like:
    * <input type='hidden' name='csrf_token' id='csrf_token' value='d146d8efcd59ac76f463d0ad18979abd' />
   */
```
Пример:   

```php
    <form action="<?php echo site_url('store') ?>" method="post">
        <?php csrf_field() ;?>
        <input type="text" name="user" value="<?php echo oldValue('user') ?>">
        <?php echo validation_error('user') ?>
        <input type="submit" value="submit">
    </form>
        
```

##### Проверка в Контролера

* <code>Csrf::validate()</code>
* <code>$csrf->csrf_validate()</code> метод от инстанция на класа Csrf

```php
<?php    
    use Core\Libs\Validator;
    use Core\Libs\Csrf;
    
    class PostController extends Controller
    {
        public function __construct()
        {
            parent::__construct();
        }
    
        public function form()
        {
            view('form');
        }
    
        public function store(Request $request, Csrf $csrf)
        {
            // Using Csrf::validate() or $csrf->csrf_validate()
           
            if ($csrf->csrf_validate() === false) {
                redirect()->to('home')->with('msg', 'Invalid CSFR tokken');
            }
            
        }
    }
```
