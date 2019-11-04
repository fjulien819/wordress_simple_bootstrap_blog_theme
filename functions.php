<?php

define('JF_SIMPLE_BOOTSTRAP_BLOG_VERSION', '1.0.0');
define('EXCERPT_MAX_LENGTH', '200');


//========================================================================
// activation des scripts/styles
//========================================================================
function jfsbb_blog_script()
{
    wp_enqueue_style('font awesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css', array(), null, 'all');
    wp_enqueue_style('bootstrap 4.3.1', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), null, 'all');
    wp_enqueue_style('style-name', get_template_directory_uri() . '/style.css', array(), JF_SIMPLE_BOOTSTRAP_BLOG_VERSION
        , 'all');

    wp_enqueue_script('jquery-3.3.1', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', array(), null, true);
    wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), null, true);
    wp_enqueue_script('bootstrap 4.3.1', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), null, true);
    wp_enqueue_script('script-name', get_template_directory_uri() . '/js/main.js', array(), JF_SIMPLE_BOOTSTRAP_BLOG_VERSION
        , true);
}

add_action('wp_enqueue_scripts', 'jfsbb_blog_script');


//========================================================================
// initialisation de l'admin
//========================================================================

function jfsbb_admin_init()
{
// activation des scripts/styles de l'admin
//========================================================================
    function jfsbb_admin_script()
    {

        if (isset($_GET['page']) && $_GET['page'] === 'jfsbb_thème_opts') {
            wp_enqueue_style('font awesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css', array(), null, 'all');
            wp_enqueue_style('bootstrap 4.3.1', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), null, 'all');
            wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), null, true);
            wp_enqueue_script('bootstrap 4.3.1', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), null, true);

            //bootstrap colorpicker https://github.com/itsjavi/bootstrap-colorpicker
            wp_enqueue_style('lib bootstrap colorpicker style', get_template_directory_uri() . '/lib/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css', array(), null, 'all');
            wp_enqueue_script('lib bootstrap colorpicker script', get_template_directory_uri() . '/lib/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js', array(), null, true);
            wp_enqueue_script('jfsbb bootstrap colorpicker script', get_template_directory_uri() . '/js/bootstrap-colorpicker.js', array(), null, true);


        }
        wp_enqueue_style('style-name', get_template_directory_uri() . '/style.css', array(), JF_SIMPLE_BOOTSTRAP_BLOG_VERSION
            , 'all');
        wp_enqueue_script('script-name', get_template_directory_uri() . '/js/main.js', array(), JF_SIMPLE_BOOTSTRAP_BLOG_VERSION
            , true);

        // chargement des scripts admin
        wp_enqueue_media();
        wp_enqueue_script('admin-init', get_template_directory_uri() . '/js/admin-options.js', array(), JF_SIMPLE_BOOTSTRAP_BLOG_VERSION
            , true);


    }

    add_action('admin_enqueue_scripts', 'jfsbb_admin_script');

    // pour soumission du form save des options
//========================================================================
    include('includes/save-options-page.php');
    add_action('admin_post_jfsbb_save_options', 'jfsbb_save_options');
}

add_action('admin_init', 'jfsbb_admin_init');


//========================================================================
// activation des options
//========================================================================
function jfsbb_activ_options()
{

    // changement de theme recupération des options
    $theme_opts = get_option('jfsbb_opts');
    if (!$theme_opts) {

        $opts = array(
            'logo_url' => '',
            'social_networks' => array(),
            'bio' => get_bloginfo("description"),
        );

        add_option('jfsbb_opts', $opts);
    }
}

//  hook d'activation
add_action('after_switch_theme', 'jfsbb_activ_options');


//======================================================
//menu add page options du thème
//======================================================
function jfsbb_admin_menus()
{
    add_menu_page(
        'Options du thème',
        'Options du thème',
        'publish_pages',
        'jfsbb_thème_opts',
        'jfsbb_build_option_page'

    );

    include('includes/build_option_page.php'); // contient la fonction jfsbb_build_option_page
}

add_action('admin_menu', 'jfsbb_admin_menus');


//===================================================
//=======    Sidebars and widgetized
//================================================
function jfsbb_widget_init()
{
    $args = array(
        'name' => 'Footer Widget Zone',
        'description' => 'Widgets affichés dans le footer: 4 au maximum',
        'id' => "widgetized-footer",
        'class' => '',
        'before_widget' => '<div id="%1$s" class="col-6 col-md %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widgettitle">',
        'after_title' => '</h5>'
    );

    register_sidebar($args);

}

add_action('widgets_init', 'jfsbb_widget_init');


//========================================================================
// Utilitaires
//========================================================================
function jfsbb_setup()
{
    //Support des vignettes
    add_theme_support('post-thumbnails');

    //Créé format image card
    add_image_size('card-size', 350, 196, true);
    add_image_size('show-post-size', 900, 300, true);

    //Enlève générateur de version wordpress dans le head
    remove_action('wp_head', 'wp_generator');

    //Enlève les guillements à la française
    remove_filter('the_content', 'wptexturize');
    remove_filter('the_excerpt', 'wptexturize');

    //Support balise title auto
    add_theme_support('title-tag');

    //Register Custom Navigation Walker
    require_once('includes/wp_bootstrap_navlist_walker.php');

    //Active la gestion des menus
    register_nav_menus(array(
        'primary' => 'Principal',
        'footer_menu' => 'Menu pied de page',
        ));

}

add_action('after_setup_theme', 'jfsbb_setup');


function bootstrap_pagination(\WP_Query $wp_query = null, $echo = true)
{
    if (null === $wp_query) {
        global $wp_query;
    }
    $pages = paginate_links([
            'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages,
            'type' => 'array',
            'show_all' => false,
            'end_size' => 3,
            'mid_size' => 1,
            'prev_next' => true,
            'prev_text' => __('«'),
            'next_text' => __('»'),
            'add_args' => false,
            'add_fragment' => ''
        ]
    );
    if (is_array($pages)) {
        //$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
        $pagination = '<div class="pagination d-flex justify-content-center"><ul class="pagination">';
        foreach ($pages as $page) {
            $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
        }
        $pagination .= '</ul></div>';
        if ($echo) {
            echo $pagination;
        } else {
            return $pagination;
        }
    }
    return null;
}

// return le logo du site
function jfsbb_get_logo_url()
{
    $theme_opts = get_option('jfsbb_opts');
    if (!empty($theme_opts['logo_url'])) {
        $logo_url = $theme_opts['logo_url'];
    } else {
        $logo_url = get_template_directory_uri() . '/assets/img/default-logo-150x150.jpeg';
    }
    return $logo_url;
}

function jfsbb_slice_str($str)
{
    $str = substr($str, 0, EXCERPT_MAX_LENGTH);
    $last_space = strrpos($str, " ");
    $str = substr($str, 0, $last_space) . "...";
    return $str;
}
function jfsbb_get_link_author() {
    $url = get_author_posts_url(get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) );
    $author = get_the_author();
    return '<a class="text-muted" href="'. $url .'">' . $author . '</a>';
}
// Modèle du résultat : <time datetime="2019-06-11T16:15:38+02:00">11 juin 2019</time>
function jfsbb_get_the_date()
{
    $iso_date = esc_attr(get_the_date("c"));
    $date = esc_html(get_the_date());
    return 'Posté le <time datetime="' . $iso_date . '">' . $date . '</time>';
}
function jfsbb_get_the_categories()
{
    $categories = get_the_category();
    $categoryList = '';
    $separator = '';
    if (count($categories) > 1)
    {
        $separator = ', ';
    }
    foreach ($categories as $category){
        $categoryList .= '<a class="text-muted" href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;
    }

    return $categoryList;
}

//========================================
//=== register sidebar
//=======================================
function jfsbb_sidebar_init()
{
    $args = array(
        'name' => __('Sidebar', 'theme_text_domain'),
        'id' => 'sidebar_right',    // ID should be LOWERCASE  ! ! !
        'description' => '',
        'class' => 'sidebar_right',
        'before_widget' => '<div class="card mb-3"><div class="card-body p-0 sidebar-card-body">',
        'after_widget' => '</div></div>',
        'before_title' => '<h5 class="widgettitle card-header bg-dark text-white">',
        'after_title' => '</h5>');

    register_sidebar($args);
}

add_action('widgets_init', 'jfsbb_sidebar_init');



