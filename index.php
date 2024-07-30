<?php


session_start();

require_once "Core/Autoloader.php";

define ("LOCAL_URI" , '/stronger/');

//autoloader recaptcha
// require_once 'recaptcha//autoload.php';

//Load Composer's autoloader
require 'PHPMailer/PHPMailerAutoload.php';

Router::route();




