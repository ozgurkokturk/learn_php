<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

if(isset($_FILES["dosya"])){

    // durum tespiti için
    print "isset = true <br />";
    print $_FILES["dosya"]["name"];
    echo "<br> <br>";

    //Devam...
    $hata = $_FILES["dosya"]["error"];
    if($hata != 0){
        echo "something is Worng!!! <br/>";
        echo $hata;
    }
    else{
        $boyut = $_FILES["dosya"]["size"];
        if($boyut > 1024*1024*1){
            echo "Warning: dosya is bigger than 1mb";
        }
        else{
            $tipi = $_FILES["dosya"]["type"];
            $isim = $_FILES["dosya"]["name"];

            $uzanti = explode(".",$isim);
            $uzanti = $uzanti[count($uzanti)-1];
            echo "Dosya Uzatısı: " . $uzanti."<br>";
            echo "Dosya Tipi: " . $tipi;
            
            $dosyaFormati = array("image/jpeg");

            if(!in_array($tipi,$dosyaFormati)){
                echo "<br> dosya type is not jpeg";
            }
            else{
                $dosya = $_FILES["dosya"]["tmp_name"];
                move_uploaded_file($dosya,'resimler/'.$isim);
                echo "<br/> <br/> BAŞARILI !";
            }
            
        }
    }
}


?>

    
</body>
</html>