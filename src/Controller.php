<?php

namespace App;

use App\Container as App;
use App\View\View;


class Controller
{

    protected $appName;

    public function __construct(App $app)
    {

        $this->appName = $app->appName();
    }


    /**
     * Get the main Page.
     *
     * @return mixed
     */
    public function index()
    {

        $title = "Home";

        return view('index', compact('title'));
    }


    /**
     * Get Dashboard Page.
     *
     * @return mixed
     */
    public function dashboard()
    {

        $title = "Dashboard";

//        $user = new User($app->get('database'));
//
//        $data = $user->findUser('admin@example.com');

        return view('dashboard', compact('title'));
    }

    public function demo()
    {
        $something = 'something';

        return view('demo', compact('something'));
    }

    /**
     * Get 404 - Not Found Page.
     *
     * @return mixed
     */
    public function notFound()
    {

        $title = "404 - Not Found";

        return view('404', compact('title'));
    }

}