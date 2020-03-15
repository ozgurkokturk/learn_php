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
</style>
<body>

<div class="container-fluid">
    <div class="row">


        <div class="col-md-8 mx-auto mt-2" id="ek">
            <form action="index.php?islem=ekle" method="POST">  
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input class="form-control" type="text" name="ad" placeholder="Ad" />
                    </div>
                    <div class="form-group col-md-6">
                        <input class="form-control" type="text" name="soyad" placeholder="Soyad" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input class="form-control" type="text" name="yas" placeholder="Yaş" />
                    </div>
                    <div class="form-group col-md-6">
                        <input class="form-control" type="text" name="aidat" placeholder="Aidat" />
                    </div>
                </div>
                <div class="form-group">
                    <input class="btn btn-warning col-md-12" type="submit" name="buton" value="Ekle" />
                </div>
            </form>
        </div>


        <div class="col-md-8 mx-auto mt-2" id="tablo">
            <table class="table table-border table-dark table-bordered text-center table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ad</th>
                        <th>Soyad</th>
                        <th>Yaş</th>
                        <th>Aidat</th>
                        <th>Güncelle</th>
                        <th>Sil</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                        $uye->listele($db);
                        ?>
                </tbody>
            </table>
        </div>


    </div>
</div>
    
</body>
</html>