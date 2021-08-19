<?php

?>

<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>



    <link rel="stylesheet" type="text/css" href="assets/datatables.min.css"/>

    <script type="text/javascript" src="assets/datatables.min.js"></script>

    <style>
        a.butonum{
            text-decoration: none;
        }
        a.butonum:hover {
            text-decoration: underline;
            color: black;
        }
        table td{
            text-align: center;
        }
    </style>

</head>
<body>

<h1 style="text-align: center;">Excelleri İndir</h1>
<div style="background: #eeee; display: flex; justify-content: space-between">

    <div style="width: 47%;">
        <h2 style="text-align: center;">Personel</h2>
        <table class="myTable"  align="center" border="1">
            <thead>
            <tr>
                <th>İd</th>
                <th>Başlık</th>
                <th>Eklenme tarihi</th>
                <th>İşlemler</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $dosyalar = glob("dosyalar/*.xlsx");
                //print_r($dosyalar);
                $sayi = 1;
                foreach ($dosyalar as $dosya){
                    echo '
                         <tr>
                            <td>'.$sayi++.'</td>
                            <td>Personel</td>            
                            <td>'.explode(".", explode("-", $dosya)[2])[0].'</td>
                            <td><a href="'.$dosya.'" class="butonum">indir</a></td>
                        </tr>
                    
                    ';
                }
            ?>
            </tbody>
        </table>
    </div>


    <div style="width: 47%;">
        <table class="myTable" border="1">
            <thead>
            <tr>
                <th>İd</th>
                <th>Başlık</th>
                <th>Açıklama</th>
                <th>Eklenme tarihi</th>
                <th>İşlemler</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1111</td>
                <td>Php dersleri</td>
                <td>Php dersleri açıklaması burada olacak</td>
                <td>13.09.2017</td>
                <td><button>indir</button></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Javascript dersleri</td>
                <td>Javascript dersleri açıklaması burada olacak</td>
                <td>13.09.2017</td>
                <td><button>indir</button></td>
            </tr>
            <tr>
                <td>3</td>
                <td>C# dersleri</td>
                <td>C# dersleri açıklaması burada olacak</td>
                <td>13.09.2017</td>
                <td><button>indir</button></td>
            </tr>
            <tr>
                <td>3</td>
                <td>C# dersleri</td>
                <td>C# dersleri açıklaması burada olacak</td>
                <td>13.09.2017</td>
                <td><button>indir</button></td>
            </tr>     <tr>
                <td>3</td>
                <td>C# dersleri</td>
                <td>C# dersleri açıklaması burada olacak</td>
                <td>13.09.2017</td>
                <td><button>indir</button></td>
            </tr>     <tr>
                <td>3</td>
                <td>C# dersleri</td>
                <td>C# dersleri açıklaması burada olacak</td>
                <td>13.09.2017</td>
                <td><button>indir</button></td>
            </tr>     <tr>
                <td>3</td>
                <td>C# dersleri</td>
                <td>C# dersleri açıklaması burada olacak</td>
                <td>13.09.2017</td>
                <td><button>indir</button></td>
            </tr>     <tr>
                <td>3</td>
                <td>C# dersleri</td>
                <td>C# dersleri açıklaması burada olacak</td>
                <td>13.09.2017</td>
                <td><button>indir</button></td>
            </tr>     <tr>
                <td>3</td>
                <td>C# dersleri</td>
                <td>C# dersleri açıklaması burada olacak</td>
                <td>13.09.2017</td>
                <td><button>indir</button></td>
            </tr>     <tr>
                <td>3</td>
                <td>C# dersleri</td>
                <td>C# dersleri açıklaması burada olacak</td>
                <td>13.09.2017</td>
                <td><button>indir</button></td>
            </tr>     <tr>
                <td>3</td>
                <td>C# dersleri</td>
                <td>C# dersleri açıklaması burada olacak</td>
                <td>13.09.2017</td>
                <td><button>indir</button></td>
            </tr>     <tr>
                <td>3</td>
                <td>C# dersleri</td>
                <td>C# dersleri açıklaması burada olacak</td>
                <td>13.09.2017</td>
                <td><button>indir</button></td>
            </tr>     <tr>
                <td>3</td>
                <td>C# dersleri</td>
                <td>C# dersleri açıklaması burada olacak</td>
                <td>13.09.2017</td>
                <td><button>indir</button></td>
            </tr>     <tr>
                <td>3</td>
                <td>C# dersleri</td>
                <td>C# dersleri açıklaması burada olacak</td>
                <td>13.09.2017</td>
                <td><button>indir</button></td>
            </tr>     <tr>
                <td>3</td>
                <td>C# dersleri</td>
                <td>C# dersleri açıklaması burada olacak</td>
                <td>13.09.2017</td>
                <td><button>indir</button></td>
            </tr>     <tr>
                <td>3</td>
                <td>C# dersleri</td>
                <td>C# dersleri açıklaması burada olacak</td>
                <td>13.09.2017</td>
                <td><button>indir</button></td>
            </tr>     <tr>
                <td>3</td>
                <td>C# dersleri</td>
                <td>C# dersleri açıklaasdasdasdasdması burada olacak</td>
                <td>13.09.2017</td>
                <td><button>indir</button></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Java dersleri</td>
                <td>Java dersleri açıklaması burada olacak</td>
                <td>13.09.2017</td>
                <td><button>indir</button></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready( function () {
        $('.myTable').DataTable();
    } );
</script>

</body>
</html>
