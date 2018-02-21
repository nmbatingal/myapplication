$(function () {

    autosize($('textarea.auto-growth'));
    
    //Advanced form with validation
    var form = $('#form_add_position').show();

    form.validate({
        rules: {
            title       : "required",
            slots       : "required",
            sal_grade   : "required",
            education_req   : "required",
            experience_req  : "required",
            training_req    : "required",
            eligibility_req : "required"
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        },
    });
});