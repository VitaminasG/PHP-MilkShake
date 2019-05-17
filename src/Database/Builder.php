<?php

/**
 * Builder - manipulate Database.
 */
class Builder
{

    /**
     * The instance of Database Connection.
     *
     * @var stdClass
     */
    protected $pdo;

    /**
     * Fetched data for extraction.
     *
     * @var stdClass Object
     */
    protected $_results;


    /**
     * Default Query selector - select all.
     *
     * @var string
     */
    protected $selector = "*";

    /**
     * Create new Builder instance.
     *
     * @param $pdo
     * @param array $options
     */
    public function __construct($pdo, array $options = [])
    {

        $this->pdo = $pdo;
        $this->selector = $options['selector'] ?? $this->selector;
    }

    /**
     * Set the default selector.
     *
     * @param  int  $selector
     * @return $this
     */
    public function setSelector($selector)
    {
        $this->selector = (string) $selector;

        return $this;
    }

    /**
     * Custom Selector instead of default value.
     *
     * @param  array  $options
     * @return int
     */
    protected function selector(array $options = [])
    {
        return $options['selector'] ?? $this->selector;
    }


    /**
     * Setter for fetch results.
     *
     * @param $results
     */
    public function setResults($results)
    {

        $this->_results = $results;
    }


    /**
     * Getter for fetch results.
     *
     * @return mixed
     */
    public function getResults()
    {

        return $this->_results;
    }


    /**
     * Getter first fetch array.
     *
     * @return mixed
     */
    public function first(){

        return $this->_results[0];
    }

    /**
     * Database Query action frame.
     *
     * @param $action
     * @param array $values
     * @param array $PDO_fetch_style
     */
    public function action($action, $values = [], $PDO_fetch_style = [])
    {

        $query = $this->pdo->prepare($action);
        $query->execute($values);

        if(!$PDO_fetch_style['fetch_style']){

            $this->setResults($query->fetchAll($PDO_fetch_style['fetch_style'] = PDO::FETCH_CLASS));
        }

    }


    /**
     * Action Type - Select.
     *
     * @param $table - Database Table.
     * @param $where - Matching condition.
     * @param array $options - Optional selector.
     */
    public function get($table, $where, array $options = [])
    {
        // TODO: After refactor gives stack error. Need to investigate action string or action() default array values.

        $action = ['action' => "SELECT {$this->selector($options)} FROM {$table} WHERE {$where}"];

        $this->action($action['action']);
    }


    /**
     * Action Type - Insert.
     *
     * @param $table
     * @param array $fields
     */
    public function insert($table, $fields = array())
    {

        // TODO: Unfinished Insert query.
        $keys = array_keys($fields);
        $values = '';
        $i = count($fields);

        foreach ($fields as $field){

            $values .= '?';

            if($i > 1){

                $values .= ', ';
            }
        }

        $action = ['action' => "INSERT INTO {$table} (field, field_2, ...field_3) VALUES (?,?,?)"];
        $this->action($action['action']);
    }
}