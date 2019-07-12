$(document).ready(function () {

    //CARREGA IMAGENS
    for(var i = 1; i < 11; i++) {
        var identifier = ".sticker[id=" + i + "]";
        var img_path = "../resources/imgs/cardsP/1/" + i + ".jpeg";
        $(identifier).html("<img src='" + img_path + "'>");
    }

    var idFigura;
    //COLA FIGURINHA
    $(".sticker").click(function (e) { //Clique no espaço da figura
        e.preventDefault();
        e.stopPropagation();
        modal($(this).attr('id'));
    })

    function modal(id) { //Abre o modal
        //Aqui vai ter criação do modal e setar o evento onClick do botão salvar
        //do modal, para chamar a função do ajax
        $('.modal-wrapper').removeClass('hidden');
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
                alert(info);
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
                alert(info);
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