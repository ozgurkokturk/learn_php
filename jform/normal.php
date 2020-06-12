<html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>

    <script>
        // wait for the DOM to be loaded
        $(document).ready(function() {
            // bind 'myForm' and provide a simple callback function
            $('#gonder').click(function () {

                var veri=$('#myForm').serialize()
                $.ajax({url: "islem.php",data:veri, success: function(result){

                    }});


            })
        });
    </script>
</head>
<body>
<form id="myForm" action="islem.php" method="post">
    Name: <input type="text" name="name" />
    Comment: <textarea name="comment"></textarea>
    <input type="file" name="dosya">
    <input type="submit" id="gonder" value="Submit Comment" />
</form>
</body>
</html>

