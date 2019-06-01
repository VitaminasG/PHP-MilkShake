<?php

use App\Request;
use App\Router;

$router = new Router();

//TODO: Improve route import.

// Import web route.
require_once 'routes/web.php';

// Catch Request.
$router->direct(Request::uri(), Request::method());