<?php

require_once "db.php";
if (isset($_POST["title"])){

        $query = $db->prepare("INSERT INTO category SET title = :title, parent_id = :parent_id");

        $insert = $query->execute(
            array(
                "title" => htmlspecialchars($_POST["title"]),
                "parent_id" => htmlspecialchars($_POST["parent_id"])
            )
        );



    if ($insert == 1){
        header("location:../index.php");
    }else{
        echo "Ekleme bölümünde problem oluştu";
    }

}else{
    echo "Sayfa yok";
}
