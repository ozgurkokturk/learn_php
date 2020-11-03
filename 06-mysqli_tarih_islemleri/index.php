<?php

$db = new mysqli("localhost:3307", "root", "", "mysqltarih") or die ("veritabanı hatası");
$db->set_charset("utf8");

function sql ($gelen_db,$gelen_query){
	$veri = $gelen_db->prepare($gelen_query);
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
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MYSQL TARİH</title>
<link rel="stylesheet" href="boost.css" >
<style>
	table{
		font-size: 13px;
	}
	a{
		height: 50px;
		width: 100px;
		display: block;
		margin:0 auto;
		color: darkgreen;
		font-weight: bold;
		font-size: 15px;
	}
	a:hover{
		color: black;
	}
	#date{
		text-align: center;
	}
</style>
</head>
<body>

<!-- 1. Table -->
<table class="table table-bordered col-md-8 mx-auto mt-2 text-center table-secondary">
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

<div id="date" class="col-md-8 mx-auto">
	<form action="index.php?tar=arama" method="POST">
		<input type="date" name="tarih1" required>
		<input type="date" name="tarih2" required>
		<input type="submit" name="send" value="Ara" class="btn btn-dark">
	</form>
</div>

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
			$query = "SELECT * FROM rapor WHERE tarih = CURDATE()  ORDER BY tarih DESC";
			sql($db,$query);
		break;

		case "dun":
			$query = "SELECT * FROM rapor WHERE tarih = DATE_SUB(CURDATE(), INTERVAL 1 DAY) ORDER BY tarih DESC";
			sql($db,$query);
		break;

		case "hafta":
			$query = "SELECT * FROM rapor WHERE tarih >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) AND tarih <= CURDATE() ORDER BY tarih DESC";
			sql($db,$query);
		break;

		case "ay":
			$query = "SELECT * FROM rapor WHERE tarih >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) ORDER BY tarih DESC";
			sql($db,$query);
		break;

		case "tum":
			$query = "SELECT * FROM rapor ORDER BY tarih DESC";
			sql($db,$query);
		break;

		case "arama";
			if(isset($_POST["tarih1"]) || isset($_POST["tarih2"])){
				$tarih1 = $_POST["tarih1"];
				$tarih2 = $_POST["tarih2"];
				$query = "SELECT * FROM rapor WHERE DATE(tarih) BETWEEN '$tarih1' AND '$tarih2'";
				sql($db,$query);
			}
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