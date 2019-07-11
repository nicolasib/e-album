$(document).ready(function () {
    var form_Data;
    $(".login-form").submit(function(e) {

        e.preventDefault();
        form_Data = new FormData();
        form_Data.append("name", $("input[name=name]").val());
        form_Data.append("pass", $("input[name=pass]").val());
        
        $.ajax({
            url: './php/controllers/login.php', // Url do lado server que vai receber o arquivo
            data: form_Data,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (info) {
                if(info == 'Email ou senha errado!'){
                    $('.register-erro').html(info);
                }else if(info == 1){
                    window.location.assign("./album.html");
                }
            },
            error: function (exr, sender) {
                alert('Erro ao carregar pagina');
            }
        });
    });
});