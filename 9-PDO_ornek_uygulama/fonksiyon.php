<?php
try  {
	$db = new PDO("mysql:host=localhost;dbname=pdo_dersler;charset=utf8", "root","");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
} catch (PDOException $e) {
	die($e->getMessege());
}

class Uye{


    function listele($gelen_db){ // Listele : Default
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
				<td> <a href="index.php?islem=guncelleBasla&id='.$row["id"].'" class="btn btn-warning">Güncelle</a> </td>
				<td> <a href="index.php?islem=sil&id='.$row["id"].'" class="btn btn-danger">Sil<a> </td>
				</tr>
				';
			}
        }
	}
	
	function ekle($gelen_db){ // Ekle
		if(isset($_POST["buton"])){
			$ad = htmlspecialchars($_POST["ad"]);
			$soyad = htmlspecialchars($_POST["soyad"]);
			$yas = htmlspecialchars($_POST["yas"]);
			$aidat = htmlspecialchars($_POST["aidat"]);
			if(empty($ad) || empty($soyad) || $yas == "" || $aidat == ""){
				echo "<i>biri boş</i>";
			}
			else{
				
				$query = $gelen_db->prepare("INSERT INTO uyeler (ad,soyad,yas,aidat) VALUES (?,?,?,?)");
			
				$query->bindParam(1,$ad,PDO::PARAM_STR);
				$query->bindParam(2,$soyad,PDO::PARAM_STR);
				$query->bindParam(3,$yas,PDO::PARAM_STR);
				$query->bindParam(4,$aidat,PDO::PARAM_INT);
				$query->execute();	
				echo "<i>Üye Eklendi<br>Yönlendiriliyorsunuz...</i>";
				header("refresh:0.5;url=index.php");
			}
		}
		echo'
		<div class="col-md-5 mx-auto mt-4 ">
            <form action="index.php?islem=ekle" method="POST">  
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input class="form-control" type="text" name="ad" placeholder="Ad" />
                    </div>
                    <div class="form-group col-md-6">
                        <input class="form-control" type="text" name="soyad" placeholder="Soyad" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input class="form-control" type="number" name="yas" placeholder="Yaş" />
                    </div>
                    <div class="form-group col-md-6">
                        <input class="form-control" type="number" name="aidat" placeholder="Aidat" />
                    </div>
                </div>
                <div class="form-group">
                    <input class="btn btn-success col-md-12 " type="submit" name="buton" value="Kaydet" />
                </div>
            </form>
        </div>
		';
	}

	function sil($gelen_db){ // Sil
		$id = $_GET["id"];
		if($id == ""){
			echo "<i>id sorunu</i>";
		}else{
			$query = $gelen_db->prepare("DELETE FROM uyeler WHERE id=:id");

			$query->bindValue(":id",$id,PDO::PARAM_INT);
			$query->execute();
			
			echo "<i> Üye Silindi... </i>";
			header("refresh:0.5;url=index.php");
		}
		
	}



	function guncelleBasla($gelen_db){ // Güncelle Başla
		echo '
		<div class="container-fluid">
		<div class="row mt-5">
		<div class="col-md-8 mx-auto mt-5" id="tablo">
		<form action="index.php?islem=guncelleBitir" method="POST">
			<table class="table table-border table-dark table-bordered text-center table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Ad</th>
						<th>Soyad</th>
						<th>Yaş</th>
						<th>Aidat</th>
						<th>Güncelle</th>
					</tr>
				</thead>
				<tbody>';

		$id = $_GET["id"];
		if($id == ""){
			echo "<i>id sorunu</i>";
		}else{
			$query = $gelen_db->prepare("SELECT id,ad,soyad,yas,aidat FROM uyeler");
			$query->execute();
			$i = 0;
			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				if($id!=$row["id"]){
					echo '
					<tr>
					<td>'.$row["id"].'</td>
					<td>'.$row["ad"].'</td>
					<td>'.$row["soyad"].'</td>
					<td>'.$row["yas"].'</td>
					<td>'.$row["aidat"].'</td>
					</tr>
				';
				}
				else{
					echo '
					<tr>
					<td>'.$row["id"].'</td>
					<td> <input type="text" name="ad" value="'.$row["ad"].'" /> </td>
					<td> <input type="text" name="soyad" value="'.$row["soyad"].'" /> </td>
					<td> <input type="number" name="yas" value="'.$row["yas"].'" /> </td>
					<td> <input type="number" name="aidat" value="'.$row["aidat"].'" /> </td>
					<td> 
						<input type="hidden" name="id" value="'.$row["id"].'" />
						<input type="submit" name="buton" value="Güncelle" class="btn btn-warning" />
					</td>
					</tr>		
				';
				}
			}
			echo '
			</tbody>
			</table>
			</form>
		</div>
		</div>
		</div>
			';
		}
	}

	function guncelleBitir($gelen_db){ // Güncelle Bitir
		$id = $_POST["id"];
		$ad = htmlspecialchars($_POST["ad"]);
		$soyad = htmlspecialchars($_POST["soyad"]);
		$yas = htmlspecialchars($_POST["yas"]);
		$aidat = htmlspecialchars($_POST["aidat"]);
		if($id == ""){
			echo "<i>id sorunu</i>";
		}else{
			$query = $gelen_db->prepare("UPDATE uyeler SET ad=:ad, soyad=:soyad, yas=:yas, aidat=:aidat WHERE id=:id");
			
			$query->bindValue(":id",$id,PDO::PARAM_INT);
			$query->bindValue(":ad",$ad,PDO::PARAM_STR);
			$query->bindValue(":soyad",$soyad,PDO::PARAM_STR);
			$query->bindValue(":yas",$yas,PDO::PARAM_STR);
			$query->bindValue(":aidat",$aidat,PDO::PARAM_INT);
			$query->execute();

			echo "<i>Güncellendi<br>Yönlendiriliyorsunuz...</i>";
			header("refresh:0.5;url=index.php");
		}
		
	}

}

?>