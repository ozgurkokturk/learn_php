<!--/* session'ı istediğimiz yerden çalıştırabiliyoruz */-->
<?php
session_start();
if (isset($_SESSION["shoppingCart"])){
    $total_count = $_SESSION["shoppingCart"]["summary"]["total_count"];
    $total_price = $_SESSION["shoppingCart"]["summary"]["total_price"];
    $shopping_products = $_SESSION["shoppingCart"]["products"];
}
else{
    $total_count = 0;
    $total_price = 0.0;
}
?>

<!-------------------- HEADER --------------------->
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <a id="marka" class="navbar-brand" href="index.php">Food For Animals</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Ürünler <span class="sr-only">(current)</span></a>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="shopping_card.php">
                    <i id="sepet" class="fa fa-shopping-cart"></i>
                    <!--Ana sayfadaki badge için Jquery ile -->
                    <span class="badge cart-count"> <?php echo $total_count; ?></span>
                </a>
            </li>
        </ul>

    </div>
</nav>
<!--------------------# HEADER -------------------->