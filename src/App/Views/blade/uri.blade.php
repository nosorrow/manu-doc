@extends('blade.layout.head')
@section('content')
<div class="row">
    <div class="col">
        <h2 id="uri---унифициран-идентификатор-на-ресурс">URI - унифициран идентификатор на ресурс</h2>
<p><a href="#uri-class">Uri Class</a><br><a href="#uri-facade">Uri Facade</a><br><a href="#uri-helpers">Uri helpers</a>  </p>
<p><strong>Uniform Resource Identifier (URI)</strong> - унифициран идентификатор на ресурс. 
Позволява да се идентифицира някакъв определен ресурс: документ, изображение, 
файл, служба, кутия на електронна поща и т.н. 
Най-често това са линкове към URL, които идентифицират съответния ресурс.</p>
<h5 id="uri-class">Uri Class</h5>
<pre><code class="language-php">&lt;?php
use Core\Libs\Uri;

class TestController extends Controller
{
    public function TestUri(Uri $uri)
    {
        // връща текущия URI 
        echo $uri-&gt;uriString();

        // връща масив с индетификаторите с ключ започващ от 1
        print_r($uri-&gt;segments());

        // връща втория индетификатор от масива
        echo $uri-&gt;segment(2);

        // пренасочва към ресурса
        $uri-&gt;redirect(&#39;post/32&#39;);
    }
}
</code></pre>
<h5 id="uri-facade">Uri Facade</h5>
<pre><code class="language-php">&lt;?php
use Core\Libs\Support\Facades\Uri;

class TestController extends Controller
{
    public function TestUri()
    {
        // връща текущия URI 
        echo Uri::uriString();

        // връща масив с индетификаторите с ключ започващ от 1
        print_r(Uri::segments());

        // връща втория индетификатор от масива
        echo Uri::segment(2);

        // пренасочва към ресурса
        Uri::redirect(&#39;post/32&#39;);
    }
}
</code></pre>
<h5 id="uri-helpers">Uri helpers</h5>
<pre><code class="language-php">&lt;?php
// връща текущия URI 
echo uri()-&gt;uriString();

// връща масив с индетификаторите с ключ започващ от 1
print_r(Uri()-&gt;segments());

// връща втория индетификатор от масива
echo uri()-&gt;segment(2);

// пренасочва към ресурса
uri()-&gt;redirect(&#39;post/32&#39;);
</code></pre>

    </div>
</div>
@endsection
