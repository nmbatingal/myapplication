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
    <div class="col-sm-12">
        <div class="x_panel">
            <div class="x_content">
                {{ Form::open(['url' => url('morale/semestral'), 'class' => '']) }}
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="row">
                        <div class="col-md-2 col-sm-2 col-xs-12 form-group">
                            <label>From</label>
                            <input type="number" class="form-control datetimepicker_month" name="month_from" placeholder="month" required>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12 form-group">
                            <label>To</label>
                            <input type="number" class="form-control datetimepicker_month" name="month_to" placeholder="month" required>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12 form-group">
                            <label>Year</label>
                            <input type="text" class="form-control datetimepicker_year" name="year" placeholder="ex. 2018" required>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <button id="btn_create_ipcr" type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>

    </div>
</section>

<section class="row">
    <div class="col-sm-12">
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
                            <col width="20%">
                            <col>
                            <col width="5%">
                            <col width="5%">
                        </colgroup>
                        <thead>
                            <tr>
                              <th>#</th>
                              <th></th>
                              <th>Progress</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $semesters as $semester )
                                <tr>
                                    <td>#</td>
                                    <td>
                                        <a href="{{ url('morale/semestral/'.$semester['id']) }}">
                                            <strong>{{ $semester->from['acronym']}}-{{ $semester->to['acronym']}}, {{ $semester['year'] }}</strong>
                                        </a>
                                    </td>
                                    <td class="project_progress">
                                        <div class="progress progress_sm">
                                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="77"></div>
                                        </div>
                                        <small>77% Complete</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-green">Success</span>
                                    </td>
                                    <td>
                                        <a href="{{ url('morale/semestral/'.$semester['id']) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>

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
</script>
@endsection