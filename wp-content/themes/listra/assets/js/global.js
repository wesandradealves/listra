

$( document ).ready(function() {
    $('.owl-depoimentos').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: true,
        items: 1
    })

    $('.elementor-element-3cd8f67 .elementor-widget-wrap').addClass('owl-carousel owl-theme'),
    $('.elementor-element-3cd8f67 .elementor-widget-wrap').owlCarousel({
        loop: false,
        center: true,
        margin: 0,
        startPosition: 1,
        nav: false,
        dots: false,
        responsive:{
            0:{
                items:2
            },
            990:{
                items: 3,
                mouseDrag: false,
                touchDrag: false
            }
        }
    });

    $( "body" ).on( "click", "#orcamento", function(e) {
        e.preventDefault();
        $('#main-form').addClass('opened');
    });  

    $( "body" ).on( "click", ".close", function(e) {
        e.preventDefault();
        $('#main-form').removeClass('opened');
    });      
});