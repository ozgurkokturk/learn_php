
$(document).ready(function () {

    $(".addToCartBtn").click(function () {
        const url = "http://localhost/php/12-alis_veris_sepeti_uyglamasi/lib/card_db.php";
        const data = {
            p : "addToCart",
            product_id : $(this).attr("product-id")
        };

        $.post(url,data, function (response) {
            $(".cart-count").text(response); //Ana sayfadaki badge için...
        });
    });


    $(".removeFromCartBtn").click(function () {
        const url = "http://localhost/php/12-alis_veris_sepeti_uyglamasi/lib/card_db.php";
        const data = {
            p : "removeFromCart",
            product_id : $(this).attr("product-id")
        };

        $.post(url,data, function (response) {
            window.location.reload();
           // document.writeln(response);

        });
    });


});