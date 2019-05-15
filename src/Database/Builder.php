<?php

/**
 * Class Builder - manipulate Database
 */
class Builder
{
    protected $pdo;
    protected $_results;

    /**
     * Builder constructor.
     * @param $pdo
     */
    public function __construct($pdo)
    {

        $this->pdo = $pdo;
    }

    /**
     * Set results
     * @param results
     */
    public function setResults($results)
    {

        $this->_results = $results[0];
    }


    /**
     * Get results
     * @return mixed
     */
    public function getResults()
    {

        return $this->_results;
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

        $query = $this->pdo->prepare("{$action} from {$table} where {$where}");
        $query->execute();
        $this->setResults($query->fetchAll());
    }


    /**
     * Select All
     *
     * @param $table
     * @param $where
     *
     * return mixed
     *
     */
    public function get($table, $where)
    {
        $action = "select *";

        $this->action($action, $table, $where);
    }
}