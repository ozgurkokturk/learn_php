<?php
function loginControl($db,$kadi,$sfr){
    $query = $db->prepare("SELECT * FROM blog_user where email=? and password=?");
    $query->bindParam(1,$kadi,PDO::PARAM_STR);
    $query->bindParam(2,$sfr,PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() <= 0){
        $db = null;
        return false;
    }else{
        $info = $query->fetch(PDO::FETCH_OBJ);
        return $info;
    }
}

