<?php

namespace App;

use Exception;

class User
{

    /**
     * Instance of Query Builder.
     *
     * @var Database\Builder
     */
    protected $query;

    /**
     * User data.
     *
     * @var mixed
     */
    protected $data;

    /**
     * Create a new User instance.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {

        $this->query = $container->query();
    }

    /**
     * Find a User with email address.
     *
     * @param null $email
     * @return bool|mixed
     *
     * @throws Exception
     */
    public function findUser($email = null)
    {
        if(!$email){

            throw new Exception(__METHOD__ .": Parameter {$email} should have email address.");
        }

        $param = ['email' => esc($email), 'table' => 'Users'];

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