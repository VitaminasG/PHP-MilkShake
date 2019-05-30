<?php

// Report running errors

// Constants
define('ERROR_LOG_FILE', $_SERVER['DOCUMENT_ROOT'].'../logs/error_log.log');

// Settings for display error
error_reporting(E_ALL | E_STRICT );
ini_set('display_errors', 'yes');
set_error_handler('my_error_handler');

//Custom Error Handler
function my_error_handler($number = null, $string = null, $file = null, $line = null, $context = null)
{

    if (!(error_reporting() & $number)) {

        return false;
    }

    $error = "====================\nPHP ERROR\n====================\n";
    $error .= "Level of the error raised: {$number}\n";
    $error .= "Error message: {$string}\n";
    $error .= "File: {$file}\n";
    $error .= "Line: {$line}\n";
    $error .= "Time: ".date('l jS \of F Y h:i:s A')."\n";
    $error .= "Context:\n" . print_r($context, TRUE) . "\n\n";

    error_log($error, 3, ERROR_LOG_FILE);
}
