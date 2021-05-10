@extends('blade.layout.head')
@section('content')
<div class="row">
    <div class="col">
        <h2 id="image-manipulation">Image Manipulation</h2>
<p>Оразмеряване на изображения</p>
<pre><code class="language-php">&lt;?php

    $file = &#39;uploads/pizza.jpg&#39;;
    $newpath = &#39;images/thumbs&#39;;
    $image = new \Core\Libs\Images\Image();

    // Файлът който ще манипулираме
    $img = $image-&gt;get($file);

    // Оразмерява и презаписва изображението с resize(int width, int $height)
    $img-&gt;resize(450,450)-&gt;save();

    // Оразмерява пропорционално
    $img-&gt;resize(null,450)-&gt;save();
    $img-&gt;resize(450, null)-&gt;save();

    // Записва с ново име
    $img-&gt;resize(450,450)-&gt;save(&#39;new/image.jpg&#39;);

    // Записва манипулирания файл с префикс в името
    $img-&gt;resize(450,450)-&gt;withPreffix(&#39;new_&#39;)-&gt;save();

    /* 
     * Създава оразмерено изображение в нова директория
     * със същото име 
     */
    $img-&gt;resize(350,350)-&gt;move($newpath);
    $img-&gt;resize(450,450)-&gt;withPreffix(&#39;thumd_&#39;)-&gt;move($newpath);

    // Качество (quality) на изобр. quality(int percent) !!! САМО image/jpg
    $img-&gt;quality(50)-&gt;withPreffix(&#39;quality_&#39;)-&gt;save();

    // Pixel ефект
    $img-&gt;pixelate(10)-&gt;save();

    // Chain
    $image-&gt;get($file)-&gt;resize(300,300)
          -&gt;pixelate(10)
          -&gt;withPreffix(&#39;pixelate_&#39;)
          -&gt;save();</code></pre>
<p>Как да го направим с контролера на мaнифактурата:</p>
<pre><code class="language-php">&lt;?php

namespace App\Controllers;

defined(&#39;APPLICATION_DIR&#39;) OR exit(&#39;No direct Accesss here !&#39;);

use Core\Controller;
use Core\Libs\Images\Image;

class ImageManipulation extends Controller
{
    public function __construct()
    {
        parent::__construct();        
    }

    public function Resize(Image $image)
    {
        $file = PUBLIC_DIR . &#39;uploads/pizza.png&#39;;
        $image-&gt;get($file)-&gt;resize(300,300)
                  -&gt;pixelate(10)
                  -&gt;withPreffix(&#39;pix_&#39;)
                  -&gt;save();
        dump($image-&gt;imageinfo());        
    }
}</code></pre>

    </div>
</div>
@endsection
