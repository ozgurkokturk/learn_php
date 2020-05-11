<?php
$db = new mysqli ('localhost','root',"","blog_sistemi") or die ("mysqlde sorun var");
if($db->connect_error){
    echo "mysql baglanti sorunu:". $db->connect_error;
}

?>