<?php
//<base href="http://localhost/php/blog/admincontrol/index.php">
if (!isset($_SESSION)){
    session_start();

}

include "../functions.php";
require "model/database.php";
global $db;

if (isset($_SESSION["kadi"])) {
    if (isset($_GET["url"])){
        $url = $_GET["url"];

        switch ($url){
            case "cikis":
                include "model/cikis.php";
                break;

            case "duzenle":
                if(isset($_GET["id"])){
                    $categories = showCategories($db);
                    $content = showContentFromId($db,$_GET["id"]);
                    include "view/updateContent.php";
                }
                break;

            case "sil":
                    if(isset($_GET["id"])){
                        include "usage_database/deleteContent.php";
                    }
                break;

            case "ekle":
                $categories = showCategories($db);
                include "view/add_new_content.php";
                break;

            case "kategori":
                $categories = showCategories($db);
                $notCategories = notInCategories($db);
                $counts = showCategoryCount($db);
                include "view/category.php";
                break;

            default: echo "404 admin";
        }

    }else{
        $infos = showInfos($db,$_SESSION["id"]);
        include "view/admin_page.php";
    }
}
else{
    include "model/entry.php";
    include "view/entry.php";
}

