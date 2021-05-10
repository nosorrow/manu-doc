---
title: Middleware
layout: layout.hbs
---
Middleware
-----
[Дефиниране Middleware](#дефиниране-middleware)  
[Създаване на Middleware](#създаване-на-middleware)  
[Регистриране на Middleware](#регистриране-на-middleware)  
[Изпълнение преди или след заявката](#before-and-after-middleware) 

<b>Middleware</b> са класове изпълняващи се преди (Before Middleware) или след (After Middleware) контролерите.
Представляват удобен механизъм за филтриране на HTTP заявки в приложението. 
Като пример - може да се използва Middleware, който проверява дали потребителят е удостоверен в приложението и 
ако не е го пренасочва към екран за удостоверяване.

##### Дефиниране Middleware
Присвояваме Middleware към маршрут като поставим ключ с име на средния слой 
<code>['middleware'=>'middleware_name']</code> или ключ с масив от имена 
<code>['middleware'=>['middleware_name1, middleware_name2']</code>.

```php
<?php 
Router::any('post/{id}', ['PostControllew@post', 'middleware'=>'Auth']);
Router::any('post/{id}', ['PostControllew@post', 'middleware'=>['Auth', 'Csrf']]);
```
##### Създаване на Middleware
Може да използваме конзолата за създаване на Middleware:
```text
 php cmd make:middleware Auth
```
Тази команда ще създаде клас <code>App/Middleware/Auth.php</code>
```php
<?php

namespace App\Middleware;

use Closure;

class Auth
{
    /**
     * @param $request
     * @param Closure $next
     */
    public function handle($request, Closure $next)
    {
        /* Befor Do ....... */    
        
        $next($request);

        /* After Do .......*/
    }
}
```

##### Регистриране на Middleware
След като сме декларирали и създали Middleware трябва да регистрираме Middleware класът.
Това става като го прибавим в <code>App/Register.php</code>.  

Глобалните Middleware се регистрират в масивът <code>$middleware</code>
```php
<?php

namespace App;

class Register
{
    public $middleware = [
        \App\Middleware\Auth::class,
        \App\Middleware\Csrf::class
    ];
}

```
Ако Middleware е дефиниран за конкретен маршрут то го добавяме към масивът <code>$routeMiddleware</code>
```php
<?php

namespace App;

class Register
{
    public $routeMiddleware = [
        'Auth' => \App\Middleware\Auth::class,
        'Csrf' => \App\Middleware\Csrf::class
    ];
}
```



##### Before and After Middleware
Този Middleware клас се изпълнява винаги преди заявката да се обработи от контролера:   

```php
<?php

namespace App\Middleware;

use Closure;

class BeforeMiddleware
{
    /**
     * @param $request
     * @param Closure $next
     */
    public function handle($request, Closure $next)
    {
        // Прави нещо ......
        $next($request);

    }
}
```
Този Middleware клас се изпълнява винаги след като заявката се обработи от контролера:
```php
<?php

namespace App\Middleware;

use Closure;

class AfterMiddleware
{
    /**
     * @param $request
     * @param Closure $next
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        
        // Прави нещо ......
        
        return $response;
    }
}
```
