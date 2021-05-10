@extends('blade.layout.head')
@section('content')
<div class="row">
    <div class="col">
        <h2 id="middleware">Middleware</h2>
<p><a href="#%D0%B4%D0%B5%D1%84%D0%B8%D0%BD%D0%B8%D1%80%D0%B0%D0%BD%D0%B5-middleware">Дефиниране Middleware</a><br><a href="#%D1%81%D1%8A%D0%B7%D0%B4%D0%B0%D0%B2%D0%B0%D0%BD%D0%B5-%D0%BD%D0%B0-middleware">Създаване на Middleware</a><br><a href="#%D1%80%D0%B5%D0%B3%D0%B8%D1%81%D1%82%D1%80%D0%B8%D1%80%D0%B0%D0%BD%D0%B5-%D0%BD%D0%B0-middleware">Регистриране на Middleware</a><br><a href="#before-and-after-middleware">Изпълнение преди или след заявката</a> </p>
<p><b>Middleware</b> са класове изпълняващи се преди (Before Middleware) или след (After Middleware) контролерите.
Представляват удобен механизъм за филтриране на HTTP заявки в приложението. 
Като пример - може да се използва Middleware, който проверява дали потребителят е удостоверен в приложението и 
ако не е го пренасочва към екран за удостоверяване.</p>
<h5 id="дефиниране-middleware">Дефиниране Middleware</h5>
<p>Присвояваме Middleware към маршрут като поставим ключ с име на средния слой 
<code>['middleware'=>'middleware_name']</code> или ключ с масив от имена 
<code>['middleware'=>['middleware_name1, middleware_name2']</code>.</p>
<pre><code class="language-php">&lt;?php 
Router::any(&#39;post/{id}&#39;, [&#39;PostControllew@post&#39;, &#39;middleware&#39;=&gt;&#39;Auth&#39;]);
Router::any(&#39;post/{id}&#39;, [&#39;PostControllew@post&#39;, &#39;middleware&#39;=&gt;[&#39;Auth&#39;, &#39;Csrf&#39;]]);</code></pre>
<h5 id="създаване-на-middleware">Създаване на Middleware</h5>
<p>Може да използваме конзолата за създаване на Middleware:</p>
<pre><code class="language-text"> php cmd make:middleware Auth</code></pre>
<p>Тази команда ще създаде клас <code>App/Middleware/Auth.php</code></p>
<pre><code class="language-php">&lt;?php

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
}</code></pre>
<h5 id="регистриране-на-middleware">Регистриране на Middleware</h5>
<p>След като сме декларирали и създали Middleware трябва да регистрираме Middleware класът.
Това става като го прибавим в <code>App/Register.php</code>.  </p>
<p>Глобалните Middleware се регистрират в масивът <code>$middleware</code></p>
<pre><code class="language-php">&lt;?php

namespace App;

class Register
{
    public $middleware = [
        \App\Middleware\Auth::class,
        \App\Middleware\Csrf::class
    ];
}
</code></pre>
<p>Ако Middleware е дефиниран за конкретен маршрут то го добавяме към масивът <code>$routeMiddleware</code></p>
<pre><code class="language-php">&lt;?php

namespace App;

class Register
{
    public $routeMiddleware = [
        &#39;Auth&#39; =&gt; \App\Middleware\Auth::class,
        &#39;Csrf&#39; =&gt; \App\Middleware\Csrf::class
    ];
}</code></pre>
<h5 id="before-and-after-middleware">Before and After Middleware</h5>
<p>Този Middleware клас се изпълнява винаги преди заявката да се обработи от контролера:   </p>
<pre><code class="language-php">&lt;?php

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
}</code></pre>
<p>Този Middleware клас се изпълнява винаги след като заявката се обработи от контролера:</p>
<pre><code class="language-php">&lt;?php

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
}</code></pre>

    </div>
</div>
@endsection
