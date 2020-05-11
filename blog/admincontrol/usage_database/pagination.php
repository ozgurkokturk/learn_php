<?php

if (isset($_POST["limit"])){
    setcookie("gosterLimit", $_POST["limit"]);
}

if(!isset($_COOKIE["gosterLimit"])){
    $gosterilecekAdet = 5;
}
else{
    $gosterilecekAdet = $_COOKIE["gosterLimit"];
}

$toplamSatir = rowCount($db,$_SESSION["id"]);
$toplamSatirSayisi = $toplamSatir->sayi;
$paginationCount = ceil($toplamSatirSayisi / $gosterilecekAdet);



//başlangıç limitini belirlemek için
if (isset($_GET["sayfa"])){
    $pageNo =  $_GET["sayfa"];
}else{
    $pageNo = 1;
}

if($pageNo < 1) $pageNo = 1;
if($pageNo > $paginationCount) $pageNo = $paginationCount;

$offset = ($pageNo - 1) * $gosterilecekAdet;
$posts = showPosts($db,$_SESSION["id"],$offset,$gosterilecekAdet);
