<?php

namespace App;


// TODO: Unfinished Controller handling.
class Controller
{

    public function index()
    {

        return require 'views/index.view.php';
    }

    // TODO: Testing with Fake Log in Query. After Builder refactor. Php stack error.
    public function dashboard()
    {

//        $user = new User($app->get('database'));
//
//        $data = $user->findUser('admin@example.com');

        return require 'views/dashboard.view.php';
    }

}