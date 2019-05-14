<?php

/**
 * Class Builder - manipulate Database
 */
class Builder
{
    protected $pdo;
    private $results;

    /**
     * Builder constructor.
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    /**
     * Query action
     *
     * @param $action
     * @param $table
     * @param $where
     */
    public function action($action, $table, $where)
    {

        $query = $this->pdo->prepare("{$action} FROM {$table} WHERE {$where}");
        $query->execute();
        $this->results = $query->fetchAll(PDO::FETCH_CLASS);
    }


    /**
     * Select All
     *
     * @param $table
     * @param $where
     *
     * return array
     */
    public function get($table, $where)
    {

        return $this->action('SELECT *', $table, $where);
    }

    public function getResults(){

        return $this->results;
    }

    public function first(){

        return $this->getResults()[0];
    }
}