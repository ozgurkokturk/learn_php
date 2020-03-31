<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>İç İçe Kategori</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/costum.css">
</head>
<body>

<?php

$starttime = explode(' ', microtime());
$starttime = $starttime[1] + $starttime[0];

//******** SQL İşlemleri **********
require_once "lib/db.php";
$category_list = $db->query("SELECT * FROM category", PDO::FETCH_ASSOC)->fetchAll();
//*********************************

//******** Fonksiyonlar **********
require_once "lib/functions.php";
//*********************************

?>




<div class="container">
    <h4 class="text-center">Kategori / Alt Kategori İşlemleri</h4>
    <div class="row">

        <div class="col-md-6 p-3 bg-light ">
            <h5 class="text-center">Kategori Ekleme</h5>
            <hr>
            <form action="lib/category_db.php" method="post">
                <div class="form-group">
                    <label>Kategori Adı</label>
                    <input name="title" type="text" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Varsa İse Üst Kategori</label>
                    <select name="parent_id" class="form-control">
                        <option selected value="0">Yok</option>
                        <?php foreach ($category_list as $category){ ?>
                            <option value="<?php echo $category["id"]; ?>"> <?php echo $category["title"] ?> </option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Kaydet</button>
                <button type="reset" class="btn btn-danger">İptal</button>

            </form>
        </div>

        <div class="col-md-6">
            <div class="col-md-11 p-3 bg-light">
                <h5>Kategori Hiyararşisi</h5>
                <hr>
                <pre style="font-size: 12px;">
                <?php print_r(buildTree($category_list)); ?>
                </pre>
            </div>
        </div>

    </div>
</div>
<?php

$mtime = explode(' ', microtime());
$totaltime = $mtime[0] + $mtime[1] - $starttime;
printf('(found in %.3f seconds.)', $totaltime);
?>
</body>
</html>

