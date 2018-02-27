$(function () {

    autosize($('textarea.auto-growth'));

    //Advanced form with validation
    /*var form = $('#frm_ipcr_objective').show();

    form.validate({
        highlight: function (input) {
            $(input).parents('.form-group').addClass('has-error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-group').removeClass('has-error');
            $(input).parents('.form-group').addClass('has-success');
        },
        errorElement: "small",
        errorPlacement: function (error, element) {
            error.addClass('text-danger');
            $(element).parents('.form-group').append(error);
        },
    });*/

    /*$('form').submit(function(e) {
        e.preventDefault();
        
    });*/
});