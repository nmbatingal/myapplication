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

    <!--  FORM TWO -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div id="div_ipcr_objective" class="x_panel">
            <div class="x_title">
                <div class="panel_toolbox">
                    <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-success dropdown-toggle" type="button" aria-expanded="false">Action <span class="caret"></span></button>
                        <ul role="menu" class="dropdown-menu pull-right">
                            <li><a href="javascript:;" data-id="" class="btn_insert_title">Insert title</a></li>
                            <li><a href="javascript:;" data-id="" class="btn_insert_second_title">Insert secondary title</a></li>
                            <li><a href="javascript:;" data-id="" class="btn_insert_objective">Insert objective</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <!--  Form::open(['id' => 'frm_ipcr_objective', 'url' => url('iprs/objective')]) }} -->
                <input type="hidden" name="ipcr_id" value="{{ $ipcr['id'] }}">
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
                            ?>

                                @for ($i = $start_month ; $i <= $end_month ;  $i++ )
                                    <?php $rowspan++; ?>
                                    <col width="7%">
                                @endfor

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
                                @for ($i = $start_month ; $i <= $end_month ;  $i++ )
                                    <?php $month =  App\Month::month($i)->first(); ?>
                                    <th class="text-center">{{ $month['acronym'] }}</th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($objectives as $objective)
                            <tr>
                                <td>{{ $objective['objective'] }}</td>
                                <td>{{ $objective['key_summary'] }}</td>
                                <td>{{ $objective['target'] }}</td>
                            </tr>
                            @endforeach
                            <tr class="row_title">
                                <td colspan="{{ $rowspan + 3 }}">
                                    <input type="text" name="is_primary_title['+ numberIncr +']" value="1">
                                    <input type="text" name="is_title['+ numberIncr +']" value="1">
                                    <div class="form-group">
                                        <textarea rows="1" class="form-control no-resize auto-growth" placeholder="Title" name="title['+ numberIncr +']" required></textarea>
                                    </div>
                                </td>
                                <td class="td-action text-center">
                                    <a class="btn btn-round btn-sm btn-success"><i class="fa fa-check"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- ROW OBJECTIVE -->
    <table class="hidden">
        <tr class="row_objective" parent-id="1">
            <td>
                <input type="text" class="row_objective" placeholder="parent[1]" name="parent[1]" value="1" readonly>
                <input type="text" placeholder="is_title" name="" value="0" readonly>
                <textarea rows="1" class="form-control no-resize auto-growth" placeholder="Objective" name=""></textarea>
            </td>
            <td><textarea rows="1" class="form-control no-resize auto-growth" placeholder="Success Measure" name=""></textarea></td>
            <td><input class="form-control" type="text" name=""></td> <!-- TARGET -->
                @for ($i = $start_month ; $i <= $end_month ;  $i++ )
                    <td><input class="form-control" type="text" name=""></td>
                @endfor
            <td class="td-action text-center">
                <button class="btn btn-round btn-sm btn-success"><i class="fa fa-check"></i></button>
                <a class="btn btn-round btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                <a class="btn btn-round btn-sm btn-danger"><i class="fa fa-remove"></i></a>
            </td>
        </tr>
    </table>
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
<script src="{{ asset('js/pages/iprs/ipcr-objective.js') }}"></script>
<script type="text/javascript">

    $(document).ready(function() {

        /***button insert new title row */
        $('a.btn_insert_title').on('click', function() {

            var numberIncr = $('tr.row_title').length;
             numberIncr++;

            var $t_body    = $('table#table_ipcr tbody');
            var $row_title = '<tr class="row_title">' +
                                '<td colspan="{{ $rowspan + 3 }}">' +
                                    '<input type="text" name="is_primary_title['+ numberIncr +']" value="1">' +
                                    '<input type="text" name="is_title['+ numberIncr +']" value="1">' +
                                    '<div class="form-group">' +
                                        '<textarea rows="1" class="form-control no-resize auto-growth" placeholder="Title" name="title['+ numberIncr +']" required></textarea>' +
                                    '</div>' +
                                '</td>' +
                                '<td class="td-action text-center">' +
                                    '<a class="btn btn-round btn-sm btn-primary"><i class="fa fa-pencil"></i></a>' +
                                    '<a class="btn btn-round btn-sm btn-danger"><i class="fa fa-remove"></i></a>' +
                                '</td>' +
                            '</tr>';

            $t_body.append($row_title);
            autosize( $('.auto-growth') );

        });

        /*button insert new secondary title row */
        $('a.btn_insert_second_title').on('click', function() {

            var numberIncr = $('tr.row_title').length;
            // numberIncr++;

            var $t_body    = $('table#table_ipcr tbody');
            var $row_title = '<tr class="row_title">' +
                                '<td colspan="{{ $rowspan + 3 }}">' +
                                    '<input type="text" name="is_secondary_title['+ numberIncr +']" value="1">' +
                                    '<input type="text" name="is_title['+ numberIncr +']" value="1">' +
                                    '<div class="form-group">' +
                                        '<textarea rows="1" class="form-control no-resize auto-growth" placeholder="Secondary title" name="title['+ numberIncr +']" required></textarea>' +
                                    '</div>' +
                                '</td>' +
                                '<td class="td-action text-center">' +
                                    '<a class="btn btn-round btn-sm btn-primary"><i class="fa fa-pencil"></i></a>' +
                                    '<a class="btn btn-round btn-sm btn-danger"><i class="fa fa-remove"></i></a>' +
                                '</td>' +
                            '</tr>';

            $t_body.append($row_title);
            autosize( $('.auto-growth') );

        });

        /*** button insert new objective row **
        /*$('a.btn_insert_objective').on('click', function() {

            var $t_body        = $('table#table_ipcr tbody');
            var $row_objective = '<tr class="row_objective">' +
                                    '<td><input type="text" name=""><textarea rows="1" class="form-control no-resize auto-growth" placeholder="Objective" name=""></textarea></td>' +
                                    '<td><textarea rows="1" class="form-control no-resize auto-growth" placeholder="Success Measure" name=""></textarea></td>' +
                                    '<td><input class="form-control" type="text" name=""></td>' +
                                        '@for ($i = $start_month ; $i <= $end_month ;  $i++ )' +
                                            '<td><input class="form-control" type="text" name=""></td>' +
                                        '@endfor' +
                                    '<td class="td-action text-center">' +
                                        '<button class="btn btn-round btn-sm btn-success"><i class="fa fa-check"></i></button>' +
                                        '<button class="btn btn-round btn-sm btn-primary"><i class="fa fa-pencil"></i></button>' +
                                        '<button class="btn btn-round btn-sm btn-danger"><i class="fa fa-remove"></i></button>' +
                                    '</td>' +
                                '</tr>';

            $t_body.append($row_objective);
            autosize( $('.auto-growth') );

        });*

        $('form#frm_ipcr_objective').submit(function(e) {
            e.preventDefault();

            $.ajax({

            });
        });*/
    });
</script>
@endsection