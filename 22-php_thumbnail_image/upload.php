<?php


if (isset($_FILES["dosya"])){

    if (!file_exists("dosyalar")){
        mkdir("dosyalar");
    }


//    echo "<pre>";
//    print_r($_POST);
//    print_r($_FILES["dosya"]);
//    echo "</pre>";




    // Inputlar
    $inputWidth = $_POST["inputWidth"];
    $inputHeight = $_POST["inputHeight"];
    $dosyaAdı = $_POST["dosyaAdı"];

    // Dosyanın boyutu:  ... byte
    $currentSize = $_FILES["dosya"]["size"];
    $currentSize = round($currentSize / 1024);

    // Dosyanın tipi: image/jpeg
    $type = $_FILES["dosya"]["type"];

    // Doysayın tam adı: asddsaasd.jpg
    $fullName = $_FILES["dosya"]["name"];


    $explodedName = explode(".", $fullName);
    $extension = end($explodedName);

    // Dosyanın local'de aktarıldığı yer: C:\wamp64\tmp\php329F.tmp
    $getFile = $_FILES["dosya"]["tmp_name"];

    // Dosyanın taşınacağı yer
    if (move_uploaded_file($getFile, strtolower('dosyalar/'. $fullName))){



        // KIRPMA İŞLEMİ BAŞLAR...
        // Taşınan dosyayı al
        $image = imagecreatefromjpeg('dosyalar/'.$fullName);
        // Yeni oluşacak dosyanın kaydedileceği yer
        $filename = 'dosyalar/'.$dosyaAdı.'.jpg';

        // Inputlardan girilen değerler
        $thumb_width = $inputWidth;
        $thumb_height = $inputHeight;


        $width = imagesx($image);
        $height = imagesy($image);

        $original_aspect = $width / $height;
        $thumb_aspect = $thumb_width / $thumb_height;

        if ( $original_aspect >= $thumb_aspect )
        {
            // If image is wider than thumbnail (in aspect ratio sense)
            $new_height = $thumb_height;
            $new_width = $width / ($height / $thumb_height);
        }
        else
        {
            // If the thumbnail is wider than the image
            $new_width = $thumb_width;
            $new_height = $height / ($width / $thumb_width);
        }

        $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );



        // Resize and crop
        imagecopyresampled($thumb,
            $image,
            0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
            0 - ($new_height - $thumb_height) / 2, // Center the image vertically
            0,
            0,
            $new_width,
            $new_height,
            $width,
            $height);

        imagejpeg($thumb, $filename, 80);


        // Yeni image dosya boyutunu al
        $newImageSize = filesize("dosyalar/".$dosyaAdı.".jpg");
        $newImageSize = round($newImageSize / 1024);


        $bilgiler = "
             <h4>Şimdiki Fotoğraf Bilgileri</h4>
             <ul>
                <li><span class='font-weight-bold'>Orginal width:  </span>".$thumb_width."</li>
                <li><span class='font-weight-bold'>Orginal height: </span>".$thumb_height."</li>
                <li><span class='font-weight-bold'>Orjinal boyutu: </span>".$newImageSize." kb</li>
            </ul>
            <h4>Orginal Fotoğraf Bilgileri</h4>
            <ul>
                <li><span class='font-weight-bold'>Orginal width:  </span>".$width."</li>
                <li><span class='font-weight-bold'>Orginal height: </span>".$height."</li>
                <li><span class='font-weight-bold'>Orjinal boyutu: </span>".$currentSize." kb</li>
            </ul>
    
            ";

        $foto =        "<img src='dosyalar/".$dosyaAdı.".jpg'>";
        $orginalFoto = "<img src='dosyalar/".$fullName."' width='".$inputWidth."' height='".$inputHeight."'>";

           $response = array(
               "foto" => $foto,
               "bilgiler" => $bilgiler,
               "orginalFoto" => $orginalFoto
           );

           echo json_encode($response);

    }
    else{
        echo "hata!";
    }


}