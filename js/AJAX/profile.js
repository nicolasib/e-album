$(document).ready(function () {

    var clicked;
    $("button").on("click", function () {
        clicked = $(this).attr('id');
    })

    $("#user-image").on("change", function () {
        var form_Data = new FormData();
        var formfiles = document.querySelector('#user-image');
        form_Data.append("path", formfiles.files[0]);

        $.ajax({
            url: './php/controllers/cr_preview.php', // Url do lado server que vai receber o arquivo
            data: form_Data,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (info) {
                alert(info);
                $("#image-preview").attr("src", info);
            },
            error: function (exr, sender) {
                alert('Erro ao carregar pagina');
            }
        });
    })

    var form_Data;
    $(".form-update").submit(function(e) {
        e.preventDefault();
        if (clicked == "0") {
            $.ajax({
                url: './php/controllers/cr_delete.php', // Url do lado server que vai receber o arquivo
                data: {},
                type: 'POST',
                success: function (info) {
                    if(info == 'Não foi possível deletar!'){
                        $('.register-erro').html(info);
                    }else{
                        window.location.assign("./php/controllers/cr_logout.php");
                    }
                },
                error: function (exr, sender) {
                    alert('Erro ao carregar pagina');
                }
            });
        } else {
            
        }
    });
});