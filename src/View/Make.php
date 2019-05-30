<?php


namespace App\View;

use Exception;


class Make
{

    private $file = null;

    private $extra = [];

    protected $pathTo = null;

    function __construct($file)
    {
        $this->file = $file;
        $this->pathTo = filePath("views/{$file}");
    }

    protected function __($getValue)
    {
       return $this->getExtra($getValue);
    }

    private function getExtra($getValue)
    {
        if( !array_key_exists($getValue, $this->extra) ){

            throw new Exception('Before retrieving an item, you need to add first.');
        }

        return $this->extra[$getValue];
    }

    protected function setExtra($value)
    {

        $this->extra[$value] = $value;
    }

    protected function getFile()
    {

        if( !file_exists($this->pathTo) ) {

            throw new Exception('Can not find config file!');
        }

        return requirePath($this->pathTo);
    }

    public function render($param = [])
    {


    }

}