<?php

function customizer($wp_customize)
{

    $wp_customize->add_section('theme-variables', [
        'title' => __('Color Pallete', 'txtdomain'),
        'priority' => 0
    ]);
    
    $wp_customize->add_setting('primary', ['default' => '#7D28F7']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary', [
        'section' => 'theme-variables',
        'label' => __('Primary', 'txtdomain'),
        'priority' => 10
    ]));
    
    $wp_customize->add_setting('secondary', ['default' => '#ECBC4E']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary', [
        'section' => 'theme-variables',
        'label' => __('Secondary', 'txtdomain'),
        'priority' => 20
    ]));

    $wp_customize->add_setting('text', ['default' => '#444444']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text', [
        'section' => 'theme-variables',
        'label' => __('Text', 'txtdomain'),
        'priority' => 20
    ]));

    $wp_customize->add_setting('purple', ['default' => '#32137B']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'purple', [
        'section' => 'theme-variables',
        'label' => __('Purple', 'txtdomain'),
        'priority' => 20
    ]));    

    $wp_customize->add_setting('gray', ['default' => '#F2F1F1']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gray', [
        'section' => 'theme-variables',
        'label' => __('Gray', 'txtdomain'),
        'priority' => 20
    ]));   

    $wp_customize->add_setting('lightblue', ['default' => '#B9DEC680']);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lightblue', [
        'section' => 'theme-variables',
        'label' => __('Lightblue', 'txtdomain'),
        'priority' => 20
    ]));   

    $wp_customize->add_panel('customization', array(

        'priority' => 2,

        'title' => __('Customização')

    ));

    // $wp_customize->add_section( 'general' , array(
    

    //     'title'       => __( 'General' ),
    

    //     'panel' => 'customization',
    

    //     'priority'    => 10
    

    // ));
    

    $wp_customize->add_section('header', array(

        'title' => __('Header') ,

        'panel' => 'customization',

        'priority' => 1

    ));

    $wp_customize->add_section('footer', array(

        'title' => __('Footer') ,

        'panel' => 'customization',

        'priority' => 1

    ));

    // $wp_customize->add_section('contato', array(

    //     'title' => __('Contato') ,

    //     'panel' => 'customization',

    //     'priority' => 1

    // ));

    // $wp_customize->add_setting( 'logo_footer' );
    

    // $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_footer', array(
    

    // 'label'    => __( 'Logo' ),
    

    // 'section'  => 'footer',
    

    // 'settings' => 'logo_footer'
    

    // )));
    

    $wp_customize->add_setting('logo');

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(

        'label' => __('Logo (Padrão)') ,

        'section' => 'header',

        'settings' => 'logo'

    )));

    // $wp_customize->add_setting('texto');

    // $wp_customize->add_control('texto', array(

    //     'label' => 'Texto',

    //     'section' => 'footer',

    //     'type' => 'textarea',

    //     'settings' => 'texto'

    // ));

    $social_networks = array(

        // array(

        //     'title' => '',

        //     'slug' => ''

        // ) ,

    );

    if (!empty($social_networks))
    {

        $wp_customize->add_section('social_networks', array(

            'title' => __('Social Networks') ,

            'panel' => 'customization',

            'priority' => 0

        ));

        foreach ($social_networks as $key => $value)
        {

            $wp_customize->add_setting($value['slug']);

            $wp_customize->add_control($value['slug'], array(

                'label' => $value['title'],

                'section' => 'social_networks',

                'type' => 'text',

                'settings' => $value['slug']

            ));

        }

    }

}