<?php

namespace App;

use Exception;


class Router
{

    /**
     * Array list for URL with Request method type.
     *
     * @var array
     */
    public $routes = [];

    public function start()
    {

        return require './web.php';
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
     * @throws Exception
     */
    public function direct($uri, $methodType)
    {

        if ( !array_key_exists($uri, $this->routes[$methodType]) ){

            return $this->notFound();
        }

        return $this->callAction(

        $action = explode("@", $this->routes[$methodType][$uri])
        );
    }

    /**
     * Execute an action on the controller.
     *
     * @param $action
     * @return mixed
     * @throws Exception
     */
    // TODO: Unfinished Controller handling.
    public function callAction($action = [])
    {

        $controller = new Controller();

        return call_user_func_array(array($controller, $action[1]), array($parameters = null));
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