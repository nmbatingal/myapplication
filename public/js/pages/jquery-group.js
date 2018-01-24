$(function () {

    $('#form-group').validate({
        rules: {
            div_name    : "required",
            acronym     : "required",
        },
        messages : {
            div_name    : "Please enter a division unit name."
        },
        highlight: function (input) {
            console.log(input);
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.input-group').append(error);
            $(element).parents('.form-group').append(error);
        }
    });

});