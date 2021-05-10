@extends('blade.layout.head')
@section('content')
<div class="row">
    <div class="col">
        <h2 id="database">DATABASE</h2>
<p>Настройките за базите данни се намират в <code>App/Config/mysql_db_config.php</code></p>
<pre><code class="language-php">&lt;?php 
    return [
        &#39;use-database&#39; =&gt; true, // false if you dont use database in your app.
        &#39;default&#39; =&gt; &#39;mysql&#39;,

        &#39;connections&#39; =&gt; [
            &#39;mysql&#39; =&gt;[
                &#39;driver&#39; =&gt; &#39;mysql&#39;,
                &#39;host&#39; =&gt; &#39;localhost&#39;,
                &#39;port&#39;=&gt;33060,
                &#39;database&#39; =&gt; &#39;dbname&#39;,
                &#39;username&#39; =&gt; &#39;root&#39;,
                &#39;password&#39; =&gt; &#39;secretpass&#39;,
                &#39;charset&#39; =&gt; &#39;utf8&#39;,
                &#39;collation&#39; =&gt; &#39;utf8_unicode_ci&#39;,
                &#39;prefix&#39; =&gt; &#39;&#39;,
            ],
            &#39;mysql-second&#39; =&gt;[
                &#39;driver&#39; =&gt; &#39;mysql&#39;,
                &#39;host&#39; =&gt; &#39;192.168.1.10&#39;,
                &#39;port&#39;=&gt;3306,
                &#39;database&#39; =&gt; &#39;dbname-second&#39;,
                &#39;username&#39; =&gt; &#39;root&#39;,
                &#39;password&#39; =&gt; &#39;secret&#39;,
                &#39;charset&#39; =&gt; &#39;utf8&#39;,
                &#39;collation&#39; =&gt; &#39;utf8_unicode_ci&#39;,
                &#39;prefix&#39; =&gt; &#39;&#39;,
            ]
        ]
    ];
?&gt;</code></pre>
<h5 id="използване-на-facade-db">Използване на facade DB</h5>
<p>С помоща на DB фасадата много лесно можем да вземем PDO инстанция към определена връзка с база данни
например <code>$dbh = DB::pdo()</code> се връзва към <code>'default' => 'mysql'</code> или 
<code>$dbh = DB::connection('conn_name')->pdo()</code> </p>
<pre><code class="language-php">&lt;?php
use Core\Libs\Support\Facades\DB;

class City extends \Core\Model
{
    public function getCity()
    {
        //Get pdo $dbh = DB::pdo();

        //get specific connections
        $dbh = DB::connection(&#39;mysql-second&#39;)-&gt;pdo();

        $sth = $dbh-&gt;prepare(&#39;SELECT * FROM geo_city WHERE city_id = :id&#39;);

        $sth-&gt;bindValue(&#39;:id&#39;, 10);
        $sth-&gt;execute();
        dump($result = $sth-&gt;fetch());
    }
}</code></pre>
<h5 id="използване-на-db-query-builder">Използване на DB query builder</h5>
<h6 id="bизпълнение-на-raw-queryb"><b>Изпълнение на Raw query</b></h6>
<p>Методът <code>DB::execute_sql($sql, array $args)</code> подготвя SQL оператор, 
който се изпълнява чрез метода <code>PDOStatement :: execute ()</code> и връща  <code>PDOStatement</code> обект, 
от който извличаме резултатите примерно с <code>PDOStatement :: fetchAll</code></p>
<pre><code class="language-php">&lt;?php
use Core\Libs\Support\Facades\DB;

class City extends \Core\Model
{
    public function getCity()
    {
        $post_code = 2000;
        $sql = &quot;SELECT * FROM geo_city_homestead WHERE post_code &lt; :post_code&quot;;

        $result = DB::execute_sql($sql, [&#39;post_code&#39;=&gt;$post_code])-&gt;fetchAll(\PDO::FETCH_ASSOC);

        foreach($result as $r){
            dump($r);
        }
    }
}</code></pre>
<h6 id="bизпълнение-на-заявки-от-две-конекцииb"><b>Изпълнение на заявки от две конекции</b></h6>
<pre><code class="language-php">&lt;?php
use Core\Libs\Support\Facades\DB;

class City extends \Core\Model
{
    public function getCity()
    {
       $post_code = 2000;
       $sql = &quot;SELECT * FROM geo_city_homestead WHERE post_code &gt; :post_code&quot;;
       $sql1 = &quot;SELECT * FROM users&quot;;

       $result = DB::execute_sql($sql, [&#39;post_code&#39;=&gt;$post_code])-&gt;fetch(\PDO::FETCH_ASSOC);
       $result2 = DB::connection(&#39;mysql-xampp&#39;)-&gt;execute_sql($sql1)-&gt;fetch(2);

       dump($result);
       dump($result2);
    }
}</code></pre>
<h6 id="bquery-builderb"><b>query builder</b></h6>
<pre><code class="language-php">&lt;?php
use Core\Libs\Support\Facades\DB;

class City extends \Core\Model
{
    public function getCity()
    {
        $result = DB::table(&#39;city&#39;)
                    -&gt;where(&#39;post_code&#39;, &#39;&gt;&#39;, 8500)
                    -&gt;orderBy(&#39;name&#39;)
                    -&gt;limit(10)
                    -&gt;get();

        dump($result);
         // fetch style -&gt; array
        $result = DB::table(&#39;city&#39;)
                    -&gt;limit(10)
                    -&gt;get(\PDO::FETCH_ASSOC);

        dump($result);

        // using Generator for big data an select only 2 columns from table
        $result = DB::table(&#39;geo_city_homestead&#39;)
                    -&gt;select(&#39;name&#39;, &#39;post_code&#39;)
                    -&gt;yield();

        foreach ($result as $res) {
            dump($res);
        }
    }
}</code></pre>
<p>Параметърът fetch_style в методът <code>DB::get($fetch_style = null)</code> по подразбиране е 
<code>PDO::FETCH_OBJ</code>
Вижте останалите <code>PDO</code> константи : <a href="https://www.php.net/manual/en/pdostatement.fetch.php">https://www.php.net/manual/en/pdostatement.fetch.php</a>  </p>
<h6 id="с-db-facade-може-да-бъдат-използвани-следните-методи-на-db-query-builder">С DB facade може да бъдат използвани следните методи на DB query builder.</h6>
<pre><code class="language-php">/**
 * Class DB
 * method static pdo()
 * method static table(string $table)
 * method static execute_sql(string $query)
 * method static where(string $field, $operator = &#39;&#39;, $data = &#39;&#39;)
 * method static or_where($field, $operator = &#39;&#39;, $data = &#39;&#39;)
 * method static orderBy($field, $order = &#39;ASC&#39;)
 * method static groupBy($field)
 * method static field(...$field_name)
 * method static select(...$field_name)
 * method static get($fetch_style = null)
 * method static getOne($fetch_style = null)
 * method static yield($fetch_style = null)
 * method static count()
 * method static insert($data)
 * method static delete()
 * method static update($data)
 * method static limit($rows, $offset = 0)
 **/</code></pre>

    </div>
</div>
@endsection
