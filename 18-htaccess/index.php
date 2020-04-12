<!--Eğer base olmazsa blogların içine girdikten sonra tekrar anasayfaya dönemiyoruz-->
<!--Yani adres çubuğunda bir ana dizine dönemiyoruz-->
<base href="http://localhost/php/18-htaccess/" >


<a href="./">Ana Sayfa</a>
<a href="blog">Blog</a>
<a href="hakkimda">Hakkımda</a>
<a href="iletisim">İletişim</a>
<a href="helper/yardim">Yardım</a>



<div style="background-color:lightgray;">
    <?php

    if (isset($_GET["sayfa"])){

        echo "sayfa=" . $_GET["sayfa"];

        switch ($_GET["sayfa"]){
            case "index":
                echo "aaaaaaa";
                echo "<a href='./'>Anasayfaya git</a>";
                break;

            case "hakkimda":
                require_once "hakkimda.php";
                break;

            case "iletisim":
                require_once "iletisim.php";
                break;

            case "blog":
                require_once "blog.php";
                break;
            case "helper/yardim":
                require_once "helper/yardım.php";
                break;
        }
    }
    else{
        //TÜRKÇE KARAKTER VE BOŞLUKLAR İÇİN GÜZEL BİR FONKSİYON
        function seo($s) {
            $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',');
            $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','');
            $s = str_replace($tr,$eng,$s);
            $s = strtolower($s);
            $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
            $s = preg_replace('/\s+/', '-', $s);
            $s = preg_replace('|-+|', '-', $s);
            $s = preg_replace('/#/', '', $s);
            $s = str_replace('.', '', $s);
            $s = trim($s, '-');
            return $s;
        }

        echo "Ana Sayfa";
        echo "<div style='background-color: burlywood; width: 200px; height: 200px;color:darkred'>";
        echo "<br>-YAZILARIM-";
        echo "<br> <br> <a href='blog/1/".seo("Merhaba Blog")."' style='color:darkgreen;'>1) Merhaba Blog<a/>";
        echo "<br> <br> <a href='blog/2/".seo("Arduino İle")."' style='color:darkgreen;'>2)Arduino İle<a/>";
        echo "<br> <br> <a href='blog/3/".seo("Evde linux sunucu")."' style='color:darkgreen;'>3)Evde linux sunucu<a/>";
        echo "</div>";
    }




    ?>
</div>