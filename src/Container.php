<?php

namespace App;

use Exception;

class Container
{

    /**
     * Main config file.
     *
     * @var array
     */
    protected $config;


    /**
     * The instance of Dependency Injection.
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        $this->config = $config;
    }


    /**
     * Add new item to Container.
     *
     * @param $key
     * @param $value
     */
    public function add($key, $value)
    {

        $this->config[$key] = $value;
    }


    /**
     * Get the item from the Container.
     *
     * @param $key
     * @return mixed
     * @throws Exception
     */
    public function get($key)
    {
        if(!array_key_exists($key, $this->config)){
            throw new Exception("The {$key} do not exist in the config file.");
        }

        return $this->config[$key];
    }


    /**
     * Get App name.
     *
     * @return string
     */
    public function name()
    {

        $result = findElement($this->config, 'appName');

        return first($result) ?? 'Default name';
    }
}