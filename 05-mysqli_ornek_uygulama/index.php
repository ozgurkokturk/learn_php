<?php require_once("dahili.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Başlıksız Belge</title>
</head>

<body>

<?php
@$islem = $_GET["islem"];
@$id = $_GET["id"];

switch ($islem){

  case "sil":
    Islemler::sil($db,$id);
  break;

  case "ekle":
    Islemler::ekle($db);
  break;

  case "guncelle":
    Islemler::guncelle($db,$id);
  break;

  case "arama":
    Islemler::ara($db);
  break;

  default:
  ?>


<div class="container">
  <h2>ÜYELER</h2>
    
  <table class="table table-bordered table-hover" style="text-align:center">
    <thead>
    <tr class="table-light">
      <th colspan="8">
        <form action="index.php?islem=arama" method="POST">
          Aranacak Kriter <select name="kriter">
            <option value="ad">Ad</option>
            <option value="soyad">Soyad</option>
            <option value="tc">TC</option>
            <option value="meslek">Meslek</option>
            <option value="aidat">Aidat</option>
            <option value="yetki">Üye tipi</option>
          </select>
          <input type="text" name="ara" placeholder="Aranacak Veri" />
          <input type="submit" name="fffbuton" value="Ara" />
        </form>
      </th>
    </tr>
      <tr class="table-light">
        <th>Üye id</th>
        <th>Ad</th>
        <th>Soyad</th>
        <th>Tc</th>
        <th>Meslek</th>
        <th>Aidat</th>
        <th>Üye Tipi</th>
        <th>İşlemler</th>
      </tr>
    </thead>
    <tbody>  

      <!-- Database -->
      <?php Islemler::listele($db); ?>

    </tbody>
  </table>
  <div>
    <a href="index.php?islem=ekle" class="btn btn-success">Yeni Kayıt Ekle</a>
  </div>
</div>


<?php
;
}
?>

</body>
</html>