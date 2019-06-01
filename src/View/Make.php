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
     * Partials for view.
     *
     * @var array
     */
    protected $partials = [];

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
     * Getter for partials.
     *
     * @param $getValue string
     * @return mixed
     * @throws Exception
     */
    protected function getPartials($getValue)
    {

        if( !array_key_exists($getValue, $this->partials) ) {

            throw new Exception("Partial with name '{$getValue}' do not exist on array.");

        } else {

            if( file_exists($this->partials[$getValue]) ) {

                return file_get_contents($this->partials[$getValue]);
            }
        }
    }

    /**
     * Setter for partials.
     *
     * @param array $values
     */
    public function setPartials( array $values )
    {

        $default = ['head', 'nav', 'footer'];

        if( !empty($values) && empty($this->partials)) {

            foreach ( $values as $a ) {

                $this->partials[$a] = filePath("views/partials/{$a}");
            }

        } else {

            foreach ( $default as $b ) {

                $this->partials[$b] = filePath("views/partials/{$b}");
            }
        }
    }

    /**
     * Get file content if exist.
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

    /**
     * Replace tags with required data.
     *
     * @throws Exception
     */
    protected function replace($context)
    {

        // Change partials [@$var] tags.
        foreach ($this->partials as $a => $b) {

            $context = str_replace(
                "[@".$a."]", $this->getPartials($a), $context
            );
        }

        // Change variables {$var} tags.
        foreach ($this->parameters as $a => $b) {

            $context = str_replace(
                "{".$a."}", $b, $context
            );
        }

        return $context;
    }

    /**
     * Export the complete view template with buffer.
     *
     * @throws Exception
     *
     * @return mixed
     */
    public function render()
    {

        // Check buffer 1/0.
        $level = ob_get_level();

        // Start buffer with Callback.
        ob_start([$this, 'replace']);

        try {

           print $this->context;

        } catch (Exception $e) {

            while (ob_get_level() > $level)
            {
                // Clean buffer catch.
                ob_end_clean();
            }

            // Throw catch Exception.
            throw $e;
        }

        // End and Return buffer with flush.
        return ob_end_flush();
    }
}