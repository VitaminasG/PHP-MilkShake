<?php

use App\Router;

$router = new Router();

$router->get('', 'Controller@index');
$router->get('dashboard', 'Controller@dashboard.php');