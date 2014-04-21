<?php
/**
 * Handles the view functionality of our MVC framework
 */
class View_Model
{
    /**
     * Holds variables assigned to template
     */
    private $data = array();

    /**
     * Holds render status of view.
     */
    private $render = FALSE;
    //Render is basically going to be a file url containing html + php views. 
    //Found and included or returned
    
    /**
     * Accept a template to load
     */
    public function __construct($template)
    {
        //compose file name
        $file = SERVER_ROOT . 'views/' . strtolower($template) . '.php';
        //echo "F: " .$file;
        if (file_exists($file))
        {
            /**
             * trigger render to include file when this model is destroyed
             * if we render it now, we wouldn't be able to assign variables
             * to the view!
             */

            $this->render = $file;
        }        
    }

    /**
     * Receives assignments from controller and stores in local data array
     * 
     * @param $variable
     * @param $value
     */

    public function assign($variable , $value)
    {
        $this->data[$variable] = $value;
    }


    public function render($direct_output = TRUE)
    {
        // Turn output buffering on, capturing all output
        if ($direct_output !== TRUE)
        {
            ob_start();
        }

        // Parse data variables into local variables
        $data = $this->data;
    
        // Get template
        include($this->render);
        
        // Get the contents of the buffer and return it
        if ($direct_output !== TRUE)
        {
            return ob_get_clean();
        }
    }





    public function __destruct()
    {
       
    }
}