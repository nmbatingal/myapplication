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
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12 form-group">
                        <label>Descriptive Title</label>
                        <input type="text" class="form-control" value="{{ $ipcr['title'] }}" readonly>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                        <label>&nbsp;</label>
                        <input type="text" class="form-control" value="{{ $ipcr->from['month'] }} - {{ $ipcr->to['month'] }}, {{ $ipcr['year'] }}" readonly>
                    </div>
                </div>
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
                            <col>                   <!-- Objective -->
                            <col>                   <!-- Success Measure -->
                            <col width="7%">        <!-- Target -->

                            <?php

                                $start_month = $ipcr['month_from'];
                                $end_month   = $ipcr['month_to'];
                                $rowspan     = 0;

                                for ($i = $start_month ; $i <= $end_month ;  $i++ ) {
                                    $rowspan++;
                                    echo '<col width="7%">';
                                }
                            ?>

                            <col width="5%">        <!-- Action -->
                        </colgroup>
                        <thead>
                            <tr>
                                <th rowspan="2">Objective</th>
                                <th rowspan="2">Success Measure</th>
                                <th rowspan="2" class="text-center">Target</th>
                                <th colspan="{{ $rowspan }}" class="text-center">Monthly Target</th>
                                <th rowspan="2" class="text-center"></th>
                            </tr>
                            <tr>
                                <?php

                                    for ($i = $start_month ; $i <= $end_month ;  $i++ ) {
                                        $month =  App\Month::month($i)->first();
                                        echo '<th class="text-center">' . $month['acronym'] . '</th>';
                                    }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="row_title">
                                <td colspan="{{ $rowspan + 3 }}">
                                    <input type="text" placeholder="id" name=""><textarea rows="1" class="form-control no-resize auto-growth" placeholder="Title" name=""></textarea>
                                </td>
                                <td class="td-action text-center">
                                    <button class="btn btn-round btn-sm btn-success"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-round btn-sm btn-danger"><i class="fa fa-remove"></i></button>
                                </td>
                            </tr>
                            <tr class="row_objective">
                                <td><input type="text" name=""><textarea rows="1" class="form-control no-resize auto-growth" placeholder="Objective" name=""></textarea></td>
                                <td><textarea rows="1" class="form-control no-resize auto-growth" placeholder="Success Measure" name=""></textarea></td>
                                <td><input class="form-control" type="text" name=""></td> <!-- TARGET -->
                                <?php

                                    for ($i = $start_month ; $i <= $end_month ;  $i++ ) {
                                        echo '<td><input class="form-control" type="text" name=""></td>';
                                    }
                                ?>
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