<?php


namespace App\View;

use Exception;


class Make
{

    /**
     * Default value of file name.
     *
     * @var null
     */
    private $file = null;

    /**
     * Locked direction to view folder.
     *
     * @var string|null
     */
    protected $pathTo = null;

    /**
     * Parameters to view.
     *
     * @var array
     */
    protected $parameters = [];

    /**
     * Content of file.
     *
     * @var mixed
     */
    private $context;

    /**
     * Create Operator for Class View.
     *
     * @param $file string
     * @param array $array
     * @throws Exception
     */
    function __construct($file, $array = [])
    {
        $this->file = $file;
        $this->pathTo = filePath("views/{$file}.view");
        $this->parameters = $array;
        $this->context = $this->getFile();
    }

    /**
     * Same as getExtra just shorter.
     *
     * @param $getValue string
     * @return mixed
     * @throws Exception
     */
    protected function getPartials($getValue)
    {

        if( !array_key_exists($getValue, $this->parameters) ){

            throw new Exception("Partial with name '{$getValue}'' do not exist on array.");
        }

        return file_get_contents($this->parameters[$getValue]);
    }

    /**
     * Setter for extra items.
     *
     * @param $value
     */
    public function setPartials($value)
    {

        $this->parameters[$value] = filePath("views/partials/{$value}");
    }

    /**
     * Get the file if exist.
     *
     * @return mixed
     * @throws Exception
     */
    protected function getFile()
    {

        if( !file_exists($this->pathTo) ) {

            throw new Exception('Can\'t find a template file!');
        }

        return file_get_contents($this->pathTo);
    }

    protected function replace()
    {

        foreach ($this->parameters as $a => $b) {

            $this->context = str_replace(
                "[@".$a."]", $this->getPartials($a), $this->context
            );
        }

        foreach ($this->parameters as $a => $b) {

            $this->context = str_replace(
                "{".$a."}", $b, $this->context
            );
        }
    }

    public function render()
    {

        $this->replace();

        echo $this->context;
    }

}