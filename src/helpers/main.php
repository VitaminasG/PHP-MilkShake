<?php

/**
 * Display and exit from processing.
 *
 * @param $var mixed
 */
function dd($var){

    var_dump($var);
    die();
}

/**
 * Search for element in array.
 *
 * @param $array
 * @param $key
 * @return array|mixed|string
 */
function findElement($array, $key){

    if(!is_array($array)){

        return null;
    }

    return array_column($array, $key);
}


/**
 * Get first item from array.
 *
 * @param $array
 * @return mixed|null
 */
function first($array){

    if(!is_array($array)){
        return null;
    }

    return $array[0];
}