@extends('layouts.morale.app')

@section('title')
Individual Performance | 
@endsection

@section('page-title')
Survey
@endsection

@section('styles')
<!-- Datatables -->
<link href="{{ asset('bower/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('bower/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('bower/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('bower/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('bower/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
<style>
    table#table-survey tr.has-error 
    { 
        outline: thin solid red;
        color: red;
    }
</style>
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{{ route('morale.index') }}">Dashboard</a></li>
    <li class="active">Semesters</li>
    <li class="active">Semesters</li>
</ol>
@endsection

@section('content')
<section class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Legend</h2>
                <ul class="nav navbar-right panel_toolbox" style="padding-left: 40px;">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table">
                    <tbody>
                        <tr>
                            <td><strong class="green">DN</strong></td>
                            <td>Definitely No</td>
                        </tr>
                        <tr>
                            <td><strong class="green">N</strong></td>
                            <td>No</td>
                        </tr>
                        <tr>
                            <td><strong class="green">NS</strong></td>
                            <td>Not Sure</td>
                        </tr>
                        <tr>
                            <td><strong class="green">Y</strong></td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td><strong class="green">DY</strong></td>
                            <td>Definitely Yes</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Morale Survey (Sem {{ $semester->from['acronym'] }} - {{ $semester->to['acronym'] }}, {{ $semester['year'] }})</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="alert alert-success">
                    <p>Instruction</p>
                </div>
                {{ Form::open(['id' => 'frm-survey', 'url' => url('morale') ]) }}
                {{ Form::input('hidden', 'user_id', Auth::user()->id) }}
                <table id="table-survey"  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <colgroup>
                        <col width="1%">
                        <col>
                        <col width="4%">
                        <col width="4%">
                        <col width="4%">
                        <col width="4%">
                        <col width="4%">
                    </colgroup>
                    <thead>
                        <tr>
                          <th class="text-center"></th>
                          <th></th>
                          <th class="text-center">DN</th>
                          <th class="text-center">N</th>
                          <th class="text-center">NS</th>
                          <th class="text-center">Y</th>
                          <th class="text-center">DY</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $questions as $no => $question )
                            <tr>
                                <td class="text-right">{{ ++$no }} {{ Form::input('hidden', 'q_id[]', $question['id']) }}</td>
                                <td>{{ $question['text_question'] }}</td>
                                <td class="text-center">{{ Form::radio('qn_'.$question['id'], '1', false, ['class' => '', 'required' => true]) }}</td>
                                <td class="text-center">{{ Form::radio('qn_'.$question['id'], '2', true, ['class' => '', 'required' => true]) }}</td>
                                <td class="text-center">{{ Form::radio('qn_'.$question['id'], '3', false, ['class' => '', 'required' => true]) }}</td>
                                <td class="text-center">{{ Form::radio('qn_'.$question['id'], '4', false, ['class' => '', 'required' => true]) }}</td>
                                <td class="text-center">{{ Form::radio('qn_'.$question['id'], '5', false, ['class' => '', 'required' => true]) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pull-right">
                    {{ Form::submit() }}
                </div>
                {{ Form::close() }}
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
<script src="{{ asset('js/pages/morale/form.js') }}"></script>
@endsection