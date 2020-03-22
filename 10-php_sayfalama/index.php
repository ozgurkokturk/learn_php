<?php
$db = new PDO("mysql:host=localhost;dbname=uyeler;charset=utf8","root");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAYFALAMA SİSTEMİ ÖRNEK</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>




<script>
$(document).ready(function(e){
	$('#sayi').on('change',function(e){

		var gelenDeger = $("#sayi option:selected").val();
		alert(gelenDeger);
		$.get("cook.php?tercih=belirle",{"limit":gelenDeger},function(){
			window.location.reload();
		});

	});
});
</script>

</head>
<body>

<?php
	$query = $db->prepare("SELECT COUNT(*) as wholeRow FROM yazilar");
	$query->execute();
	$satirSayisi = $query->fetch(PDO::FETCH_ASSOC);

	// jquery ile aldığımız selectbox verisini kullanıyoruz
	if(!isset($_COOKIE["gosterLimit"])){
		$gosterilecekAdet = 5;
	}
	else{
		$gosterilecekAdet = $_COOKIE["gosterLimit"];
	}


	$toplamSatir = $satirSayisi["wholeRow"];
	$toplamSayfa = ceil($toplamSatir / $gosterilecekAdet); //ceil yukarı yuvarlar
	
	
	// eğer sayfa ilk defa açılıyorsa $sayfa = 1 değilse $_GET ile alyoruz kaçta olduğunu
	if(isset($_GET["sayfa"])){
		$sayfa = (int) $_GET["sayfa"];
	}
	else{
		$sayfa = 1;
	}
	// $sayfa sayısının güvenliği için 1 den küçük olamaz ve toplam sayfa sayısından fazla olamaz
	if($sayfa < 1) $sayfa = 1;
	if($sayfa > $toplamSayfa) $sayfa = $toplamSayfa;

	// lIMIT kaçtan başlayıp, kaç tane gösterilecek şeklinde çalışıyor
	// ilk sayfa için 0 dan başla 5 tane göster gibi
	$limit = ($sayfa -1) * $gosterilecekAdet;
	$query2 = $db->prepare("SELECT * FROM yazilar LIMIT $limit,$gosterilecekAdet");
	$query2->execute();
	

?>


<div class="container">
	<div class="row">
		<div class="col-md-12" id="yinele">
		<table class="table table-bordered mt-2 text-center ">
		<tbody>
			<tr>
			  <td  class="text-left bg-light">
				<select id="sayi" class="form-control">
					<?php
					   $pageNumbers = array(5,10,20,30);
					   foreach($pageNumbers as $value){
							if($value == $_COOKIE["gosterLimit"]){
								echo ' <option value="'.$value.'" selected>'.$value.'</option> ';
							}else{
								echo ' <option value="'.$value.'">'.$value.'</option> ';
							}
					   }
					?>
				</select>
			  </td>
			  <td  class="text-left bg-light">
				<div class="alert alert-info float-right">
				    Toplam İçerik Sayısı:  
				    <?php echo $toplamSatir; ?>
				</div>
			  </td>
			</tr>
		
			<tr>
			  <th style="width:100px;" > Konu No </th>
			  <th >Konu İçerik</th>
			</tr>
		</tbody>



		<tbody>
			  <!-- konulara buraya gelecek -->
			  <?php

				while($row = $query2->fetch(PDO::FETCH_ASSOC)){
					echo '
					<tr>
					<td>'.$row["id"].'</td>
					<td>'.$row["icerik"].' </td>
					</tr>
					';
				}
			  ?>

			  <tr>
			  	<td colspan="2"  class="text-center bg-light" >
					<nav>
						<ul class="pagination flex-wrap">
							<?php
								for($i=1; $i <= $toplamSayfa; $i++){
									echo '
									<li class="page-item">
										<a href="?sayfa='.$i.'" class="page-link">'.$i.'</a>
									</li>
									';
									if($i == 20) echo '';

								}
							?>
						</ul>
					</nav>
			  	</td>
			</tr>     
			
		</tbody>  

		</table>
		</div>
	</div>
</div>
</body>
</html>