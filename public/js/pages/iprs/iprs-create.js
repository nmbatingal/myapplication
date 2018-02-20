$(function () {

    //Advanced form with validation
    var form = $('#form_create_ipcr').show();

    form.validate({
        rules: {
            descriptive_title   : "required",
            ipcr_year       : "required",
            ipcr_from_month : "required",
            ipcr_to_month   : "required",
            office_id       : "required",
        },
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
    });
});