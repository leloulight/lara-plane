$(function() {

    // Delete carousel image
    $('.admin-carousel-container').on('click', '.delete-image-ajax', function() {

        console.log('dwa');
        $(this).closest('.form-group').remove();
    });

    // Add new carousel image field
    $('.add-image-form').on('click', function() {
       var formGroup = "<div class='form-group'>" +
        "<label for='carousel[]' class='add_form__label'>Изображение для карусели</label>" +
        "<input name='carousel[]' type='file'' id='carousel[]'>" +
        "<i class='fa fa-times delete-image-ajax'></i>" +
        "</div>";

        $('.admin-carousel-container .form-group:last').after(formGroup);
    });

});