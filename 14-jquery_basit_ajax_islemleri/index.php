<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jquey-Ajax-Simple</title>
    <script src="js/jquery-3.4.1.min.js"> </script>
<!--    src dosyasını önce tanımlamak lazım yoksa jquery kodları çalışmıyor-->

<!--    form ajax ile post için-->
    <script>
        $(document).ready(function () {
            $("#btn").click(function () {

                $.ajax({
                    type: "POST",
                    url: "islemler.php?islem=form",
                    data: $("#myForm").serialize(),
                    success: function (donen_veri) {
                        $("#form_answer").html(donen_veri).show();

                        //inputları temizlemek için trigger
                        $("#myForm").trigger("reset");
                    }
                });

            });
        });
    </script>


<!--    link direkt postu için-->
    <script>
        $(document).ready(function () {
            $("#linkler a").click(function () {
                let icerik = $(this).attr("identifier");

                $.post(
                    "islemler.php?islem=link",
                    {"urunAdi":icerik},
                    function (donen_veri) {
                        $("#link_answer").html(donen_veri);

                    }
                );
            })
        });

    </script>

</head>
<body>


<div style="background-color:#F4F4F4;text-align: center; margin:10px;padding:10px;">
    ***** form kullanarak verileri islemler.php sayfasına post etme işlemi ***** <br><br><br>
    <form id="myForm">
        <input type="text" name="val1"> <br> <br>
        <input type="text" name="val2"> <br> <br>
        <input type="button" id="btn" name="buton" value="Aktar">
    </form>


    <br><br>
    <label for="">This area for answer</label>
    <div id="form_answer" style="width: 200px; height: 100px; border: 1px solid darkred;margin:0 auto; padding: 10px;color:#258b17;">

    </div>

</div>

<!------------------------------------------------------>
<!------------------------------------------------------>
<!------------------------------------------------------>

<div style="background-color:papayawhip;text-align: center; margin:10px;padding:10px;">
    ***** link kullanarak verileri islemler.php sayfasına post etme işlemi ***** <br><br><br>

    <div id="linkler">
        <a identifier="Lenovo Laptop"> . . . . . . . . . .İkinci Laptopum . . . . . . . . . .</a> <br><br>
        <a identifier="Acer Laptop"> . . . . . . . . . .İlk Laptopum . . . . . . . . . .</a>
    </div>


    <br><br>
    <label for="">This area for answer</label>
    <div id="link_answer" style="width: 200px; height: 100px; border: 1px solid darkred;margin:0 auto; padding: 10px;color:#258b17;">

    </div>

</div>


</body>
</html>