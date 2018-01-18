$(function () {

    $('#form-group').validate({
        rules: {
            div_name    : "required",
            acronym     : "required",
            div_head    : "required",
            position    : "required",
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
            error.addClass( "help-block" );

            $(element).parents('.group-input').append(error);
        }
    });

});