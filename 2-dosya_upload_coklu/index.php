<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div{
            border: 1px solid black;
        }
    </style>
</head>
<body>




<?php
// Eski yöntem bir dosya upload işlemi bunun Array ile olan yönetemi de var.
if(@$_GET["tercih"]=="yukle"){
    


    if(@$_POST["buton"]){

        $sayi = $_POST["sayi"];

        for($i = 1; $i <= $sayi; $i++){
           if($_FILES["dosya".$i]["name"] == ""){
               echo $i.". dosya yok <br />";   
           }
           else{
               if($_FILES["dosya".$i]["size"] > 1024*1024*1){
                   echo $i.". dosya boyutu 1mbden fazla <br />";
               }
               else{
                   $format = array("image/jpeg");
                   if(!in_array($_FILES["dosya".$i]["type"],$format)){
                       echo $i.". dosya formatı uygun değil <br />";
                   }
                   else{
                       move_uploaded_file($_FILES["dosya".$i]["tmp_name"],"resimler/".$_FILES["dosya".$i]["name"]);
                       echo $i.". dosya yüklendi <br />";
                   }
               }
           }
        }
    
    }
    else{
        $sayi =  $_POST["sayi"];
        ?>
        
        <div>
        <form action="index.php?tercih=yukle" method="post" enctype="multipart/form-data">
        <ol>
            <?php
                for($a=1; $a <= $sayi; $a++){
                    echo '<li><input type="file" name="dosya'.$a.'" /> <br /><br /></li>';
                }
            ?>
        </ol>
        <input type="hidden" name="sayi" value="<?php  echo $sayi ?>"  />
        <input type="submit" name="buton" value="Yükle" />
        </form>
        </div>
        
        <?php
    }
    

}
else{

?>

<form action="index.php?tercih=yukle" method="post" enctype="multipart/form-data">
<input type="text" name="sayi"  />
<input type="submit" name="creat" value="Oluştur" />
</form>

<?php
}
?>




</body>
</html>