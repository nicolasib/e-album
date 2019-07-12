$(function(){
    NProgress.start();

    $('.header-cta').navpoints({
        speed: 1000
    });

    $('.bout-cta').navpoints({
        speed: 1000
    });

    $('.header').parallaxie({
        speed: 0.6
    });

    $('.header').ready(function(){
        NProgress.done();
    });

    $('.header-cta').click(function(e){
        e.preventDefault();
        $('.bout-cards.animated').addClass('fadeInLeft');
    });

    $(window).on("scroll", function() {
        if($(window).scrollTop() >= window.innerHeight || $(window).scrollTop() >= screen.height) {
            $(".menu-bar").addClass("menu-bg");
            
        } else {
            $(".menu-bar").removeClass("menu-bg");
        }
    });

    $('.header-cta').click(function(e){
        e.preventDefault();
        document.querySelector('.see-more').click();
    });
})
