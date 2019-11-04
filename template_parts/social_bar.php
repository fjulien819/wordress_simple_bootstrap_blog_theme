 <ul class="list-unstyled m-0 list-inline text-center text-white">
        <?php
        $theme_opts = get_option('jfsbb_opts');
        foreach ($theme_opts['social_networks'] as $social_network) {
            if (!empty($social_network['url'])) {
                echo '<li class="list-inline-item"><a class="text-dark" href="' . $social_network['url'] . '" target="_blank"><i class="fab fa-lg ' . $social_network['icon'] . '"></i></a></li>';
            }
        }
        ?>
 </ul>
