<?php

session_start();

function loadClasses($className){
    echo $className;
}
spl_autoload_register("loadClasses");