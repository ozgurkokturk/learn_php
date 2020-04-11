<?php
/*
 * Static methodlar çağırıldığında direkt RAM'e yazılırlar
 * Bu yüzden daha hızlı ve kullanımları biraz farklıdır.
 * Static methodlar PHP'de çok kullanılır özellikle Destek Sınıflarında (Helper-Utility Sınıfları gibi)
 */

class User{

    public $ad;

    public function __construct($ad){
        $this->ad = self::filterName($ad);
    }

    static function filterName($name){
        //gelen adın içerisindeki boşlukları temizler
        $name = trim($name);
        return $name;
    }

}

$user = new User("   Özgür           ");
echo $user->ad;

$user->ad = "             Köktürk     ";
echo $user->ad;