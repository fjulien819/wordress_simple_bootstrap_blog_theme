<?php
function jfsbb_save_options()
{

    //verif role
    if (!current_user_can('publish_pages'))
    {
        wp_die('Vous n\'êtes pas autorisé à effectuer cette opération');
    }
    // verif de sécurité
    check_admin_referer('jfsbb_options_verify');

    $opts = get_option('jfsbb_opts');

    //sauvegarde de l'url de l'image
    $opts['logo_url']  = sanitize_text_field($_POST['logo_url']);


    if (empty($opts['bio']))
    {
        $opts['bio']  = sanitize_text_field($_POST['bio']);
    }
    else
    {
        $opts['bio']  = sanitize_text_field(get_bloginfo('description'));
    }


    // save social networks

$opts['social_networks']['facebook'] =  ['url' => sanitize_text_field($_POST['facebook_url']), 'icon' => ' fa-facebook'];
$opts['social_networks']['instagram'] =  ['url' => sanitize_text_field($_POST['instagram_url']), 'icon' => ' fa-instagram'];
$opts['social_networks']['twitter'] = ['url' => sanitize_text_field($_POST['twitter_url']), 'icon' => ' fa-twitter'];
$opts['social_networks']['linkedin'] = ['url' => sanitize_text_field($_POST['linkedin_url']), 'icon' => ' fa-linkedin'];
$opts['social_networks']['youtube'] = ['url' => sanitize_text_field($_POST['youtube_url']), 'icon' => ' fa-youtube'];

    //maj des options
    update_option('jfsbb_opts', $opts);


    wp_redirect(admin_url('admin.php?page=jfsbb_thème_opts&status=1'));
    exit;

}
