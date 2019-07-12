$(document).ready(function () {

    //PREVIEW
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
                $("#image-preview").attr("src", info);
            },
            error: function (exr, sender) {
                alert('Erro ao carregar pagina');
            }
        });
    })

    //DIFERENCIA BUTTONS
    var clicked;
    $("button").on("click", function () {
        clicked = $(this).attr('id');
    });

    var form_Data;
    $(".form-update").submit(function(e) {
        e.preventDefault();
        //DELETE
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
        //UPDATE
        } else {
            var form_Data = new FormData();
            var formfiles = document.querySelector('#user-image');
            form_Data.append("name", $("input[name=name]").val());
            form_Data.append("email", $("input[name=email]").val());
            form_Data.append("path", formfiles.files[0]);
            form_Data.append("pass", $("input[name=pass]").val());
            
            $.ajax({
                url: './php/controllers/cr_update.php', // Url do lado server que vai receber o arquivo
                data: form_Data,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (info) {
                    if(info == "Não foi possível fazer a(s) alteração(ões)!" || info == "Informações já pertencem a um usuário cadastrado!"){
                        $('.register-erro').html(info);
                    }else{
                        var resultado = info.split(";")
                        window.location.assign("./php/controllers/cr_login.php?login="+resultado[0]+"&pass="+resultado[1]);
                    }
                },
                error: function (exr, sender) {
                    alert('Erro ao carregar pagina');
                }
            });
        }
    });
});