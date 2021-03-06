<?php
/*
 * View се извикват в контролера:
 * $this->load->setLayout('dashboard')->view('file', data);
 * $this->load->view('result');
 */

namespace Core\Libs;

defined('APPLICATION_DIR') OR exit('No direct Accesss here !');

use Core\Libs\Views\BladeEngine;
use Core\Libs\Views\ManufactureEngine;
use Core\Libs\Interfaces\View as ViewInterface;

class View
{

    private function __construct(){}

    /**
     * @param ViewInterface $viewEngine
     * @return ViewInterface
     */
    protected static function getViewEngine(ViewInterface $viewEngine)
    {
        return $viewEngine;
    }

    /**
     * @return ViewInterface
     * @throws \Exception
     */
    public static function getInstance()
    {
        $template_engine = config('template_engine');

        if ($template_engine == 'blade'){
            return self::getViewEngine(BladeEngine::getInstance());

        }else {
            return self::getViewEngine(ManufactureEngine::getInstance());
        }
    }

    /**
     * View::blade()->directive('datetime', function ($expression) {
     *       return "<?php echo with({$expression})->format('Y-m-D h:i:s'); ?>";
     *   });
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        if (app(View::class) instanceof BladeEngine){
            return app(View::class)::$name($arguments);

        } else {
            throw new \BadMethodCallException('The Class cannot be instantiated statically', 501);
        }
    }
}
