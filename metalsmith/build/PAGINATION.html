@extends('blade.layout.head')
@section('content')
<div class="row">
    <div class="col">
        <h2 id="странициране-на-резултатите">Странициране на резултатите</h2>
<h5 id="i-странициране-с-db-фасадата">I. Странициране с DB фасадата</h5>
<pre><code class="language-php">&lt;?php

class Pagination extends Controller
{
    public function getCities(Pagination $pagination)
    {
        $data[&#39;cities&#39;] = (DB::table(&#39;city&#39;)-&gt;paginate(10));

        view(&#39;citiesView&#39;, $data);
    }
}</code></pre>
<h5 id="показване-на-страницираните-данни">Показване на страницираните данни</h5>
<pre><code class="language-php">&lt;div class=&quot;container&quot;&gt;
    &lt;h1&gt;Cities listing&lt;/h1&gt;
    &lt;div class=&quot;row&quot;&gt;
        &lt;div class=&quot;col-md-10&quot;&gt;
            &lt;?php foreach ($cities-&gt;data as $city):?&gt;
            &lt;p&gt;&lt;?= $city-&gt;city_id . &#39; &#39;.$city-&gt;name  .&quot; : &quot; . $city-&gt;lat . &#39;,&#39;. $city-&gt;lng?&gt;&lt;/p&gt;
            &lt;?php endforeach ?&gt;
            &lt;nav aria-label=&quot;Page navigation example&quot;&gt;
                &lt;ul class=&quot;pagination&quot;&gt;
                    &lt;?php $cities-&gt;link-&gt;setUlClass(&quot;pagination pagination-sm&quot;);?&gt;
                    &lt;?= $cities-&gt;link ?&gt;
                &lt;/ul&gt;
            &lt;/nav&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
</code></pre>
<p>Може да използваме темплейта с линкове на JasonGrimes Paginator:</p>
<pre><code class="language-php">
&lt;div class=&quot;container&quot;&gt;
    &lt;h1&gt;Cities listing&lt;/h1&gt;
    &lt;div class=&quot;row&quot;&gt;
        &lt;div class=&quot;col-md-10&quot;&gt;
            &lt;?php foreach ($cities-&gt;data as $city):?&gt;
            &lt;p&gt;&lt;?= $city-&gt;city_id . &#39; &#39;.$city-&gt;name  .&quot; : &quot; . $city-&gt;lat . &#39;,&#39;. $city-&gt;lng?&gt;&lt;/p&gt;
            &lt;?php endforeach ?&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;?php $paginator = $cities-&gt;link;?&gt;
&lt;?php include_once partial(&#39;paginationSmall&#39;); ?&gt;</code></pre>
<h5 id="ii-странициране-с-manufacture-pagination-който-разширява-jasongrimes-paginator">II. Странициране с Manufacture Pagination, който разширява JasonGrimes Paginator</h5>
<p>Методите на Pagination класа:</p>
<pre><code class="language-php">$pagination-&gt;total($count);
$pagination-&gt;url_pattern(site_url(&#39;...&#39;) . &#39;?page=(:num)&#39;);
$pagination-&gt;total($count);
$pagination-&gt;per_page($itemsPerPage);
$pagination-&gt;setMaxPagesToShow($maxPagesToShow);
$pagination-&gt;setPreviousText($previousText);
$pagination-&gt;setNextText($nextText);
$pagination-&gt;getLimit(); // връща sql query (&#39; LIKE 10 OFFSET 20);
$pagination-&gt;paginate($n);</code></pre>
<h6 id="методите-на-manufacturepaginator-extends-paginator">Методите на ManufacturePaginator extends Paginator:</h6>
<pre><code class="language-php">setUlClass($ulClass);
setLiClass($liClass);
setLinkClass($linkClass);</code></pre>
<p>Примерен код в контролера:</p>
<pre><code class="language-php">&lt;?php

class Pagination extends Controller
{
    public function paginateDatafromDB(Pagination $pagination)
    {
        $count = DB::table(&#39;geo_city&#39;)-&gt;count();
        $pagination-&gt;total($count);
        $pagination-&gt;url_pattern(site_url(&#39;someUri&#39;) . &#39;?page=(:num)&#39;);

        $link = $pagination-&gt;paginate(10);
        $link-&gt;setUlClass(&quot;pagination pagination-sm&quot;);

        $data[&#39;link&#39;] = $link;
        $data[&#39;paginator&#39;] = $link;
        $data[&#39;cities&#39;] = DB::table(&#39;geo_city&#39;)-&gt;rawLimit($pagination-&gt;limit)-&gt;get(\PDO::FETCH_ASSOC);

        view(&#39;pagination&#39;, $data);
    }
}</code></pre>
<p>Показване на страниците във View:</p>
<pre><code class="language-php">
&lt;div class=&quot;container&quot;&gt;
    &lt;h1&gt;DataBase Testing&lt;/h1&gt;
    &lt;div class=&quot;row&quot;&gt;
        &lt;div class=&quot;col-md-10&quot;&gt;
            &lt;?php foreach ($cities as $city):?&gt;
                &lt;p&gt;&lt;?= $city[&#39;name&#39;] ?&gt;&lt;/p&gt;
            &lt;?php endforeach ?&gt;
            &lt;nav aria-label=&quot;Page navigation example&quot;&gt;
                &lt;?= $link ?&gt;
            &lt;/nav&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
<h5 id="iii-ajax-pagination">III. Ajax pagination</h5>
<p>В рутера добавяме маршрут като долния пример:</p>
<pre><code class="language-php">&lt;?php
   Router::any(&#39;ajax&#39;, [&#39;TestController@ajax&#39;, &#39;name&#39;=&gt;&#39;ajax&#39;]);
</code></pre>
<p>Примерен код в контролера:</p>
<pre><code class="language-php">&lt;?php

namespace App\Controllers;

defined(&#39;APPLICATION_DIR&#39;) OR exit(&#39;No direct Accesss here !&#39;);

use Core\Controller;
use Core\Libs\Support\Facades\DB;
use Core\Libs\Pagination;
use Core\Libs\Response;

class TestController extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function paginateData(Pagination $pagination)
    {      
        view(&#39;pagination-ajax&#39;);
    }

    public function ajax()
    {
        $pag = DB::table(&#39;geo_city&#39;)-&gt;paginate(10);
        $data[&#39;link&#39;] = sprintf($pag-&gt;link);
        $data[&#39;data&#39;] = $pag-&gt;data;

        echo Response::json($data);
        return;

        //==============================================
        // Алтернативен код 
        $data = DB::table(&#39;geo_city&#39;)-&gt;paginate(10);
        $data-&gt;link-&gt;setMaxPagesToShow(15);
        $data-&gt;link = sprintf($data-&gt;link);
        echo Response::json($data);
        return;
        //===============================================
    }
}</code></pre>
<p>View : pagination-ajax.php</p>
<pre><code class="language-html">&lt;div class=&quot;container&quot;&gt;
    &lt;h1&gt;DataBase AjaxPagination&lt;/h1&gt;
    &lt;div class=&quot;row&quot;&gt;
        &lt;div class=&quot;col-md-10&quot;&gt;
            &lt;!-- тук js ще покаже резултатът --&gt;
            &lt;div style=&quot;height: 300px&quot;&gt;
                &lt;p class=&quot;result&quot;&gt;&lt;/p&gt;
            &lt;/div&gt;
            &lt;nav id=&quot;paginator&quot; style=&quot;position: fixed; bottom: 0&quot;&gt;&lt;/nav&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;script&gt;
    function displayPaginated(link) {
        $.get(link, function (data) {
            // показваме link с номерата на страниците
            $(&#39;#paginator&#39;).html(data.link);
            $.each(data.data, function (key, val) {
                // показваме първите резултати от страницирането
                $(&quot;.result&quot;).append(&#39;&lt;p&gt;&#39; + val.name + &#39;&lt;/p&gt;&#39;);
            });
        })
    }

    displayPaginated(&#39;ajax&#39;);

    // При клик на page links
    $(document).on(&quot;click&quot;, &#39;.page-item a&#39;, function (e) {

        e.preventDefault();

        var link, href;

        link = $(this);
        href = link.attr(&#39;href&#39;);

        $(&#39;#paginator ul li&#39;).removeClass(&#39;active&#39;);
        link.parent().addClass(&#39;active&#39;);
        $(&#39;.result&#39;).empty();

        displayPaginated(href);
    })
&lt;/script&gt;</code></pre>
<p>Повече за класът JasonGrimes Paginator виж документацията <b><a href="https://github.com/jasongrimes/php-paginator">тук</a></b></p>

    </div>
</div>
@endsection
