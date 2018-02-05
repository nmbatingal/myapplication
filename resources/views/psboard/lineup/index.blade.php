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
            <div class="col-md-8">
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
                                            <a href="#" class="btn btn-success waves-effect">Rate Lineup</a>
                                            <div class="table-responsive">
                                                <table id="table-lineup-list" class="table table-bordered table-striped table-hover">
                                                    <colgroup>
                                                        <col width="25%">
                                                        <col>
                                                        <col width="10%">
                                                        <col width="10%">
                                                    </colgroup>
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Education</th>
                                                            <th>Performance Rating</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $lineups  = App\Models\Hrmis\ApplicantLineupGroup::where('lineup_id', $lineup['id'])->get() ?>

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
                                                                <td></td>
                                                                <td></td>
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