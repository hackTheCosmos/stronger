<?php

define ("LOCAL_URI" , "/stronger/");

// Async Autoloader
spl_autoload_register(function ($className) {

    // core
    $fileName = "../Core/".$className.".php";
    
    if (file_exists($fileName)) {
        require_once $fileName;
    }

    // classes
    $fileName = "../Classes/".$className.".php";
    
    if (file_exists($fileName)) {
        require_once $fileName;
    }

    // models
    $fileName = "../Models/".$className.".php";
    
    if (file_exists($fileName)) {
        require_once $fileName;
    }
    
    // controllers
    $fileName = "../Controllers/".$className.".php";
    if (file_exists($fileName)) {
        require_once $fileName;
    }
});