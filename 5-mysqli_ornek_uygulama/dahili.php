<?php


$db = new mysqli("localhost", "root", "", "uyeler") or die ("mysqli bağlantısında sorun var  ilk satır");
$db->set_charset("utf8");

class Islemler {

    /* LİSTELE */
    public static function listele($gelen_db){
        $sorgu = "SELECT * FROM kisisel ORDER BY id";
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
          $tumveri->close();
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
          echo "there is a problem in sil";
        }
      }
    }


    /* EKLE */
    public static function ekle ($gelen_db){
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["fbuton"] == true){

          $ad = $_POST["ad"];
          $soyad = $_POST["soyad"];
          $tc = $_POST["tc"];
          $meslek = $_POST["meslek"];
          $aidat = $_POST["aidat"];
          $yetki = $_POST["yetki"];

          if(empty($ad) || empty($soyad) || $tc == "" || empty($meslek) || $aidat == ""){
            echo "all inputs are required";
          }
          else{
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
       <form action="index.php?islem=ekle" method="POST">
        <table class="table  table-bordered" style="text-align:center">
            <a href="index.php">ANASAYFA</a>
            <thead>
              <tr>
                <th colspan="12">YENI ÜYE KAYDET</th>      
              </tr>
            </thead>
            
            <tbody>
            <tr>
            <th colspan="4"></th>
            <th colspan="4">Ad</th>
            <th colspan="4" style="text-align:left;"><input name="ad" type="text" ></th>
            </tr>
            
            <tr>
            <th colspan="4"></th>
            <th colspan="4">Soyad</th>
            <th colspan="4" style="text-align:left;"><input name="soyad" type="text" ></th>
            </tr>
            
            <tr>
            <th colspan="4"></th>
            <th colspan="4">Tc</th>
            <th colspan="4" style="text-align:left;"><input name="tc" type="number" ></th>
            </tr>
            
            <tr>
            <th colspan="4"></th>
            <th colspan="4">Meslek</th>
            <th colspan="4" style="text-align:left;"><input name="meslek" type="text" ></th>
            </tr>
            
            <tr>
            <th colspan="4"></th>
            <th colspan="4">Aidat</th>
            <th colspan="4" style="text-align:left;"><input name="aidat" type="number" ></th>
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


    /* GÜNCELLE */
     public static function guncelle ($gelen_db,$gelen_id){
      
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["ffbuton"] == true){

   
          if(empty($_POST["ad"]) || empty($_POST["soyad"]) || $_POST["tc"] == "" || empty($_POST["meslek"]) || $_POST["aidat"] == "" ){
            echo "all inputs are required";
          }
          else{
            $ad = htmlspecialchars($_POST["ad"]);
            $soyad = htmlspecialchars($_POST["soyad"]);
            $tc = htmlspecialchars($_POST["tc"]);
            $meslek = htmlspecialchars($_POST["meslek"]);
            $aidat = htmlspecialchars($_POST["aidat"]);
            $yetki = htmlspecialchars($_POST["yetki"]);
            $id = $_POST["id"];

            $sorguu = "UPDATE kisisel SET ad='$ad', soyad='$soyad', tc=$tc, meslek='$meslek', aidat=$aidat, yetki=$yetki WHERE id=$id ";
            $sonucc = $gelen_db->prepare($sorguu);
            $sonucc->execute();
            $kontroll = $sonucc->get_result();
  
            if($kontroll == false){
              $gelen_db->close();
              echo "kayıt GÜNCELLENDİ";
              header("refresh:2;url=index.php");
            }else{
              echo "there is a problem in guncelle sql";
            }
          }
        }
      }
      else{

        if($gelen_id == ""){
          echo "there is a problem in guncelle";
        }
        else{
          $sorgu = "select * from kisisel where id=$gelen_id";
          $sonuc = $gelen_db->prepare($sorgu);
          $sonuc->execute();
          $kontrol = $sonuc->get_result();
          $dizi = $kontrol->fetch_assoc();
          
            if($kontrol == false){
              echo "there is a problem in guncelle - sorgu";
            }
            else{
  ?>
              <form action="index.php?islem=guncelle" method="post">
                <table class="table  table-bordered " style="text-align:center">
                    
                    <thead>
                      <tr>
                        <th colspan="12">GÜNCELLE</th>      
                      </tr>
                    </thead>
                    
                    <tbody>
                    <tr>
                    <th colspan="4"></th>
                    <th colspan="4">Ad</th>
                    <th colspan="4" style="text-align:left;"><input name="ad" type="text" value="<?php echo $dizi['ad']; ?>" /></th>
                    </tr>
                    
                    <tr>
                    <th colspan="4"></th>
                    <th colspan="4">Soyad</th>
                    <th colspan="4" style="text-align:left;"><input name="soyad" type="text" value="<?php echo $dizi['soyad']; ?>" /></th>
                    </tr>
                    
                    <tr>
                    <th colspan="4"></th>
                    <th colspan="4">Tc</th>
                    <th colspan="4" style="text-align:left;"><input name="tc" type="text" value="<?php echo $dizi['tc']; ?>" /></th>
                    </tr>
                    
                    <tr>
                    <th colspan="4"></th>
                    <th colspan="4">Meslek</th>
                    <th colspan="4" style="text-align:left;"><input name="meslek" type="text" value="<?php echo $dizi['meslek']; ?>" /></th>
                    </tr>
                    
                    <tr>
                    <th colspan="4"></th>
                    <th colspan="4">Aidat</th>
                    <th colspan="4" style="text-align:left;"><input name="aidat" type="text" value="<?php echo $dizi['aidat']; ?>" /></th>
                    </tr>
                    
                    <tr>
                    <th colspan="4"></th>
                    <th colspan="4">Yetki</th>
                    <th colspan="4" style="text-align:left;">
                    <select name="yetki">
  <?php
                     if($dizi["yetki"] == 1){
                      echo '
                      <option selected value="1">Normal</option>
                      <option value="2">Özel</option>
                      <option value="3">Vip</option>
                      ';
                     }
                     else if($dizi["yetki"] == 2){
                      echo '
                      <option value="1">Normal</option>
                      <option selected value="2">Özel</option>
                      <option value="3">Vip</option>
                      ';
                     }
                     else if($dizi["yetki"] == 3){
                      echo '
                      <option value="1">Normal</option>
                      <option value="2">Özel</option>
                      <option selected value="3">Vip</option>
                      ';
                     }
  ?>
                    </select></th>
                    </tr>
                    
                      <tr>
                        <input type="hidden" name="id" value="<?php echo $dizi['id'] ?>">
                    <th colspan="12"><input type="submit" name="ffbuton" class="btn btn-success" value="GÜNCELLE" /></th>
  
                    </tr>
                    
                    </tbody>
                    
                    
              </table>
            </form>
  
  <?php
             }
        }

      }

    }

    /* Ara */
    public static function ara ($gelen_db){

      $kriter = $_POST["kriter"];
      $ara = $_POST["ara"];

      if($kriter == "aidat"){
        $sorgu = "SELECT * FROM kisisel WHERE $kriter=$ara";
      }else{
        $sorgu = "SELECT * FROM kisisel WHERE $kriter LIKE '%$ara%'";
      }

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
        echo '
          <div class="container">
              <h2>ÜYELER</h2>
                <a href="index.php">ANASAYFA</a>
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

          ';
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
        echo '
        
        </tbody>
        </table>
        <div>
          <a href="index.php?islem=ekle" class="btn btn-success">Yeni Kayıt Ekle</a>
        </div>
       </div>

        ';
        $gelen_db->close();
      }

    }





}
?>