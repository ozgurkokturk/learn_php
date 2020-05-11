<?php

if (!route(1)){
    $route[1] = "index";
}
if (!file_exists(admin_controllerYolu(route(1)))){
    $route[1] = "index";
}

require admin_controllerYolu(route(1));

echo "<br><br>";echo "<br><br>";
echo route(0) . "<br>";
echo route(1);