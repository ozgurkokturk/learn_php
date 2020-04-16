<?php

//****** SESSION BAŞLAR ******
session_start();
// ******************

//****** ÇIKTI TAMPONLAMA******
ob_start();
// ******************

// ****** classes DİZİNİ ALTINDAKİ SINIFLARI YÜKLE ******
function loadClasses($className){
    $file =  __DIR__ . "\\classes\\" . strtolower($className) . ".php";
    if (file_exists($file)){
        echo " Dahil Edilen Class'lar = " . $file . "<br>";
        require $file;
    }
    else{
        echo "class bulunamadı";
    }
}
spl_autoload_register("loadClasses");
// *******************************************************

// ****** config.php DOSYASINI ÇAĞIR ******
$config = require __DIR__ . "\\config.php";
try {
    $db = new PDO("mysql:host=". $config["db"]["host"]. ";dbname=". $config["db"]["name"]. ";charset=utf8", $config["db"]["user"], $config["db"]["pass"] );
}catch (PDOException $e){
    die($e->getMessage());
}
// *******************************************************

// ******  helper DİZİNİ ALTINDAKİ DOSYALRI YÜKLE ******
foreach (glob( __DIR__ . "\\helper\\*.php") as $helperFile){
    echo "Dahil edilen helper dosyaları = " . $helperFile . "<br>";
    require $helperFile;
}
// *******************************************************