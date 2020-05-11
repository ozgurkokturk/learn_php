<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alış-Veriş</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/costum.css">

</head>
<body>

<?php require_once "lib/db.php"; ?>

<?php
/* Verileri Çekme Bölümü */
$products = $db->query("SELECT * FROM products", PDO::FETCH_OBJ)->fetchAll();
?>

<?php include "lib/navbar.php"; ?>



<!-------------------- Main Content --------------------->
<div class="container">
    <h2 class="text-center mt-3">Ürün Listesi</h2>
    <hr>
    <div class="row">

        <?php foreach ($products as $product) { ?>
            <div class="col-sm-4 col-md-3 mt-2">
                <div class="card mx-auto">
                    <img class="card-img-top w-50 mx-auto mt-2" id="cardImg" src="assets/images/<?php echo $product->img_url; ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $product->product_name; ?> </h5>
                        <p class="card-text" id="productsDetail"> <?php echo $product->detail; ?> </p>
                        <p class="card-text text-right"> <strong> <?php echo $product->price; ?> ₺ </strong></p>
                        <button product-id="<?php echo $product->id; ?>" class="btn btn-primary btn-block addToCartBtn" role="button">
                            <i class="fa fa-shopping-cart"></i>
                            Sepete Ekle
                        </button>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>
<!--------------------# Main Content --------------------->






<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/costum.js"></script>
</body>
</html>