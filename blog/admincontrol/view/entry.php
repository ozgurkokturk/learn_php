<?php

if (isset($_POST["hidden"])){
    if (isset($_POST["kadi"]) && isset($_POST["sfr"]) && isset($_POST["control"])){
        $kadi = trim(htmlspecialchars($_POST["kadi"]));
        $sfr = trim(htmlspecialchars($_POST["sfr"]));
        $ctrl = trim(htmlspecialchars($_POST["control"]));

        $info = loginControl($db, $kadi, $sfr);
        if($info == false){
            echo "Giriş bilgileri hatalı";
            header("Refresh: 2; url=index.php");
        }else{
            if ($info->email == $kadi && $info->password == $sfr && $ctrl == 5){
                $_SESSION["id"] = $info->id;
                $_SESSION["kadi"] = $info->user_name;
                echo "Giriş Başarılı <br> Yönlendiriliyorsun...";
                header("refresh:2;url=index.php");
            }
            else{
                echo "Giriş bilgilerinde bir sorun var.";
                header("refresh:2;url=index.php");
                session_destroy();
            }
        }

    }
}
else{ ?>

<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/bootstrap.css">
    <link rel="stylesheet" href="admin_assets/admin_entry.css">
    <script src="https://kit.fontawesome.com/19bd3d963f.js" crossorigin="anonymous"></script>
    <title>Shhhh</title>
</head>
<body>

<div class="mother">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">K Adi: </label>
                        <input class="form-control" id="exampleInputEmail1" type="email" name="kadi" placeholder="Ad" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Şfr: </label>
                        <input class="form-control" id="exampleInputPassword1" type="password" name="sfr" placeholder="Şfr..." required>
                    </div>
                    <div class="form-group">
                        <label> 2 + 2 bazen kaç yapar </label> <input type="number" name="control" required style="width: 40px;">
                    </div>
                    <hr>
                    <div class="buton">
                        <input type="hidden" name="hidden">
                        <button class="btn btn-secondary" type="submit">Push</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>



</body>
</html>

<?php } ?>

