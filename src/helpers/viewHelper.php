<?php

use App\View\View;
use App\Container as App;

/**
 * Render a view for presentation.
 *
 * @param string $name View name.
 * @param array $array View data.
 * @param string $partialsPrefix Prefix partials files.
 *
 * @throws Exception
 */
function view(string $name, $array = [], string $partialsPrefix = '') {

    $data = addItems($name, $array);
    $prefixed = prefix( $partialsPrefix, ['head', 'nav', 'footer'] );

    $view = View::singleton()->init($name, $data );
    $view->setPartials($prefixed);
    $view->render();
}

/**
 * Prepare data for View.
 *
 * @param string $viewName
 * @param array $controllerArray
 * @param array $extraArray
 *
 * @return array
 *
 * @throws Exception
 */
function addItems( string $viewName, array $controllerArray, array $extraArray = [] ) {

    $app = new App();

    $innerArray = [
        'pageTitle' => $viewName,
        'appName' =>  $app->appName()
    ];

    return array_merge( $innerArray, $controllerArray, $extraArray );
}

/**
 * Prefix partials.
 *
 * @param string $prefix
 * @param array $partialName
 *
 * @return array
 */
function prefix( string $prefix, array $partialName ) {

    $joint = [];

    if( strlen($prefix) > 0 ) {

        foreach ( $partialName as $a) {

            $result = "{$prefix}.{$a}";

            array_push($joint, $result);
        }

        return $joint;

    } else {

        return $partialName;
    }
}

/**
 * Build and return a stdClass object.
 *
 * @param mixed $array
 *
 * @return stdClass
 */
function collectObj( $array ) {

    $obj = new stdClass();

    if( !is_array($array) ) {

        return $array;

    } else {

        foreach ( $array as $a => $b) {

            $obj->$a = $b;
        }

        return $obj;
    }
}