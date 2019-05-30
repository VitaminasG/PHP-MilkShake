<?php


namespace App\View;


class View
{

    private static $instance = null;

    public static function singleton()
    {
        if(is_null(static::$instance)){

            static::$instance = static::factory();
        }
    }

    public static function factory()
    {

        return new static;
    }

    public function initialize($file)
    {

        return new Make($file);
    }

}