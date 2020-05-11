<?php
/*
 * Interface de aynı abstract gibidir
 * içine yazılan methodlar child'lar tarafından kullanılmak zorundadır.
 *  Temel fark bu >> If you need to support the child classes by adding some non-abstract method, you should use abstract classes.
 * Otherwise, interfaces would be your choice.
 * bu arkadaşın dediğinden anladığım interface classlarda içinde zorunlu olmayan method tanımlayamıyoruz , yada tanımlamıyoruz.
 * NoT: Only Abstract Methods
    An interface can only have method signatures. It means that all the methods cannot have a body - only the declaration.
    And, all the methods must have public visibility.
 */

interface Person{ // başına class bile yazmıyormuşuz :D
    public function __construct($name);
    public function greet() : string ; //  : string demek return edilecek değerin türünü belirtir. aşağıdaki fonksiyonlarda kullancaz

}

class Programmer implements Person{
    public $name;
    public function __construct($name){
        $this->name = $name;
    }
    public function greet() : string { // string tanımlamak zorunda kaldım yukarıda string dediğimiz için ;)
        return "Hi " . $this->name;
    }
}

$programmer = new Programmer("Özgür");
echo $programmer->greet();