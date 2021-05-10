<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Dashboard Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="../prism/prism.css" rel="stylesheet"/>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Документация</span>
                    <a class="d-flex align-items-center text-muted" href="#">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2" id="user-guide">Xlsx2Mysql Iporter</h1>
            </div>
            <div class="row">
                <div class="col">
                    <h6 id="bконфигуриране-връзка-към-базата-данниb"><b>Конфигуриране връзка към базата данни</b></h6>
<p>Намира се във файла <code>config.php</code></p>
<pre><code class="language-php">&lt;?php
return [
    &#39;host&#39; =&gt; &#39;localhost&#39;,
    &#39;user&#39; =&gt; &#39;root&#39;,
    &#39;password&#39; =&gt; &#39;secret&#39;,
    &#39;dbname&#39; =&gt; &#39;testdb&#39;,

];</code></pre>
<p>Примерната база данни е във файла<code>heavy_metal.sql</code>  </p>
<h6 id="bчетене-и-импорт-на-данни-от-xlsx-към-mysqlb"><b>Четене и импорт на данни от xlsx към Mysql</b></h6>
<p>Съдържанието на примерен файл за импортиране <code>xls2mysql.php</code></p>
<pre><code class="language-php">&lt;?php
    use Importer\Importer;

    require_once &#39;src/vendor/autoload.php&#39;;
    $config = include_once &#39;config.php&#39;;

    $importer = new Importer($config);

    $importer-&gt;file = &#39;Files/test.xls&#39;;
    $importer-&gt;table = &#39;heavy_metal&#39;;

    $importer-&gt;fields = [
        &#39;category&#39;, &#39;steel&#39;, &#39;steel_size&#39;, &#39;qty&#39;
    ];

    $importer-&gt;import();

    $result = $importer-&gt;result;

    print_r($result);

    /*
     * $result е масив , който може да се използва за 
     * системни съобщния информиращи потребителя
     * Array
       (
           [time] =&gt; 0.24
           [read_rows] =&gt; 461
           [imported_rows] =&gt; 461
           [not_imported] =&gt; 0
           [error] =&gt; 0
       )
     */

    echo &quot;Успешно са импортирани {$result[&#39;imported_rows&#39;]} от {$result[&#39;read_rows&#39;]} прочетени !&quot;;
</code></pre>
<h6 id="свойствата-на-класа-importer">Свойствата на класа Importer</h6>
<p>След като създадем инстанция на класът <code>$importer = new Importer($config)</code> имаме достъп до следните
свойства (променливи), на които трябва да дадм стойности     </p>
<ul>
<li><code>$importer->file</code> = Укажете пътя до файла, от който ще се четат данните за прехвърляне</li>
<li><code>$importer->table</code> = Укажете таблицата от DB , в която ще се записва</li>
<li><code>$importer->fields</code> = Масив с имената на полетата на Mysql таблицата  </li>
</ul>
<p>Масивът в <code>$importer->fields</code> може да не съдържа всички полета (fields) на в таблицата, 
тоест може да импортирате само това което желаете - примерно 
<code>$importer->fields = ['category', 'steel']; </code> това ще импортира в DB само стойностите на колоните 
(A) и (B) от <code>xlsx</code> файлът.<br><b>ВАЖНО!</b> Подреждането на имената на полетата в масива е от особено значение! В този случай данните от
колоните в екселовата таблица се импортират в следната последователност :  </p>
<p><code>[col A] => category | [col B] => steel | [col C] => steel_size | [col D] => qty</code></p>
<pre><code class="language-php">&lt;?php
$importer-&gt;file = &#39;Files/test.xls&#39;;
$importer-&gt;table = &#39;heavy_metal&#39;;
$importer-&gt;fields = [
    &#39;category&#39;, &#39;steel&#39;, &#39;steel_size&#39;, &#39;qty&#39;
];</code></pre>
<h6 id="-забележка"># Забележка!</h6>
<p>Най - добре работи с файлове <code>xlsx</code> (MS Excel 10 +);
Чете и <code>xls</code> файлове на по ниски версии на ексел но е препоръчително и в двата случая клетките
да бъдат форматирани като <code>General</code> - десен бутон =&gt; format cells =&gt; General  </p>
<h6 id="-сервизно-триене-и-нулиране-на-таблицата-в-базата-данни"># Сервизно триене и нулиране на таблицата в Базата данни!</h6>
<p>Класът <code>Importer</code> използва SQL <code>(DELETE FROM table)</code> клауза за триене на таблицата преди всеки нов 
импорт на данни. Двете заявки DELETE И INSERT се изпълняват като транзакция (MySql Transaction), тоест ако нещо се счупи 
се извършва така наречения <code>rollback</code> или казано процес на възстановяване на база данни към 
предишно състояние. <code>DELETE</code> обаче не нулира PRIMARY KEY на таблицата ! Това се постига с <code>TRUNCATE</code><br>чрез методът <code>Importer::truncate()</code>. Връща 0 при успешно изтриване или грешка (PDOException)  </p>
<p>Съдържанието на примерен файл:</p>
<pre><code class="language-php">&lt;?php
use Importer\Importer;

require_once &#39;src/vendor/autoload.php&#39;;
$config = include_once &#39;config.php&#39;;

$importer = new Importer($config);
$importer-&gt;file = &#39;Files/test.xls&#39;;
$importer-&gt;table = &#39;heavy_metal&#39;;

// Забърсва таблицата и нулира PRIMARY KEY
if($importer-&gt;truncate() == 0){
    echo &#39;Успешно изтриване на данните&#39;;
}</code></pre>
<h5 id="използване-на-helper---xls2mysql">Използване на Helper -&gt; xls2mysql</h5>
<p>Може да изполвате и функцията <code>xls2mysql(array config, string path-to-file, string dbtablename , array fields)</code></p>
<pre><code class="language-php">&lt;?php

require_once &#39;src/vendor/autoload.php&#39;;
$config = include_once &#39;config.php&#39;;

$file = &#39;XlsFiles/test.xls&#39;;
$table = &#39;heavy_metal&#39;;
$fields = [
    &#39;category&#39;, &#39;steel&#39;, &#39;steel_size&#39;, &#39;qty&#39;
];

$result = xls2mysql($config, $file, $table, $fields);

echo &quot;Успешно са импортирани {$result[&#39;imported_rows&#39;]} от {$result[&#39;read_rows&#39;]} прочетени !&quot;;</code></pre>

                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="dashboard.js"></script>
<script src="../prism/prism.js"></script>
<script>
    $("table").addClass('table table-hover table-striped');
</script>
</body>
</html>
