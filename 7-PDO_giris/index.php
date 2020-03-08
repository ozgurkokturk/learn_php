<?php
try{
    $db = new PDO ("mysql:host=localhost;dbname=pdo_dersler;charset=utf8","root","");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e){
    echo die($e->getMessage());
}
?>


<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["ekle"])){
        $ad_soyad = htmlspecialchars($_POST["ad_soyad"]);
        $bolumu = htmlspecialchars($_POST["bolumu"]);
        if($ad_soyad != "" || $bolumu != ""){
    
            $ad_soyad = $db->quote($ad_soyad);
            $bolumu = $db->quote($bolumu);
    
            $db->query("INSERT INTO students (ad_soyad, bolumu) VALUES ($ad_soyad, $bolumu)");
            header("refresh:0;url=index.php");
        }   
    }
    else if(isset($_POST["sil"])){
        $id = $_GET["id"];
        $db->query("DELETE FROM students WHERE id=$id");
        echo "KAYIT SİLİNDİ";
        header("refresh:1;url=index.php");
    }
    
else{
    echo "boş geçilemez";
}

}
?>


<form action="index.php" method="POST">
    <table border="1">
        <tbody>
        <tr>
            <th>Adı-Soyadı</th>
            <th><input type="text" name="ad_soyad" maxlength="25"></th>
        </tr>
        <tr>
            <th>Bölümü</th>
            <th><input type="text" name="bolumu" maxlength="25"></th>
        </tr>
        <tr>
            <th colspan="2"><input type="submit" name="ekle" value="Gönder"></th>
        </tr>
        </tbody>
    </table>
</form>

<br><br>

<table border="1">
    <tbody>
    <tr>
        <th>id</th>
        <th>Adı-Soyadı</th>
        <th>Bölümü</th>
        <th>İşlem</th>
    </tr>
  
    <?php
        
            $sorgu = $db->query("SELECT * FROM students ORDER BY id DESC");
            while($satir = $sorgu->fetch(PDO::FETCH_ASSOC)){
                echo '
                <tr>
                <td>'.$satir["id"].'</td>
                <td>'.$satir["ad_soyad"].'</td>
                <td>'.$satir["bolumu"].'</td>
                <td>
                    <form action="index.php?id='.$satir["id"].'" method="POST">
                    <input type="submit" name="sil" value="Sil">
                    </form>
                </td>    
                </tr>            
            ';
            
        }
    ?>

    </tbody>
</table>





</body>
</html>