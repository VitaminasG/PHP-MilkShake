<?php

$user = new User($app['config']['database']);

$data = $user->find('admin@example.com');

require 'views/dashboard.view.php';