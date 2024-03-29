$(document).ready(function () {
    var form_Data;
    $("#input-image").on("change", function () {
        if(this.files[0].size > 446609){
            alert("Imagem é muito grande!");
            this.value = "";
        }
    });
    $(".login-form").submit(function(e) {
        e.preventDefault();
        form_Data = new FormData();
        formfiles = document.querySelector('#input-image');
        form_Data.append("name", $("input[name=name]").val());
        form_Data.append("email", $("input[name=email]").val());
        form_Data.append("path", formfiles.files[0]);
        form_Data.append("pass", $("input[name=pass]").val());
        
        $.ajax({
            url: './php/controllers/cr_register.php', // Url do lado server que vai receber o arquivo
            data: form_Data,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (info) {
                if(info == 'Não foi possível fazer o registro!' || info == "Usuário já cadastrado!"){
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
    });

    function detectaUpload(){
        $('input[type=file]').each(function(index){
            if ($('input[type=file]').eq(index).val() != ""){
                $('.fake-input-div').toggleClass('fake-input-div-active');
                $('.fake-input-div').html("Imagem selecionada.");
            }
        });
    }

    $('input[type=file]').on("change", function(){
        detectaUpload();
    });
});