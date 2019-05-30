<?php

/**
 * Display and Die.
 *
 * @param $var mixed
 */
function dd( ...$var ) {

    var_dump($var);

    die();
}

/**
 * Get file directory.
 *
 * @param string $file
 *
 * @return mixed
 */
function basePath( string $file ) {

    return require $_SERVER["DOCUMENT_ROOT"] . "../{$file}.php";
}

/**
 * Search for element in array.
 *
 * @param $array
 * @param $key
 *
 * @return array|mixed|string
 */
function findElement( $array, $key ) {

    if( !is_array($array) ){

        return null;
    }

    return array_column($array, $key);
}

/**
 * Get first item from array.
 *
 * @param $array
 *
 * @return mixed|null
 */
function first( $array ) {

    if( !is_array($array) ){
        return null;
    }

    return $array[0];
}

/**
 * Pass a template with value from string location.
 *
 * @param $view string
 * @param $array array
 *
 * @return mixed
 */
function view( string $view, array $array ) {

    $data = collectObj($array);

    return require $_SERVER["DOCUMENT_ROOT"] . "../views/{$view}.view.php";
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