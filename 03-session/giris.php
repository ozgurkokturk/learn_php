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

if(isset($_SESSION["kulad"]) || isset($_SESSION["sifre"])){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["sonlandir"]){
            echo "sonlandir çalıştı !!!!";
            session_destroy();
            ?>
            <a href="giris.php">Ana Sayfaya Dön </a>
            <?php
        }
    }else{
        echo "Oturum hala AÇIK !";
    }
    
}
else{
    ?>
    <form action="index.php" method="post">
    Kullanıcı adı: <input type="text" name="kulad" /> <br /> <br />
    Şifre: <input type="password" name="sifre" /> <br /> <br />
    <input type="submit" name="buton" />

<?php
}
?>



    
</form>

</body>
</html>