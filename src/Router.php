<?php

namespace App;

class Router
{

    /**
     * Array list for URL with Request method type.
     *
     * @var array
     */
    public $routes = [];

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

        return $this->callAction(

            ...explode("@", $this->routes[$methodType][$uri])
        );
    }

    /**
     * Execute an action on the controller.
     *
     * @param $controller
     * @param array $action
     * @return mixed
     */
    public function callAction($controller, $action = [])
    {
        $obj = new $controller;

        return call_user_func_array([$obj, $action],[ $parameters = [] ]);
    }

    /**
     * Serve 404 view.
     *
     * @return mixed
     */
    public function notFound(){

        $controller = new Controller();

        return $this->callAction($controller, 'notFound');
    }
}