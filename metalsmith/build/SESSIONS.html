@extends('blade.layout.head')
@section('content')
<div class="row">
    <div class="col">
        <h2 id="sessions">Sessions</h2>
<h5 id="basic-usage">Basic usage</h5>
<pre><code class="language-php">
&lt;?php

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
        // .... validate user &amp; pass
        $request-&gt;session-&gt;store(&#39;auth&#39;, &#39;loged&#39;);
    }

    public function adminArea(Request $request)
    {
        $auth = $request-&gt;session-&gt;getData(&#39;auth&#39;);

        // $auth === &#39;logged&#39;
        // ... do somthing
    }
}
</code></pre>
<h5 id="session-methods">Session methods</h5>
<pre><code class="language-php">&lt;?php
$this-&gt;session-&gt;store($key, $value);
$this-&gt;session-&gt;set($key, $value); // alias of session-&gt;srore(...);
$this-&gt;session-&gt;getData($key);
$this-&gt;session-&gt;get_all();
$this-&gt;session-&gt;all(); // alias of getAll();
$this-&gt;session-&gt;has($key);
$this-&gt;session-&gt;push($key, $value);
$this-&gt;session-&gt;pull($key, $value);
$this-&gt;session-&gt;setFlash($key, $value);
$this-&gt;session-&gt;getFlash($key);
$this-&gt;session-&gt;delete($key);
$this-&gt;session-&gt;destroy();
</code></pre>
<h5 id="sesion-helpers">Sesion helpers</h5>
<pre><code class="language-php">&lt;?php
/* 
 * Ako $name е масив или имаме стойност в value
 * то ще слагаме сеиия ($nama=&gt;$value),
 * иначе вземам сесия с име $name;
 */
sessionData($key, $data);
// връща сесия или всички сесии
$session = sessionData($key);
$session = sessionData();
// pull push
session_push($key, $value);
session_pull($key, $value);

// Ако съществува връща true
session_has($key);

// връща флаш сесия
$error = flash($name);
session_delete($key);</code></pre>
<h5 id="session-helper-свързани-с-валидация-на-данни-и-view">Session helper свързани с валидация на данни и View</h5>
<ul>
<li>errors() - връща обект със съобещния от валидатора.<pre><code class="language-php">&lt;?= $errors-&gt;first(&#39;email&#39;) ?&gt;</code></pre>
</li>
</ul>
<h5 id="показваме-грешките-във-view">Показваме грешките във View</h5>
<p>Всички грешки от валидирането на данни се записват във флаш сесия!</p>
<pre><code class="language-php">&lt;?php
    if ($errors-&gt;has()) {
        foreach ($errors-&gt;all() as $error) {
            echo &#39;&lt;li&gt;&#39; . $error . &#39;&lt;/li&gt;&#39;;
        }
    }; </code></pre>
<h5 id="oldstr-value-helper">old($str) value helper</h5>
<p>Функцията връща старите попълнени от потребителя данни в полето (input) ако валидацията е неуспешна.</p>
<pre><code class="language-php">    &lt;input type=&#39;text&#39; name=&#39;email&#39; value=&quot;&lt;?= old(&#39;email&#39;) ?&gt;&quot;</code></pre>

    </div>
</div>
@endsection
