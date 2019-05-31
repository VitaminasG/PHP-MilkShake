<?php

namespace App\View;

use Exception;

class View
{

    /**
     * Self instantiation.
     *
     * @var $instance null
     */
    private static $instance = null;


    /**
     * Get the instance of itself if not null.
     *
     * @return static self
     */
    public static function singleton()
    {
        if( is_null(static::$instance) ) {

            static::$instance = static::factory();
        }

        return static::$instance;
    }


    /**
     * Create and return static self.
     *
     * @return View
     */
    protected static function factory()
    {

        return new static;
    }

    /**
     * Pass to non-static Class Make
     *
     * @param $file string File want to render.
     * @param array $array Pass array to the Operator.
     *
     * @return Make($file) Pass to fresh instance.
     * @throws Exception
     */
    public function init($file, $array = [])
    {

        return new Make($file, $array);
    }

}