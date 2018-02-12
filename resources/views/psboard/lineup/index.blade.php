@extends('layouts.psboard.app')

@section('styles')
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>SELECTION LINEUP</h2>
            <ol class="breadcrumb p-l-0">
              <li><a href="{{ route('psbrs.index') }}">Dashboard</a></li>
              <li class="active">Selection Lineup</li>
            </ol>
        </div>
        
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            LINEUP OF APPLICANTS
                        </h2>
                    </div>
                    <div class="body">

                        <div class="panel-group" id="tab_selection_lineup" role="tablist" aria-multiselectable="true">
                            @foreach ( $lineups as $lineup )
                                <div class="panel panel-primary">
                                    <div class="panel-heading" role="tab" id="heading_{{ $lineup['id'] }}">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#tab_selection_lineup" href="#collapse_{{ $lineup['id'] }}" aria-expanded="true" aria-controls="collapse_{{ $lineup['id'] }}">
                                                {{ $lineup->hasPosition['title'] }}
                                                &nbsp;&nbsp;<span class="badge">{{ $lineup->hasGroups->count() }}</span>

                                                <div class="pull-right">
                                                    {{ date("M-d-Y", strtotime( $lineup['date_interview'] ))}}
                                                </div>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse_{{ $lineup['id'] }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_{{ $lineup['id'] }}">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table id="table-lineup-list" class="table table-bordered table-striped table-hover">
                                                    <colgroup>
                                                        <col>
                                                        <col>
                                                        <col>
                                                        <col>
                                                        <col>
                                                        <col width="5%">
                                                        <col width="5%">
                                                    </colgroup>
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Education</th>
                                                            <th>Relevant Training</th>
                                                            <th>Work Experience</th>
                                                            <th>Eligibility</th>
                                                            <th class="text-center">Your Rating</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $lineups  = App\Models\Hrmis\ApplicantLineupGroup::where('lineup_id', $lineup['id'])->get() ?>

                                                        @foreach ( $lineups as $lineup )
                                                            <tr>
                                                                <td>
                                                                    <a href="{{ route('selection.show', ['id' => $lineup['id']]) }}" target="_blank">
                                                                        {{ $lineup->hasApplicant['lastname'] }}, {{ $lineup->hasApplicant['firstname'] }} {{ $lineup->hasApplicant['middlename'] ? $lineup->hasApplicant['middlename'][0].'.' : '' }}
                                                                    </a>
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
                                                                        {{ $training['conducted_by'] }} - {{ date("M Y", strtotime( $training['from_date'] )) }}<br>
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
                                                                <td class="text-center">
                                                                    {{ $lineup->psbMemberRating($lineup['id'], Auth::user()->id ) }}
                                                                </td>
                                                                <td class="text-center">
                                                                    <a href="{{ route('selection.show', ['id' => $lineup['id']]) }}" class="btn btn-success btn-block waves-effect" target="_blank">Rate</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div><!-- tab end -->
</div>
@endsection

@section('scripts')
@endsection