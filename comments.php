<!-- si les commentaires sont acceptés !-->
<?php if (comments_open()) : ?>
    <section class="card comments my-4" id="commentaires">
        <h5 class="card-header bg-dark text-white">Laissez un commentaire:</h5>
        <div class="card-body">
            <!-- Comments Form -->
            <?php
            // on génère le formulaire avec du html personnalisé
            comment_form([
                'title_reply' => '',
                'fields' => apply_filters('comment_form_default_fields', [
                    'author' => '<div class="form-group"><!--- <label for="author">Votre nom <abbr class="required" title="obligatoire">*</abbr></label>---><input class="form-control" id="author" name="author" type="text" value="" placeholder="Votre nom" required></div>',
                    'email' => '<div class="form-group"><!--- <label for="email">Votre adresse email <abbr class="required" title="obligatoire">*</abbr></label>---><input class="form-control" id="email" name="email" type="email" value="" placeholder="Votre email" required></div>',
                    'cookies' => '<div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" value="yes"><label class="custom-control-label" for="wp-comment-cookies-consent">Enregistrer mon nom, mon e-mail et mon site web dans le navigateur pour mon prochain commentaire.</label></div>'
                ]),

                'comment_field' => '<div class="form-group"><!---<label for="comment">Que souhaitez-vous dire ? <abbr class="required" title="obligatoire">*</abbr></label>---><textarea  class="form-control" id="comment" name="comment" placeholder="Votre commentaire" required></textarea>  </div>',
                'comment_notes_before' => '',
                'submit_button' => '<div class="form-group d-flex justify-content-end"><button type="submit" class="btn btn-dark">Envoyer le commentaire</button></div>'
            ]);
            ?>
            <!-- fonction de récupération des commentaires !-->
            <ul class="list-group">
                <?php wp_list_comments('callback=steroids_comment'); ?>
            </ul>
        </div>
    </section>
<?php else : ?>
    <!-- si les commentaires sont fermés !-->
    <p><?php _e('Comments are closed here.', 'steroids'); ?></p>
<?php endif; ?>



<?php
function steroids_comment($comment) {
?>
<li class="list-group-item border-0 p-0">
    <div class="media mb-4">
        <div class="media-body">
            <h5 class="mt-0"><?= $comment->comment_author ?></h5>
            <small class="text-muted">
                <time datetime="<?php comment_time('c'); ?>">
                    Le <?= get_comment_date() ?> à <?= get_comment_time() ?>
                </time>
            </small>
            <?php comment_text();?>
        </div>
    </div>
    <?php
    }
    ?>
