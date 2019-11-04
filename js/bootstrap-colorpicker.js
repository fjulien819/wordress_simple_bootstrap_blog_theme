$(function () {
    // Basic instantiation:
    $('#colorpicker').colorpicker();


    // Example using an event, to change the color of the .jumbotron background:
    $('#colorpicker').on('colorpickerChange', function(event) {
        $('#colorpicker-preview').css('background-color', event.color.toString());
    });
});


