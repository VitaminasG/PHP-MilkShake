<?php

use App\Container as DI;
use App\Request;

$app = new DI(require './config.php');

require './web.php';

$router->direct(Request::uri(), Request::method());