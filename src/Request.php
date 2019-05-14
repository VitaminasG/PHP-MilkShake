<?php


/**
 * Class Request - Handle URL
 */
class Request
{

    /**
     * Get URL trimmed string
     *
     * @return string
     */
    public static function uri()
    {

        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        );
    }


    /**
     * Get Request type
     *
     * @return mixed
     */
    public static function method()
    {

        return $_SERVER['REQUEST_METHOD'];
    }

}