<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php if(is_home()): ?>
        <meta name="description" content="Page des articles du blog">
    <?php endif; ?>

    <?php if(is_front_page()): ?>
        <meta name="description" content="Page d'accueil du site">
    <?php endif; ?>

    <?php if(is_page() && !is_front_page()): ?>
        <meta name="description" content="Une page présentant son contenu">
    <?php endif; ?>

    <?php if(is_category()): ?>
        <meta name="description" content="Liste des articles pour la catégorie <?php echo single_cat_title('', false); ?>">
    <?php endif; ?>

    <?php if(is_tag()): ?>
        <meta name="description" content="Liste des articles avec l'étiquette <?php echo single_tag_title('', false); ?>">
    <?php endif; ?>


    <?php wp_head(); ?>
</head>
<body>
<header>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo get_bloginfo('home')?>"><?php echo get_bloginfo('name')?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
            wp_nav_menu(array(
                    'menu' => 'top_menu',
                    'theme_location' => 'primary',
                    'depth' => 2,
                    'container' => 'div',
                    'container_class' => 'navbar-collapse collapse',
                    'container_id' => 'navbarResponsive',
                    'menu_class' => 'navbar-nav ml-auto',
                    'fallback_cb' => 'wp_bootstrap_navlist_walker::fallback',
                    'walker' => new wp_bootstrap_navlist_walker())
            );
            ?>
        </div>
    </nav>
</header>
<section class="mt-3">