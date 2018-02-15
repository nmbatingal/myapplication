@extends('layouts.hrmis.app')

@section('styles')
<!-- Bootstrap Tagsinput Css -->
<link href="{{ asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">
<!-- JQuery DataTable Css -->
<link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
<style>
    .modal-custom {
        width: 1440px;
    }
    span.label {
        font-size: 14px;
    }
</style>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>SELECTION LINEUP</h2>
            <ol class="breadcrumb p-l-0">
              <li><a href="{{ route('applicants.index') }}">Dashboard</a></li>
              <li><a href="{{ route('applicants.showApplicants') }}">Applicants</a></li>
              <li class="active">Selection Lineup</li>
            </ol>
        </div>

        <section class="row clearfix">
            <div class="col-md-12">
                @if (session('info'))
                    <div class="alert alert-success">
                        {{ session('info') }}
                    </div>
                @endif
                
            </div>
        </section>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            SELECTION LINEUP OF APPLICANTS
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="table-lineup-list" class="table table-bordered table-striped table-hover dataTable">
                                <colgroup>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col width="10%">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>Position Title</th>
                                        <th>Acronym</th>
                                        <th>No. of Applicants</th>
                                        <th>Date of Interview</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $lineups as $lineup )
                                        <tr>
                                            <td>
                                                <a target="_blank" href="{{ route('lineup.show', ['id' => $lineup['id'] ]) }}" class="btn-view-modal">
                                                    {{ $lineup->hasPosition['title'] }}
                                                </a>
                                            </td>
                                            <td>{{ $lineup->hasPosition['acronym'] }}</td>
                                            <td>{{ $lineup->hasGroups->count() }}</td>
                                            <td>{{ date("M-d-Y", strtotime( $lineup['date_interview'] ))}}</td>
                                            <td class="text-center">
                                                <a href="{{ route('lineup.show', ['id' => $lineup['id'] ]) }}" class="btn btn-xs btn-warning waves-effect btn-view-modal">
                                                    <i class="material-icons">visibility</i>
                                                </a>
                                                <!-- <a href="#" class="btn btn-xs btn-danger waves-effect" data-toggle="tooltip" data-placement="top" title="Remove">
                                                    <i class="material-icons">cancel</i>
                                                </a> -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->

        <!-- Large Size -->
        <div class="modal fade" id="view-lineup" tabindex="-1" role="dialog" data-backdrop="static" >
            <div class="modal-dialog modal-custom" role="document">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h4 class="modal-title" id="modal-lineup-title"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

    </div><!-- tab end -->
</div>
@endsection

@section('scripts')
<!-- Bootstrap Tags Input Plugin Js -->
<script src="{{ asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<!-- Autosize Plugin Js -->
<script src="{{ asset('plugins/autosize/autosize.js') }}"></script>
<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('js/pages/tables/jquery-datatable.js') }}"></script>
<script>
$(document).ready(function() {

    //Textare auto growth
    autosize($('textarea.auto-growth'));

    var userTable = $('#table-lineup-list').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        columnDefs: [ 
            {
                orderable: false,
                targets: 4,
            },
        ],
        order: [ 3, 'asc' ],
    });

    $('#view-lineup').on('click', 'button#btn-print-list', function (e) {
        
        var $href  = $(this).attr('data-href');
        var target = window.open( $href, 'Print','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=1366,height=800');
        target.print();
    });
});

// Show a post
/*$('a.btn-view-modal').on('click', function(e) {

    e.preventDefault();

    $.get($(this).attr('href'), function( data ) {
        var $modal = $('#view-lineup');
        $modal.find('.modal-content').html(data);
        $modal.modal('show');
    });

    /*$('.modal-title').text('Show');
    $('#id_show').val($(this).data('id'));
    $('#title_show').val($(this).data('title'));
    $('#content_show').val($(this).data('content'));
    $('#showModal').modal('show');

});*/

$("#view-lineup").on("hidden.bs.modal", function () {
    $(".modal-body").empty();
});
</script>
@endsection
