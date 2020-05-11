<?php

require __DIR__ . "/app/init.php";

/* .htaccess için
 * print_r($_SERVER); ile baktığımızda
 * [REQUEST_URI] => /php/cms_proje/
 * [SCRIPT_NAME] => /php/cms_proje/index.php
 * olarak gözüküyor ve biz /php/cms_proje/ kısmını olduğu gibi atıcaz neden bilmiyorum angut anlatmadı orayı
 */
$route = array_filter(explode("/" , $_SERVER["REQUEST_URI"]));
if (SUBFOLDER === true){
    /*
     * 1.sini /php/ silmek için
     * 2.si /cms_proje/ silmek içindi.
    */
    array_shift($route);
    array_shift($route);
}
// route[0] yoksa sen onu "index" yap
if (!route(0)){
    $route[0] = "index";
}

// app/controller altında route[0] ile gelen değer yoksa 404 e gönder
if (!file_exists(controllerYolu(route(0)))){
    $route[0] = "404";
}

echo "<br>";echo "<br>";echo "<br>";

// $route[0]'ı dahil ettik, artık o kadar kontrol ettik sıkıntı olmaz herhalde
require controllerYolu(route(0));

echo "<br>";
print_r($route);

