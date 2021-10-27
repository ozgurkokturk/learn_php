<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        div{
            display: flex;
            flex-direction: column;
            justify-content: center;
            border: 1px solid  black;
            width: 30vw;
            padding: 20px;
        }
        span{
            font-weight: bold;
            margin-bottom: 3px;
        }
        input[type=submit]{
            height: 80px;
            margin: 10px;
            background-color: #605e5e;
            color: whitesmoke;
            border-radius: 10px;
        }
    </style>
</head>
<body>


<form action="islemler.php" method="post">
    <div>
        <span>Başlık: </span><input type="text" name="baslik"> <br>

        <span>Doküman No: </span><input type="text" name="dokumanNo">               <br>
        <span>İlk Yayın Tarihi: </span><input type="text" name="ilkYayınTarihi">    <br>
        <span>Revizyon Tarihi: </span><input type="text" name="revizyonTarihi">     <br>
        <span>Revizyon No: </span><input type="text" name="revizyonNo">             <br>

        <span>Hazırlayan: </span><input type="text" name="hazirlayan">              <br>
        <span>Sistem Onayı: </span><input type="text" name="sistemOnayi">           <br>
        <span>Yürürlük Onayı: </span><input type="text" name="yururlukOnayi" value="Prof. Dr. Bülent ŞENGÖRÜR" readonly>       <br>

        <input type="submit" value="Dosyayı Oluştur">
    </div>
</form>


</body>
</html>




