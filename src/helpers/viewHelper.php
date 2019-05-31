<?php

use App\View\View;
use App\Container as App;

function view($name, $array = [] ) {

    $app = new App();

    $appName = $app->appName();

    $tempArray = [
      'title' => $name,
      'Name' =>  $appName
    ];

    $mergeArray = array_merge($array, $tempArray);

    $view = View::singleton()->init($name, $mergeArray);

    $view->setPartials('head');
    $view->setPartials('footer');
    $view->setPartials('nav');

    $view->render();
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