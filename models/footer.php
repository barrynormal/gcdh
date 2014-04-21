<?php
/**
 * The News Model does the back-end heavy lifting for the News Controller
 */
class Footer_Model
{
    /**
     * Array of articles. Array keys are titles, array values are corresponding
     * articles.
     */
  
    private $myMessage = '';

    public function __construct()
    {
    }

    public function get_message(){

        return this->$myMessage;

    }

    public function set_message($s){

        this->$myMessage = $s;

    }
}