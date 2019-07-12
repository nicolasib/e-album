$(document).ready(function () {

    var team = 1;
    $.ajax({
        url: './php/controllers/cr_album.php', // Url do lado server que vai receber o arquivo
        data: {team: team},
        type: 'POST',
        success: function (info) {
            if(info) {
                var estados = info.split(';');
                //CARREGA IMAGENS
                for(var i = 0; i < 10; i++) {
                    var identifier = ".sticker[id=" + (i+1) + "]";
                    var img_path = "../resources/imgs/cardsP/1/" + (i+1) + ".jpeg";
                    $(identifier).html("<img src='" + img_path + "'>");
                    if (Number(estados[i]) == 1)
                        $(identifier).addClass("player-enabled");
                    else 
                        $(identifier).addClass("player-disabled");
                }
            }
            else {
                alert("Erro ao acessar banco de figurinhas!");
            }
        },
        error: function (exr, sender) {
            alert('Erro ao carregar pagina');
        }
    });

    var idFigura;
    //COLA FIGURINHA
    $(".sticker").click(function (e) { //Clique no espaço da figura
        e.preventDefault();
        e.stopPropagation();
        modal($(this).attr('id'), $(this).attr('class'));
    })

    function modal(id, classe) { //Abre o modal
        //Aqui vai ter criação do modal e setar o evento onClick do botão salvar
        //do modal, para chamar a função do ajax
        $('.modal-wrapper').removeClass('hidden');
        if(classe.match(/player-disabled/)){
            $('.modal-title').html('Tem certeza que deseja colar?');
        }else{
            $('.modal-title').html('Tem certeza que deseja descolar?');
        }
        idFigura = id;
    }

    $('.modal-submit').click(function(e){
        e.preventDefault();
        if($("#" + idFigura).attr('class').match(/player-disabled/)){
            saveCard(idFigura);
            destroyModal(e);
        } //Cola Card
        else{
            deleteCard(idFigura);
            destroyModal(e);
        } //Descola Card
    });

    $('.modal-cancel').click(function(e){
        destroyModal(e);
    })

    function saveCard(id) {
        $.ajax({
            url: './php/controllers/cr_save_card.php', // Url do lado server que vai receber o arquivo
            data: {id: id},
            type: 'POST',
            success: function (info) {
                if(info) {
                    $("#" + idFigura).removeClass("player-disabled");
                    $("#" + idFigura).addClass("player-enabled");
                }
                else {
                    alert("Erro ao acessar banco de figurinhas!");
                }
            },
            error: function (exr, sender) {
                alert('Erro ao carregar pagina');
            }
        });
    }

    function deleteCard(id) {
        $.ajax({
            url: './php/controllers/cr_delete_card.php', // Url do lado server que vai receber o arquivo
            data: {id: id},
            type: 'POST',
            success: function (info) {
                if(info) {
                    $("#" + idFigura).removeClass("player-enabled")
                    $("#" + idFigura).addClass("player-disabled")
                }
                else {
                    alert("Erro ao acessar banco de figurinhas!");
                }
            },
            error: function (exr, sender) {
                alert('Erro ao carregar pagina');
            }
        });
    }
    
    $(".modal-background").click(function(e){
        destroyModal(e);
    })

    function destroyModal(e){
        e.preventDefault();
        e.stopPropagation();
        $('.modal-wrapper').addClass('hidden');
    }
})