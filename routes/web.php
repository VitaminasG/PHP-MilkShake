<?php

use App\Routes\BaseRouter as Router;

/**
 * ================
 * Web Router File.
 * ================
 */

Router::get('', 'App\Controller@index');

Router::get('demo', 'App\Controller@demo');