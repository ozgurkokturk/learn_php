<?php

include_once __DIR__ . "/app/controller/video.php";
include_once __DIR__ . "/app/helper/video.php";

/* USE İLE KULLANDIĞIMIZDA İKİ SINIFI AYNI ANDA ÇAĞIRAMIYORUZ */
//use App\Controller\Video;
////$video = new Video();
////
//////use App\Helper\Video;
//////$video = new Video();

/* BU KULLANIMLA İKİ SINIFIDA KULLANABİLDİK */
$controllerVideo = new App\Controller\Video();
echo "<br>";
$helperVideo = new App\Helper\Video();