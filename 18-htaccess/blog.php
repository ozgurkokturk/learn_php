<?php

$db = array(
    "1" => "Merhaba Blog Dünyası.. <br> Bu benim ilk tuş vuruşlarım dostum !",
    "2" => "Arduino ile maceralarda bu gün... <br> Arduino, evde güzel bir hobi için olabilecek en iyi adaydır",
    "3" => "Evde linux sunucu kurulumu macelarım devam ediyor... <br> İşte bu mesele önemli! Raspberry Pi bu iş için güzel olabilir tabi fayatı makulsa."
);

if (isset($_GET["id"])){
    echo "<br> id=" . $_GET["id"];
    echo "<br> baslik=" . $_GET["baslik"];

    echo "<br><br>" . $db[$_GET["id"]];
}
else{
    echo "<br><br><span style='color:darkred;font-size: 24px'> Listelenen Bloglar Ana Sayfada! <br> Geri dönmek için Yönlendiriliyorsun... </span> ";
    header("refresh:3;url=./");
}