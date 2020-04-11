<?php

/*
 * __construct >> class çağırılınca otomatik ilk çalışır.
 * __destruct  >> class çağırılınca otomatik son çalışır.
 */

class Insan{

    public $ad;

    //YAPICI FONKSİYON DEGER ALIR
    public function __construct($Name){
        $this->ad = $Name;
        echo $this->ad . " " . "Yaratıldı... <br><br>";
    }

    public function konus($val){
        echo $this->ad." Konuşuyor: ". $val."<br><br>";
    }

    public function __destruct(){
        echo $this->ad. " Uyutuldu...";
    }
}

$person = new Insan("Mike");
$person->konus("Coronaaaaa!");