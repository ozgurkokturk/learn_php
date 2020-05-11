<?php


function dosya_listele($dizin_adi){
    $dosyalar = scandir($dizin_adi);

    echo "<ul>";

    foreach ($dosyalar as $dosya){

        if (!in_array($dosya,['.','..'])){
            echo "<li>" . $dosya;
            if (is_dir($dizin_adi . "/" . $dosya)){
                dosya_listele($dizin_adi . '/' . $dosya);

            }
            echo "</li>";
        }

    }

    echo "</ul>";
}
//dosya_listele('.');


function glob_listele($dizin_adi){
   $dosyalar = glob($dizin_adi);
    echo "<ul>";

   foreach ($dosyalar as $dosya){
       echo "<li>". $dosya;
       if (is_dir($dosya)){
           glob_listele($dosya."/*");
       }
   }

   echo "</ul>";
}

glob_listele("../*");