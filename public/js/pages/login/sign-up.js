$(function () {



    $('#sign_up').validate({
        rules: {
            firstname : 'required',
            lastname  : 'required',
            email     : {
                required   : true,
                email      : true,
                remote    : {
                    url : $('input[name=email]').attr('data-url'),
                    type: "POST",
                    data: {
                        _token : function() {
                            return $('input[name=_token]').val();
                        }
                    }
                }
            },
            contact_number : {
                required   : true,
                minlength  : 11
            },
            username      : {
                required  : true,
                remote    : {
                    url : $('input[name=username]').attr('data-url'),
                    type: "POST",
                    data: {
                        _token : function() {
                            return $('input[name=_token]').val();
                        }
                    }
                }
            },
            division_unit : 'required',
            position   : 'required'
        },
        messages: {
            email: {
                required : "Please enter email address",
                email    : "This is not a valid email address!",
                remote   : "email already exist!"
            },
            username : {
                required : "Please enter a username",
                remote   : "username already exist!"
            }
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