<?php get_header() ?>
<?php
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'show-post-size'); the_post();
?>
    <!-- Page Content -->
    <div class="container">
    <div class="row">
    <!-- Post Content Column -->
    <div class="col-lg-8 show-post-img">
        <div class="card">
            <?php if ($featured_img_url) : ?>
                <img class="img-fluid rounded " src="<?php echo $featured_img_url ?>" alt="">
            <?php endif; ?>
            <div class="card-body">
                <h1 class="card-title"><?php the_title(); ?></h1>
                <h6 class="card-subtitle mb-5 text-dark"><?php echo jfsbb_get_the_date() ?> dans <?php echo jfsbb_get_the_categories() ?> par <?php echo jfsbb_get_link_author() ?></h6>
                <p class="card-text"> <?php the_content() ?></p>
            </div>
        </div>
        <?php comments_template(); // les commentaires ?>
    </div>
    <!-- Sidebar Widgets Column -->
<?php get_sidebar('sidebar_right'); ?>

<?php get_footer() ?>