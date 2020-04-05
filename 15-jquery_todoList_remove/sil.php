<?php

include "db.php";

if(isset($_POST["p"])){
    $islem = $_POST["p"];

    if ($islem == "remove"){
        $id = $_POST["id"];
        // echo dediğimiz durumda fonksiyon içindeki return işlemini jquery'e geri gönderir.
        echo removeFunction($id);
    }
}

function removeFunction($gelen_id){
    global $db; // fonksiyon dışından değişkeni alabilmek için
    $sil = $db->prepare("DELETE FROM products where id = :id");
    $sil->bindValue(":id",$gelen_id,PDO::PARAM_INT);
    $sil->execute();
    return true;
}