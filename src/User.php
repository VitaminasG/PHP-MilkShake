<?php


class User
{

    protected $query;
    private $data, $authenticated;

    public function __construct($query){

        $this->query = new Builder($query);
    }


    public function find($user = null, $password = null){

        if($user && $password){

            return $this->query->get("Users", " name = $user AND password = {$password}" );
        }

        return false;
    }
}