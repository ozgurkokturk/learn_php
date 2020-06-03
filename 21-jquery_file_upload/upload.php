<?php


if (isset($_FILES["dosya"])){

    if (!file_exists("dosyalar")){
        mkdir("dosyalar");
    }

    echo "<pre>";
    print_r($_POST);
    print_r($_FILES["dosya"]);
    echo "</pre>";


    // Dosyanın tipi: image/jpeg
    $type = $_FILES["dosya"]["type"];

    // Doysayın tam adı: asddsaasd.jpg
    $fullName = $_FILES["dosya"]["name"];


    $explodedName = explode(".", $fullName);
    $extension = end($explodedName);

    // Dosyanın local'de aktarıldığı yer: C:\wamp64\tmp\php329F.tmp
    $getFile = $_FILES["dosya"]["tmp_name"];

    // Dosyanın taşınacağı yer
    if (move_uploaded_file($getFile, strtolower('dosyalar/'. $fullName))){
        echo "<img src='dosyalar/".$fullName."'>";
    }
    else{
        echo "hata!";
    }



}