<?php

class Uye{
    public $ad;
    public $soyad = "KöKTürk";
    const MAAS = 3800;

    public function adGoster(){
        return $this->ad;
    }

    public function soyadGoster(){
        return $this->soyad;
    }

    public function maasHesapla(){
        $maas = self::MAAS / 7;
        return "maaşınız ".number_format($maas,2)." Dolardır";
    }

}

$uye = new Uye;
$uye->ad = "Özgür";

echo $uye->adGoster(). "<br>";
echo $uye->soyadGoster() . "<br>";
echo $uye->maasHesapla();