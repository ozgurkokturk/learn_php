<?php

/*
 * const sabitlerdir değerleri değişmez tanımlamaları da farklıdır başına dolar işareti almaz.
 * Why Class Constants?
 * Class constants are useful when you need to declare some constant data (which does not change) within a class.
 */

class File{
    // __DIR__ da bir sabittir.(Sihirli Sabit olarak geçer)
    const DIRECTORY = __DIR__;

    public function getDirectory(){
        return self::DIRECTORY;
    }
}

class Folder extends File{
    public function getDirectory()
    {
        // Miras yoluyla türetilen sınıflarda da kullanılabilir (parent:: Şeklinde)
        return parent::getDirectory();
    }
}

$file = new File();
echo $file->getDirectory();
echo "<br><br>";
$folder = new Folder();
echo $folder->getDirectory();