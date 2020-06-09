<html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script>
        // wait for the DOM to be loaded
        $(document).ready(function() {

            function validate(formData, jqForm, options) {
                var durum=1;

                jqForm.find('.zorunlu').each(function(){
                    var eleman=$(this);
                    var deger=eleman.val();

                    if (deger=="" || deger=="0" || deger==null)
                    {
                        durum=0;
                    }
                })

                //elemanları pasif ediyoruz
                if(durum==1) { alert('elemanlar tamam') }
                else
                {
                    alert('Lütfen doldurulması gereken alanları boş bırakmayınız.');
                    return false;
                }
            }

            var options = {
                url: 'upload.php',
                dataType: 'json',
                method: 'POST',
                beforeSerialize: function($form, options) {
                    alert('başlıyor');
                },
                beforeSubmit: validate,
                success:    function() {
                    alert('Tamam!');
                }
            };

            jQuery('.ajaxform').ajaxForm(options);//json
        });
    </script>
</head>
<body>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <form id="myForm" method="post" enctype="multipart/form-data">
                <input type="file" name="dosya" class="zorunlu"> <br> <br>
                <div class="progress" style="width: 30vh">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 40%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                        %40
                    </div>
                </div>
                <br> <br>
                <input type="submit" value="Yükle" />
            </form>
        </div>
    </div>
</div>
</body>
</html>

