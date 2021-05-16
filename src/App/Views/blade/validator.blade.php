@extends('blade.layout.head')
@section('content')
<div class="row">
    <div class="col">
        <h3 id="валидация-на-request-с-манифактурата">Валидация на request с манифактурата</h3>
<p>Валидацията се извършва от класа:</p>
<p>Core\Libs\Validator</p>
<p>Логиката се изгражда на принципа:</p>
<pre><code class="language-php">
// $validator is instance of Core\Libs\Validator

$validator-&gt;for($dataForValidation)
    -&gt;ruleFor(&#39;fieldName&#39;, &#39;Label&#39;, [&#39;validation_rule&#39;], [$Optional_customErrorMessage]);

if($validator-&gt;run() === false {
    // .... redirect to errors 
}     
</code></pre>
<p>Ако данните от полето са в масив примерно:</p>
<pre><code class="language-html">    &lt;input type=&quot;text&quot; name=&quot;emails[]&quot;&gt;</code></pre>
<p>то в изграждането на валидацията може да използваме маска :</p>
<pre><code class="language-php">
$validator-&gt;for($request)-&gt;ruleFor(&#39;emails.*&#39;, .....);
</code></pre>
<h5 id="пример-на-валидация-в-контролера">Пример на валидация в контролера</h5>
<pre><code class="language-php">&lt;?php 

namespace App\Controllers;

use Core\Controller;
use Core\Libs\Validator;
use Core\Libs\Request;

class MyController extends Controller
{
    public function testStoreBlade(Request $request, Validator $validator)
    {
        $validator-&gt;for($request)
            -&gt;ruleFor(&#39;email&#39;, &#39;Email address&#39;, [&#39;required&#39;, &#39;email&#39;])
            -&gt;ruleFor(&#39;pass&#39;, &#39;Enter Password&#39;, [&#39;required&#39;, &#39;min:8&#39;])
            -&gt;ruleFor(&#39;passwordconfirm&#39;, &#39;Confirm password&#39;, [&#39;required&#39;, &#39;match:pass&#39;])
            // &quot;:file&quot; ще покаже името на файлът в съобщението за грешка.
            -&gt;ruleFor(&#39;file&#39;, &#39;:file&#39;, [&#39;mimes:jpeg,gif,bmp&#39;])
            -&gt;ruleFor(&#39;agree&#39;, &#39;Agree&#39;, [&#39;required&#39;]);

        if($validator-&gt;run() === false){

            redirect()-&gt;back();
        }

        view(&#39;blade.homepage&#39;);
    }
}
</code></pre>
<h5 id="валидиране-на-други-данни">Валидиране на други данни:</h5>
<pre><code class="language-php">&lt;?php 

namespace App\Controllers;

use Core\Controller;
use Core\Libs\Validator;

class MyController extends Controller
{
    public function testStoreBlade(Validator $validator)
    {
        $data = [&#39;text&#39;=&gt;&#39;Some text here&#39;];
        $validator-&gt;for($data)
            -&gt;ruleFor(&#39;text&#39;, &#39;&#39;, [&#39;max:255&#39;]);

        if($validator-&gt;run() === false){

            redirect()-&gt;back();
        }
    }
}
</code></pre>
<h5 id="зареждане-на-грешките-от-file-uploader-във-валидатора">Зареждане на грешките от file uploader във Валидатора</h5>
<pre><code class="language-php">&lt;?php

namespace App\Controllers;

use Core\Controller;
use Core\Libs\Validator;
use Core\Libs\Request;

class MyController extends Controller
{
    public function store(Request $request)
    {
       $upload = $request-&gt;file()-&gt;upload(&#39;file&#39;);

               if ($upload-&gt;hasError() &amp;&amp; $upload-&gt;getErrorCode() !=4 ) {
                   $request-&gt;validation()-&gt;errors-&gt;file = $upload-&gt;getError(true);
               }

               if ($request-&gt;validation()-&gt;run() == false) {

                   redirect()-&gt;back();
               }
    }
}
</code></pre>
<h5 id="валидиране-с-facades">Валидиране с Facades:</h5>
<p>Статично извикване на класа Validator</p>
<pre><code class="language-php">&lt;?php 

namespace App\Controllers;

use Core\Controller;
use Core\Libs\Support\Facades\Validator;
use Core\Libs\Request;

class MyController extends Controller
{
    public function store(Request $request)
    {
        $data = [&#39;text&#39;=&gt;&#39;Some text here&#39;];
        Validator::for($data)
                -&gt;ruleFor(&#39;text&#39;, &#39;&#39;, [&#39;max:255&#39;]);

        if(Validator::run() === false){

            redirect()-&gt;back();
        }
    }
}
</code></pre>
<h5 id="валидация-на-полета-от-форма-с-класа-request">Валидация на полета от форма с класа Request</h5>
<pre><code class="language-php">&lt;?php 

class MyController extends Controller
{
    public function store(Request $request)
    {
        $validation = $request-&gt;validation()
                    -&gt;ruleFor(&#39;email.*.female&#39;, &#39;email address&#39;, [&#39;required&#39;, &#39;email&#39;, &#39;max:25&#39;]);

        if($validation-&gt;run() === false){

            redirect()-&gt;back();
        }
    }
}
</code></pre>
<h5 id="валидиращите-правила-могат-да-бъдат-поставени-в-масив">Валидиращите правила могат да бъдат поставени в масив</h5>
<pre><code class="language-php">&lt;?php
$fieldRules = [
    &#39;email&#39;=&gt;[
        &#39;label&#39;=&gt;&#39;Email address&#39;,
        &#39;rules&#39;=&gt;[&#39;required&#39;, &#39;email&#39;],
        &#39;message&#39;=&gt;[&#39;required&#39;=&gt;&#39;Cannot be empty&#39;, &#39;email&#39;=&gt;&#39;Not valid email&#39;] 
    ]
];

$validator-&gt;ruleFor($fieldRules);</code></pre>
<h3 id="собствени-правила-и-слагане-на-грешки">Собствени правила и слагане на грешки</h3>
<p>С помоща на анонимна функция може да се поставят собствени правила за валидиране</p>
<pre><code class="language-php">&lt;?php
    $validator-&gt;for($data)-&gt;ruleFor(&#39;product_name&#39;, &#39;продукт&#39;, [&#39;required&#39;,
        function($label, $value){
            if ($value === &#39;bluza&#39;){
                // съобщение за грешка
                return (string)($label . &quot; e bluza&quot;);
            }
    }]);
</code></pre>
<h3 id="собствени-съобщения-за-грешки">Собствени съобщения за грешки</h3>
<p>Подайте масив в метода message($array) :</p>
<h5 id="1-собствени-съобщения-за-определено-поле">1. Собствени съобщения за определено поле.</h5>
<pre><code class="language-php">&lt;?php
$messages = [
    &#39;user&#39; =&gt;[&#39;required&#39;=&gt;&#39;Въведете потребителско име&#39;],
    &#39;email&#39;=&gt;[
              &#39;required&#39;=&gt;&#39;Не сте попълнил това поле&#39;,
              &#39;email&#39;=&gt;&#39;Въведете валиден емейл адрес&#39;
           ],
    &#39;addresses.*&#39; =&gt;[&quot;max&quot; =&gt;&quot;Полето {label} не може да бъде по-голямо от {arg} символа&quot;]
   ];

$validator-&gt;message($messages);
</code></pre>
<h5 id="2-собствени-съобщения-за-всички-полета">2. Собствени съобщения за всички полета.</h5>
<pre><code class="language-php">&lt;?php
$messages = [
    &#39;required&#39;=&gt;&#39;Не сте попълнил това поле&#39;,
    &#39;mail&#39;=&gt;&#39;Въведете валиден емейл адрес&#39;
];

$validator-&gt;message($messages);
</code></pre>
<p>Грешките от валидацията се записват в обекта MessageBag 
и се извикват във View от флаш променливата $errors </p>
<pre><code class="language-php">
&lt;?php
    if ($errors-&gt;any()) {
        foreach ($errors-&gt;all() as $error){
            echo $error;
        }
    }
;?&gt;
</code></pre>
<h5 id="обекта-messagebag">Обекта MessageBag:</h5>
<pre><code class="language-php">&lt;?php
$errorsMessageBag = Validator::messageBag();</code></pre>
<p>Всички методи на обекта:  </p>
<ul>
<li>set()</li>
<li>get()</li>
<li>all()</li>
<li>first(name)</li>
<li>count()</li>
<li>isEmpty()</li>
<li>isNotEmpty()</li>
<li>any()</li>
<li>has()</li>
<li>toJson()</li>
</ul>
<h5 id="пример-за-html-форма">пример за html форма:</h5>
<pre><code class="language-php">
&lt;form method=&quot;post&quot; action=&quot;&lt;?php echo site_url(&#39;store&#39;) ?&gt;&quot;&gt;
    &lt;div class=&quot;form-group&quot;&gt;
        &lt;label for=&quot;email&quot;&gt;Email address&lt;/label&gt;
        &lt;input type=&quot;text&quot; name=&quot;email&quot;
               class=&quot;form-control &lt;?php echo ($errors-&gt;has(&#39;email&#39;)) ? &#39;is-invalid&#39; : $valid ?&gt;&quot;
               id=&quot;email&quot; placeholder=&quot;Enter email&quot; value=&quot;&lt;?php echo old(&#39;email&#39;) ?&gt;&quot;&gt;
        &lt;small id=&quot;emailHelp&quot; class=&quot;invalid-feedback&quot;&gt;
            &lt;?php echo($errors-&gt;first(&#39;email&#39;)) ?&gt;
        &lt;/small&gt;
    &lt;/div&gt;
    &lt;div class=&quot;form-group&quot;&gt;
        &lt;label for=&quot;password&quot;&gt;Password&lt;/label&gt;
        &lt;input name=&quot;password&quot; type=&quot;password&quot;
               class=&quot;form-control &lt;?php echo ($errors-&gt;has(&#39;password&#39;)) ? &#39;is-invalid&#39; : $valid ?&gt;&quot;
               id=&quot;password&quot; placeholder=&quot;Password&quot;&gt;
        &lt;small id=&quot;emailHelp&quot; class=&quot;invalid-feedback&quot;&gt;
            &lt;?php echo($errors-&gt;first(&#39;password&#39;)) ?&gt;
        &lt;/small&gt;
    &lt;/div&gt;
    &lt;div class=&quot;form-group form-check&quot;&gt;
        &lt;input type=&quot;checkbox&quot; name=&quot;agree&quot;
               class=&quot;form-check-input &lt;?php echo ($errors-&gt;has(&#39;agree&#39;)) ? &#39;is-invalid&#39; : $valid ?&gt;&quot;
               id=&quot;exampleCheck1&quot; &lt;?php echo (old(&#39;agree&#39;)) ? &#39;checked&#39; : &#39;&#39; ?&gt;&gt;
        &lt;label class=&quot;form-check-label&quot; for=&quot;exampleCheck1&quot;&gt;Check me out&lt;/label&gt;
        &lt;small class=&quot;invalid-feedback&quot;&gt;
            &lt;?php echo($errors-&gt;first(&#39;agree&#39;)) ?&gt;
        &lt;/small&gt;
    &lt;/div&gt;
    &lt;button type=&quot;submit&quot; class=&quot;btn btn-primary&quot;&gt;Submit&lt;/button&gt;
&lt;/form&gt;
</code></pre>
<h5 id="ii-начин-за-валидация-не-се-пропоръчва-и-ще-излезе-от-употреба">II начин за валидация не се пропоръчва и ще излезе от употреба</h5>
<pre><code class="language-php">&lt;?php

namespace App\Controllers;

use Core\Controller;
use Core\Libs\Validator;
use Core\Libs\Request;

class MYFormValidation extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    /**
    *  показва станицата с формата
    */
    public function DisplayForm()
    {
        return view(&#39;formView&#39;);
    }

    /**
    *  Валидира данните
    */
    public function StoreForm(Request $request, Validator $validator)
    {
        // логика за валидация - създава правила 
        $validator-&gt;make(&#39;product_name&#39;, &#39;продукт&#39;, [&#39;required&#39;, &#39;name&#39;])
                   -&gt;make(&#39;product_size&#39;, &#39;количество&#39;, [&#39;required&#39;, &#39;integer&#39;, &#39;max:10&#39;]);

        // стартира проверката
        if ($validator-&gt;run() === false) {
             // форматира грешките
            $data[&#39;errors&#39;] = $validator-&gt;errors(&#39;&#39;, &#39;&lt;li&gt;&#39;, &#39;&lt;/li&gt;&#39;, 
                                        &#39;&lt;div class=&quot;alert alert-danger&quot; role=&quot;alert&quot;&gt;%s&lt;/div&gt;&#39;);
             //зарежда view с грешките в прменлива {$errors}
             view(&#39;Dashboard/Products/products_menu_new&#39;, $data);

        } else { 
           //your code here - insert in DB 
        }
    }

}</code></pre>
<h3 id="как-да-покажем-грешките-във-view">Как да покажем грешките във View</h3>
<h5 id="показване-на-всички-грешки-в-списък">Показване на всички грешки в списък</h5>
<pre><code class="language-php">&lt;div class=&quot;col-md-6&quot;&gt;
    &lt;?php 
        if (isset($errors)) {
            echo $errors;
        }
    ?&gt;
&lt;/div&gt;</code></pre>
<h6 id="по-подразбиране-грешките-са-форматирани-с-темплейт-пр">По подразбиране грешките са форматирани с темплейт пр.</h6>
<pre><code class="language-php">&lt;div class=&quot;alert alert-danger&quot; role=&quot;alert&quot;&gt;
    &lt;p&gt;Грешка-1&lt;/p&gt;
    &lt;p&gt;Грешка-2&lt;/p&gt;
    &lt;p&gt;Грешка-3&lt;/p&gt;
&lt;/div&gt;</code></pre>
<h6 id="форматиране-от-разработчика">Форматиране от разработчика</h6>
<pre><code class="language-php">$data[&#39;errors&#39;] = $validator-&gt;errors(&#39;&#39;, &#39;&lt;li&gt;&#39;, &#39;&lt;/li&gt;&#39;, &#39;&lt;div class=&quot;ownAlert&quot;&gt;%s&lt;/div&gt;&#39;);</code></pre>
<h5 id="показване-на-грешките-за-всяко-поле-помоща-на-validation-helpers">Показване на грешките за всяко поле помоща на validation helpers:</h5>
<pre><code class="language-php">&lt;div class=&quot;form-group&lt;?php echo has_error(&#39;product_name&#39;) ? &#39; has-error&#39;:&#39;&#39;;?&gt;&quot;&gt;
    &lt;label for=&quot;product_size&quot;&gt;количество&lt;/label&gt;
    &lt;input name=&quot;product_size&quot; type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;product_size&quot;
           value=&quot;&lt;?php echo oldValue(&#39;product_size&#39;) ? oldValue(&#39;product_size&#39;) : $product[&#39;product_size&#39;]; ?&gt;&quot;
           placeholder=&quot;количество&quot;&gt;
    &lt;?php echo validation_error(&#39;product_size&#39;); ?&gt;
&lt;/div&gt;</code></pre>
<h3 id="helpers">Helpers</h3>
<table>
<thead>
<tr>
<th>validation helper</th>
<th>върната стойност</th>
</tr>
</thead>
<tbody><tr>
<td>validation_error(&#39;field-name&#39;);</td>
<td>връща първото съобщение за грешка</td>
</tr>
<tr>
<td>old(&#39;field-name&#39;)</td>
<td>като oldValue с тази разлика че взима грешките от флаш сесия</td>
</tr>
<tr>
<td>oldValue(&#39;field-name&#39;);</td>
<td>връща вече попълнени данни на валидираното поле</td>
</tr>
<tr>
<td>has_error(&#39;field-name&#39;)</td>
<td>връща true ако има грешки при валидацията</td>
</tr>
</tbody></table>
<h2 id="правила-за-валидация">Правила за валидация</h2>
<table>
<thead>
<tr>
<th>Правило</th>
<th>Съобщение за грашка</th>
</tr>
</thead>
<tbody><tr>
<td>after:date</td>
<td>Полето {label} не e дата след {arg}</td>
</tr>
<tr>
<td>alpha</td>
<td>Полето {label} може да съдържа само латински букви.</td>
</tr>
<tr>
<td>alpha_num or alnum</td>
<td>Полето {label} може да съдържа само латински букви и цифри.</td>
</tr>
<tr>
<td>alpha_dash</td>
<td>Полето {label} може да съдържа само латински букви, цифри, долна черта и тире.</td>
</tr>
<tr>
<td>before:date</td>
<td>Полето {label} не e дата преди {arg}</td>
</tr>
<tr>
<td>date:format</td>
<td>Полето {label} не e валидна дата</td>
</tr>
<tr>
<td>date_format</td>
<td>Полето {label} не е валиден формат на дата - {arg}</td>
</tr>
<tr>
<td>different:value</td>
<td>Полето {label} не трябва да съвпада с полето {arg}.</td>
</tr>
<tr>
<td>email</td>
<td>Полето {label} не e валиден e-mail</td>
</tr>
<tr>
<td>exact:value</td>
<td>Полето {label} трябва да бъде дълго точно {arg} символа.</td>
</tr>
<tr>
<td>exists:table.col</td>
<td>Полето {label} липсва в базата данни. (database)</td>
</tr>
<tr>
<td>greater:value</td>
<td>Полето {label} трябва да съдържа число, по-голямо от {arg}</td>
</tr>
<tr>
<td>gt:field</td>
<td>Полето {label} трябва да съдържа число, по-голямо на това в полето {arg}</td>
</tr>
<tr>
<td>greater_equal:value</td>
<td>Полето {label} трябва да съдържа число, по-голямо или равно на {arg}</td>
</tr>
<tr>
<td>gte:field</td>
<td>Полето {label} трябва да съдържа число, по-голямо или равно на това в полето{arg}</td>
</tr>
<tr>
<td>file</td>
<td>&quot;Полето {label} трябва да е файл&quot;;</td>
</tr>
<tr>
<td>filesize:2</td>
<td>&quot;Файлът {label} трябва да е по-малък от {arg}MB&quot;;</td>
</tr>
<tr>
<td>integer</td>
<td>Полето {label} може да съдържа само цели числа.</td>
</tr>
<tr>
<td>is_numeric</td>
<td>Полето {label} трябва да е число.</td>
</tr>
<tr>
<td>in:val1, val2, val3</td>
<td>Полето {label} трябва да е измежду стойностите {arg}.</td>
</tr>
<tr>
<td>less:value</td>
<td>Полето {label} трябва да съдържа число, по-малко от {arg}</td>
</tr>
<tr>
<td>lt:field</td>
<td>Полето {label} трябва да съдържа число, по-малко от това в полето {arg}</td>
</tr>
<tr>
<td>less_equal</td>
<td>Полето {label} трябва да съдържа число, по-малко или равно от {arg}</td>
</tr>
<tr>
<td>lte:field</td>
<td>&quot;Полето {label} трябва да съдържа число, по-малко или равно от това в полето {arg}&quot;;</td>
</tr>
<tr>
<td>max:value</td>
<td>Полето {label} e по-голямо от {arg} символа</td>
</tr>
<tr>
<td>match:field</td>
<td>Полето {label} не съвпада с полето {arg}</td>
</tr>
<tr>
<td>min:value</td>
<td>Полето {label} e по-малко от {arg} символа</td>
</tr>
<tr>
<td>mimes:jpg,gif</td>
<td>&quot;{label}&quot; трябва да е файл от типа: {arg}</td>
</tr>
<tr>
<td>name</td>
<td>Полето {label} може да съдържа само букви и интервал, включително на кирилица.</td>
</tr>
<tr>
<td>password</td>
<td>Паролата трябва да съдържа число, главна буква, малка буква, символ</td>
</tr>
<tr>
<td>regex:(regex)</td>
<td>Полето {label} не е в правилен формат.</td>
</tr>
<tr>
<td>regex_not:(regex)</td>
<td>Полето {label} не е в правилен формат.</td>
</tr>
<tr>
<td>required</td>
<td>Полето {label} e задължително</td>
</tr>
<tr>
<td>unique:table.col</td>
<td>Полето {label} трябва да съдържа уникална стойност. (database)</td>
</tr>
<tr>
<td>unique_except:table.col.exc-col.exc-col-id</td>
<td>Полето {label} трябва да съдържа уникална стойност. (database)</td>
</tr>
<tr>
<td>url</td>
<td>Полето {label} не e валиден URL</td>
</tr>
</tbody></table>
<h5 id="unique_except">unique_except</h5>
<p>Понякога може да искате да пренебрегнете даден идентификационен номер по
време на уникалната проверка. Ако имаме форма за актуализация на профил примерно
и използваме валидационното правило unique за email , то ще бъде хвърлена грешка, тъй като
email съществува  в базата, а ние искаме да проверим дали нововъведеният<br>email съществува за друг потребител.Правилото unique_except проверява в базата за уникален email , 
който не е на потребител с id = 666 unique_except:users.email.id.666</p>
<pre><code class="language-php">
unique_except:users.email.id.666
</code></pre>

    </div>
</div>
@endsection
