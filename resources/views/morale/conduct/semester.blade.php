@extends('layouts.morale.app')

@section('title')
Morale Survey | 
@endsection

@section('page-title')
Semesters <small>Morale Survey</small>
@endsection

@section('styles')
<!-- bootstrap-datetimepicker -->
<link href="{{ asset('gentelella/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
<!-- Datatables -->
<link href="{{ asset('bower/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('bower/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('bower/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('bower/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('bower/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
<style>
    #table_ipcr .form-control {
        border: 0;
    }

    #table_ipcr textarea {
       resize: none;
    }

    #table_ipcr tr td {
        padding: 0 !important;
        margin: 0 !important;
    }

    #table_ipcr tr td.td-action {
        padding: 2px !important;
    }
</style>
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{{ route('morale.index') }}">Dashboard</a></li>
    <li class="active">Semesters</li>
</ol>
@endsection

@section('content')
<section class="row">
    <div class="col-sm-9">
        <div class="x_panel">
            <div class="x_title">
                <h2>Semester List</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped projects">
                    <colgroup>
                        <col width="1%">
                        <col>
                        <col width="10%">
                        <col width="15%">
                        <col width="5%">
                    </colgroup>
                    <thead>
                        <tr>
                          <th>#</th>
                          <th></th>
                          <th>Status</th>
                          <th>Rating</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $semesters as $semester )
                            <?php
                                $status = App\Models\Morale\MoraleSurveyNotification::isDone($semester['id'], Auth::user()->id)->first();
                            ?>
                            <tr>
                                <td>#</td>
                                <td>
                                    <a href="javacript:;">
                                        <strong>{{ $semester->from['acronym']}}-{{ $semester->to['acronym']}}, {{ $semester['year'] }}</strong>
                                    </a>
                                </td>
                                <td>
                                    @if ( $status ) 
                                       <span class="badge bg-green">Done</span>
                                    @endif
                                </td>
                                <td>
                                    {{ number_format(App\Models\Morale\MoraleSurveyRatings::userOverallIndex( $semester['id'], Auth::user()->id ), '2', '.', '') }}%
                                </td>
                                <td>
                                    @if ( !$status ) 
                                        <a href="{{ url('morale/semestral/'.$semester['id']) }}" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Take survey </a>
                                    @else
                                        <a href="{{ url('morale/semestral/'.$semester['id']).'/view' }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div><strong>Individual</strong> {{ number_format(App\Models\Morale\MoraleSurveyRatings::userOverallIndex( $semester['id'], Auth::user()->id ), '2', '.', '') }}</div>

        

        <button id="swal" class="btn btn-success">Click me</button>
    </div>
</section>
@endsection

@section('scripts')
<!-- bootstrap-progressbar -->
<script src="{{ asset('bower/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<!-- Datatables -->
<script src="{{ asset('bower/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('bower/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('bower/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('bower/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('bower/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('bower/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('bower/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('bower/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('bower/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('bower/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('bower/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<!-- autosize -->
<script src="{{ asset('plugins/autosize/autosize.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('gentelella/vendors/moment/min/moment.min.js') }}"></script>
<!-- bootstrap-datetimepicker -->    
<script src="{{ asset('gentelella/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<!-- custom jquery -->
<script src="{{ asset('js/pages/iprs/iprs-create.js') }}"></script>
<script>
    $('.datetimepicker_year').datetimepicker({
        viewMode: 'years',
        format: 'YYYY'
    });

    $('.datetimepicker_month').datetimepicker({
        viewMode: 'months',
        format: 'MM'
    });

    $('#swal').on('click', function(){
        swal("Hello world!");
    });
</script>
@endsection