<?php

namespace App;


class Controller
{

    public function __construct()
    {
        //
    }


    /**
     * Get the main Page.
     *
     * @return \App\View\
     * @throws \Exception
     */
    public function index()
    {

        return view('index');
    }

    /**
     * Get Demo Page.
     *
     * @return \App\View\
     * @throws \Exception
     */
    public function demo()
    {
        $slogan= 'Cover your Demo Page.';

        return view('demo', compact('slogan'), 'demo');
    }

    /**
     * Get 404 - Not Found Page.
     *
     * @return \App\View\
     * @throws \Exception
     */
    public function notFound()
    {

        return view('404', [], '404');
    }
}