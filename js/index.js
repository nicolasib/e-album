$(function(){
    NProgress.start();

    $('.header-cta').navpoints({
        speed: 1000
    });
    $('.bout-cta').navpoints({
        speed: 1000
    })

    $('.header').parallaxie({
        speed: 0.6
    });

    $('.header').ready(function(){
        NProgress.done();
    })

    $('.header-cta').click(function(e){
        e.preventDefault();
        $('.bout-cards.animated').addClass('fadeInLeft');
    })

    $(window).on("scroll", function() {
        if($(window).scrollTop() > 600) {
          $(".menu-bar").addClass("menu-bg");
          
        } else {
          $(".menu-bar").removeClass("menu-bg");
        }
      });
})
