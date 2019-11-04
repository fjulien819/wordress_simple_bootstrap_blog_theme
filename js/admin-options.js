jQuery(document).ready(function ($) {

    // ajout d'une image dans page
   var frame = wp.media({
        title: 'Sélectionner une image',
        button: {
            text: 'Utiliser ce média'
        },
        multiple: false  // Set to true to allow multiple files to be selected
    });

    $("#btn_img_01").click(function (e) {
        e.preventDefault();
        frame.open();
    });

    frame.on('select', function () {
        // Get media attachment details from the frame state
        var objImg = frame.state().get('selection').first().toJSON();

        var monUrl = objImg.sizes.thumbnail.url;

        $('img#img_preview_01').attr('src', monUrl);
        $('input#theme_bootstrap_url_hidden_img_1').attr('value', monUrl);
        $('input#theme_bootstrap_url_img_1').attr('value', monUrl);


    });
});