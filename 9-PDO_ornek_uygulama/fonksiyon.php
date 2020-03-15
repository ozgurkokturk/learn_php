<?php
try  {
	$db = new PDO("mysql:host=localhost;dbname=pdo_dersler;charset=utf8", "root","");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
} catch (PDOException $e) {
	die($e->getMessege());
}

class Uye{
    function listele($gelen_db){
        $query = $gelen_db->prepare("SELECT * FROM uyeler");
        $query->execute();
        if($query->rowCount() == 0){
            echo '<td colspan="7">Veri tabanı boş</td>';
        }
        else{
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
				echo '
				<tr>
				<td>'.$row["id"].'</td>
				<td>'.$row["ad"].'</td>
				<td>'.$row["soyad"].'</td>
				<td>'.$row["yas"].'</td>
				<td>'.$row["aidat"].'</td>
				<td> <a href="index.php?islem=guncelle&id='.$row["id"].'" class="btn btn-warning">Güncelle</a> </td>
				<td> <a href="index.php?islem=sil&id='.$row["id"].'" class="btn btn-danger">Sil<a> </td>
				</tr>
				';
			}
        }
    }
}

?>