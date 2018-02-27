$(function () {
    
    //Advanced form with validation
    var form = $('#frm-survey').show();

    form.validate({
        highlight: function (input) {
            $(input).closest('tr').addClass('has-error');
        },
        unhighlight: function (input) {
            $(input).closest('tr').removeClass('has-error');
        },
        errorPlacement: function (error, element) {
            //
        },
    });
});