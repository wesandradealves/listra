<?php

require_once(get_stylesheet_directory() . '/_inc/scssphp/scss.inc.php');

require_once ('_inc/__php-config.php');

require_once ('_inc/__cpt.php');

require_once ('_inc/__widgets.php');

require_once ('_inc/__scripts.php');

require_once ('_inc/__admin-styles.php');

require_once ('_inc/__menus.php');

require_once ('_inc/__customizer.php');

require_once ('_inc/__shortcodes.php');

function extend_wp_query_where($where, $wp_query)
{

    if ($extend_where = $wp_query->get('extend_where'))
    {

        $where .= " AND " . $extend_where;

    }

    return $where;

}

add_filter( 'manage_depoimentos_posts_columns', 'smashing_depoimentos_columns' );
function smashing_depoimentos_columns( $columns ) {


    $columns = array(
      'cb' => $columns['cb'],
      'nome' => __( 'Nome' ),
      'cargo' => __( 'Cargo' ),
      'depoimento' => __( 'Depoimento' ),
    );


  return $columns;
}


add_action( 'manage_depoimentos_posts_custom_column', 'smashing_depoimentos_column', 10, 2);
function smashing_depoimentos_column( $column, $post_id ) {
  if ( 'cargo' === $column ) {
    echo get_field('cargo', $post_id);
  }
  if ( 'nome' === $column ) {
    echo get_the_title($post_id);
  }
  if ( 'depoimento' === $column ) {
    echo get_content($post_id);
  }  
}


function add_class_to_all_menu_anchors($atts)
{

    $atts['class'] = 'nav-link';

    return $atts;

}

function custom_pagination($numpages = '', $pagerange = '', $page = '')
{

    if (empty($pagerange))
    {

        $pagerange = 2;

    }

    if (empty($page))
    {

        $page = 1;

    }

    if ($numpages == '')
    {

        global $wp_query;

        $numpages = $wp_query->max_num_pages;

        if (!$numpages)
        {

            $numpages = 1;

        }

    }

    $pagination_args = array(

        'base' => '%_%',

        'format' => '?page=%#%',

        'total' => $numpages,

        'current' => max(1, get_query_var('page')) ,

        'show_all' => False,

        'end_size' => 1,

        'mid_size' => 2,

        'prev_next' => false,

        'prev_text' => '',

        'next_text' => '',

        'type' => 'plain',

        'add_args' => false,

        'add_fragment' => ''

    );

    $paginate_links = paginate_links($pagination_args);

    if ($paginate_links)
    {

        echo "<nav class='nav-links'>";

        echo $paginate_links;

        echo "</nav>";

    }

}

if (!is_admin())
{

    function wpb_search_filter($query)
    {

        if ($query->is_search)
        {

            $query->set('post_type', array(
                // 'produtos',
                'post'
            ));

        }

        return $query;

    }

    add_filter('pre_get_posts', 'wpb_search_filter');

}

function title_filter($where, $wp_query)

{

    global $wpdb;

    if ($search_term = $wp_query->get('post_title'))
    {

        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql(like_escape($search_term)) . '%\'';

    }

    return $where;

}

// function wpse18703_posts_where( $where, &$wp_query )
// {
//     global $wpdb;
//     if ( $post_title = $wp_query->get( 'post_title' ) ) {
//         $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'' . esc_sql( $wpdb->esc_like( $post_title ) ) . '%\'';
//     }
//     return $where;
// }


function my_post_queries($query)
{

    // do not alter the query on wp-admin pages and only alter it if it's the main query
    if (!is_admin() && $query->is_main_query())
    {

        // alter the query for the home and category pages
        

        if (is_category() || is_archive() || is_search())
        {

            $query->set('posts_per_page', 10);

        }

    }

}

function is_login_page()
{

    return in_array($GLOBALS['pagenow'], array(
        'wp-login.php',
        'wp-register.php'
    ));

}

function hide_editor()
{

    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];

    if (!isset($post_id)) return;

    $template_file = get_post_meta($post_id, '_wp_page_template', true);

    // add_post_type_support( 'page', 'excerpt' );
    // if ($template_file == 'page-templates/home.php' || $template_file == 'page-templates/a-ype.php')
    // {

    //     remove_post_type_support('page', 'editor');

    //     remove_post_type_support('page', 'excerpt');

    // }

    // if ($template_file == 'page-templates/produtos.php' || $template_file == 'page-templates/guia-de-limpeza.php')
    // {

    //     remove_post_type_support('page', 'editor');

    // }

    remove_post_type_support('page', 'thumbnail');

    // remove_post_type_support('page', 'editor');
    // remove_post_type_support('page', 'author');
    // remove_post_type_support('page', 'comments');
    // remove_post_type_support('page', 'revisions');
    // remove_post_type_support('page', 'custom-fields');
    
}

function add_my_var($public_query_vars)
{

    $public_query_vars[] = 'paged';

    return $public_query_vars;

}

function get_custom_field_data($key, $echo = false)
{

    $value = get_post_meta($post->ID, $key, true);

    if ($echo == false)
    {

        return $value;

    }
    else
    {

        echo $value;

    }

}

function cc_mime_types($mimes)
{

    $mimes['svg'] = 'image/svg+xml';

    return $mimes;

}

function df_terms_clauses($clauses, $taxonomy, $args)
{

    if (!empty($args['post_type']))
    {

        global $wpdb;

        $post_types = array();

        foreach ($args['post_type'] as $cpt)
        {

            $post_types[] = "'" . $cpt . "'";

        }

        if (!empty($post_types))
        {

            $clauses['fields'] = 'DISTINCT ' . str_replace('tt.*', 'tt.term_taxonomy_id, tt.term_id, tt.taxonomy, tt.description, tt.parent', $clauses['fields']) . ', COUNT(t.term_id) AS count';

            $clauses['join'] .= ' INNER JOIN ' . $wpdb->term_relationships . ' AS r ON r.term_taxonomy_id = tt.term_taxonomy_id INNER JOIN ' . $wpdb->posts . ' AS p ON p.ID = r.object_id';

            $clauses['where'] .= ' AND p.post_type IN (' . implode(',', $post_types) . ')';

            $clauses['orderby'] = 'GROUP BY t.term_id ' . $clauses['orderby'];

        }

    }

    return $clauses;

}

function sanitize($input, $setting)
{

    global $wp_customize;

    $control = $wp_customize->get_control($setting->id);

    if (array_key_exists($input, $control->choices))
    {

        return $input;

    }
    else
    {

        return $setting->default;

    }

}

function remove_thumbnail_support()
{

    remove_post_type_support('page', 'comments');

    remove_post_type_support('page', 'revisions');

    remove_post_type_support('post', 'comments');

    remove_post_type_support('post', 'revisions');

}

add_action('init', 'remove_thumbnail_support');

add_theme_support('post-thumbnails');

add_post_type_support('page', 'excerpt');

add_action('init', 'menu');

add_action('init', 'the_widgets_init');

add_action('admin_menu', 'remove_menus');

add_action('wp_enqueue_scripts', 'regScripts');

add_filter('contextual_help', 'mytheme_remove_help_tabs', 999, 3);

add_action('customize_register', 'remove_customizer_settings', 20);

add_action('customize_register', 'customizer');

add_filter('terms_clauses', 'df_terms_clauses', 10, 3);

add_filter('upload_mimes', 'cc_mime_types');

add_filter('nav_menu_link_attributes', 'add_class_to_all_menu_anchors', 10);

add_filter('posts_where', 'extend_wp_query_where', 10, 2);

add_filter('screen_options_show_screen', 'wpb_remove_screen_options');

add_filter('show_admin_bar', '__return_false');

add_filter('posts_where', 'title_filter', 10, 2);

add_filter('query_vars', 'add_my_var');

add_action('pre_get_posts', 'my_post_queries');

add_action('wp_head', function() {
    $compiler = new ScssPhp\ScssPhp\Compiler();

    $source_scss = get_stylesheet_directory() . '/style.scss';
    $scssContents = file_get_contents($source_scss);
    $import_path = get_stylesheet_directory() . '/';
    $compiler->addImportPath($import_path);

    $variables = [
        '$primary' => get_theme_mod('primary'),
        '$secondary' => get_theme_mod('secondary'),
        '$text' => get_theme_mod('text'),
        '$purple' => get_theme_mod('purple'),
        '$gray' => get_theme_mod('gray'),
        '$lightblue' => get_theme_mod('lightblue')
    ];

    $compiler->setVariables($variables);

    $css = $compiler->compile($scssContents);

    if (!empty($css) && is_string($css)) {
        echo '<style type="text/css">' . $css . '</style>';
    }
});

add_action('customize_save_after', function() {
    $compiler = new ScssPhp\ScssPhp\Compiler();
    
    $source_scss = get_stylesheet_directory() . '/style.scss';
    $scssContents = file_get_contents($source_scss);
    $import_path = get_stylesheet_directory() . '/';
    $compiler->addImportPath($import_path);
    $target_css = get_stylesheet_directory() . '/style.css';
    
    $variables = [
        '$primary' => get_theme_mod('primary'),
        '$secondary' => get_theme_mod('secondary'),
        '$text' => get_theme_mod('text'),
        '$purple' => get_theme_mod('purple'),
        '$gray' => get_theme_mod('gray'),
        '$lightblue' => get_theme_mod('lightblue')
    ];

    $compiler->setVariables($variables);
    
    $css = $compiler->compile($scssContents);
    if (!empty($css) && is_string($css)) {
        file_put_contents($target_css, $css);
    }
});

add_shortcode('form', '_form');

add_shortcode('whatsapp', '_whatsapp');

add_shortcode('alertBox', '_alertBox');

add_shortcode('loop', '_loop');