<?php get_header() ?>
    <div class="container mb-3">
        <h1 class="display-5 mb-3"><?php wp_title(''); ?></h1>
        <div class="row">
        <div class="col-12 col-sm-12 col-md-8"><!-- Post blog -->
            <div class="row">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()): the_post(); ?>
                        <?php get_template_part("template_parts/post_card"); ?>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
            <?php bootstrap_pagination(); ?>
        </div>
            <!-- Sidebar Widgets Column -->
                <?php get_sidebar('sidebar_right'); ?>
        </div>
    </div>
<?php get_footer() ?>