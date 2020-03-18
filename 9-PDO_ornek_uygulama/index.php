<?php
include "fonksiyon.php";
$uye = new Uye();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
    body{
        background-color:#395A7B;
    }
    table thead{
        color:#DD9D14;
    }
    i{
        color:white;
    }
    #sirala{
        color:white;
        font-size:20px;
    }    
</style>
<body>

    <div class="container-fluid">
        <div class="row">

<?php

    @$islem = $_GET["islem"];
    switch($islem){
        case "ekle":
            $uye->ekle($db);
        break;

        case "sil":
            $uye->sil($db);
        break;

        case "guncelleBasla":
            $uye->guncelleBasla($db);
        break;

        case "guncelleBitir":
            $uye->guncelleBitir($db);
        break;

        default:

?>
        <div class="col-md-2 mx-auto  mt-4">
            <a href="index.php?islem=ekle" class="btn btn-success col-md-12 ">Yeni Kayıt Ekle</a>
        </div>
    <!-- / row -->
    </div> 


    <div class="row">
        <div class="col-md-8 mx-auto mt-4" id="tablo">
            <table class="table table-border table-dark table-bordered text-center table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ad</th>
                        <th>Soyad</th>
                        <th> <a href="index.php?sirala=k1" id="sirala">+</a> Yaş <a href="index.php?sirala=k2" id="sirala">-</a> </th>
                        <th><a href="index.php?sirala=k3" id="sirala">+</a> Aidat <a href="index.php?sirala=k4" id="sirala">-</a></th>
                        <th>Güncelle</th>
                        <th>Sil</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                         if(isset($_GET["sirala"])){
                            $sirala = $_GET["sirala"];
                            if($sirala == ""){
                                echo "GET EMPTY";
                            }
                            else{
                                $uye->listele($db,$sirala);
                            }
                         }
                         else{
                             $uye->listele($db,"k0");
                         }
                        ?>
                </tbody>
            </table>
        </div>

<?php
;
 }

?>


    </div>
</div>
    
</body>
</html>