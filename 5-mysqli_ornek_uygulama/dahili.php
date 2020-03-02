<?php


$db = new mysqli("localhost", "root", "", "uyeler") or die ("mysqli bağlantısında sorun var  ilk satır");
$db->set_charset("utf8");

class Islemler {

    /* LİSTELE */
    public static function listele($gelen_db){
        $sorgu = "select * from kisisel";
        $tumveri = $gelen_db->prepare($sorgu);
        $tumveri->execute();
        $sonuc = $tumveri->get_result();

        if($sonuc->num_rows == 0){
          echo'
            <tr class="table-danger">
              <td colspan="8">
                <p class="text-danger">Kayıtlı Üye Yok </p>
              </td>
            </tr>
          ';
        }
        else{
          while($satir = $sonuc->fetch_array()){
            echo '
            <tr>
              <td>'.$satir[0].'</td>
              <td>'.$satir[1].'</td>
              <td>'.$satir[2].'</td>
              <td>'.$satir[3].'</td>
              <td>'.$satir[4].'</td>
              <td>'.$satir[5].'</td>
              <td>'.Islemler::yetki($satir[6]).'</td>
              <td style="text-align:center;">
              <a href="index.php?islem=guncelle&id='.$satir[0].'" class="btn btn-info" >Güncelle</a>
              <a href="index.php?islem=sil&id='.$satir[0].'" class="btn btn-danger" >Sil</a>
              </td>
            </tr>
            ';
          }
          $gelen_db->close();
        }
    }

    /* YETKİ DEĞERİ İLE TEXT İÇERİĞİ VE RENGİNİ DEĞİTİR */
    public static function yetki ($gelen_derece) {
        
        if($gelen_derece == 1){
            return $sonDurum = "<p class='text-danger'>Normal Üye </p>";
        }
        else if($gelen_derece == 2){
            return $sonDurum = "<p class='text-warning'>Özel Üye </p>";
        }
        else if($gelen_derece == 3){
            return $sonDurum = "<p class='text-success'>Vip Üye </p>";
        }

    }

    /* SİL */
    public static function sil ($gelen_db,$gelen_id){
      if($gelen_id != ""){
        $sorgu = "delete from kisisel where id=$gelen_id";
        $sonuc = $gelen_db->prepare($sorgu);
        $sonuc->execute();
        $kontrol = $sonuc->get_result();

        if($kontrol == false){
          $gelen_db->close();
          echo "Silme İşlemi Başarılı";
          header("refresh:2;url=index.php");
        }
        else{
          echo "there is a problem with sil";
        }
      }
    }


    /* EKLE */
    public static function ekle ($gelen_db){
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["fbuton"] == true){

          if(empty($_POST["ad"]) || empty($_POST["soyad"]) || empty($_POST["tc"]) || empty($_POST["meslek"]) || empty($_POST["aidat"])){
            echo "all inputs are required";
          }
          else{
            $ad = htmlspecialchars($_POST["ad"]);
            $soyad = htmlspecialchars($_POST["soyad"]);
            $tc = htmlspecialchars($_POST["tc"]);
            $meslek = htmlspecialchars($_POST["meslek"]);
            $aidat = htmlspecialchars($_POST["aidat"]);
            $yetki = htmlspecialchars($_POST["yetki"]);
            $sorgu = "INSERT INTO kisisel(ad,soyad,tc,meslek,aidat,yetki) VALUES ('$ad','$soyad',$tc,'$meslek',$aidat,$yetki)";
            $sonucc = $gelen_db->prepare($sorgu);
            $sonucc->execute();
            $kontroll = $sonucc->get_result();
  
            if($kontroll == false){
              $gelen_db->close();
              echo "kayıt eklendi";
              header("refresh:2;url=index.php");
            }else{
              echo "there is a problem with ekle";
            }
          }
        }
      }
?>
       <form action="index.php?islem=ekle" method="post">
        <table class="table  table-bordered " style="text-align:center">
            
            <thead>
              <tr>
                <th colspan="12">YENI ÜYE KAYDET</th>      
              </tr>
            </thead>
            
            <tbody>
            <tr>
            <th colspan="4"></th>
            <th colspan="4">Ad</th>
            <th colspan="4" style="text-align:left;"><input name="ad" type="text" /></th>
            </tr>
            
            <tr>
            <th colspan="4"></th>
            <th colspan="4">Soyad</th>
            <th colspan="4" style="text-align:left;"><input name="soyad" type="text" /></th>
            </tr>
            
            <tr>
            <th colspan="4"></th>
            <th colspan="4">Tc</th>
            <th colspan="4" style="text-align:left;"><input name="tc" type="text" /></th>
            </tr>
            
            <tr>
            <th colspan="4"></th>
            <th colspan="4">Meslek</th>
            <th colspan="4" style="text-align:left;"><input name="meslek" type="text" /></th>
            </tr>
            
            <tr>
            <th colspan="4"></th>
            <th colspan="4">Aidat</th>
            <th colspan="4" style="text-align:left;"><input name="aidat" type="text" /></th>
            </tr>
            
            <tr>
            <th colspan="4"></th>
            <th colspan="4">Yetki</th>
            <th colspan="4" style="text-align:left;">
            <select name="yetki">
            <option value="1">Normal</option>
            <option value="2">Özel</option>
            <option value="3">Vip</option>
            </select></th>
            </tr>
            
              <tr>
            <th colspan="12"><input type="submit" name="fbuton" class="btn btn-success" value="EKLE" /></th>

            </tr>
            
            </tbody>
            
            
      </table>
     </form>
<?php
    }

}
?>