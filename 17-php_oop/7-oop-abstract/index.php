<?php
/*
 * Soyut sınıfların soyut fonksiyoları bu sınıftan türetilen tüm child'larda kullanılmak zorunda
 * soyutlamanın tanımı: nesnenin gerçekliğinden uzaklaşmak gibi bir şey dersek...
 * class yapısının asıl mantığı olan kod tekrarınından kaçıma mantığına ters olarak
 * kod tekrarını zorunlu kılmasından ötürü adını soyutlama koymuş olabilirler.
 * ve son olarak >> Abstract method's visibility can either be public or protected, but not private.
 */
abstract class Plugin{
    abstract public function setTitle($a); //süslü parantez kullanılmaz !

    public function show(){
        echo $this->title;
    }
}

class LastComment extends Plugin{
    public function setTitle($title)
    {
        $this->title = $title;
    }
}

$lastComment = new LastComment();
$lastComment->setTitle("KinKong");

echo $lastComment->show();
