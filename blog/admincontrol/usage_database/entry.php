<?php

if (!isset($_SESSION)){
    session_start();

}

require "../model/database.php";
global $db;


if (isset($_POST["kadi"]) && isset($_POST["sfr"]) && isset($_POST["control"])){

//json'a çevirip en son bu değişkeni göndericez
    $response = array(
        "state" => "",
        "message" => "",
        "newUrl" => ""
    );

        $kadi = trim(htmlspecialchars($_POST["kadi"]));
        $sfr = trim(htmlspecialchars($_POST["sfr"]));
        $ctrl = trim(htmlspecialchars($_POST["control"]));

        $query = $db->prepare("SELECT * FROM blog_user where email=? and password=?");
        $query->bindParam(1,$kadi,PDO::PARAM_STR);
        $query->bindParam(2,$sfr,PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() <= 0){
            $db = null;
            $response = array(
                "state" => "false",
                "message" => "Giriş bilgileri hatalı",
            );
        }
        else{
            $info = $query->fetch(PDO::FETCH_OBJ);

                if ($info->email == $kadi && $info->password == $sfr && $ctrl == 5){

                    $_SESSION["id"] = $info->id;
                    $_SESSION["kadi"] = $info->user_name;

                    $response = array(
                        "state" => "true",
                        "message" => "Giriş Başarılı <br> Yönlendiriliyorsun...",
                        "newUrl" => "index.php"
                    );
                }
                else{
                    $response = array(
                        "state" => "false",
                        "message" => "Giriş bilgilerinde bir sorun var.",
                    );
                }
        }

    echo json_encode($response);
}



