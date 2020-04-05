<?php

require "sil.php";


?>

<!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
        <script src="js/jquery-3.4.1.min.js"></script>
        <title>Jquery dinamik silme</title>


     <script>
         $(document).ready(function () {

             /* .sil Tıklandığında POST İşlemi Yap */
             $(".sil").click(function () {
                const id = $(this).data("id");
                const url = "sil.php";
                const theDiv = $(this).parents("#theDiv");

                const veri = {
                    p : "remove",
                    id : id
                }

                $.post(url,veri, function (response) {
                    if(response == true){
                        theDiv.fadeOut();
                    }else{
                        alert("hataaa");
                    }
                });

            });



             /* Toplu Silme İşlemi İçin */
             // 1. Tüm checkboxları seç ama idsi şu olan
             $("#sec").click(function () {
                 // kendim buldum bu kodu sadece id'si benim verdiğim checkboxlar işaretleniyor
                 $("input[id='myCheckboxes']").prop("checked",true);
             });

             // 2. Tüm checkboxları kaldır
             $("#kaldir").click(function () {
                 $("input[id='myCheckboxes']").prop("checked",false);
             });

             // 3. Seçili olan checkboxların yanındaki sil butonuna click edilmiş olmasını sağla
             $("#sil").click(function () {
                 $("input[id='myCheckboxes']:checked").each(function () {
                     $(this).prev().trigger("click");
                 });
             });

         });
    </script>

	<style>
	
	.arkaplan {
	background-color: #E0DDDD;
	border-radius: 5px;
	border:1px solid #C4C0C0;
	
	
	
	}
	#theDiv {
	background-color: #F9F8F8;
		border:1px solid #C4C0C0;
	}
	input[type=checkbox] {
	width: 20px;
	height: 20px;
	
	
	}	
	
	</style>
    </head>
	<body>
    <input type="checkbox" class="ml-4"><input type="checkbox" class="ml-4"><input type="checkbox" class="ml-4">
<div class="container" >
    <div class="row text-center ">
	
		<div class="col-lg-5 mx-auto arkaplan mt-3">
		
            <div class="row mt-2  text-center text-dark bg-warning m-2">
                <div class="col-lg-12 pt-2"><h4>KAYITLAR</h4></div>
            </div>


				<div class="row mt-2  text-center text-dark m-2">
                    <div class="col-lg-4"><input type="button" id="sec" class="btn btn-success btn-sm btn-block" value="Tümünü Seç"></div>
                    <div class="col-lg-4"><input type="button" id="kaldir" class="btn btn-success btn-sm btn-block" value="Seçileni Kaldır"></div>
                    <div class="col-lg-4"><input type="button" id="sil" class="btn btn-dark btn-sm btn-block" value="Seçilileri Sil"></div>
				</div>

            <?php

                $query = $db->query("SELECT * FROM products", PDO::FETCH_OBJ)->fetchAll();
                foreach ($query as $val){
                    echo '
                     <div class="row  text-center text-dark m-2 p-2" id="theDiv">
                     
                        <div class="col-lg-8 pt-2 ">'. $val->product_name .'</div>
                        <div class="col-lg-4 ">
                             <a  data-id="'. $val->id .'" href="#" class="btn ml-2 btn-danger  sil">Sil</a>	
                             <input type="checkbox" class="ml-4" id="myCheckboxes">
                         </div>
                      
                    </div>
                    ';
                }
            ?>

			

			
		<div id="sonucgor"></div>
		
		</div>
		

	</div>
</div>

</body>
</html>

   


	