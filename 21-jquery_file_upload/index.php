<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JQuery File Uploader</title>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>    <script src="ajax_file_uploader.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>
<body>


<h2>Form Uygulamaları</h2>
<h3>Dosya upload işlemi </h3>
<hr />
<form action="upload.php" method="post" name="myForm" enctype="multipart/form-data">
    <input type="text" name="dosyaAdı">
    <input type="file" name="dosya" required/> <br><br>
    <input type="submit" name="sendFile" value="Yükle" />
</form>


<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div id="myDiv" style="width: 800px;height: 300px;  border:1px solid black;">
                image will come
            </div>
        </div>
    </div>
</div>


</body>
</html>