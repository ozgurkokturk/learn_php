<html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script>
        $(document).ready(function() {

            $("#myForm").submit(function (event) {

                var options = {
                    url: 'upload.php',
                    method: 'POST',
                    target: $(".targetLayer"),
                    beforeSubmit: function () {
                        $(".progress").show();
                        $(".progress-bar").width('%0');
                    },
                    uploadProgress: function(event,position,total,percentComplete){
                        $(".progress-bar").width(percentComplete + '%');
                        $(".progress-bar").html(percentComplete + '%');
                    },
                    complete: function(cevap) {
                        $(".targetLayer").show();
                    },
                    resetForm: true
                };

                // bu kontrolü sağlamazsak dosya seçmeden butona basınca da progress çalışıyo :S
                if($(".dosya").val()){
                    event.preventDefault();
                    $("#myForm").ajaxSubmit(options);
                }

                return false;
            });
        });
    </script>
</head>

<body>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">

            <form id="myForm" method="post" enctype="multipart/form-data">
                <input type="file" name="dosya" class="dosya"> <br> <br>
                <div class="progress" style="width: 30vh; display: none;">
                    <div class="progress-bar progress-bar-striped" role="progressbar">

                    </div>
                </div>
                <br> <br>
                <input type="submit" value="Yükle" />
            </form>
            <div class="targetLayer" style="display: none;"></div>

        </div>
    </div>
</div>
</body>
</html>

