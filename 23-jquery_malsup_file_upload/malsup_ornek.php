<html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>

    <script>
        // wait for the DOM to be loaded
        $(document).ready(function() {

            function validate(formData, jqForm, options) {
                var durum=1;

                jqForm.find('.zorunlu').each(function(){
                    var eleman = $(this);
                    var deger = eleman.val();

                    if (deger == "" || deger == "0" || deger == null)
                    {
                        durum=0;
                    }
                })

                //elemanları pasif ediyoruz
                if(durum == 1) { alert('elemanlar tamam') }
                else
                {
                    alert('Lütfen doldurulması gereken alanları boş bırakmayınız.');
                    return false;
                }
            }

            var options = {
                url: 'islem.php',
                dataType: 'json',
                method: 'POST',
                beforeSerialize: function($form, options) {
                    alert('başlıyor');
                },
                beforeSubmit: validate,
                complete: function(response) {
                    alert(response.responseText);
                }
            };

		/*	$('#myform').submit(function(){
				
				$(this).ajaxsubmit(options); 
				
				return false;
			});
		*/
            $('.ajaxform').ajaxForm(options);//json
        });
    </script>
</head>
<body>
<form id="myForm" method="post" class="ajaxform" enctype="multipart/form-data">
    Name: <input type="text" name="name" class="zorunlu" />
    Comment: <textarea name="comment"></textarea>
    <input type="file" name="dosya">
    <input type="submit" value="Submit Comment" />
</form>
</body>
</html>

