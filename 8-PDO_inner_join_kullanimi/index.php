<?php
try{
    $db = new PDO ("mysql:host=localhost;dbname=inner_join_kullanimi;charset=utf8", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}   
catch (PDOException $e){
    die($e->getMessage());
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

/* Birden Fazla Tablodan Veri Çekme - KLASİK YÖNTEM */
$query = $db->prepare("SELECT * FROM tur");
$query->execute();

    while($satir = $query->fetch(PDO::FETCH_ASSOC)){

        $query2 = $db->prepare('SELECT * FROM kitaplar where tur_id ='.$satir["id"].'');
        $query2->execute();
        while($satir2 = $query2->fetch(PDO::FETCH_ASSOC)){
            echo $satir["tur_adi"] . " ---- " . $satir2["kitap_adi"] . "<br>";
        }

    }

?>
</body>
</html>