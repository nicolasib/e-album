$(document).ready(function () {

    //CARREGA IMAGENS
    for(var i = 1; i < 11; i++) {
        var identifier = ".sticker[id=" + i + "]";
        var img_path = "../resources/imgs/cardsP/1/" + i + ".jpeg";
        $(identifier).html("<img src='" + img_path + "' class='player-disabled'>")
    }

    //COLA FIGURINHA
    $(".sticker").on("click", function () { //Clique no espaço da figura
        modal($(this).attr('id'));
    })

    function modal(id) { //Abre o modal
        //Aqui vai ter criação do modal e setar o evento onClick do botão salvar
        //do modal, para chamar a função do ajax
        if($("[#" + id + "]").attr('class') == "player-disabled") //Cola Card
            saveCard(id);
        else //Descola Card
            deleteCard(id);
    }

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
    
})