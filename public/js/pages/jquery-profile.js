$(function () {
    
    $('#form-profile').validate({
        rules: {
            u_fname    : "required",
            u_lname    : "required",
            u_email    : {
                required   : true,
                email      : true
            },
            u_contact  : {
                required   : true,
            },
            u_unit     : "required",
            u_position : "required"
        },
        messages: {
            firstname   : "Please enter your firstname",
            lastname    : "Please enter your lastname",
            email       : "Please enter a valid email address",
        },
        submitHandler: function(form) { 
            form.submit();
        },
        onfocusout: function(element) {
            this.element(element);  
        },
        onkeyup: function(element) {
            $(element).valid();
        },
        highlight: function (input) {
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

    $('#form-password').validate({
        rules: {
            u_password    : {
                required   : true,
                minlength  : 6
            },
            u_confirm     : {
                required   : true,
                minlength  : 6,
                equalTo    : "input[name=u_password]"
            }
        },
        messages: {
            u_password    : {
                required   : "Please provide a password",
                minlength  : "Your password must be at least 6 characters long"
            },
            u_confirm     : {
                required   : "Please confirm your password",
                minlength  : "Your password must be at least 6 characters long",
                equalTo    : "Password do not match!"
            },
        },
        submitHandler: function(form) { 
            form.submit();
        },
        onfocusout: function(element) {
            this.element(element);  
        },
        onkeyup: function(element) {
            $(element).valid();
        },
        highlight: function (input) {
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

    

    //Masked Input ============================================================================================================================
    var $demoMaskedInput = $('.masked-input');

    $demoMaskedInput.find('.mobile-phone-number').inputmask('+63 999 999 9999', { placeholder: '+__ ___ ___ ____' });
});