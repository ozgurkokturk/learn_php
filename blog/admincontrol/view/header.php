<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../assets/bootstrap.css">
    <link rel="stylesheet" href="admin_assets/admin.css">
<!--    <script src="https://kit.fontawesome.com/19bd3d963f.js" crossorigin="anonymous"></script>-->
    <script src="admin_assets/fontawesome/js/all.js"></script>
    <script src="https://cdnjs.com/libraries/bodymovin" type="text/javascript"></script>

    <script src="admin_assets/js/jquery-3.4.1.min.js"></script>
    <script src="admin_assets/js/jquery.growl.js"></script>
    <link rel="stylesheet" href="admin_assets/jquery.growl.css">



    <!--ckeditor-->
    <script src="../ckeditor/ckeditor.js"></script>
    <link href="ckeditor/plugins/codesnippet/lib/highlight/styles/tomorrow-night.css" rel="stylesheet">
    <script src="ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>





    <title>Control-Panel</title>
</head>
<body>

<nav class="nav" id="nav-top">
    <a href="">
        <i id="header-icon" class="fas fa-users-cog"></i>
    </a>
    <span id="header-text">Admin Panel</span>
    <span id="header-user"><?php echo $_SESSION["kadi"]; ?></span>
    <a href="index.php?url=cikis">
        <i id="header-exit-icon" class="fas fa-power-off"></i>
        <span id="header-exit">Çıkış Yap</span>
    </a>
</nav>

<nav class="nav" id="nav-left">
<ul class="nav-ul">
    <li>
        <a href="index.php">
            <i id="nav-left-icon" class="fas fa-home"></i>
            Ana Sayfa
        </a>
    </li>
    <li>
        <a href="index.php?url=ekle">
            <i id="nav-left-icon" class="fas fa-plus-square"></i>
            Yeni Yazı Ekle
        </a
    </li>
    <li>
        <a href="index.php?url=kategori">
            <i id="nav-left-icon" class="fas fa-book-open"></i>
            Kategoriler
        </a>
    </li>
    <li>
        <a href="">
            <i id="nav-left-icon" class="fas fa-folder-open"></i>
            Dosyalar
        </a>
    </li>
    <li>
        <a href="">
            <i id="nav-left-icon" class="fas fa-users-cog"></i>
            Ayarlar
        </a>
    </li>
</ul>
</nav>


