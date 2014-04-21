<?php
/**
 * This file handles the retrieval and serving of news articles
 */
class Footer_Controller
{
    /**
     * This template variable will hold the 'view' portion of our MVC for this 
     * controller
     */
    public $template;
    public $footerModel;
    public $view;

        public function __construct()
    {
            $template = 'footer';
            $footerModel = new Footer_Model;
            //create a new view and pass it our template
            $view = new View_Model($this->template);
    }

    /**
     * This is the default function that will be called by router.php
     * 
     * @param array $getVars the GET variables posted to index.php
     */

   public function main(array $getVars)
{ 
    if(sizeof($getVars)>0){

        $msg = $getVars['message'];

    }else{

        $msg = this->$footerModel->get_message();
            }
    
        //assign article data to view
        $view->assign('message' , $msg);
    }
}