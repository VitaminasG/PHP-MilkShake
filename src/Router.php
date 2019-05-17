<?php


class Router
{


    /**
     * Array list for URL with Request method type.
     *
     * @var array
     */
    protected $routes = [
        'GET' => [],
        'POST' => [],
        'DELETE' => [],
        'PATCH' => [],
    ];


    /**
     * Load Web router list
     *
     * @param $file
     * @return Router
     */
    public static function load($file)
    {

        // TODO: Improvement on the way.
        $router = new static;
        require $file;

        return $router;
    }


    /**
     * Add GET Request type Controller.
     *
     * @param $uri
     * @param $controller
     */
    public function get($uri, $controller)
    {

        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * Add POST Request type Controller.
     *
     * @param $uri
     * @param $controller
     */
    public function post($uri, $controller)
    {

        $this->routes['POST'][$uri] = $controller;
    }


    /**
     * Direct to requested Controller.
     *
     * @param $uri
     * @param $methodType
     * @return mixed
     */
    public function direct($uri, $methodType)
    {

        if ( !array_key_exists($uri, $this->routes[$methodType]) ){

            return $this->notFound();

        }

        return $this->routes[$methodType][$uri];
    }


    /**
     * Serve 404 view.
     *
     * @return mixed
     */
    public function notFound(){

        return 'Controllers/404.php';
    }

}