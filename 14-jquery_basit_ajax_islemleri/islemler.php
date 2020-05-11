<?php

if (!isset($_GET["islem"])){

    echo "GET veya POST çalışmadı";

}
else {

    if ($_GET["islem"] == "form") {

        if ($_POST["val1"] != "" && $_POST["val2"] != "") {
            echo "Gelen veri 1 = " . $_POST["val1"];
            echo "<br> Gelen veri 2 = " . $_POST["val2"];
        }
    }


    elseif ($_GET["islem"] == "link"){
        echo "Ürün adı = ". $_POST["urunAdi"];
    }

}

