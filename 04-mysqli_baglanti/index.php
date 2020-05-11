<?php require_once("baglanti_yeri.php");  ?>
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
    if(!$_POST["girisYap"]){
        echo "post kısmında sorun var !!!!";
    }
    else{
        $kulad = $_POST["kulad"];
        $sifre = $_POST["sifre"];

        $sorgu = $db->query("select * from kullanicilar where ad_soyad='".$kulad."' and sifre='".$sifre."'");

        if(mysqli_num_rows($sorgu) == 1){
            $dizi = mysqli_fetch_array($sorgu);
            echo $dizi[1] . "<br />";
            echo "rows count: ".mysqli_num_rows($sorgu);
        }
        else{
            if($kulad == "" || $sifre=""){
                echo "boş bırakma";
            }else{
                echo "şifre yanlış";
            }
        }
    }

}
?>

<form action="index.php" method="post">
Ad: <input type="text" name="kulad" /> <br><br>
sifre <input type="password" name="sifre" /> <br><br>
<input type="submit" name="girisYap" value="Giriş" />
</form>
    
</body>
</html>