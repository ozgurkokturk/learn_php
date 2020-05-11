<?php

include "db.php";
session_start();


function addToCart($product_item){
 //SESSION
    /*shoppingCart
      *products
            [1] => stdClass Object
                    [id] => 1
                    [product_name] => X kedi maması
                    [detail] => Kedilerinizin en sevdiği mama X kedi maması.
                    [price] => 100
                    [img_url] => cat.jpg
                    [count] => 3

            [3] => stdClass Object
                    [id] => 3
                    [product_name] => J tavşan maması
                    [detail] => Havuç ve marulun organik karışımı olan J mamasına bütün tavşanlar bayılır
                    [price] => 60
                    [img_url] => rabbit.jpg
                    [count] => 1


        *summary
    */

    if (isset($_SESSION["shoppingCart"])){
        $products = $_SESSION["shoppingCart"]["products"];
    }
    else{
        $products = array();
    }

    // Adet Kontrolü...
    if(array_key_exists($product_item->id,$products)){
        $products[$product_item->id]->count++;
    }
    else{
        $products[$product_item->id] = $product_item;
    }

    // Sepetin hesaplanması...
    $total_price = 0.0;
    $total_count = 0;

    foreach ($products as $product){
        $product->total_price = $product->count * $product->price; // adet * fiyat

        $total_price += $product->total_price; // price'ları toplayıyoruz...
        $total_count += $product->count; // count'ları toplatıyoruz...
    }

    $summary["total_price"] = $total_price;
    $summary["total_count"] = $total_count;

    /* Ürünleri array'e atıyoruz */
    $_SESSION["shoppingCart"]["products"] = $products;

    /* Toplam count ve price'ı arrey'e atıyoruz */
    $_SESSION["shoppingCart"]["summary"] = $summary;

    /* Ana sayfadaki sepet simgesinin yanındaki badge için toplam count'u geri gönderiyoruz */
    return $total_count;
}


function removeFromCart($product_id){
    if (isset($_SESSION["shoppingCart"])){
        $products = $_SESSION["shoppingCart"]["products"];
        settype($product_id,"integer"); // Eğer bu kod olmaz ise SESSION verilerine ulaşmada hata veriyor !!!!

        // Ürünü listeden çıkar...
        /* SESSION'da bize taa Jquery ile gelen product_id var mı ?*/
        if (array_key_exists($product_id, $products)){
            unset($products[$product_id]);
        }



        // Sepeti tekrardan hesapla...
        $total_price = 0.0;
        $total_count = 0;

        foreach ($products as $product){
            $product->total_price = $product->count * $product->price; // adet * fiyat

            $total_price += $product->total_price; // price'ları toplayıyoruz...
            $total_count += $product->count; // count'ları toplatıyoruz...
        }

        $summary["total_price"] = $total_price;
        $summary["total_count"] = $total_count;

        /* Ürünleri array'e atıyoruz */
        $_SESSION["shoppingCart"]["products"] = $products;

        /* Toplam count ve price'ı arrey'e atıyoruz */
        $_SESSION["shoppingCart"]["summary"] = $summary;

        return true; // bir değer döndürmemiz lazım ki jquery'nin response methodu çalışsın ve sayfa reload olsun
    }
}


function incCount($product_id){
    if (isset($_SESSION["shoppingCart"])){
        $products = $_SESSION["shoppingCart"]["products"];

        // Adet Kontrolü...
        if(array_key_exists($product_id,$products)){
            $products[$product_id]->count++;
        }

        // Sepetin hesaplanması...
        $total_price = 0.0;
        $total_count = 0;

        foreach ($products as $product){
            $product->total_price = $product->count * $product->price; // adet * fiyat

            $total_price += $product->total_price; // price'ları toplayıyoruz...
            $total_count += $product->count; // count'ları toplatıyoruz...
        }

        $summary["total_price"] = $total_price;
        $summary["total_count"] = $total_count;

        /* Ürünleri array'e atıyoruz */
        $_SESSION["shoppingCart"]["products"] = $products;

        /* Toplam count ve price'ı arrey'e atıyoruz */
        $_SESSION["shoppingCart"]["summary"] = $summary;

        /* Ana sayfadaki sepet simgesinin yanındaki badge için toplam count'u geri gönderiyoruz */
        return true;
    }

}


function decCount($product_id){
    if (isset($_SESSION["shoppingCart"])){
        $products = $_SESSION["shoppingCart"]["products"];

        // Adet Kontrolü...
        if(array_key_exists($product_id,$products)){
            $products[$product_id]->count--;
            /* Eğer ürün adeti sıfıra gelmişse ürünü SESSION'dan sil */
            if ($products[$product_id]->count <= 0){
                unset($products[$product_id]);
            }
        }

        // Sepetin hesaplanması...
        $total_price = 0.0;
        $total_count = 0;

        foreach ($products as $product){
            $product->total_price = $product->count * $product->price; // adet * fiyat

            $total_price += $product->total_price; // price'ları toplayıyoruz...
            $total_count += $product->count; // count'ları toplatıyoruz...
        }

        $summary["total_price"] = $total_price;
        $summary["total_count"] = $total_count;

        /* Ürünleri array'e atıyoruz */
        $_SESSION["shoppingCart"]["products"] = $products;

        /* Toplam count ve price'ı arrey'e atıyoruz */
        $_SESSION["shoppingCart"]["summary"] = $summary;

        /* Ana sayfadaki sepet simgesinin yanındaki badge için toplam count'u geri gönderiyoruz */
        return true;
    }
}


/* jquery'den gelen POST'u karşılama kısmı */
if(isset($_POST["p"])){
    $islem = $_POST["p"];

    if($islem == "addToCart"){
        $id = $_POST["product_id"];
        //Öğreticinin kodu -- id veritabanında yok ise hata veriyor güvenli değil
        //$product = $db->query("SELECT * FROM products WHERE id={$id}", PDO::FETCH_OBJ)->fetch();

        // id'nin veritabanında olup olmadığını sorgulayabiliyoruz
        $query = $db->prepare("SELECT * FROM products WHERE id={$id}");
        $query->execute();
        if($query->rowCount() <= 0){
            echo "Ürün id'si veritabanında mevcut Değil!";
        }
        else{
            $product = $query->fetch(PDO::FETCH_OBJ);
            $product->count = 1; // count'u veritabanı sorgusundan dönen değerin içine gömüyoruz...
            echo addToCart($product);
        }

    }
    else if($islem == "removeFromCart"){
        $id = $_POST["product_id"];
        echo removeFromCart($id); // echo dedik çünkü jquery response methodu çalışıp sayfa reload olsun
    }


}


/* Get ile gelen Increase ve Decrease karşılama kısmı */
if(isset($_GET["p"])){
    $islem = $_GET["p"];

    if($islem == "incCount"){
        $id = $_GET["id"];
        if(incCount($id)) {
            header("location:../shopping_card.php");
        }
    }
    else if($islem == "desCount"){
        $id = $_GET["id"];
        if(decCount($id)){
            header("location:../shopping_card.php");
        }

    }
}


?>