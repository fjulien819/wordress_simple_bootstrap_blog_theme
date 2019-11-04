<?php get_header() ?>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="error-template">
                        <h1 class="text-center">
                            Oops!</h1>
                        <h2 class="text-center">
                            404 Page introuvable</h2>
                        <div class="error-details">
                           <p class="text-center"> Recommançons, nous ferons mieux la prochaine fois.</p>
                        </div>
                        <div class="error-actions mt-3 d-flex justify-content-center">
                            <a href="<?php echo get_bloginfo('home')?>" class="btn btn-dark btn-lg"><span class="glyphicon glyphicon-home"></span>Accueil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php get_footer() ?>