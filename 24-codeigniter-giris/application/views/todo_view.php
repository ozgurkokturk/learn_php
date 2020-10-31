<?php
// Veriler geliyor mu diye kontrol etmek için idi burası.
// print_r($todolar);
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List Projesi Codeigniter</title>

    <link rel="stylesheet" href="<?php echo base_url("htmlassets/css/bootstrap.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("htmlassets/css/switchery.css"); ?>">

</head>
<body>

<div class="container mt-3">
    <h3 class="text-center">Codeigniter Todo List Projesi</h3>

    <div class="row mb-2 mt-4">
        <div class="col-md-12">

            <form action="<?php echo base_url('todo_controller/insert') ?>" method="post">
                <div class="form-row">

                    <div class="form-group col-md-10">
                        <input type="text" class="form-control" name="todo_adi">
                    </div>

                    <div class="form-group col-md-2">
                        <button class="btn btn-primary form-control">Kaydet</button>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <div class="row">
        <div class="col-md-10">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <th>Yapılacaklar</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                </thead>
                <tbody>
                <?php foreach ($todolar as $todocuk): ?>
                    <tr>
                        <td> <?php echo $todocuk->title; ?> </td>
                        <td style=" width: 20%">
                            <input type="checkbox" class="js-switch"
                                <?php echo ($todocuk->isCompleted) ? "checked" : ""; ?>
                                data-url="<?php echo base_url("todo_controller/isCompletedSetter/$todocuk->id"); ?>"
                            />
                        </td>
                        <td style="width: 10%">
                            <a href="<?php echo base_url("todo_controller/delete/$todocuk->id") ?>" class="btn btn-danger">Sil</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="<?php echo base_url("htmlassets/js/bootstrap.js") ?>"></script>
<script src="<?php echo base_url("htmlassets/js/switchery.js") ?>"></script>
<script src="<?php echo base_url("htmlassets/js/costum.js") ?>"></script>
</body>
</html>