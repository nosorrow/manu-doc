@extends('blade.layout.head')
@section('content')
<div class="row">
    <div class="col">
        <h2 id="logging">Logging</h2>
<p>Използва Monolog чрез Core\Libs\Logger adapter</p>
<p>Настройките са в App\Config\log.php</p>
<pre><code>[
    &#39;system&#39;=&gt;[
        &#39;handler&#39; =&gt; Monolog\Handler\StreamHandler::class,
        &#39;formatter&#39; =&gt; Monolog\Formatter\HtmlFormatter::class,
        &#39;path&#39; =&gt; LOG_DIR . &#39;system.html&#39;,
    ]
]    </code></pre><h3 id="използване-с-класът-logger">Използване с класът Logger</h3>
<pre><code class="language-php">&lt;?php
class PostController extends Controller
{
    public $logger;

    public function __construct()
    {
        parent::__construct();

        $logger = new Logger(&#39;system&#39;);
        $this-&gt;logger = $logger-&gt;getLogger();

    }

    public function store()
    {
        // do .......
        // if Ok
        $this-&gt;logger-&gt;info(&#39;The post is stored in database&#39;);
        // else 
        $this-&gt;logger-&gt;error(&#39;Data base error ...!&#39;);
    }

}
</code></pre>
<h3 id="използване-с-fasade-log">Използване с Fasade Log</h3>
<p>Дефинирани са следните нива на лога : emergency, alert, critical, error, warning, notice, info and debug </p>
<pre><code class="language-php">Log::emergency($message);
Log::alert($message);
Log::critical($message);
Log::error($message);
Log::warning($message);
Log::notice($message);
Log::info($message);
Log::debug($message);</code></pre>
<p>$message ще бъде записан по подразбиране в app/Logs/manufacture.log</p>
<pre><code>Log::channel(&#39;logMessage&#39;, $file)-&gt;alert($message);</code></pre><p>ще запише $message с cannel = logMessage във файл app/Logs/$file</p>
<h5 id="пример">пример:</h5>
<pre><code class="language-php">&lt;?php
namespace App\Controllers;

use Core\Controller;
use Core\Libs\Support\Facades\Log;

class TestController extends Controller
{
    public $logger;

    public function __construct()
    {
        parent::__construct();

        Log::info(&#39;The Facade logging chanel&#39;);

        // Log wth specific channel
        // the logging file is default -app/Logs/log.log
        Log::channel(&#39;infos&#39;)-&gt;info(&#39;The Facade logging&#39;);
    }
}</code></pre>
<pre><code class="language-php">/**
 @verbatim
  @method static void emergency(string $message, array $context = [])
  @method static void alert(string $message, array $context = [])
  @method static void critical(string $message, array $context = [])
  @method static void error(string $message, array $context = [])
  @method static void warning(string $message, array $context = [])
  @method static void notice(string $message, array $context = [])
  @method static void info(string $message, array $context = [])
  @method static void debug(string $message, array $context = [])
  @method static void log($level, string $message, array $context = [])
  @package Core\Libs\Support\Facades
 @endverbatim
*/</code></pre>
<h2 id="log-levels">Log Levels</h2>
<p><a href="https://github.com/Seldaek/monolog/blob/master/doc/01-usage.md">Monolog in Github</a>.</p>
<p>Monolog supports the logging levels described by <a href="http://tools.ietf.org/html/rfc5424">RFC 5424</a>.</p>
<ul>
<li><p><strong>DEBUG</strong> (100): Detailed debug information.</p>
</li>
<li><p><strong>INFO</strong> (200): Interesting events. Examples: User logs in, SQL logs.</p>
</li>
<li><p><strong>NOTICE</strong> (250): Normal but significant events.</p>
</li>
<li><p><strong>WARNING</strong> (300): Exceptional occurrences that are not errors. Examples:
Use of deprecated APIs, poor use of an API, undesirable things that are not
necessarily wrong.</p>
</li>
<li><p><strong>ERROR</strong> (400): Runtime errors that do not require immediate action but
should typically be logged and monitored.</p>
</li>
<li><p><strong>CRITICAL</strong> (500): Critical conditions. Example: Application component
unavailable, unexpected exception.</p>
</li>
<li><p><strong>ALERT</strong> (550): Action must be taken immediately. Example: Entire website
down, database unavailable, etc. This should trigger the SMS alerts and wake
you up.</p>
</li>
<li><p><strong>EMERGENCY</strong> (600): Emergency: system is unusable.</p>
</li>
</ul>

    </div>
</div>
@endsection
