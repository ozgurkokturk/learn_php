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

/* Birden Fazla Tablodan Veri Çekme - İç içe döngü ile */
echo "<h3>İç içe döngü ile</h3> <br>";
$query = $db->prepare("SELECT * FROM tur");
$query->execute();

    while($satir1 = $query->fetch(PDO::FETCH_ASSOC)){

        $query2 = $db->prepare('SELECT * FROM kitaplar where tur_id ='.$satir1["id"].'');
        $query2->execute();
        while($satir2 = $query2->fetch(PDO::FETCH_ASSOC)){
            echo $satir1["tur_adi"] . " ---- " . $satir2["kitap_adi"] . "<br>";
        }

    }
echo "<br><br>";    
/* Birden Fazla Tablodan Veri Çekme - INNER JOIN ile*/
echo "<h3>INNER JOIN ile</h3> <br>";
$sorgu = $db->prepare("SELECT * FROM tur INNER JOIN kitaplar ON tur.id=kitaplar.tur_id");
$sorgu->execute();
    while($row = $sorgu->fetch(PDO::FETCH_ASSOC)){
        echo $row["tur_adi"]." --- ". $row["kitap_adi"]. "<br>";
    }

?>
</body>
</html>