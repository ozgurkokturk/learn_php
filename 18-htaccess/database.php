<?php

$db = new PDO ('sqlite:blog.db');


function showAllTitle($db){
    $query = "SELECT * FROM blog_content";

    $veriler = $db->query($query);
    $veriler = $veriler->fetchAll(PDO::FETCH_NUM);

    return $veriler;
}

function showContent($db, $id){
    $query = "SELECT * FROM blog_content where id=$id";

    $veriler = $db->query($query);
    $veriler = $veriler->fetchAll(PDO::FETCH_NUM);

    return $veriler;
}