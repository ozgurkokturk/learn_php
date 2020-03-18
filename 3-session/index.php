<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

$db_kulad = "özgür";
$db_sifre = "123";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $kulad = $_POST["kulad"];
    $sifre = $_POST["sifre"];

    if($kulad == "" || $sifre == ""){
        echo 'değerler boş olamaz';
    }
    else{
        if($db_kulad != $kulad || $db_sifre != $sifre){
            echo "Kullanıcı adi veya sifrede hatalı - GERİ GİT";
        }
        else{
            $_SESSION["kulad"] = $kulad;
            $_SESSION["sifre"] = $sifre;
            
            echo "Giriş Başarılı ! <br />";
            echo "Kullanıcı adı: ". $kulad . "<br />";
            echo "Şifre: ". $sifre;

            ?>
            <form action="giris.php" method="post">
            <input type="submit" name="sonlandir" value="çıkış" />
            </form>
            <?php

        }

    }
}else{
    header("refresh:1;url=giris.php");
    echo "lütfen bekleyiniz...";
}

?>


    
</body>
</html>