<?php

// echo realpath(".");   gerçek yolu verir
define("PATH", realpath("."));

// Henüz Sebebini Bilmiyorum
define("SUBFOLDER", true);

// Şimdilik URL elle giriyoruz henüz sebebebi bilinmiyor.
define("URL", "http://localhost/php/cms_proje");

/*
 * Database ayarlarını bir dizi olarak döndürüyoruz
 */
return [
    "db" =>[
        "name" => "cms_proje",
        "host" => "localhost",
        "user" => "root",
        "pass" => ""
    ]
];