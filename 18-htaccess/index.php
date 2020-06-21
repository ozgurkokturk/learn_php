<?php

require "database.php";
require "fonksiyonlar.php";
global $db;

if (isset($_GET["url"])){
    $url = $_GET["url"];
    switch ($url){
        case "hakkimda":
            include "other-page/hakkimda.php";
            break;

        case "iletisim":
            include "other-page/iletisim.php";
            break;

        case "sayfa":
                if(isset($_GET["id"])){
                    $id = $_GET["id"];

                    $veriler = showContent($db, $id);

                    include "view/sayfalar.php";
                }
            break;

        default: echo "404 default";
    }

}
else{
    $veriler = showAllTitle($db);

    include "view/anasayfa.php";
}

