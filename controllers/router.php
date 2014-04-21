<?php
/**
 * This controller routes all incoming requests to the appropriate controller
 */


//Automatically includes files containing classes that are called
function __autoload($className)
{
    //parse out filename where class should be located
    list($filename , $suffix) = preg_split('/_/' , $className);

    //compose file name
    $file = SERVER_ROOT . '/models/' . strtolower($filename) . '.php';

    //fetch file
    if (file_exists($file))
    {
        //get file
        include_once($file);        
    }
    else
    {
        //file does not exist!
        die("File '$filename' containing class '$className' not found.");    
    }
}



//fetch the passed request
$request = $_SERVER['QUERY_STRING'];
if(!$request){
//let's go back to the home page, that's probably what you're after
$page = "home";
$getVars = array();
}else{


//parse the page request and other GET variables
$parsed = explode('&' , $request);

//the page is the first element
$page = array_shift($parsed);
//echo "P: " .$page;
//the rest of the array are get statements, parse them out.
$getVars = array();
foreach ($parsed as $argument)
{
    //split GET vars along '=' symbol to separate variable, values
    list($variable , $value) = preg_split('/=/' , $argument);
    $getVars[$variable] = $value;
    }   
}


//compute the path to the file
$target = SERVER_ROOT . '/controllers/' . $page . '.php';


//get target
if (file_exists($target))
{
    include_once($target);

    //modify page to fit naming convention -: CAPITALISE FIRST LETTER OF NAME
    $class = ucfirst($page) . '_Controller';

    //instantiate the appropriate class
    if (class_exists($class))
    {
        $controller = new $class;
    }
    else
    {
        //did we name our class correctly?
        die('class does not exist!');
    }
}
else
{
    //can't find the file in 'controllers'! 
    die('page does not exist!');
}

//once we have the controller instantiated, execute the default function
//pass any GET varaibles to the main method
$controller->main($getVars);

?>