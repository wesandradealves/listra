<?php 

function _form($atts) {
    return '
        <div class="inner-form"> 
            <a class="close d-block d-lg-none"><i class="fa-solid fa-xmark"></i></a>
            <h2 class="text-center d-block">'.$atts['title'].' <small class="d-block pt-3 pb-3">'.$atts['subtitle'].'</small></h2>
            '.do_shortcode('[contact-form-7 id="'.$atts['id'].'"]').
        '</div>
    ';
}

function _whatsapp($atts) {
    return '<a class="submit '.$atts['class'].'" href="https://api.whatsapp.com/send?phone='.$atts['phone'].'"><i class="fab fa-whatsapp"></i> Fale com um consultor</a>';
}

function _alertBox($atts) {
    return '
        <div class="alert-box">
            <span class="alert-box-header d-flex align-items-center justiy-content-center"><span class="icon d-flex flex-column flex-wrap align-items-center justiy-content-center"><i class="fa-solid fa-exclamation"></i></span> '.$atts['title'].'</span>
            <p>'.$atts['text'].'</p>
        </div>
    ';
}

function _loop($atts) {
    $query = new WP_Query( array(
        'post_type' => array( $atts['post_type'] ),
        'posts_per_page' => $atts['posts_per_page'],
        'order' => $atts['order'],
    ) );

    if($query->post_count) {
        $html = '<div class="owl-carousel owl-theme owl-depoimentos">';
        while ($query->have_posts()) : $query->the_post(); 
                $html .= sprintf('<div class="d-flex flex-wrap p-4 align-items-center justify-content-between">
                    <div class="pb-4 pb-md-0 pe-md-5 col-12 col-md-4">
                        <img src="'.wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full').'" />
                    </div>
                    <div class="col-12 col-md-8">
                        <p>'.get_the_content().'</p>
                        <h3 class="mt-4 mb-1"><strong>'.get_the_title().'</strong></h3>
                        <p><small>
                            '.get_field('cargo').'
                        </small></p>
                    </div>
                </div>');
        endwhile; 
        wp_reset_postdata(); 
        $html .= '</div>';
        return $html;
    }

    return NULL;
}