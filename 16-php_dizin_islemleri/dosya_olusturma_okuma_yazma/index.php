<?php

// touch doys oluşturma
//touch("test.txt");

/* Kipler
    r  > okumak için açar
    r+ > okumak ve yazmak için açar
    w  > yazmak için açar (dosya yok ise oluşturur var ise üstüne yazar)
    w+ > okumak ve yazmak için açar
    a  > yazmak için açar ve sonrasına ekler (append)
    a+ > okumak ve yazmak için açar
*/

/* Fonksiyonlar
    fopen()  > dosyayı açmamızı sağlar
    fclose() > dosyayı kapatmamızı sağlar
    fwrite() > dosyaya bir şeyler yazmamızı sağlar
    fread()  > tüm içeriği okur
    fgets()  > satır satır okur
    feof()   > dosyanın sonuna gelinip gelinmediğini döndürür
    filesize() > dosyada yer alan karakter sayısını döndürür.
    file()   > dosyayı direkt okur array olarak döndürür satır satır
*/

//// YAZI YAZIP SONUNA İLİŞTİRDİK
//$icerik = "php çalışıyor";
//$dosya = fopen("test.txt","a");
//    fwrite($dosya, $icerik);
//    fclose($dosya);

// DOSYAYI VAR İSE OKUYALIM
if (file_exists("test.txt")){
    echo "dosya var!!"."<br>";
    $dosya = fopen("test.txt", "r");

    /* Yöntem 1 */
//    while (feof($dosya) == false){
//        echo fgets($dosya) . "<br>";
//    }

    /* Yöntem 2 */
//    echo "<pre>";
//    $satirlar = file("test.txt");
//    print_r($satirlar);
//    echo "</pre>";

    fclose($dosya);
}
else{
    echo "böyle bir dosya yok";
}


/* Yöntem 3 */
//file_put_contents("test.txt","PHP DE GÜZEL FONKSİYOLAR", FILE_APPEND);
//echo file_get_contents("test.txt");


