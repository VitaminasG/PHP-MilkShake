<?php

use App\User;

$user = new User($app->get('database'));

// TODO: Testing with Fake Log in Query. After Builder refactor. Php stack error.

$data = $user->findUser('admin@example.com');

require 'views/dashboard.view.php';