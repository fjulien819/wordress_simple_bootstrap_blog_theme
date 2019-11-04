</section>
<footer class="bg-light text-white mt-5">
    <div class="container">
        <div class="row pt-3 pb-3">
            <div class="col-12 mb-1 d-flex justify-content-center">
                <?php get_template_part("template_parts/social_bar"); ?>

            </div>
                    <?php if (has_nav_menu('footer_menu')): ?>
                        <div id="footer-menu" class="col-12 d-flex justify-content-center">

                            <?php


                            wp_nav_menu(array(
                                'theme_location' => 'footer_menu',
                                'menu_class' => 'd-flex justify-content-center m-0 p-0',
                                'menu_id' => 'footer-menu-list'
                            ));


                            /*
                           $args = [
                               'menu'              => "", // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
                               'menu_class'        => "", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
                               'menu_id'           => "", // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
                               'container'         => "", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
                               'container_class'   => "", // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
                               'container_id'      => "", // (string) The ID that is applied to the container.
                               'fallback_cb'       => "", // (callable|bool) If the menu doesn't exists, a callback function will fire. Default is 'wp_page_menu'. Set to false for no fallback.
                               'before'            => "", // (string) Text before the link markup.
                               'after'             => "", // (string) Text after the link markup.
                               'link_before'       => "", // (string) Text before the link text.
                               'link_after'        => "", // (string) Text after the link text.
                               'echo'              => "", // (bool) Whether to echo the menu or return it. Default true.
                               'depth'             => "", // (int) How many levels of the hierarchy are to be included. 0 means all. Default 0.
                               'walker'            => "", // (object) Instance of a custom walker class.
                               'theme_location'    => "", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
                               'items_wrap'        => "", // (string) How the list items should be wrapped. Default is a ul with an id and class. Uses printf() format with numbered placeholders.
                               'item_spacing'      => "", // (string) Whether to preserve whitespace within the menu's HTML. Accepts 'preserve' or 'discard'. Default 'preserve'.
                           ];
       */

                            ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>