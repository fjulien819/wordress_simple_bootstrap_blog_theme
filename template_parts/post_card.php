<?php
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'card-size');
?>
<?php if(is_front_page()): ?>
    <?php $col_card = 'col-sm-4'  ?>
<?php else: ?>
    <?php $col_card = 'col-sm-6'  ?>
<?php endif; ?>
<div class="d-flex align-self-stretch col-12 <?php echo $col_card ?> mb-4">
    <div class="card mx-auto">
        <img class="card-img-top" src="<?php echo $featured_img_url ?>" alt="">
        <div class="card-body">
            <h3 class="card-title"><?php the_title(); ?></h3>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo jfsbb_get_the_date() ?>
                dans <?php echo jfsbb_get_the_categories() ?>
                par
               <?php echo jfsbb_get_link_author() ?></h6>
            <p class="card-text"> <?php echo jfsbb_slice_str(get_the_excerpt()); ?></p>
        </div>
        <div class="card-footer bg-transparent border-0">
            <a href="<?php the_permalink(); ?>" class="btn btn-dark float-right">Lire l'article</a>
        </div>
    </div>
</div>
