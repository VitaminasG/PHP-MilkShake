<?php

use App\Container as App;
use App\Request;
use App\Router;

$app = new App();
$router = new Router();

// Import web route.
require_once 'routes/web.php';

// Catch Request.
$router->direct(Request::uri(), Request::method());