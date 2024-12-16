<?php 


    
    $actionParDefaut="displayBooks";
   


    require_once(__DIR__."/config/connection.php");
    Connection::connect();
    $controller="bookController";
    $action="displayBooks";
    if(isset($_GET["controller"])&&$_GET["controller"]==$controller){
        $controller=$_GET["controller"];
    }
    require_once(__DIR__."/controller/$controleur.php");
    if(isset($_GET["action"])&&in_array($_GET["action"],get_class_methods($controller))){
        $action=$_GET["action"];
    }
    if(!(isset($_GET["action"])&&in_array($_GET["action"],get_class_methods($controller)))){
        $action=$actionParDefaut[$controller];
    }
    
    $controller::$action();
    
