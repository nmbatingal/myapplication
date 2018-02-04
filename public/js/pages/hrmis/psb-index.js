$(function () {

    $('#table-psb-members').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        columnDefs: [ 
            {
                orderable: false,
                targets: 4,
            },
        ],
        order: [ 0, 'asc' ],
    });

    //Advanced form with validation
    var form = $('#form-psb').show();

    form.validate({
        rules: {
            member       : "required",
            acronym      : "required",
            designation  : "required",
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