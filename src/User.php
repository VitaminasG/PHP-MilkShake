<?php


/**
 * Class User - Manipulate Users data from DB
 */
class User
{

    protected $query;
    protected $data, $authenticated;

    public function __construct($config){

        $this->query = new Builder(Connection::make($config));
    }


    /**
     * Sanitize value
     *
     * @param $string
     * @return string
     */
    public function esc($string){
        return htmlentities($string, ENT_QUOTES, 'UTF-8');
    }


    /**
     * @param null $email
     * @return bool|mixed
     */
    public function find($email = null){

        if($email){

            $param = ['email' => $this->esc($email), 'table' => 'Users'];

            $this->query->get($param['table'], "email ='{$param['email']}' LIMIT 1");

            return $this->query->getResults();

        }

        return false;
    }
}