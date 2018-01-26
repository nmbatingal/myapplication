@extends('layouts.hrmis.app')

@section('styles')
<!-- Google icon -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Bootstrap Tagsinput Css -->
<link href="{{ asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">

<!-- DataTables css-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css">

<!-- build:[href] components/data-table/css/ -->
<link rel="stylesheet" type="text/css" href="{{ asset('components/data-table/css/pmd-datatable.css') }}">
<!-- /build -->
<style>
    span.tag {
        font-size: 12px;
    }
</style>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>POSITIONS</h2>
            <ol class="breadcrumb p-l-0">
              <li><a href="{{ route('applicants.index') }}">Dashboard</a></li>
              <li class="active">Positions</li>
            </ol>
        </div>

        <section class="row clearfix">
            <div class="col-lg-5">
                <div class="card">
                    <div class="header bg-green">
                        <h2>Add New Position Opening</h2>
                    </div>
                    <form>
                        <div class="body">
                            <h2 class="card-inside-title">Position Details</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control">
                                            <label class="form-label">Title</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control">
                                            <label class="form-label">Acronym</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control">
                                            <label class="form-label">Salary grade</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h2 class="card-inside-title">Item No</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" data-role="tagsinput">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h2 class="card-inside-title">Publication No</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" data-role="tagsinput">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h2 class="card-inside-title">Position Requirements</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" data-role="tagsinput">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="body">
                            <button type="submit" class="btn btn-md btn-success waves-effect">Submit</button>
                            <button type="reset" class="btn btn-md btn-default waves-effect">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="component-box">
                    <!-- table card example -->
                    <div  class="pmd-card pmd-z-depth pmd-card-custom-view">
                        <div class="table-responsive">
                            <table id="applicant-checkbox" class="table pmd-table table-hover table-striped display responsive" cellspacing="0" width="100%">
                                <colgroup>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Title</th>
                                        <th>Acronym</th>
                                        <th>Salary Grade</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-key="">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>aaas</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- table card example end -->
                </div>
            </div>
        </section>

    </div><!-- tab end -->
</div>
@endsection

@section('scripts')
<!-- Bootstrap Tags Input Plugin Js -->
<script src="{{ asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<!-- Datatable js -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<!-- Datatable Bootstrap -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<!-- Datatable responsive js-->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
<!-- Datatable select js-->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<!-- Propeller Data table js-->
<script>
//Propeller Customised Javascript code 
$(document).ready(function() {

    $('#applicant-checkbox').DataTable({
        responsive: false,
        columnDefs: [ 
            {
                orderable: false,
                className: 'select-checkbox',
                targets:0,
            },
        ],
        select: {
            style: 'multi',
            selector: 'td:first-child'
        },
        order: [ 1, 'asc' ],
        bFilter: true,
        bLengthChange: true,
        pagingType: "simple",
        "paging": true,
        "searching": true,
        "language": {
            "info": " _START_ - _END_ of _TOTAL_ ",
            "sLengthMenu": "<span class='custom-select-title'>Rows per page:</span><span> _MENU_ </span>",
            "sSearch": "",
            "sSearchPlaceholder": "Search",
            "paginate": {
                "sNext": " ",
                "sPrevious": " "
            },
        },
        dom:
            "<'pmd-card-title'<'data-table-title'>>" +
            "<'pmd-card-actions'<'search-paper pmd-textfield'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'pmd-card-footer' <'pmd-datatable-pagination' l i p>>",
    });
    /// Select value
    $('.custom-select-info').hide();
    
    $('#applicant-checkbox tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            var rowinfo = $(this).closest('.dataTables_wrapper').find('.select-info').text();
            $(this).closest('.dataTables_wrapper').find('.custom-select-info .custom-select-item').text(rowinfo);
            if ($(this).closest('.dataTables_wrapper').find('.custom-select-info .custom-select-item').text() != null){
                $(this).closest('.dataTables_wrapper').find('.custom-select-info').show();
                //show delet button
            } else{
                $(this).closest('.dataTables_wrapper').find('.custom-select-info').hide();
            }
        }
        else {
            var rowinfo = $(this).closest('.dataTables_wrapper').find('.select-info').text();
            $(this).closest('.dataTables_wrapper').find('.custom-select-info .custom-select-item').text(rowinfo);
        }
        if($('#applicant-checkbox').find('.selected').length == 0){
            $(this).closest('.dataTables_wrapper').find('.custom-select-info').hide();
        }
    } );

    $("div.data-table-title").html('<h2 class="pmd-card-title-text">List of Positions for Hiring</h2>');

} );
</script>

<script type="text/javascript">

    function createNewApplicant() {
        window.location = "{{ route('applicants.create') }}";
    }

    // $('button[type=button]').remove();
    /*$('button#btn-selection').on('click', function() {
        alert("THIS!");
    });*/

</script>
@endsection
