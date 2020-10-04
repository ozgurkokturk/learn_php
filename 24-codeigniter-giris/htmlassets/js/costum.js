$(document).ready(function () {

    $(".js-switch").each(function () {
        new Switchery(this);
    })

    $(".js-switch").on("change",function (e) {

        let data ={
            complatedDurumu: $(this).prop("checked")
        };
        let url = $(this).data("url");

        // console.log(url);
        // $.post(url,{completed:complatedDurumu},function (e) {
        //     alert(e);
        // });

        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function (response) {
                console.log(response);
            },error: function (response) {
                alert(response);
            }

        });

        e.preventDefault();
    })


});