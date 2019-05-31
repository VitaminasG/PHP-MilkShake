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
    private $config;


    /**
     * The instance of Dependency Injection.
     *
     * @throws Exception
     */
    public function __construct()
    {

        $this->config = $this->defaultConf();
    }


    /**
     *Get default configuration file.
     *
     * @return array
     *
     * @throws Exception
     */
    private function defaultConf()
    {

        if( !file_exists(filePath('config')) ) {

            throw new Exception('Can not find config file!');
        }

        return requirePath('config');
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
    public function appName()
    {

        $result = findElement($this->config, 'appName');

        return first($result) ?? 'Default name';
    }
}