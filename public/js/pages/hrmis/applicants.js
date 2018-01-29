$(function () {

    $('#createNewSelection').on('click', function() {

        var table = $('#applicant-checkbox').DataTable();
        var ids   = table.rows('.selected').data();

        $('div#selection-card').removeClass('hidden');

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

    $('#applicant-checkbox tbody').on('click', 'tr', function () {

        var table = $('#applicant-checkbox').DataTable();
        var ids   = table.rows('.selected').data();

        if ( ids.length < 1 ) {
            $('div#selection-card').addClass('hidden');
            $("#table-lineup tbody").empty();
        }

    } );
});