
/*
    jQUERY ile post ettiğimizde
        Array
        (
            [dosyaAdı] => AAAA
        )
    PHP ile post ettğimizde
        Array
        (
            [dosyaAdı] => AAAA
            [sendFile] => Yükle
        )

        böyle bir fark var. butonun name değeri post edilmiyor
 */
$(document).ready(function () {

    $("[name='myForm']").submit(function (e) {
        e.preventDefault();

        const formUrl = $(this).attr("action");

        $.ajax({
            url: 'upload.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            cache: false,
            success: function (response) {
                console.log(response);
                $("#myDiv").html(response);
            }
        });


    });

});

