@extends('blade.layout.head')
@section('content')
<div class="row">
    <div class="col">
        <h2 id="csrf">CSRF</h2>
<h5 id="csrf-скрито-поле-с-token">CSRF скрито поле с token</h5>
<pre><code class="language-php">    &lt;?php csrf_field() ?&gt;
   /*
    * HTML output like:
    * &lt;input type=&#39;hidden&#39; name=&#39;csrf_token&#39; id=&#39;csrf_token&#39; value=&#39;d146d8efcd59ac76f463d0ad18979abd&#39; /&gt;
   */</code></pre>
<p>Пример:   </p>
<pre><code class="language-php">    &lt;form action=&quot;&lt;?php echo site_url(&#39;store&#39;) ?&gt;&quot; method=&quot;post&quot;&gt;
        &lt;?php csrf_field() ;?&gt;
        &lt;input type=&quot;text&quot; name=&quot;user&quot; value=&quot;&lt;?php echo oldValue(&#39;user&#39;) ?&gt;&quot;&gt;
        &lt;?php echo validation_error(&#39;user&#39;) ?&gt;
        &lt;input type=&quot;submit&quot; value=&quot;submit&quot;&gt;
    &lt;/form&gt;
</code></pre>
<h5 id="проверка-в-контролера">Проверка в Контролера</h5>
<ul>
<li><code>Csrf::validate()</code></li>
<li><code>$csrf->csrf_validate()</code> метод от инстанция на класа Csrf</li>
</ul>
<pre><code class="language-php">&lt;?php    
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
            view(&#39;form&#39;);
        }

        public function store(Request $request, Csrf $csrf)
        {
            // Using Csrf::validate() or $csrf-&gt;csrf_validate()

            if ($csrf-&gt;csrf_validate() === false) {
                redirect()-&gt;to(&#39;home&#39;)-&gt;with(&#39;msg&#39;, &#39;Invalid CSFR tokken&#39;);
            }

        }
    }</code></pre>

    </div>
</div>
@endsection
