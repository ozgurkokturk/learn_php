<?php 
if(isset($_GET["tercih"])){
   if($_GET["tercih"] == "belirle"){
      setcookie("gosterLimit", $_GET["limit"]);
   }
}
?>