<?php get_header() ?>
    <section class="container mb-3">
        <!-- Post blog -->

        <h1 class="display-5 mb-3"><?php wp_title(''); ?></h1>

        <?php if (have_posts()) : ?>
            <div class="row">
                <?php while (have_posts()): the_post(); ?>
                    <?php get_template_part("template_parts/post_card"); ?>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else: ?>
            <?php the_content(); ?>
        <?php endif; ?>
    </section>
<?php bootstrap_pagination(); ?>
<?php get_footer() ?>