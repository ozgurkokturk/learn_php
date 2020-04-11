<?php

/*
    chmod()
    1. numara 0 ile başlar
    2. numara dosya sahibi izinleri
    3. numara kullanıcı grupları izinleri
    4. numara geri kalan herkesin

    1 = execute (işlem) izni
    2 = yazma izni
    3 = okuma izni
 */

// LOCAL'de ÇALIŞTIRAMADIM
    if (file_exists("test.txt")){
        chmod("test.txt",0777);
        echo "izinler değişti.";
    }else{
        echo "dosya yok";
    }
