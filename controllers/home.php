<?php
/**
 * This file handles the retrieval and serving of news articles
 */
class Home_Controller
{
    /**
     * This template variable will hold the 'view' portion of our MVC for this 
     * controller
     */
    public $template = 'home';

    /**
     * This is the default function that will be called by router.php
     * 
     * @param array $getVars the GET variables posted to index.php
     */
   public function main(array $getVars)
{

        //create a new view and pass it our template
        $header = new View_Model('header');
        $topper = new View_Model('topper');
        $footer = new View_Model('footer');
        

        //SET UP CONTENT FOR JS-AWARE BROWSERS
        //make all the content box models

        
        
        $topper->assign('title', 'TEST');
        $topper->assign('description', 'TEST FOR GCDH');
        

        


        $footer->assign('message', "Hey, this worked!");


        $master = new View_Model($this->template);
        $master->assign('header', $header->render(FALSE)); //return the value rather than rendering it 
        $master->assign('topper', $topper->render(FALSE));
        $master->assign('footer', $footer->render(FALSE));

        $master->render();

    }
}