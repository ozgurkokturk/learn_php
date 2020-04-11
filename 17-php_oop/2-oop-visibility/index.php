<?php

class Visibility{
    /*
     * Private miras vermez.
     * Proteced miras verir.
     * ve ikisine de dışardan direkt erişilemez.
     */
    public $public = "public";
    private $private = "private";
    protected $protected = "protected";

    function test(){
        return $this->private . " ". $this->protected;
    }
}

$v = new Visibility;

echo $v->public. "<br>";
/* DIŞARDAN "DİREKT" ERİŞİLEMEZLER
echo $v->private;
echo $v->protected;
*/
echo $v->test();