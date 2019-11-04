<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
    <div class="input-group">
        <input type="text" class="form-control mr-1" placeholder="" value="<?php echo get_search_query(); ?>" name="s" id="s" />
        <input type="submit" class="btn btn-dark" id="searchsubmit" value="OK" />
    </div>
</form>
