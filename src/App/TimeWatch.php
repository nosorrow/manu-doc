<?php
namespace App;

class TimeWatch
{

    public $start;

    public $end;

    public $elapsed;
    /**
     * TimeDumper constructor.
     */
    public function __construct()
    {
        
    }

    public function start()
    {
        $this->start = microtime(true);
    }

    public function end()
    {
        $this->end = microtime(true);
    }

    /**
     * @return mixed
     */
    public function getElapsed()
    {
        return $this->elapsed = $this->end - $this->start;
    }

}
