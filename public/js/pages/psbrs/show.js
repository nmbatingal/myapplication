$(function () {

    var form = $('#frmRateApplicant').show();

    form.validate({
        rules      : {
            remarks    : "required",
        },
        messages   : {
            remarks    : "anything will do"
        },
        submitHandler: function(form) { 

            var $form = $(form);
            var data  = $form.serializeArray();

            data.push(
                { name: 'education', value: $('td#cell_1').html() },
                { name: 'training', value: $('td#cell_2').html() },
                { name: 'experience', value: $('td#cell_3').html() },
                { name: 'character', value: $('td#cell_4').html() },
                { name: 'communication', value: $('td#cell_5').html() },
                { name: 'special_skills', value: $('td#cell_6').html() },
                { name: 'award', value: $('td#cell_7').html() },
                { name: 'potential', value: $('td#cell_8').html() });

            $.ajax({
                type: $form.attr('method'),
                url : $form.attr('action'),
                data: data,
                success: function(data) {
                    alert(data);
                },
            });

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