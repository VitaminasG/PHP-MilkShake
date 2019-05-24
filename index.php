<?php

require 'src/helpers/errorHandling.php';

require 'src/bootstrap.php';

$router = new Router();

require Router::load('routes.php')->direct(Request::uri(), Request::method());
