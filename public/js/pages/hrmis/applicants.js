$(function () {
    
    var form = $('#form-selection-lineup').show();

    $("#selectionLineup").on("show.bs.modal", function () {

        var table = $('#applicant-checkbox').DataTable();
        var ids   = table.rows('.selected').data();

        if (ids.length > 0) {

            ids.each( function(i) {
                var markup = '<tr>' +
                                '<td>'+ i[1] +'</td>' +
                                '<td>'+ i[2] +'</td>' +
                                '<td class="text-center">' +
                                    '<i>remove</i>' +
                                '</td>' +
                            '</tr>';

                $("#table-lineup tbody").append(markup);
            });
        }
    });

    $("#selectionLineup").on("hidden.bs.modal", function () {
        $("#table-lineup tbody").empty();
    });

    /*** FORM SELECTION VALIDATE ***/
    form.validate({
        rules: {
            date_interview  : "required",
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