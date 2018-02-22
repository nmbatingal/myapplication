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