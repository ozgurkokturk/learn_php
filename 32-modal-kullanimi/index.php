<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


    <style>
        html{
            height: 100%;
        }
        body{
            background: url("bg.png");
            color: whitesmoke;
            margin: 0;
            padding: 0;
            height: 100%;
        }
        .main{
            display: flex;
            flex-direction: column;
            height: 100%;
            color: lightgray;
            justify-content: center;
            align-items: center;
        }
    </style>

</head>
<body>

<div class="main">

    <div class="top">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary p-3" data-toggle="modal" data-target="#exampleModal">
            Üye Girişi
        </button>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger p-3" data-toggle="modal" data-target="#staticBackdrop">
            Çıkış
        </button>
</div>


<div style="position: absolute; top: 0; left: 0; font-size: 25px;">
    <?php
        if(isset($_POST)){
            var_dump($_POST);
        }
    ?>

</div>

<div class="modal fade text-dark" tabindex="-1" id="exampleModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Üye Giriş Sayfası</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="index.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kullancı Adı</label>
                        <input type="text" id="ad" name="ad" class="form-control mb-3" id="exampleInputEmail1">
                        <label for="exampleInputEmail2">Şifre</label>
                        <input type="text" name="sifre" class="form-control mb-3" id="exampleInputEmail2">
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                    <input type="submit" value="Gönder" class="btn btn-primary">
                </div>

            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>



<script>

    $('#exampleModal').on('shown.bs.modal', function () {
        $('#ad').trigger('focus')
    })

</script>

</body>
</html>