$(function () {

    $('#form-signup').validate({
        rules: {
            firstname   : "required",
            lastname    : "required",
            username    : {
                required   : true,
                minlength  : 5
            },
            email       : {
                required   : true,
                email      : true
            },
            contact_number : {
                required   : true,
                minlength  : 11
            },
            password    : {
                required   : true,
                minlength  : 6
            },
            confirm_password    : {
                required   : true,
                minlength  : 6,
                equalTo    : "#signup_password"
            }
        },
        messages: {
            firstname   : "Please enter your firstname",
            lastname    : "Please enter your lastname",
            username    : {
                required   : "Please enter a username",
                minlength  : "Your username must consist of at least 5 characters"
            },
            password    : {
                required   : "Please provide a password",
                minlength  : "Your password must be at least 6 characters long"
            },
            confirm_password   : {
                required   : "Please confirm your password",
                minlength  : "Your password must be at least 6 characters long",
                equalTo    : "Password do not match!"
            },
            email       : "Please enter a valid email address",
        },
        onfocusout: function(element) {
            this.element(element);  
        },
        onkeyup: function(element) {
            $(element).valid();
        },
        highlight: function (element) {
            $(element).parents('.form-group').addClass('has-success').removeClass('has-error');
            $(element).parents('.form-group').addClass('has-error').removeClass('has-success');
        },
        unhighlight: function (element) {
            $(element).parents('.form-group').addClass('has-error').removeClass('has-success');
            $(element).parents('.form-group').addClass('has-success').removeClass('has-error');
        },
        errorElement: "p",
        errorPlacement: function (error, element) {
            error.addClass( "help-block pmd-input-group-label" );

            $(element).parents('.form-group').append(error);
        }
    });

    //Masked Input ============================================================================================================================
    var $demoMaskedInput = $('.masked-input');

    $demoMaskedInput.find('.mobile-phone-number').inputmask('+63 999 999 9999', { placeholder: '+__ ___ ___ ____' });

});