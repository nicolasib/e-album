$(document).ready(function () {
    var form_Data;
    $(".login-form").submit(function(e) {
        e.preventDefault();
        var login = $('input[name=name]').val();
        var pass = $('input[name=pass]').val();
        
        $.ajax({
            url: './php/controllers/login.php', // Url do lado server que vai receber o arquivo
            data: {login: login, pass: pass},
            type: 'POST',
            success: function (info) {
                if(info == 'Email ou senha errado!'){
                    $('.register-erro').html(info);
                }else{
                    window.location.assign("./album.html");
                }
            },
            error: function (exr, sender) {
                alert('Erro ao carregar pagina');
            }
        });
    });
});