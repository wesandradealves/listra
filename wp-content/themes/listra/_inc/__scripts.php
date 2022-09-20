<?php

function regScripts() {
        wp_dequeue_script('jquery');
        wp_deregister_script('jquery');        
        wp_enqueue_script('jquery', "//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js",'','', true);
        wp_enqueue_style('bootstrap', '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.1/css/bootstrap-grid.min.css', array(), rand(5, 15)); 
        wp_enqueue_style('style', get_stylesheet_directory_uri().'/style.css', array(), rand(5, 15));     
        wp_enqueue_style('owl-carousel', '//owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css', array(), rand(5, 15));     
        wp_enqueue_style('owl-theme', '//owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css', array(), rand(5, 15));     
        wp_enqueue_script('owl-js', "//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js",'','', true);
        wp_enqueue_script('fontawesome', "//owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js",'','', true);
        wp_enqueue_script('scripts', get_stylesheet_directory_uri()."/assets/js/global.js",'','', true);
}