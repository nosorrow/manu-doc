@extends('blade.layout.head')
@section('content')
<div class="row">
    <div class="col">
        <h2 id="route-helpers--redirects">Route helpers &amp; redirects</h2>
<h5 id="генериране-на-urls">Генериране на URLs</h5>
<p>След като сме създали име на маршрута в <code>route.php</code> може да използваме това име<br>за генериране на URL адреси или редиректване с помоща на функцията <code> route() и route_url()</code>  </p>
<ul>
<li>function route($routeName, $params = [], $request_method = null);</li>
<li>function route_url($routeName, $params = [], $request_method = null)</li>
</ul>
<pre><code class="language-php">&lt;?php 
// маршрут с име в route.php
//Router::get(&#39;page/{id}&#39;,[&#39;ErrorPage@show&#39;,&#39;name&#39; =&gt; &#39;error&#39;]);

$uri = route(&#39;error&#39;, [404]); //ще върне URI &quot;page/404&quot;
$url = site_url($uri); // https://site.com/page/404

echo route_url(&#39;error&#39;, [&#39;id&#39;=&gt;404]); //  https://site.com/page/404</code></pre>
<h5 id="пример-с-подаване-на--аргументи-в-масив">Пример с подаване на  аргументи в масив</h5>
<pre><code class="language-php">&lt;?php 
// маршрут с име в route.php
Router::get(&#39;user/{id}/comment/{commentId}&#39;, [&#39;Controller@method&#39;, &#39;name&#39;=&gt;&#39;user_comments&#39;]);

// ще подреди правилно аргументите и ще върне &quot;user/10/comment/25&quot;
$uri = route(&#39;user_comments&#39;, [&#39;id&#39;=&gt;10, &#39;commentId&#39;=&gt;25]);

Router::get(&#39;user/{id}/comment/{commentId?}&#39;, [&#39;Controller@method&#39;, &#39;name&#39;=&gt;&#39;user_comments&#39;]);
// ще подреди правилно аргументите и ще върне &quot;user/10/comment&quot; тъй като има опционален параметър
$uri = route(&#39;user_comments&#39;, [&#39;id&#39;=&gt;10]);</code></pre>
<h5 id="redirect-helper">Redirect helper</h5>
<h5 id="използваме-helper-redirect">Използваме helper redirect()</h5>
<pre><code class="language-php"> &lt;?php 
// Router::get(&#39;user/{id}/comment/{commentId}&#39;, [&#39;Controller@method&#39;, &#39;name&#39;=&gt;&#39;user_comments&#39;]);
// Router::any(&#39;signup&#39;, [&#39;RegistrationController@signupForm&#39;, &#39;signup&#39;]);

$uri = route(&#39;user_comments&#39;, [&#39;id&#39;=&gt;10, &#39;commentId&#39;=&gt;25]);
redirect()-&gt;to($uri);
redirect($uri);

// или използваме на route name
redirect()-&gt;route(&#39;user_comments&#39;, [&#39;id&#39;=&gt;10, &#39;commentId&#39;=&gt;25]);
// редирект към външен url адрес
redirect()-&gt;away(&#39;https://google.com&#39;);</code></pre>
<h5 id="използваме-redirect-с-flash-message">Използваме redirect() с flash message</h5>
<pre><code class="language-php"> &lt;?php 
redirect()-&gt;to(&#39;uri&#39;)-&gt;with(&#39;success&#39;, &#39;All is Ok!&#39;);</code></pre>
<p>Пример на показване на флаш съобщението във view с blade template:  </p>
<?php
$str = <<<'EOF'
<pre class=" language-php"><code class=" language-php">
@if</span>($msg = flash</span>('success'))
  {{ $msg }}
@endif;
</code></pre>
EOF;
echo ($str);
?>

    </div>
</div>
@endsection
