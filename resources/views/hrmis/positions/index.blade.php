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

        @if (session('info'))
            <div class="alert bg-green" role="alert">
                {!! session('info') !!}
            </div>
        @endif

        <section class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="component-box">
                    <!-- table card example -->
                    <div  class="pmd-card pmd-z-depth pmd-card-custom-view">
                        <div class="table-responsive">
                            <table id="applicant-checkbox" class="table pmd-table table-hover table-striped display responsive" cellspacing="0" width="100%">
                                <colgroup>
                                    <col>
                                    <col>
                                    <col width="15%">
                                    <col width="10%">
                                    <col width="15%">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Title</th>
                                        <th>Salary Grade</th>
                                        <th>Slots</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $positions as $position )
                                        <tr data-key="{{ $position['id'] }}">
                                            <td></td>
                                            <td>{{ $position['title'] }} ({{ strtoupper($position['acronym']) }})</td>
                                            <td>{{ $position['sal_grade'] }}</td>
                                            <td>{{ $position['slots'] }}</td>
                                            <td>
                                                @if($position['status'] == 1)
                                                    <span class="label bg-green">available</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
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
<!-- Autosize Plugin Js -->
<script src="{{ asset('plugins/autosize/autosize.js') }}"></script>

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

    autosize($('textarea.auto-growth'));

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

    $("div.data-table-title").html('<h2 class="pmd-card-title-text">Vacancy List</h2>');

} );
</script>
@endsection
