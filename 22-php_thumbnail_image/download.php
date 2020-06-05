<?php



ob_start();
if(isset($_GET["dosyaadi"],$_GET["extension"])){
    $dosyaAdi = htmlspecialchars($_GET["dosyaadi"]);
    $extension = htmlspecialchars($_GET["extension"]);
    $fullname = $dosyaAdi. ".".$extension;

    if ($extension == "jpeg" || $extension == "jpg" ){
        header("Content-type: image/jpeg");
        header("Content-disposition: attachment; filename={$fullname}");
        readfile("dosyalar/".$fullname);
    }

}

ob_end_flush();
if(readfile("dosyalar/".$fullname)){
    header("Location:deleteAll.php?islem=sil");
}
else{echo "problem";}
