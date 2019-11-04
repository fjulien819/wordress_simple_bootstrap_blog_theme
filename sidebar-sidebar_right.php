<div id="sidebar_right" class="sidebar_right col-12 col-sm-12 col-md-4">
    <?php if (!dynamic_sidebar('sidebar_right')) : ?>
        <div class="card mb-2">
            <h5 class="widgettitle card-header">Rechercher un Article</h5>
            <div class="card-body sidebar-card-body">
                    <?php get_search_form(); ?>
            </div>
        </div>
        <div class="card mb-2">
            <h5 class="widgettitle card-header"><?php _e('Archives', 'shape'); ?></h5>
            <div class="card-body sidebar-card-body">
                    <?php wp_get_archives(array('type' => 'monthly')); ?>
            </div>
        </div>
        <div class="card mb-2">
            <h5 class="widgettitle card-header"><?php _e('Meta', 'shape'); ?></h5>
            <div class="card-body sidebar-card-body">
                <ul>
                    <?php wp_register(); ?>
                    <li><?php wp_loginout(); ?></li>
                    <?php wp_meta(); ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</div>
