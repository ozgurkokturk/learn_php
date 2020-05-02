$(document).ready(function () {
    $(".deleteContent").click(function (e) {
        const hrefValue = $(this).attr("href");
        const id = $(this).attr("data-id");
        console.log(hrefValue);
        console.log(id);

        if(confirm("Yazıyı kalıcı olarak silmek istiyor musun?")){
            //Ajax'ın kısa hali ve GET method
            $.get(hrefValue,function (response) {
                console.log(response);
                if(response == "true"){
                    $("[data-id='"+id+"']").hide("slow");
                }else if(response == "false"){
                    alert("Yazı silinemedi bir hata var!");
                }else{
                    alert("ne true ne false döndü!");
                }

            });
        }
        e.preventDefault();
    });


});