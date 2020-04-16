<?php

function controllerYolu($controllerName){
    $controllerName = strtolower($controllerName);
    return PATH . "/app/controller/" . $controllerName . ".php";
}

function viewYolu($viewName){
    return PATH . "/app/view/" . $viewName . ".php";
}

function route($index){
    global $route;
    return isset($route[$index]) ? $route[$index] : false;
}