@extends('blade.layout.head')
@section('content')
<div class="row">
    <div class="col">
        <h3 id="функции-за-превод-с-gettext">Функции за превод с GetText</h3>
<p>Функциите за локализация на Манифактурата предоставят удобен начин за извличане на низове на 
различни езици, което позволява лесно да се поддържат множество езици във приложението.
Езиковите файлове се намират в директория <code>App/Locale/ll_CC/LC_MESSAGES</code> 
Имената на езиковите директории съответстват на езиковия local във формат <code>ll_CC</code>,  
където &quot;ll&quot; e двубуквен езиков код по ISO 639 и „CC“ е двубуквена държава по ISO 3166. Може да
използвате като име на директория и само двубуквен езиков код по ISO 639 примерно &quot;bg&quot;
Пример: <strong>bg_BG , en_US, fr_FR, bg, en</strong> 
Добър вариант е да се изполва софтуер за създаване на файловете като Poedit. </p>
<pre><code class="language-php">/locale
    /en_US
        /LC_MESSAGES
            en_US.po
            en_US.mo
            theme.mo
            theme.po
    /fr_FR
        /LC_MESSAGES
            en_US.po
            en_US.mo
            theme.mo
            theme.po
    /de
            /LC_MESSAGES
                de.po
                de.mo
                theme.mo
                theme.po</code></pre>
<h5 id="извличане-на-низове-за-превод">Извличане на низове за превод</h5>
<p>Функции:</p>
<pre><code class="language-php"># $domain - не задължителен аргумент

# Връщат преведения стринг
tr_($text, $domain);
tn_($singular, $plural, $number, $domain);
# псевдоними
_t($text, $domain) 
_tn($singular, $plural, $number, $domain)

# Отпечатват преведения стринг
__t($text, $domain);
__tn($singular, $plural, $number, $domain);
</code></pre>
<h6 id="пример">Пример:</h6>
<p>Ако в нашият en_US.po и theme.po файл имаме</p>
<pre><code class="language-text">msgid &quot;Здравей Свят&quot;
msgstr &quot;Hellow World&quot;
</code></pre>
<pre><code class="language-php">&lt;?php
// Превода ще е от en_US.mo файл
echo _t(&#39;Здравей Свят&#39;);
__t(&#39;Здравей Свят&#39;);
// Превода ще е от theme.mo файл
echo _t(&#39;Здравей Свят&#39;, &#39;theme&#39;);
__t(&#39;Здравей Свят&#39;, &#39;theme&#39;);</code></pre>
<h5 id="множествено-число">Множествено число</h5>
<p>Кода в <code>theme.po файл</code></p>
<pre><code class="language-text">msgid &quot;стая&quot;
msgid_plural &quot;стаи&quot;
msgstr[0] &quot;Room&quot;
msgstr[1] &quot;Rooms&quot;</code></pre>
<pre><code class="language-php">&lt;?php

echo _tn(&quot;стая&quot;, &quot;стаи&quot;, 1, &#39;theme&#39;);
echo _tn(&quot;стая&quot;, &quot;стаи&quot;, 2, &#39;theme&#39;);
// output Room | Rooms</code></pre>
<p>Не забравяйте да компилирате файлът oт .po  в .mo </p>
<p>Командата от терминала е :</p>
<pre><code class="language-text">msgfmt en_US.po -o en_US.mo</code></pre>
<h5 id="добавяне-на-език">Добавяне на език</h5>
<p>Езикът по подразбиране е в <code>config.php</code></p>
<pre><code class="language-php">&#39;lang&#39; =&gt; &#39;bg_BG&#39;</code></pre>
<p>Можем да сменяме езиците в нашето приложение по няколко начина - като поставим в url($_GET) , session или cookie
<code>'lang'</code> с името на локала.</p>
<p><b>Пример в URL:</b>
В <code>router.php</code></p>
<pre><code class="language-php">Router::get(&#39;posts/{lang?}&#39;, [&#39;PostController@posts&#39;]);
// Регулярният израз допуска само en и bg като стойности на lang в url
Router::get(&#39;posts/{lang:^(en|bg)$}&#39;, [&#39;PostController@posts&#39;]);</code></pre>
<p>Url -&gt; <code><a href="https://my-site.com/posts/en">https://my-site.com/posts/en</a></code></p>
<p><b>Пример с cookie:</b></p>
<pre><code class="language-php">
    public function someActionInClassController(Request $request)
    {
       /* .................................... */
        $request-&gt;set_cookie(&#39;lang&#39; , &#39;en_GB&#39;);
        dump(get_locale_lang());
    }
</code></pre>
<pre><code class="language-php">&lt;?php 
dump(get_locale_lang());
// output en_US</code></pre>
<h6 id="get_locale_lang">get_locale_lang()</h6>
<p>Връща текущия език от локала</p>
<pre><code class="language-php">&lt;?php
$locale = get_locale_lang();
// output en_US;</code></pre>

    </div>
</div>
@endsection
