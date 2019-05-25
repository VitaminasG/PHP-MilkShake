<?php

namespace App;

use App\Database\Builder;
use App\Database\Connection;

class User
{

    protected $query;
    protected $data, $authenticated;

    public function __construct($config)
    {

        $this->query = new Builder(Connection::make($config));
    }

    /**
     * Sanitize value.
     *
     * @param $string
     * @return string
     */
    public function esc($string)
    {

        return htmlentities($string, ENT_QUOTES, 'UTF-8');
    }


    /**
     * Find a User with email address.
     *
     * @param null $email
     * @return bool|mixed
     */
    public function findUser($email = null)
    {
        if(!$email){

            return false;
        }

        $param = ['email' => $this->esc($email), 'table' => 'Users'];
        $this->query->get($param['table'], "email ='{$param['email']}'");

        return $this->query->first();
    }


    /**
     * Add User to the Database.
     * @param $name
     * @param $email
     * @param $password
     */
    public function addUser($name, $email, $password)
    {

        //
    }
}