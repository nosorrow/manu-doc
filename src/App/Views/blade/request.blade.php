@extends('blade.layout.head')
@section('content')
<div class="row">
    <div class="col">
        <h2 id="request">Request</h2>
<p><a href="#%D1%80%D0%B0%D0%B1%D0%BE%D1%82%D0%B0-%D1%81-%D0%B4%D0%B0%D0%BD%D0%BD%D0%B8-%D0%BE%D1%82-%D1%84%D0%BE%D1%80%D0%BC%D0%B0">Работа с данни от форма</a><br><a href="#http-%D0%BC%D0%B5%D1%82%D0%BE%D0%B4%D0%B8">Http методи</a><br><a href="#%D0%B4%D1%80%D1%83%D0%B3%D0%B8-%D0%BC%D0%B5%D1%82%D0%BE%D0%B4%D0%B8-%D0%BD%D0%B0-%D0%BA%D0%BB%D0%B0%D1%81%D1%8A%D1%82">Други методи на класът</a><br><a href="#%D0%BD%D0%BE%D1%80%D0%BC%D0%B0%D0%BB%D0%B8%D0%B7%D0%B0%D1%86%D0%B8%D1%8F-%D0%BD%D0%B0-%D0%B2%D1%85%D0%BE%D0%B4%D1%8F%D1%89%D0%B8%D1%82%D0%B5-%D0%B4%D0%B0%D0%BD%D0%BD%D0%B8">Нормализация на входящите данни</a><br><a href="#%D1%81%D0%B5%D1%81%D0%B8%D0%B8-%D1%81-request">Сесии с Request</a>  </p>
<h5 id="работа-с-данни-от-форма">Работа с данни от форма</h5>
<p>View файл:</p>
<pre><code class="language-php">&lt;form method=&quot;post&quot; action=&quot;&lt;?= url(&#39;login&#39;) ?&gt;&quot;&gt;
    &lt;input type=&quot;text&quot; name=&quot;user&quot;&gt;
    &lt;input type=&quot;text&quot; name=&quot;password&quot;&gt;
    &lt;input type=&quot;submit&quot;&gt;
&lt;/form&gt;</code></pre>
<p>Контролер:</p>
<pre><code class="language-php">&lt;?php

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
        $user = $request-&gt;post(&#39;user&#39;);
        $pass = $request-&gt;post(&#39;password&#39;);

        /* .................*/
    }

}</code></pre>
<h5 id="http-методи">Http методи</h5>
<p><b>Request</b> поддържа следните <b>http</b> методи <code>'GET', 'POST','PUT', 'PATCH', 'DELETE'</code></p>
<pre><code class="language-php">&lt;?php
$request-&gt;input($key);
$request-&gt;post($key);
$request-&gt;get($key);
$request-&gt;put($key);
$request-&gt;patch($key);
$request-&gt;delete($key);
$request-&gt;postAll(); 
$request-&gt;getAll();
?&gt;</code></pre>
<p>PUT, PATCH, DELETE методи които не се поддържат от браузъра  използвайте hidden input:</p>
<pre><code class="language-html">&lt;input type=&quot;hidden&quot; name=&quot;_method&quot; value=&quot;PUT&quot;&gt; </code></pre>
<p>или helper <code>method_field($method)</code>  </p>
<pre><code class="language-php">&lt;?= method_field(&#39;PUT&#39;) ?&gt;

&lt;!-- &lt;input type=&quot;hidden&quot; name=&quot;_method&quot; value=&quot;PUT&quot;&gt; --&gt;</code></pre>
<h5 id="други-методи-на-класът">Други методи на класът</h5>
<pre><code class="language-php">&lt;?php
$request-&gt;set_cookie(
    $name, 
    $value = &#39;&#39;, 
    $expire = 3600, 
    $path = &#39;/&#39;,
    $domain = &#39;&#39;, 
    $secure = false, 
    $httponly = true
    );

$request-&gt;cookie($name);
$request-&gt;delete_cookie($name);
$request-&gt;method();</code></pre>
<h5 id="нормализация-на-входящите-данни">Нормализация на входящите данни</h5>
<p>На всички Request http методи може да добавим като незадължителен аргумент за нормализация на данните, 
който предствавлява стринг от имена на php функции с разделител &quot; | &quot;</p>
<pre><code class="language-php">&lt;?php
$request-&gt;input($key, &#39;htmlspecialchars|strip_interval|&#39;);</code></pre>
<p>налични са функциите:</p>
<pre><code class="language-Textfile">string | int | float |double | bool | trim | addslashes | htmlspecialchars |
htmlentities | strip_tags | strip_interval | escapeshellcmd | escapeshellarg
html_entity_decode | urlencode | xss</code></pre>
<h5 id="сесии-с-request">Сесии с Request</h5>
<p>Всички методи на сесиите са достъпни и в класът Request от свойството <code>session</code></p>
<pre><code class="language-php">&lt;?php
$request-&gt;session-&gt;store($key, $value);
$request-&gt;session-&gt;set($key, $value); // alias of session-&gt;srore(...);
$request-&gt;session-&gt;getData($key);
$request-&gt;session-&gt;get_all();
$request-&gt;session-&gt;all(); // alias of getAll();
$request-&gt;session-&gt;has($key);
$request-&gt;session-&gt;push($key, $value);
$request-&gt;session-&gt;pull($key, $value);
$request-&gt;session-&gt;setFlash($key, $value);
$request-&gt;session-&gt;getFlash($key);
$request-&gt;session-&gt;delete($key);
$request-&gt;session-&gt;destroy();</code></pre>

    </div>
</div>
@endsection
