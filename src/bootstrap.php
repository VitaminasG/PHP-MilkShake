<?php

use App\Container as DI;
use App\Request;
use App\Router;

$app = new DI(require './config.php');

$router = Router::class;

require Router::load('routes.php')->direct(Request::uri(), Request::method());