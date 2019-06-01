<?php

namespace App;

use App\Routes\BaseRouter;

class Router
{

    /**
     * Array list for URL with Request method type.
     *
     * @var array
     */
    public $routes = [];

    /**
     * The instance of Router.

     * @param BaseRouter $routes
     */
    public function __construct(BaseRouter $routes)
    {

        $this->routes = $routes::returnRoutes();
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

        return call_user_func_array([$obj, $action], [ $parameters = [] ] );
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