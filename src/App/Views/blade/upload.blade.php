@extends('blade.layout.head')
@section('content')
<div class="row">
    <div class="col">
        <h2 id="upload-files">Upload files</h2>
<pre><code class="language-php">&lt;?php
use Core\Libs\Files\Upload;
use Core\Libs\Files\ResponseFactory;

$uploader = app(Upload::class);

$uploader-&gt;max_size = 2;
$uploader-&gt;max_files = 2;
$uploader-&gt;preffix = date(&#39;d_M_Y_&#39;, time());
$uploader-&gt;filename_length = 6;
$uploader-&gt;file_name = &#39;random&#39;;
$uploader-&gt;overwrite = false;

$init = [
    &#39;max_files&#39;=&gt;1, 
    &#39;directory&#39;=&gt;&#39;uploads/&#39;,
    &#39;max_size&#39;=&gt;2, // in MB
    &#39;file_name&#39;=&gt;&#39;random&#39;, // or string
    &#39;filename_length&#39;=&gt;8,  // random name is 8 symbols
    &#39;overwrite&#39;=&gt;false,
    &#39;allowed_types&#39; =&gt;[] // All mime types is allowed

];

$uploader-&gt;init($init);

$upload = $uploader-&gt;upload(&#39;img&#39;);
$response = ResponseFactory::makeResponse($upload, &#39;html&#39;);

dump($response);

if ($response-&gt;countErrors() &gt; 0) {
  //  ... do some error msg
    dump($upload-&gt;hasError());
    dump($response-&gt;errors());

} else {
   // ... do some
    dump($upload-&gt;response);
    echo ($upload-&gt;getResponse());
}
</code></pre>
<p>Пример:</p>
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

    public function upoad(Request $request)
    {
        $opt = [
                &#39;file_name&#39;=&gt;md5(time()),
                &#39;preffix&#39;=&gt;&#39;plamen_&#39;,
                &#39;overwrite&#39;=&gt;false,
                &#39;allowed_types&#39; =&gt;[&#39;gif&#39;, &#39;jpg&#39;, &#39;png&#39;]
            ];

        $upload = $request-&gt;file()-&gt;upload(&#39;file&#39;, $opt);

        if ($upload-&gt;failed()) {
            $request-&gt;validation()-&gt;errors-&gt;file = $upload-&gt;getError(true);
        }

        if ($request-&gt;validation()-&gt;run() == false) {

            redirect()-&gt;back();

        }
    }

}</code></pre>

    </div>
</div>
@endsection
