<?php

//echo realpath(".");   gerçek yolu verir
define("PATH", realpath("."));

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