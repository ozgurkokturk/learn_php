<?php

function admin_controllerYolu($controllerName){
    $controllerName = strtolower($controllerName);
    return PATH . "/admin/controller/" . $controllerName . ".php";
}

function admin_viewYolu($viewName){
    return PATH . "/admin/view/" . $viewName . ".php";
}

