@extends('blade.layout.head')
@section('content')
<div class="row">
    <div class="col">
        <h3 id="views">VIEWS</h3>
<p>За темпейтите на view може да използваме native php или Blade.
Изборът указваме в <code>config.php</code> в ключът <code>template_engine</code>, който може да приеме 
две стойности: <code>"php"</code> или <code>"blade"</code></p>
<h5 id="native-php-views">Native php views</h5>
<pre><code class="language-php">&lt;?php 
class DashboardController extends Controller
{
    public function login()
    {
        $data[&#39;title&#39;] = &quot;The site title&quot;;
        return view(&#39;admin/form&#39;, $data);
    }
}</code></pre>
<p>Може да използваме dot notation при извикване на view вместо directory separator</p>
<pre><code class="language-php">&lt;?php
class DashboardController extends Controller
{

    public function DashboardLogin()
    {
        $data[&#39;title&#39;] = &quot;The site title&quot;;
        return view(&#39;admin.form&#39;, $data);
    }
}</code></pre>
<p>Template файлът ще е от вида:</p>
<pre><code class="language-php">
    &lt;h1&gt;&lt;?= $title ?&gt;&lt;/h1&gt;
    &lt;!-- Or --&gt;
    &lt;h1&gt;&lt;?= $this-&gt;title ?&gt;&lt;/h1&gt;
</code></pre>
<p>Escape (екраниране) на променливите с helpers</p>
<pre><code class="language-php">
    &lt;h1&gt;&lt;?= esc($title) ?&gt;&lt;/h1&gt;
    &lt;h1&gt;&lt;?= esc($title, &#39;xss|strip_interval&#39;) ?&gt;&lt;/h1&gt;
</code></pre>
<p>или escape(екраниране) на променливите </p>
<pre><code class="language-php">
    &lt;h1&gt;&lt;?= $this-&gt;e($title) ?&gt;&lt;/h1&gt;
    &lt;h1&gt;&lt;?= $this-&gt;e($title, &#39;xss|strip_interval&#39;) ?&gt;&lt;/h1&gt;
</code></pre>
<h6 id="layout--partials">Layout &amp; partials</h6>
<p>Концепцията е че всеки сайт има оформление (Layout), състоящо се от няколко части (partials)
Например базисен layout се състои от header, content, footer. Повтарящите се partials като
header и footer може да изнесем като отделен код избягвайки преповтарянето.
За целта са създадени две директории в <code>App/Views</code> - <code>leyout</code> и <code>Partials</code>
В <code>Partials</code> живее кода на частите които се повтарят в нашия сайт, като header &amp; footer. 
В <code>layout</code> събираме тези части:</p>
<pre><code class="language-php">&lt;?php 

include_once APPLICATION_DIR . &#39;Views/Partials/header.php&#39;;
include_once $main;
include_once APPLICATION_DIR . &#39;Views/Partials/footer.php&#39;;
</code></pre>
<p>Променливата <code>$main</code> съдържа онази част от кода койято извикваме с <b>view(&#39;...&#39;)</b>
За да сменим layout в контролора използваме методът <code>$this->view->setLayout($layuotName)</code>
или helper <code>setLayout($layuotName)</code></p>
<h5 id="blade-tempalte-шаблон">Blade tempalte (шаблон)</h5>
<p>променяме в <code>config.php 
'template_engine' = 'blade'
<code></p>
<p>Повече в laravel.com за използването на blade template <a href="https://laravel.com/docs/5.8/blade">blade doc</a></p>
<p>Blade directive:</p>
<pre><code class="language-php">&lt;?php

    View::blade()-&gt;directive(&#39;datetime&#39;, function ($expression) {
          return &quot;&lt;?php echo with({$expression})-&gt;format(&#39;Y-m-D h:i:s&#39;); ?&gt;&quot;;
        });
</code></pre>
<p>Пример как да ползваме blade директивите в template файлът:</p>
<pre><code class="language-php">
&lt;?php $obj = new DateTime() ;?&gt;

@datetime($obj)
</code></pre>

    </div>
</div>
@endsection
