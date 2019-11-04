<?php get_header() ?>
<?php $theme_opts = get_option('jfsbb_opts') ?>
    <section class="container">
        <!-- Jumbotron Header -->
        <header class="jumbotron my-4 text-center bg-white">
            <img src="<?php echo jfsbb_get_logo_url(); ?>" alt="<?php echo $theme_opts['legend_logo']; ?>" class="rounded-circle img-fluid img-thumbnail">
            <h1 class="display-5"><?php echo get_bloginfo('name'); ?></h1>
            <div class="col-12 text-center pt-2 pb-3">
            <?php get_template_part("template_parts/social_bar"); ?>
            </div>
            <p class="lead"><?php echo $theme_opts['bio']; ?></p>
        </header>
    </section>
    <section class="container mb-3">
        <!-- Post blog -->
        <div class="row">
            <?php
            $arg_blog = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'order' => 'DESC'
            );
            $req_blog = new WP_QUERY($arg_blog);
            ?>
            <?php if ($req_blog->have_posts()) : ?>
                <?php while ($req_blog->have_posts()): $req_blog->the_post(); ?>
                    <?php get_template_part("template_parts/post_card"); ?>
                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <!-- Pager -->
        <div class="clearfix text-center mt-5 mb-5">
            <a class="btn btn-dark" href="<?php echo get_post_type_archive_link( 'post' ); ?>">Afficher tous les articles</a>
        </div>
    </section>
    <!-- /.row -->
    </section>
<?php get_footer() ?>