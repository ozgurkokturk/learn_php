<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sepet</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/costum.css">

</head>
<body>

<?php include "lib/navbar.php"; ?>



<div class="container">
    <?php if($total_count > 0) { ?>
        <h2 class="text-center">
            Sepetinizde <span class="text-danger"> <?php    echo $total_count; ?></span> adet ürün bulunmaktadır
        </h2>
        <hr>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Ürün Resmi</th>
                        <th>Ürün Adı</th>
                        <th>Fiyatı</th>
                        <th>Adeti</th>
                        <th>Toplam</th>
                        <th>Sepetten Çıkar</th>
                    </tr>
                    </thead>


                    <tbody>
                    <?php foreach ($shopping_products as $shopping_product) { ?>
                        <tr>
                            <td class="text-center" width="120">
                                <img src="assets/images/<?php echo $shopping_product->img_url; ?>" alt="" width="50">
                            </td>
                            <td class="text-center"> <?php echo $shopping_product->product_name; ?></td>
                            <td class="text-center"><strong> <?php echo $shopping_product->price; ?> TL</strong></td>
                            <td class="text-center">
                                <a href="lib/card_db.php?p=desCount&id=<?php echo $shopping_product->id; ?>" class="btn btn-danger">-</a>
                                <input type="text" class="input-item-count" value="<?php echo $shopping_product->count; ?>" >
                                <a href="lib/card_db.php?p=incCount&id=<?php echo $shopping_product->id; ?>" class="btn btn-success">+</a>
                            </td>
                            <td> <strong> <?php echo $shopping_product->total_price; ?> TL</strong></td>
                            <td class="text-center">
                                <button product-id=" <?php echo $shopping_product->id; ?>" class="btn btn-danger removeFromCartBtn" role="button">Sepetten Çıkar</button>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>

                    <tfood>
                        <tr>
                            <th colspan="2" class="text-right">
                                Toplam Ürün: <span class="text-danger"> <?php echo $total_count; ?> adet</span>
                            </th>
                            <th colspan="4" class="text-right">
                                Toplam Tutar: <span class="text-danger"><strong> <?php echo $total_price; ?> TL</strong></span>
                            </th>
                        </tr>
                    </tfood>
                </table>
            </div>
        </div>

    <?php } else { ?>
        <div class="alert-info">Sepetinizde ürün bulunmamaktadır. Ürünler Menüsüne dönmek için <a class="text-primary"href="index.php">Tıklayınız</a></div>
    <?php } ?>
</div>



<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/costum.js"></script>
</body>
</html>