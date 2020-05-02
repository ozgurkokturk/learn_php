<?php

require "database.php";
include "functions.php";
global $db;

//index.php?url=sayfa&id=

if(isset($_GET["url"])){
    $url = $_GET["url"];
    switch ($url){
        case "hakkimda":
            $about = aboutMe($db);
            include "view/hakkimda.php";
            break;

        case "sayfa":
                if(isset($_GET["id"])){
                    $id = $_GET["id"];
                    $contents = showPage($db, $id);
                    include "view/sayfalar.php";
                }
            break;

            default : echo "404";

    }
}
else{
    $titles = showTitles($db);
    $counts = showCategoryCount($db);
    include "view/anasayfa.php";
}