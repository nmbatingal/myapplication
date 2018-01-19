@extends('layouts.psbrs.app')

@section('styles')

<!-- Google icon -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- DataTables css-->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css">
<!-- Propeller dataTables css-->

<!-- build:[href] components/data-table/css/ -->
<link rel="stylesheet" type="text/css" href="{{ asset('components/data-table/css/pmd-datatable.css') }}">
<!-- /build -->
@endsection

@section('header-title')
HRMIS
@endsection

@section('content')
<div id="content" class="pmd-content inner-page">
    <!--tab start-->
    <div class="container-fluid full-width-container">
        <!-- Title -->
        <h1 class="section-title" id="services">
            <span>Applicants</span>
        </h1><!-- End Title -->
    
        <!--breadcrum start-->
        <ol class="breadcrumb text-left">
          <li><a href="{{ route('hrmis.index') }}">Dashboard</a></li>
          <li class="active">Applicants</li>
        </ol><!--breadcrum end-->

        <!-- table card -->
        <section class="row component-section">
        
            <!-- table card title and description -->
            <div class="col-md-2">
                <div id="card">
                    <h2>Propeller Data table</h2>
                </div>
                <p>In its simplest form, a data table contains a top row of column names, and rows for data. Checkboxes should accompany each row if the user needs to select or manipulate data.</p>
            </div> <!-- table card title and description end -->

            <!-- table card code and example -->
            <div class="col-md-10">
                <div class="component-box">
                    <!-- table card example -->
                    <div  class="pmd-card pmd-z-depth pmd-card-custom-view">
                        <div class="table-responsive">
                        <table id="example-checkbox" class="table pmd-table table-hover table-striped display responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Education</th>
                                <th>Trainings</th>
                                <th>Experience</th>
                                <th>Eligibility</th>
                                <th>Date Filed</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>Tiger</td>
                                <td>Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>2011/04/25</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Brielle</td>
                                <td>Williamson</td>
                                <td>Integration Specialist</td>
                                <td>New York</td>
                                <td>61</td>
                                <td>2012/12/02</td>
                                <td>2012/12/02</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Herrod</td>
                                <td>Chandler</td>
                                <td>Sales Assistant</td>
                                <td>San Francisco</td>
                                <td>59</td>
                                <td>2012/08/06</td>
                                <td>2012/08/06</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Airi</td>
                                <td>Satou</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>33</td>
                                <td>2008/11/28</td>
                                <td>2008/11/28</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Brielle</td>
                                <td>Williamson</td>
                                <td>Integration Specialist</td>
                                <td>New York</td>
                                <td>61</td>
                                <td>2012/12/02</td>
                                <td>2012/12/02</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Herrod</td>
                                <td>Chandler</td>
                                <td>Sales Assistant</td>
                                <td>San Francisco</td>
                                <td>59</td>
                                <td>2012/08/06</td>
                                <td>2012/08/06</td>
                            </tr>
                        </tbody>
                    </table>
                        </div>
                    </div> <!-- table card example end -->
                
                </div>
            </div> <!-- table card code and example end -->
        </section> <!-- table card end -->

    </div><!-- tab end -->
</div>
@endsection

@section('scripts')
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
    $('#example-checkbox').DataTable({
        responsive: false,
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:0,
        } ],
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
            "sLengthMenu": "<span class='custom-select-title'>Rows per page:</span> <span class='custom-select'> _MENU_ </span>",
            "sSearch": "",
            "sSearchPlaceholder": "Search",
            "paginate": {
                "sNext": " ",
                "sPrevious": " "
            },
        },
        dom:
            "<'pmd-card-title'<'data-table-title'><'search-paper pmd-textfield'f>>" +
            "<'custom-select-info'<'custom-select-item'><'custom-select-action'>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'pmd-card-footer' <'pmd-datatable-pagination' l i p>>",
    });
    
    /// Select value
    $('.custom-select-info').hide();
    
    $('#example-checkbox tbody').on( 'click', 'tr', function () {
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
        if($('#example-checkbox').find('.selected').length == 0){
            $(this).closest('.dataTables_wrapper').find('.custom-select-info').hide();
        }
    } );
    $("div.data-table-title").html('<h2 class="pmd-card-title-text">List of Applicants</h2>');
    $(".custom-select-action").html('<button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button"><i class="material-icons pmd-sm">delete</i></button><button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button"><i class="material-icons pmd-sm">more_vert</button>');
} );
</script>

@endsection
