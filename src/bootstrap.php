<?php

// Report running errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

$app = [];

$app['config'] = require 'config.php';

$title = $app['config']['site']['name'];

require 'src/Router.php';
require 'src/Request.php';
require 'src/Database/Connection.php';
require 'src/Database/Builder.php';
require 'src/User.php';

$app['database'] = new Builder(
    Connection::make($app['config']['database'])
);

$user = new User($app['database']);

$user->find('admin', '123456');
