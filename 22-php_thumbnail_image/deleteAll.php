<?php

echo "geldi";

if(isset($_GET["islem"]) && $_GET["islem"] == sil){
    array_map('unlink', glob("dosyalar/*.*"));
    rmdir("dosyalar");
}
