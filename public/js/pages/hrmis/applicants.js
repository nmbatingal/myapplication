$(function () {

    $('#createNewSelection').on('click', function() {

        var table = $('#applicant-checkbox').DataTable();
        var ids   = table.rows('.selected').data();

        // $('#largeModal').modal('show');

        alert(ids.length);
        
        // $('#table-lineup > tbody').find('tr').remove();

        /*if (ids.length > 0) {

            ids.each( function(i) {
                var markup = '<tr>' +
                                '<td>'+ i[1] +'</td>' +
                                '<td>'+ i[2] +'</td>' +
                                '<td>'+ i[5] +'</td>' +
                                '<td class="text-center">' +
                                    '<a href="" class="btn btn-remove-app btn-danger btn-sm"><i class="fa fa-remove"></i></a>' +
                                '</td>' +
                            '</tr>';
                $("#table-lineup tbody").append(markup);
            });

            $('#largeModal').modal('show');
        } else {
            swal({
                title   : 'Warning',
                text    : 'Please select atleast one applicant!',
                type    :  'warning',
                allowOutsideClick: false,
            });
        }*/
    });
});