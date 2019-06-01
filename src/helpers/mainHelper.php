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
 * Get Root folder.
 *
 * @return string
 */
function basePath() {

    return $_SERVER["DOCUMENT_ROOT"] . "../";
}

/**
 * Get file destination.
 *
 * @param string $fileFromBasePath
 * @return string
 */
function filePath( string $fileFromBasePath ) {

    return basePath()."{$fileFromBasePath }.php";
}

/**
 * Require file destination.
 *
 * @param string $file
 * @return mixed
 */
function requirePath( string $file ) {

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
function findElement( array $array, $key ) {

    return array_column($array, $key);
}

/**
 * Get first item from array.
 *
 * @param $array
 *
 * @return mixed|null
 */
function first( array $array ) {

    return $array[0];
}

/**
 * Sanitize value.
 *
 * @param $string
 * @return string
 */
function esc(string $string) {

    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}