$(document).ready(function () {

    $("#entryForm").submit(function (e) {

        const data = $(this).serializeArray();
        const url = $(this).attr("action");

        $.ajax({
            type : "POST",
            url : url,
            dataType: "JSON",
            data : $(this).serializeArray(),
            success: function (response) {
                if(response.state == "true"){
                    $.growl.notice({  title:"Durum", message: response['message'] });
                    setTimeout(function() { document.location.href = response['newUrl']; }, 2000 );

                    //butonu pasif yaptım sürekli post işlemi tekrarlanmasın basan olursa..
                    $("#entryBtn").prop("disabled",true);

                }else if (response.state == "false"){
                    $.growl.error({  title:"Durum", message: response['message'] });
                }
                else{
                    alert(response)
                }

            },
            error: function (response) {
                alert(response);
            }

        });

        e.preventDefault();
    });


});