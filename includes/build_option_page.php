<?php function jfsbb_build_option_page()
{

    $theme_opts = get_option('jfsbb_opts');
    ?>

    <div class="container">

        <h1 class="mb-3 mt-3">Options du thème</h1>

        <?php
        if (isset($_GET['status']) && $_GET['status'] == 1) {
            echo '<div class="alert alert-success" role="alert">Mise à jour efféctuée avec succès</div>';
        }
        ?>

        <form action="admin-post.php" method="post">
            <!---- Pour hook qui gere la cible du form  --->
            <input type="hidden" name="action" value="jfsbb_save_options">


            <div class="card col-12">
                <div class="card-body">


                    <div class="form-group text-center">
                        <img src="<?php echo jfsbb_get_logo_url() ?>" id="img_preview_01"
                             alt="<?php echo $theme_opts['legend_logo'] ?>"
                             class="rounded-circle img-fluid img-thumbnail">
                        <br>
                        <button class="btn btn-dark mt-3" id="btn_img_01">Modifier logo</button>
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" id="theme_bootstrap_url_hidden_img_1"
                               value="<?php echo $theme_opts['logo_url']; ?> " name="logo_url">
                    </div>

                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <div class="input-group">
                            <textarea id="bio"  class="form-control" placeholder="Une breve description" name="bio"><?php echo $theme_opts['bio']; ?></textarea>
                        </div>
                    </div>



                    <div class="form-group">
                        <label>Réseaux sociaux</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-facebook-square"></i></span>
                            </div>
                            <input type="url" class="form-control" placeholder="Url lien facebook" name="facebook_url" value="<?php echo $theme_opts['social_networks']['facebook']['url']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-instagram"></i>
                            </div>
                            <input type="url" class="form-control" placeholder="Url lien instagram" name="instagram_url" value="<?php echo $theme_opts['social_networks']['instagram']['url']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-twitter-square"></i>
                            </div>
                            <input type="url" class="form-control" placeholder="Url lien twitter" name="twitter_url" value="<?php echo $theme_opts['social_networks']['twitter']['url']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-linkedin"></i>
                            </div>
                            <input type="url" class="form-control" placeholder="Url lien linkedin" name="linkedin_url" value="<?php echo $theme_opts['social_networks']['linkedin']['url']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-youtube"></i>
                            </div>
                            <input type="url" class="form-control" placeholder="Url lien youtube" name="youtube_url" value="<?php echo $theme_opts['social_networks']['youtube']['url']; ?>">
                        </div>
                    </div>
                </div>


            </div>
                <?php wp_nonce_field('jfsbb_options_verify') ?>
                <button type="submit" class="btn btn-dark float-right mt-4">Enregister les modifications</button>
        </form>

    </div>

    <?php

}