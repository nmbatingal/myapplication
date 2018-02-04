@extends('layouts.hrmis.app')

@section('styles')
<!-- Bootstrap Select Css -->
<link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
<!-- JQuery DataTable Css -->
<link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>PERSONNEL SELECTION BOARD</h2>
            <ol class="breadcrumb p-l-0">
              <li><a href="{{ route('applicants.index') }}">Dashboard</a></li>
              <li class="active">PSB</li>
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

        <div class="row clearfix">
            <div class="col-md-4">
                <div class="card">
                    <div class="header bg-blue">
                        <h2>
                            ADD PSB MEMBER FORM
                        </h2>
                    </div>

                    {{ Form::open(['url' => route('psb.store'), 'id' => 'form-psb']) }}
                        <div class="body">
                            <label class="control-label">Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="member">
                                        <option value="">-- Please select users --</option>
                                        @foreach( $users as $user )
                                            <option value="{{ $user['id'] }}">{{ $user['firstname'] }} {{ $user['middlename'] ? $user['middlename'][0].'.' : '' }} {{ $user['lastname'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="acronym">
                                    <label class="form-label">Name initials</label>
                                </div>
                            </div>

                            <label class="control-label">Other Details</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="designation">
                                    <label class="form-label">Designation</label>
                                </div>
                            </div>

                            {{ Form::button('Add', ['class' => 'btn btn-primary btn-block waves-effect', 'type' => 'submit']) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
            <!-- Exportable Table -->
            <div class="col-md-8">
                <div class="card">
                    <div class="body">
                        <div class="table-responsive">
                            <table id="table-psb-members" class="table table-bordered table-striped table-hover dataTable">
                                <colgroup>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col width="10%">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Initials</th>
                                        <th>Designation</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $psb_members as $psb )
                                        <tr>
                                            <td>{{ $psb->user['firstname'] }} {{ $psb->user['middlename'] ?: '' }} {{ $psb->user['lastname'] }}</td>
                                            <td>{{ strtoupper($psb['acronym']) }}</td>
                                            <td>{{ $psb['designation'] }}</td>
                                            <td>{{ $psb['status'] }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>

    </div><!-- tab end -->
</div>
@endsection

@section('scripts')
<!-- Select Plugin Js -->
<script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('js/pages/hrmis/psb-index.js') }}"></script>
@endsection
