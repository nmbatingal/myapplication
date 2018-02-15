@extends('layouts.hrmis.app')

@section('styles')
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>{{ strtoupper( $position->hasPosition['title'] ) }}</h2>
            <ol class="breadcrumb p-l-0">
              <li><a href="{{ route('applicants.index') }}">Dashboard</a></li>
              <li><a href="{{ route('applicants.showApplicants') }}">Applicants</a></li>
              <li><a href="{{ route('lineup.index') }}">Selection Lineup</a></li>
              <li class="active">{{ $position->hasPosition['acronym'] }}</li>
            </ol>
        </div>

        <section class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="panel-group" id="accordion_10" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-col-blue">
                        <div class="panel-heading" role="tab" id="headingSalary">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_10" href="#salary_grade" aria-expanded="false" aria-controls="publication_tab">
                                    SALARY GRADE {{ $position->hasPosition['sal_grade'] }}
                                </a>
                            </h4>
                        </div>
                    </div>
                    <div class="panel panel-col-blue">
                        <div class="panel-heading" role="tab" id="headingTwo_10">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_10" href="#publication_tab" aria-expanded="false" aria-controls="publication_tab">
                                    PUBLICATION NO.
                                </a>
                            </h4>
                        </div>
                        <div id="publication_tab" class="panel-collapse collapse" role="tabpanel" aria-labelledby="publication_tab">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @foreach( explode( ",", $position->hasPosition['publication_no'] ) as $pub_no )
                                            <span class="label label-info">{{ $pub_no }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-col-blue">
                        <div class="panel-heading" role="tab" id="headingTwo_10">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_10" href="#item_tab" aria-expanded="false" aria-controls="item_tab">
                                    ITEM NO.
                                </a>
                            </h4>
                        </div>
                        <div id="item_tab" class="panel-collapse collapse" role="tabpanel" aria-labelledby="item_tab">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @foreach( explode( ",", $position->hasPosition['item_no'] ) as $item_no )
                                            <span class="label label-info">{{ $item_no }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-col-blue">
                        <div class="panel-heading" role="tab" id="headingTwo_10">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_10" href="#requirements_tab" aria-expanded="false" aria-controls="requirements_tab">
                                    REQUIREMENTS
                                </a>
                            </h4>
                        </div>
                        <div id="requirements_tab" class="panel-collapse collapse" role="tabpanel" aria-labelledby="requirements_tab">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label">Education</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="4" class="form-control no-resize auto-growth" name="education_req">{{ $position->hasPosition['education_reqs'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label">Experience</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="4" class="form-control no-resize auto-growth" name="education_req">{{ $position->hasPosition['experience_reqs'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label">Trainings</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="4" class="form-control no-resize auto-growth" name="education_req">{{ $position->hasPosition['training_reqs'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label">Eligibilities</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="4" class="form-control no-resize auto-growth" name="education_req">{{ $position->hasPosition['eligibilities'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
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
                        <button type="button" id="btn-print-list" data-href="{{ route('lineup.print.lineup', ['id' => $position['id']]) }}" class="btn btn-danger waves-effect">PRINT</button>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="table-lineup-list" class="table table-bordered table-striped table-hover">
                                <colgroup>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Education</th>
                                        <th>Relevant Trainings</th>
                                        <th>Work Experience</th>
                                        <th>Eligibility</th>
                                        <th>Performance Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $lineups as $lineup )
                                        <tr>
                                            <td>
                                                {{ $lineup->hasApplicant['lastname'] }}, {{ $lineup->hasApplicant['firstname'] }} {{ $lineup->hasApplicant['middlename'] ? $lineup->hasApplicant['middlename'][0].'.' : '' }}
                                            </td>
                                            <td>
                                                @foreach ( $lineup->hasApplicant->educations as $education )
                                                    {{ $education['program'] }} ({{ $education['acronym'] }})<br>
                                                    {{ $education['school'] }} - {{ date("M Y", strtotime( $education['year_graduated'] )) }}<br>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ( $lineup->hasApplicant->trainings as $training )
                                                    {{ $training['title'] }}<br>
                                                    {{ $training['conducted_by'] }} - {{ date("M Y", strtotime( $training['from_date'] )) }} <br>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ( $lineup->hasApplicant->experiences as $experience )
                                                    {{ $experience['position'] }}<br>
                                                    {{ $experience['agency'] }} - {{ date("M Y", strtotime( $experience['to_date'] )) }}<br>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ( $lineup->hasApplicant->eligibilities as $eligibility )
                                                    {{ $eligibility['title'] }}<br>
                                                @endforeach
                                            </td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div><!-- tab end -->
</div>
@endsection

@section('scripts')
@endsection