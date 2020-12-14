<?php

    require "vendor/autoload.php";

    session_start();

    $class = "Store";

    if(isset($_GET["ctrl"])){
        $uri_class = ucfirst($_GET["ctrl"]);
        if(class_exists("App\Controller\\".$uri_class."Controller")){
            $class = $uri_class;
        }
    }

    $classname = "App\Controller\\".$class."Controller";

    $controller = new $classname();

    $method = "indexAction";

    if(isset($_GET["action"])){
        $uri_method = $_GET["action"]."Action";
        if(method_exists($controller, $uri_method)){
            $method = $uri_method;
        }
    }

    $response = $controller->$method();

    include "template/store/".$response["view"];
