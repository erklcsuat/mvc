<?php

require_once "helpers.php";

$uri = urldecode(
    parse_url(
        $_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

require_once "app/public/index.php";


//
//require_once 'Routes.php';
//
//function __autoload($className)
//{
//    if(file_exists('./Classes/'.$className.'.php'))
//    {
//        require_once './Classes/'.$className.'.php';
//    }
//    else if(file_exists('./Controllers/'.$className.'.php'))
//    {
//        require_once './Controllers/'.$className.'.php';
//    }
//    else if(file_exists('./Database/'. $className. '.php'))
//    {
//        require_once './Database/'.$className.'.php';
//    }
//    else if(file_exists('./Model/'.$className. '.php'))
//    {
//        require_once './Model/'.$className.'.php';
//    }
//}
