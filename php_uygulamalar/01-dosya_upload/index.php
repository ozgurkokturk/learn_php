<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Form Uygulamaları</h2>
<h3>Dosya upload işlemi </h3>
<hr />
<form action="yukle.php" method="post" enctype="multipart/form-data">
    <input type="file" name="dosya" />
    <input type="submit" name="gonder" value="Yükle" />
</form>

</body>
</html>