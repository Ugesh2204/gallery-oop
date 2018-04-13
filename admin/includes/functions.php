<?php

/*autoload function will scane undeclare object in our application*/

function __autoload($class){

    $class = strtolower($class);
    $the_path = "includes/{$class}.php";
    
    if(file_exists($the_path)) {
        //include ($the_path);
        /*will make sure it require once */
        require_once($the_path);
    } else {

        die("This file name {$class}.php was not found man...");
    }

}

?>