<?php

spl_autoload_register(function ($className){
    $file = __DIR__. "\\". strtolower($className). ".php";
    $file = str_replace("\\", "/", $file );
    if (file_exists($file)) {
        include_once $file;
    }
    echo $file;
});

$home = new \App\Controller\Home();
echo "<br>";
$home->yaz();
echo "<br>";
echo \App\Controller\konus();


echo "<br>";echo "<br>";

$video = new \App\Helper\Video();
echo "<br>";
$video->yaz();
