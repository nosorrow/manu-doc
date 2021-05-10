@extends('blade.layout.head')
@section('content')
<div class="row">
    <div class="col">
        <h2 id="команди-от-конзолата-command-line">Команди от конзолата (Command line)</h2>
<h5 id="създаване-на-контролер-controller">Създаване на Контролер (Controller)</h5>
<pre><code class="language-php">php cmd make:controller SendMailController</code></pre>
<p>Ще създаде файл <code>SendMailController.php</code> в директория <code>src/App/Controllers</code></p>
<h5 id="създаване-на-model">Създаване на Model</h5>
<pre><code class="language-php">php cmd make:model &lt;modelname&gt;</code></pre>
<p>Ще създаде файл <code>modelname.php</code> в директория <code>src/App/Models</code></p>
<h5 id="трие-кеша-и-файловете-на-сесиите">Трие кеша и файловете на сесиите</h5>
<p>Темплейт системата Blade създава кеш файлове в директория <code>src/App/storage/app/views</code>, които може да
изтрием от конзолата с команда:</p>
<pre><code class="language-php">php cmd clear:views</code></pre>
<p>Файловете на сесиите от директория <code>src/App/storage/tmp</code></p>
<pre><code class="language-php">php cmd clear:sessions</code></pre>
<h5 id="нов-криптиращ-ключ">Нов криптиращ ключ</h5>
<p>Генерира нов валиден криптиращ ключ и го записва в <code>config.php</code></p>
<pre><code class="language-php">php cmd key:generate</code></pre>

    </div>
</div>
@endsection
