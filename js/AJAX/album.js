$(document).ready(function () {

    $('.collapsed-wrapper').css("top", "-="+screen.height);

    var profileImage = new Image();

    profileImage.src = $('.profile-img > img').attr('src');

    if(profileImage.naturalHeight < profileImage.naturalWidth){
        $('.profile-img > img').css("max-height", "100%");
        $('.profile-img > img').css("left", "50%");
        $('.profile-img > img').css("transform", "translate(-50%, 0)");
    }else{
        $('.profile-img > img').css("max-width", "100%");
        $('.profile-img > img').css("top", "50%");
        $('.profile-img > img').css("transform", "translate(0, -50%)");
    }


    if(screen.width <= 940){
        $('.side-menu').addClass('hidden');
        $('.collapsed-menu').removeClass('hidden');
    }else{
        $('.side-menu').removeClass('hidden');
        $('.collapsed-menu').addClass('hidden');
    }

    $(window).resize(function(){
        if(screen.width <= 940){
            $('.side-menu').addClass('hidden');
            $('.collapsed-menu').removeClass('hidden');
        }else{
            $('.side-menu').removeClass('hidden');
            $('.collapsed-menu').addClass('hidden');
        }
    });

    $('.hamburger-menu').click(function(e){
        e.preventDefault();
        $('.collapsed-wrapper').animate({top: "0"}, 100, "swing");
    });

    $('.close-collapsed').click(function(e){
        e.preventDefault();
        $('.collapsed-wrapper').animate({top: "-"+screen.height}, 100, "swing");
    })



    var singer = 1;
    $.ajax({
        url: './php/controllers/cr_album.php', // Url do lado server que vai receber o arquivo
        data: {singer: singer},
        type: 'POST',
        success: function (info) {
            if(info) {
                var estados = info.split(';');
                //CARREGA IMAGENS
                for(var i = 0; i < 10; i++) {
                    var identifier = ".sticker[id=" + (i+1) + "]";
                    var img_path = "../resources/imgs/cardsM/1/" + (i+1) + ".jpeg";
                    $(identifier).html("<img src='" + img_path + "'>");
                    if (Number(estados[i]) == 1)
                        $(identifier).addClass("music-enabled");
                    else 
                        $(identifier).addClass("music-disabled");
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
        $('.modal-wrapper').css("top", window.scrollY);
        modal($(this).attr('id'), $(this).attr('class'));
    })

    function modal(id, classe) { //Abre o modal
        //Aqui vai ter criação do modal e setar o evento onClick do botão salvar
        //do modal, para chamar a função do ajax
        $('.modal-wrapper').removeClass('hidden');
        if(classe.match(/music-disabled/)){
            $('.modal-title').html('Tem certeza que deseja colar?');
        }else{
            $('.modal-title').html('Tem certeza que deseja descolar?');
        }
        idFigura = id;
    }

    $('.modal-submit').click(function(e){
        e.preventDefault();
        if($("#" + idFigura).attr('class').match(/music-disabled/)){
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
                    $("#" + idFigura).removeClass("music-disabled");
                    $("#" + idFigura).addClass("music-enabled");
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
                    $("#" + idFigura).removeClass("music-enabled")
                    $("#" + idFigura).addClass("music-disabled")
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