<?php

spl_autoload_register(function($class_name){

    $filename= "Class".DIRECTORY_SEPARATOR .$class_name.".php";
    $filename2= "Class".DIRECTORY_SEPARATOR. "Pessoa". DIRECTORY_SEPARATOR .$class_name.".php";

    if(file_exists(($filename))) {
        require_once($filename);
    }
    if(file_exists($filename2)){
        require_once($filename2);
    }
})





?>