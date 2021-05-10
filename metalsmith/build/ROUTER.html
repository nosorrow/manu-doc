@extends('blade.layout.head')
@section('content')
<div class="row">
    <div class="col">
        <h2 id="router">Router</h2>
<hr>
<p><a href="#%D0%BA%D0%B0%D0%BA-%D0%B4%D0%B0-%D0%B7%D0%B0%D0%BF%D0%BE%D1%87%D0%BD%D0%B5%D0%BC">Как да започнем</a><br><a href="#%D0%B8%D0%BC%D0%B5%D0%BD%D1%83%D0%B2%D0%B0%D0%BD%D0%B5-%D0%BD%D0%B0-%D0%BC%D0%B0%D1%80%D1%88%D1%80%D1%83%D1%82%D0%B8%D1%82%D0%B5-routes">Именуване на маршрутите</a><br><a href="#%D0%B3%D0%B5%D0%BD%D0%B5%D1%80%D0%B8%D1%80%D0%B0%D0%BD%D0%B5-%D0%BD%D0%B0--uri-%D1%81%D1%82%D1%80%D0%B8%D0%BD%D0%B3-%D0%BE%D1%82-named-route">Генериране на  URI стринг от Named Route </a><br><a href="#%D0%BC%D0%B0%D1%80%D1%88%D1%80%D1%83%D1%82%D0%B8-%D1%81-%D0%BF%D0%BE%D0%B2%D0%B5%D1%87%D0%B5-%D0%BE%D1%82-%D0%B5%D0%B4%D0%B8%D0%BD-http-%D0%BC%D0%B5%D1%82%D0%BE%D0%B4-multiple-http-verbs">Маршрути с повече от един Http метод (Multiple HTTP verbs)</a><br><a href="#callback">Callback</a><br><a href="#%D0%BE%D0%BF%D1%86%D0%B8%D0%BE%D0%BD%D0%B0%D0%BB%D0%BD%D0%B8-%D0%BF%D0%B0%D1%80%D0%B0%D0%BC%D0%B5%D1%82%D1%80%D0%B8-optional-parameters">Опционални параметри</a><br><a href="#%D1%80%D0%B5%D0%B3%D1%83%D0%BB%D1%8F%D1%80%D0%BD%D0%B8-%D0%B8%D0%B7%D1%80%D0%B0%D0%B7%D0%B8-regular-expression---syntax-paramregex">Регулярни изрази</a><br><a href="#%D0%BA%D0%B0%D0%BA-%D1%80%D0%B0%D0%B1%D0%BE%D1%82%D0%B8-%D1%80%D1%83%D1%82%D0%B5%D1%80%D1%8A%D1%82-how-dispatch-routes-in-front-controller">Как работи рутерът</a></p>
<h5 id="как-да-започнем">Как да започнем</h5>
<p>Добавяме маршрутите (routes) в <code>App/routes.php</code> 
Методите на класът Router са get, post, head, put, delete и отговарят на
съответните Http методи. Всеки метод получава два аргумента:</p>
<ul>
<li>съответния маршрут от вида - <code>"маршрут", "маршрут/{аргумент}", "маршрут/{аргумент?}"</code></li>
<li>Масив с елменти: <code>['class@action', 'name'=>'route-name']</code> като 
елемента &#39;name&#39; е незадължителен !  </li>
</ul>
<pre><code class="language-php"> Router::get(&#39;route/{id}&#39;, [&#39;class@action&#39;, &#39;name&#39;=&gt;&#39;route-name&#39;]);
 Router::post(&#39;route/{id}&#39;, [&#39;class@action&#39;, &#39;name&#39;=&gt;&#39;route-name&#39;]);
 Router::head(&#39;route/{id}&#39;, [&#39;class@action&#39;, &#39;name&#39;=&gt;&#39;route-name&#39;]);
 Router::put(&#39;route/{id}&#39;, [&#39;class@action&#39;, &#39;name&#39;=&gt;&#39;route-name&#39;]);
 Router::patch(&#39;route/{id}&#39;, [&#39;class@action&#39;, &#39;name&#39;=&gt;&#39;route-name&#39;]);
 Router::delete(&#39;route/{id}&#39;, [&#39;class@action&#39;, &#39;name&#39;=&gt;&#39;route-name&#39;]);
 Router::get(&#39;post/{id}/view&#39;, [&#39;class@action&#39;, &#39;name&#39;=&gt;&#39;route-name&#39;]);</code></pre>
<p><a href="#router">начало <sup>&#8673;</sup></a></p>
<h5 id="именуване-на-маршрутите-routes">Именуване на маршрутите (routes)</h5>
<p>Не е задължително , но е препоръчително да се дават имена на маршрути с цел по-лесно
поддържане на проекта ако се наложи промяна в URL адресите. Пример:  </p>
<p>Създаваме маршрут</p>
<pre><code class="language-php">Router::get(&#39;programing/posts&#39;, [&#39;PostsController@postsPrograming&#39;, &#39;name&#39;=&gt;&#39;computer_programing&#39;]);</code></pre>
<p>Създаваме хиперлинк</p>
<pre><code class="language-php">&lt;a href=&quot;&lt;?= site_url(&#39;programing/posts&#39;) ?&gt;&quot;&gt;Всички статии&lt;/а&gt;</code></pre>
<p>В горния пример <code>site_url</code> ще генерира Url от вида <code><a href="http://mysite.com/programing/posts">http://mysite.com/programing/posts</a></code>
Ако се наложи промяна на този адрес примерно на <code><a href="http://mysite.com/programing/posts">http://mysite.com/programing/posts</a></code> то ще трябва да намерим 
в кода всички адреси генерирани от <code>site_url</code> и да ги променим ръчно , което е твърде неудобно!
Решението е да използваме функцията <code>route_url(string $route_name)</code> , която получава като аргумент  името на маршрута.</p>
<pre><code class="language-php">&lt;a href=&quot;&lt;?= route_url(&#39;computer_programing&#39;) ?&gt;&quot;&gt;Всички статии&lt;/а&gt;</code></pre>
<h5 id="генериране-на--uri-стринг-от-named-route">Генериране на  URI стринг от Named Route</h5>
<p>Ако посоченият маршрут дефинира параметри, можете да предадете масив с параметри
като втори аргумент към метода &#39;route&#39; на класът Router. </p>
<pre><code class="language-php">// Примерен маршрут
Router::get(&#39;route/{lang}/post/{slug}&#39;, [&#39;Class@action&#39;, &#39;name&#39;=&gt;&#39;lang-fr&#39;]);
// генерира URI стринг: route/fr/post/your-post-slug
$route = $router-&gt;route(&#39;lang-fr&#39;,[&#39;lang&#39;=&gt;&#39;fr&#39;, &#39;slug&#39;=&gt;&#39;your-post-slug&#39;])-&gt;route;
//със http метод 
$route = $router-&gt;route(&#39;lang-fr&#39;,[&#39;lang&#39;=&gt;&#39;fr&#39;, &#39;slug&#39;=&gt;&#39;your-post-slug&#39;], &#39;GET&#39;)-&gt;route;</code></pre>
<p>Горният пример показва как работи методът <code>Roter::route(string $route_name, array $params)</code><br>В Manufacture използваме helpers за генериране на Uri виж <b>Route helpers &amp; redirects</b>  </p>
<p>Ако искаме да спрем сайта, примерно за профлактика:</p>
<pre><code class="language-php">
    Router::site_down(function(){
        echo &#39;Сайта е в ремонт!&#39;;
     // or  view(&#39;maintenance&#39;);
        exit;
    });</code></pre>
<h5 id="маршрути-с-повече-от-един-http-метод-multiple-http-verbs">Маршрути с повече от един Http метод (Multiple HTTP verbs)</h5>
<p>Поддържаните Http методи са <code>'GET', 'POST', 'HEAD', 'PUT', 'PATCH', 'DELETE'</code></p>
<pre><code class="language-php">// създава марсшрут за post и get
Router::methods([&#39;post&#39;, &#39;get&#39;],&#39;route/{id}&#39;, [&#39;class@action&#39;, &#39;name&#39;=&gt;&#39;route-name&#39;]);
// създава марсшрут за всички Http методи
Router::any(&#39;route/{id}&#39;, [&#39;class@action&#39;, &#39;name&#39;=&gt;&#39;route-name&#39;]);</code></pre>
<h5 id="callback">Callback</h5>
<pre><code class="language-php"> Router::get(&#39;route/{slug}/{id}&#39;, [function($slug, $id){
    echo $id . &#39; from &#39; . $slug;
  }, &#39;name&#39;=&gt;&#39;callback&#39;]);</code></pre>
<h5 id="опционални-параметри-optional-parameters">Опционални параметри (Optional Parameters)</h5>
<pre><code class="language-php">// Съвпада с  /route/user-post/55 или /route/user-post
 Router::get(&#39;route/{slug}/{id?}&#39;, [&#39;class@action&#39;, &#39;name&#39;=&gt;&#39;route-name&#39;]);</code></pre>
<h5 id="регулярни-изрази-regular-expression---syntax-paramregex">Регулярни изрази (Regular Expression) - Syntax {param:[regex]}</h5>
<pre><code class="language-php">Router::get(&#39;route/{slug}/edit/{post:[a-z]}/{id:[0-9]}&#39;, [&#39;class@action&#39;, &#39;name&#39;=&gt;&#39;route-name&#39;]);
Router::get(&#39;route/{lang:(en|bg)}/{post}/{id:\d+}&#39;, [&#39;class@action&#39;, &#39;name&#39;=&gt;&#39;route-name&#39;]);

// Съвпада: /route/my-post-name.pdf
Router::get(&#39;route/{slug:^\w+((?:\.pdf))$}&#39;, [&#39;class@action&#39;, &#39;name&#39;=&gt;&#39;route-name&#39;]);

// Може да използваме (format=html) вместо регулярен израз | Съвпада: /route/my-post-name.html or /route/my-post-name
Router::get(&#39;route/{slug:format=html}, [&#39;class@action&#39;, &#39;name&#39;=&gt;&#39;route-name&#39;]);</code></pre>
<h5 id="как-работи-рутерът-how-dispatch-routes-in-front-controller">Как работи рутерът (How Dispatch routes in Front Controller)</h5>
<pre><code class="language-php">include_once &#39;Router.php&#39;;
include_once &#39;routes.php&#39;;

$router = new Router();
$route = $router-&gt;dispatch(&#39;post/55&#39;);

/*
$route now is array like

Array
(
    &quot;action&quot; =&gt; &quot;controller@action&quot;
    &quot;name&quot; =&gt; &quot;route_name&quot;
    &quot;params&quot; =&gt; Array
        (
            &quot;id&quot; =&gt; 55
        )
)
*/
</code></pre>

    </div>
</div>
@endsection
