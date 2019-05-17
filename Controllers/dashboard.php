<?php

$user = new User($app['config']['database']);

$data = $user->findUser('admin@example.com');

require 'views/dashboard.view.php';