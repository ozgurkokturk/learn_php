<?php

$db = new mysqli("localhost", "root", "", "mysqltarih") or die ("veritabanı hatası");
$db->set_charset("utf8");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MYSQL TARİH</title>
<link rel="stylesheet" href="boost.css" >

</head>
<body>

<!-- 1. Table -->
<table class="table table-bordered col-md-10 mx-auto mt-4 text-center table-dark">
<thead>
<tr>
<td><a href="index.php?tar=bugun">Bugün</a></td>
<td><a href="index.php?tar=dun">Dün</a></td>
<td><a href="index.php?tar=hafta">Bu hafta</a></td>
<td><a href="index.php?tar=ay">Bu ay</a></td>
<td><a href="index.php?tar=tum">Tüm Zamanlar</a></td>

</tr>
</thead>
</table>

<!-- 2. Table -->
<table class="table table-bordered col-md-4 mx-auto mt-4 text-center table-light table-striped">
<thead>
<tr>
<th>Ürün Ad</th>
<th>Ürün Fiyat</th>
<th>Ürün Tarihi</th>
</tr>
</thead>
<tbody>

<?php

if(isset($_GET["tar"])){
	switch($_GET["tar"]){
		case "bugun":
			$query = "SELECT * FROM rapor where tarih = CURDATE()";
			$veri = $db->prepare($query);
			$veri->execute();
			$sonuc = $veri->get_result();

			while($satir = $sonuc->fetch_assoc()){
				echo '
				<tr>
					<th>'.$satir["urunad"].'</th>
					<th>'.$satir["urunfiyat"].'</th>
					<th>'.date("d-m-Y", strtotime($satir["tarih"])).'</th>
				</tr>
				';
			}
		break;

		case "dun":
			echo "dun";
		break;

		case "hafta":
			echo "hafta";
		break;

		case "ay":
			echo "ay";
		break;

		case "tum":
			echo "tum";
		break;

		default:
			echo "tarihlerin dışına çıktınız";
		break;
	}
}



?>

</tbody>
</table>



</body>
</html>