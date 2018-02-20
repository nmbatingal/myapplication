@extends('layouts.iprs.app')

@section('title')
Individual Performance | 
@endsection

@section('page-title')
Individual Performance
@endsection

@section('styles')
<!-- Datatables -->
<link href="{{ asset('bower/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('bower/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('bower/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('bower/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('bower/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="row">
    <div class="col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>My Performance</h2>
                <div class="panel_toolbox">
                    <a class="btn btn-success" href="{{ url('iprs/create') }}">Create</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <!-- start project list -->
                    <table class="table table-striped projects">
                        <colgroup>
                            <col width="1%">
                            <col width="20%">
                            <col width="10%">
                            <col>
                            <col width="5%">
                            <col width="15%">
                        </colgroup>
                        <thead>
                            <tr>
                              <th>#</th>
                              <th></th>
                              <th>Target</th>
                              <th>Progress</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#</td>
                                <td>
                                    <a>Pesamakini Backend UI</a>
                                    <br />
                                    <small>Created 01.01.2015</small>
                                </td>
                                <td><h4>15<small>/15</small></h4></td>
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
                                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                    <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- end project list -->
                </div>
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
<!-- Custom JS -->
@endsection