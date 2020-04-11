<?php

class Urunler{
    public $urunKodu;
    public $fiyati;
    public $markası;
}

class Kalem extends Urunler{
    public $rengi;
    public function yaz($metin){
        echo $metin;
    }
}

class HesapMakinesi extends Urunler{
    public $tusSayisi;
    public function topla($a, $b){
        echo "Sonuç: ".($a+$b);
    }
}

$kirmiziKalem = new Kalem();
$kirmiziKalem->urunKodu = "555444";
$kirmiziKalem->fiyati = 15;
$kirmiziKalem->markası = "Https";
$kirmiziKalem->rengi = "Kırmızı";
$kirmiziKalem->yaz($kirmiziKalem->rengi. " Renkli Kalemim <br>" );

$hp = new HesapMakinesi();
$hp->urunKodu = "999333";
$hp->fiyati = 30;
$hp->markası = "ex";
$hp->tusSayisi = 30;
$hp->topla(77,99);