@extends('layouts.hrmis.app')

@section('styles')
<!-- Google icon -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- DataTables css-->

<!-- Bootstrap Material Datetime Picker Css -->
<link href="{{ asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />
<!-- Bootstrap Select Css -->
<link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css">
<!-- build:[href] components/data-table/css/ -->
<link rel="stylesheet" type="text/css" href="{{ asset('components/data-table/css/pmd-datatable.css') }}">
<!-- /build -->
<style>
    table#table-lineup {
        counter-reset: rowNumber;
    }

    table#table-lineup tbody tr {
        counter-increment: rowNumber;
    }

    table#table-lineup tbody tr td:first-child::before {
        content: counter(rowNumber);
        min-width: 1em;
        margin-right: 0.5em;
    }
</style>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>APPLICANTS</h2>
            <ol class="breadcrumb p-l-0">
              <li><a href="{{ route('applicants.index') }}">Dashboard</a></li>
              <li class="active">Applicants</li>
            </ol>
        </div>

        @if (session('info'))
            <div class="alert bg-green" role="alert">
                {!! session('info') !!}
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-12" style="margin-bottom: -10px;">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">search</i>
                                    </span>
                                    <div class="form-line">
                                        <input id="global-search" type="text" class="form-control date" placeholder="Global search">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h2 class="card-inside-title" style="margin: 10px; ">Custom Search Fields</h2>

                        <div class="row clearfix" style="height: 50px;">
                            <div class="col-sm-2">
                                <select id="sex-search" class="form-control show-tick">
                                    <option value="">-- Select sex --</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select id="program-search" class="form-control show-tick">
                                    <option value="">-- Select program --</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select id="status-search" class="form-control show-tick">
                                    <option value="">-- Select status --</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- table card -->
        <div class="row">
            <!-- table card code and example -->
            <div class="col-lg-12">
                <div class="component-box">
                    <!-- table card example -->
                    <div  class="pmd-card pmd-z-depth pmd-card-custom-view">
                        <div class="table-responsive">
                            <table id="applicant-checkbox" class="table pmd-table table-hover table-striped display responsive" cellspacing="0" width="100%">
                                <colgroup>
                                    <col>
                                    <col>
                                    <col width="5%">
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col width="5%">
                                    <col>
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Sex</th>
                                        <th>Education</th>
                                        <th>School</th>
                                        <th>Eligibility</th>
                                        <th>Date Filed</th>
                                        <th>Status</th>
                                        <th>Attachments</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $applicants as $applicant )
                                    <tr data-key="{{ $applicant['id'] }}">
                                        <td></td>
                                        <td>
                                            <input type="hidden" name="id[]" value="{{ $applicant['id'] }}">
                                            <a href="{{ route('applicants.show', ['id' => $applicant['id'] ]) }}" target="_blank">
                                                {{ $applicant['lastname'] }}, {{ $applicant['firstname'] }} {{ $applicant['middlename'] ? $applicant['middlename'][0].'.' : '' }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $applicant['sex'] == 1 ? 'Male' : 'Female' }}
                                        </td>
                                        <td>
                                            @foreach ( $applicant->educations as $education )
                                                {{ $education['program'] }} ({{ $education['acronym'] }})
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ( $applicant->educations as $education )
                                                {{ $education['school'] }} - {{ date("M Y", strtotime( $education['year_graduated'] )) }}
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ( $applicant->eligibilities as $eligibility )
                                                {{ $eligibility['title'] }} <br>
                                            @endforeach
                                        </td>
                                        <td>{{ date("M-d-Y", strtotime( $applicant['created_at'] )) }}</td>
                                        <td>
                                            @if( $applicant['status'] == 0 )
                                                <span class="label bg-red">Not yet interviewed</span>
                                            @elseif( $applicant['status'] == 1 )
                                                <span class="label bg-green">Interviewed</span>
                                            @endif
                                        </td>
                                        <td>
                                            @foreach ( $applicant->attachments as $file )
                                                <a href="{{ asset($file['path'].'/'.$file['filename']) }}" class="font-12">{{ $file['filename'] }}</a>
                                                <br>
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- table card example end -->
                </div>
            </div> <!-- table card code and example end -->
        </div> <!-- table card end -->

        <!-- Large Size -->
        <div class="modal fade" id="selectionLineup" tabindex="-1" role="dialog" data-backdrop="static" >
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h4 class="modal-title" id="largeModalLabel">CREATE SELECTION LINEUP OF APPLICANTS</h4>
                    </div>
                    <form id="form-selection-lineup" action="{{ route('lineup.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="header bg-blue">
                                            <h2>Selection Details</h2>
                                        </div>
                                        <div class="body">
                                            <h2 class="card-inside-title">Position Title</h2>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" data-live-search="true" name="position" required>
                                                        <option value="">-- Please Select --</option>
                                                            @foreach( $positions as $position )
                                                                <option value="{{ $position['id'] }}">{{ $position['title'] }} ({{ strtoupper($position['acronym']) }})</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <h2 class="card-inside-title">Date of Interview</h2>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="datepicker form-control" name="date_interview">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="header bg-blue">
                                            <h2>Selected Applicants</h2>
                                        </div>
                                        <div class="body padding-0">
                                            <div class="body table-responsive">
                                                <table id="table-lineup" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Applicant Name</th>
                                                            <th>Sex</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div><!-- tab end -->
</div>
@endsection

@section('scripts')
<!-- Select Plugin Js -->
<script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Datatable js -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<!-- Datatable Bootstrap -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<!-- Datatable responsive js-->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
<!-- Datatable select js-->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<!-- Moment Plugin Js -->
<script src="{{ asset('plugins/momentjs/moment.js') }}"></script>
<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
<script>
    $(document).ready(function() {
        /* DATE PICKER*/
        $('.datepicker').bootstrapMaterialDatePicker({
            clearButton: true,
            weekStart: 0,
            time: false
        });

        $('.dtp-buttons').each(function(){
            $(this).find('button').addClass('col-black');
        });

        var applicantList = $('#applicant-checkbox').DataTable({
            /*"search": {
                "caseInsensitive": false
            },*/
            responsive: false,
            columnDefs: [ 
                {
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0,
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
                //"sSearch": "",
                //"sSearchPlaceholder": "Search",
                "paginate": {
                    "sNext": " ",
                    "sPrevious": " "
                },
            },
            dom:
                "<'pmd-card-title'<'data-table-title'>>" +
                "<'pmd-card-actions'<'data-table-actions'>>" +
                "<'custom-select-info'<'custom-select-item'><'custom-select-action'>>" +
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
        $("div.data-table-title").html('<h2 class="pmd-card-title-text">List of Applicants</h2>');
        $("div.data-table-actions").html('<a id="btn-create-new" onclick="createNewApplicant()" class="btn pmd-btn-raise pmd-ripple-effect btn-success">Create new applicant</a>');
        $(".custom-select-action").html('<button id="insertSelection" type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#selectionLineup"><i class="material-icons">event</i> <span>Create selection</span></button>');

        $('#global-search').keyup( function() {
              applicantList.search( $(this).val() ).draw() ;
        });

        /* SEARCH COLUMN SEX*/
        applicantList.columns([2]).every( function () {
            var column = this;
         
            // Create the select list and search operation
            var select = $('#sex-search')
                .on( 'change', function () {
                    column
                        .search( $(this).val(), true, true, false)
                        .draw();
                } );
         
            this
                .cache( 'search' )
                .sort()
                .unique()
                .each( function ( d ) {
                    select.append( $('<option value="'+d+'">'+d+'</option>') );
                } );
        } );

        /* SEARCH COLUMN PROGRAM*/
        applicantList.columns([3]).every( function () {
            var column = this;
         
            // Create the select list and search operation
            var select = $('#program-search')
                .on( 'change', function () {
                    column
                        .search( $(this).val(), true, true, false)
                        .draw();
                } );
         
            this
                .cache( 'search' )
                .sort()
                .unique()
                .each( function ( d ) {
                    select.append( $('<option value="'+d+'">'+d+'</option>') );
                } );
        } );

        /* SEARCH COLUMN STATUS*/
        applicantList.columns([7]).every( function () {
            var column = this;
         
            // Create the select list and search operation
            var select = $('#status-search')
                .on( 'change', function () {
                    column
                        .search( $(this).val(), true, true, false)
                        .draw();
                } );
         
            this
                .cache( 'search' )
                .sort()
                .unique()
                .each( function ( d ) {
                    select.append( $('<option value="'+d+'">'+d+'</option>') );
                } );
        } );
    } );
</script>

<script src="{{ asset('js/pages/hrmis/applicants.js') }}"></script>

<script type="text/javascript">
    function createNewApplicant() {
        window.location = "{{ route('applicants.create') }}";
    }

    /*$('#form-selection-lineup').on('submit', function(e) {
        e.preventDefault();

        console.log($(this).serializeArray());
    });*/
</script>
@endsection
