<?php

$user = new User($app['config']['database']);

// TODO: Testing with Fake Log in Query. After Builder refactor. Php stack error.

$data = $user->findUser('admin@example.com');

require 'views/dashboard.view.php';