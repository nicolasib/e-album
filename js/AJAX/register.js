$(document).ready(function () {
    var formData;
    
    $(".login-form").submit(function(e) {
        e.preventDefault();
        formData = new FormData(this);
        
        $.ajax({
            url: './php/controllers/register.php', // Url do lado server que vai receber o arquivo
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (info) {
                if(info == 'Não foi possível fazer o registro!'){
                    $('.register-erro').html(info);
                }else{
                    var data = JSON.parse(info);
                    window.location.assign("./php/controllers/login.php?login="+data.name+"&pass="+data.pass);
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