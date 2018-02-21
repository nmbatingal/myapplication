@extends('layouts.iprs.app')

@section('title')
Individual Performance | 
@endsection

@section('page-title')
Create <small>Individual Performance</small>
@endsection

@section('styles')
<!-- bootstrap-datetimepicker -->
<link href="{{ asset('gentelella/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
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
    <li><a href="{{ route('iprs.index') }}">Dashboard</a></li>
    <li><a href="{{ url('iprs/myrating') }}">Individual Performance</a></li>
    <li class="active">Create</li>
</ol>
@endsection

@section('content')
<section class="row">
    <div class="col-sm-12">
        <div class="x_panel">
            <div class="x_content">
                {{ Form::open(['id' => 'form_create_ipcr', 'url' => route('iprs.store'), 'class' => 'form-vertical form-label-left']) }}
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12 form-group">
                            <label>Descriptive Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                            <label>Unit</label>
                            <select class="form-control" name="office_id">
                                <option value="">-- Select unit --</option>
                                @foreach( $offices as $office )
                                    <option value="{{ $office['id'] }}">{{ $office['div_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 col-sm-2 col-xs-12 form-group">
                            <label>Year</label>
                            <input type="text" class="form-control datetimepicker_year" name="year" placeholder="ex. 2018" >
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12 form-group">
                            <label>From</label>
                            <input type="number" class="form-control datetimepicker_month" name="month_from" placeholder="month">
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12 form-group">
                            <label>To</label>
                            <input type="number" class="form-control datetimepicker_month" name="month_to" placeholder="month">
                        </div>
                    </div>

                    <div class="pull-right">
                        <button id="btn_create_ipcr" type="submit" class="btn btn-success">Submit</button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>

    </div>
</section>

<section class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div id="div_ipcr_objective" class="x_panel">
            <div class="x_title">
                <div class="panel_toolbox">
                    <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-success dropdown-toggle" type="button" aria-expanded="false">Action <span class="caret"></span></button>
                        <ul role="menu" class="dropdown-menu pull-right">
                            <li><a href="#">Insert title</a></li>
                            <li><a href="#">Insert secondary title</a></li>
                            <li><a href="#">Insert objective</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="table_ipcr" class="table-responsive table table-bordered">
                        <colgroup>
                            <col>
                            <col>
                            <col width="7%">
                            <col width="7%">
                            <col width="7%">
                            <col width="7%">
                            <col width="7%">
                            <col width="7%">
                            <col width="7%">
                            <col width="5%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th rowspan="2">Objective</th>
                                <th rowspan="2">Success Measure</th>
                                <th rowspan="2" class="text-center">Target</th>
                                <th colspan="6" class="text-center">Monthly Target</th>
                                <th rowspan="2" class="text-center"></th>
                            </tr>
                            <tr>
                                <th class="text-center">Jan</th>
                                <th class="text-center">Feb</th>
                                <th class="text-center">Mar</th>
                                <th class="text-center">Apr</th>
                                <th class="text-center">May</th>
                                <th class="td-action text-center">Jun</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="row_title">
                                <td colspan="9"><input type="text" placeholder="id" name=""><textarea rows="1" class="form-control no-resize auto-growth" placeholder="Title" name=""></textarea></td>
                                <td class="td-action text-center">
                                    <button class="btn btn-round btn-sm btn-success"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-round btn-sm btn-danger"><i class="fa fa-remove"></i></button>
                                </td>
                            </tr>
                            <tr class="row_objective">
                                <td><input type="text" name=""><textarea rows="1" class="form-control no-resize auto-growth" placeholder="Objective" name=""></textarea></td>
                                <td><textarea rows="1" class="form-control no-resize auto-growth" placeholder="Success Measure" name=""></textarea></td>
                                <td><input class="form-control" type="text" name=""></td>
                                <td><input class="form-control" type="text" name=""></td>
                                <td><input class="form-control" type="text" name=""></td>
                                <td><input class="form-control" type="text" name=""></td>
                                <td><input class="form-control" type="text" name=""></td>
                                <td><input class="form-control" type="text" name=""></td>
                                <td><input class="form-control" type="text" name=""></td>
                                <td class="td-action text-center">
                                    <button class="btn btn-round btn-sm btn-success"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-round btn-sm btn-danger"><i class="fa fa-remove"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
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