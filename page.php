<?php get_header() ?>
    <div class="container mb-3">
        <h1 class="display-5 mb-3"><?php wp_title(''); ?></h1>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                the_content();
            endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>
            </div>
<?php get_footer() ?>