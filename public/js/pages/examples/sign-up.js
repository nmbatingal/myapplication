$(function () {
    $('#sign_up').validate({
        rules: {
            firstname : 'required',
            lastname  : 'required',
            email     : {
                required   : true,
                email      : true
            },
            contact_number : {
                required   : true,
                minlength  : 11
            },
            division_unit : 'required',
            position   : 'required'
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