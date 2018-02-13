@extends('layouts.psboard.app')

@section('styles')
<style>
    table#table_rating th ,
    table#table_rating td {
        text-align: center;
    }
</style>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>APP ID {{ $interviewee->hasApplicant['id'] }}</h2>
            <ol class="breadcrumb p-l-0">
                <li><a href="{{ route('psbrs.index') }}">Dashboard</a></li>
                <li><a href="{{ route('selection.index') }}">Lineup</a></li>
                <li class="active">{{ $interviewee->hasApplicant['id'] }}</li>
            </ol>
        </div>

        @if (session('info'))
            <div class="alert bg-green alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <b>Instruction</b>
            </div>
        @endif

        <section class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <span class="font-24">{{ $interviewee->hasApplicant['lastname'] }}, {{ $interviewee->hasApplicant['firstname'] }} {{ $interviewee->hasApplicant['middlename'] ? $interviewee->hasApplicant['middlename'][0].'.' : '' }}</span> <small>Description text here...</small>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="info-box-4 hover-zoom-effect">
                                    <div class="icon">
                                        <i class="material-icons col-orange">star</i>
                                    </div>
                                    <div class="content">
                                        <div class="text">INTERVIEWEE RATING</div>
                                        <div class="number">{{ $psb_rating ? $psb_rating->totalAveRating($psb_rating['lineup_applicant_id']) : 0 }}%</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="body bg-blue">
                        <b>Interviewer's Remarks</b>
                    </div>
                    <div class="body">
                        @foreach($ratings as $rating)
                            <div class="media">
                                <div class="media-left">
                                    <a href="javascript:void(0);">
                                        <img class="media-object" src="{{ asset($rating->hasPsbMember['__img']) }}" width="64" height="64">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $rating->hasPsbMember['firstname'] }} {{ $rating->hasPsbMember['middlename'] ? $rating->hasPsbMember['middlename'][0].'.' : '' }} {{ $rating->hasPsbMember['lastname'] }}<small class="pull-right">{{ $rating->updated_at->diffForHumans() }}</small></h4>

                                    <small>Rate: {{ $rating->averageRating() ?: 0 }}%</small>
                                    <p class="comments">
                                        {{ $rating['remarks'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="body">
                        @if ( isset($psb_rating) )
                            {{ Form::model($psb_rating, (['url' => route('psbrs.update', $psb_rating['id']), 'method' => 'PUT', 'id' => 'frmRateApplicant'])) }}
                        @else
                            {{ Form::open(['url' => route('psbrs.store'), 'id' => 'frmRateApplicant']) }}
                        @endif
                            <input type="hidden" name="applicant_id" value="{{ $interviewee['id'] }}">
                            <input type="hidden" name="psb_id" value="{{ Auth::user()->id }}">
                            <div class="alert bg-light-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <b>Instruction</b>
                            </div>

                            <div class="table-responsive">
                                <table id="table_rating" class="table table-striped">
                                    <colgroup>
                                        <col width="12%">
                                        <col width="12%">
                                        <col width="12%">
                                        <col width="12%">
                                        <col width="12%">
                                        <col width="12%">
                                        <col width="12%">
                                        <col width="12%">
                                    </colgroup>
                                    <thead>
                                        <tr class="bg-teal">
                                            <th>Education</th>
                                            <th>Relevant Trainings</th>
                                            <th>Relevant Work Experience</th>
                                            <th>Physical Characteristics & Personality Traits</th>
                                            <th>Interview & Communication Skills</th>
                                            <th>Special Skills</th>
                                            <th>Special Award</th>
                                            <th>Potential</th>
                                        </tr>
                                        <tr class="bg-green">
                                            <th>20%</th>
                                            <th>10%</th>
                                            <th>10%</th>
                                            <th>20%</th>
                                            <th>15%</th>
                                            <th>5%</th>
                                            <th>5%</th>
                                            <th>15%</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="cell_1">{{ $psb_rating['rate_education'] ?: 0 }}</td>
                                            <td id="cell_2">{{ $psb_rating['rate_training'] ?: 0 }}</td>
                                            <td id="cell_3">{{ $psb_rating['rate_experience'] ?: 0 }}</td>
                                            <td id="cell_4">{{ $psb_rating['rate_character'] ?: 0 }}</td>
                                            <td id="cell_5">{{ $psb_rating['rate_comm_skills'] ?: 0 }}</td>
                                            <td id="cell_6">{{ $psb_rating['rate_special_skills'] ?: 0 }}</td>
                                            <td id="cell_7">{{ $psb_rating['rate_special_award'] ?: 0 }}</td>
                                            <td id="cell_8">{{ $psb_rating['rate_potential'] ?: 0 }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <hr>

                            <div class="media">
                                <div class="media-left">
                                    <a href="javascript:void(0);">
                                        <img class="media-object" src="{{ asset(Auth::user()->__img) }}" width="64" height="64">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Your Thoughts</h4>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="remarks" rows="1" class="form-control no-resize auto-growth" placeholder="say something about the interviewee...">{{ $psb_rating['remarks'] }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="media-right">
                                    @if ( isset($psb_rating) )
                                        {{ Form::button('Resubmit', ['class' => 'btn bg-teal waves-effect', 'type' => 'submit']) }}
                                    @else
                                        {{ Form::button('Submit', ['class' => 'btn bg-teal waves-effect', 'type' => 'submit']) }}
                                    @endif

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="header bg-blue">
                        <h2>
                            <span class="font-24">APPLICANT INFORMATION</span>
                        </h2>
                    </div>
                    <div class="body" style="padding: 0;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#applicant_tab" data-toggle="tab" aria-expanded="false">
                                    <i class="material-icons">face</i> APPLICANT
                                </a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#education_tab" data-toggle="tab" aria-expanded="false">
                                    <i class="material-icons">school</i> EDUCATION
                                </a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#training_tab" data-toggle="tab" aria-expanded="false">
                                    <i class="material-icons">supervisor_account</i> TRAININGS
                                </a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#experience_tab" data-toggle="tab" aria-expanded="false">
                                    <i class="material-icons">work</i> EXPERIENCE
                                </a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#eligibility_tab" data-toggle="tab" aria-expanded="false">
                                    <i class="material-icons">public</i> ELIGIBILITY
                                </a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#attachment_tab" data-toggle="tab" aria-expanded="false">
                                    <i class="material-icons">attach_file</i> ATTACHMENTS
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="applicant_tab">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group form-float">
                                                    <label for="fullname">Full name</label>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" value="{{ $interviewee->hasApplicant['firstname'] .' ' . $interviewee->hasApplicant['middlename'].' '. $interviewee->hasApplicant['lastname'] }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <label for="age">Age</label>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" value="{{ $interviewee->hasApplicant['age'] }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <label for="contact">Contact</label>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" value="{{ $interviewee->hasApplicant['contact_number'] }}" readonly>
                                                        <label class="form-label">Mobile number</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <label for="contact">&nbsp;</label>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" value="{{ $interviewee->hasApplicant['email'] }}" readonly>
                                                        <label class="form-label">Email</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade in" id="education_tab">
                                @foreach ( $interviewee->hasApplicant->educations as $education)
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group form-float">
                                                <label for="fullname">Program</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" value="{{ $education['program'] }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group form-float">
                                                <label for="fullname">School</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" value="{{ $education['school'] }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group form-float">
                                                <label for="fullname">School</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" value="{{ $education['year_graduated'] }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div role="tabpanel" class="tab-pane fade in" id="training_tab">
                                @if ( !$interviewee->hasApplicant->trainings )
                                    @foreach ( $interviewee->hasApplicant->trainings as $training )
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="form-group form-float">
                                                    <label for="fullname">Activity title</label>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" value="{{ $training['title'] }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="list-group">
                                                <a href="#" class="list-group-item text-center disabled">no data available</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div role="tabpanel" class="tab-pane fade in" id="experience_tab">
                                @if ( !$interviewee->hasApplicant->trainings )
                                    @foreach ( $interviewee->hasApplicant->trainings as $training )
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="form-group form-float">
                                                    <label for="fullname">Activity title</label>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" value="{{ $training['title'] }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="list-group">
                                                <a href="#" class="list-group-item text-center disabled">no data available</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div role="tabpanel" class="tab-pane fade in" id="eligibility_tab">
                                @if ( !$interviewee->hasApplicant->eligibilities )
                                    @foreach ( $interviewee->hasApplicant->eligibilities as $eligibility )
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="form-group form-float">
                                                    <label for="fullname">Title</label>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" value="{{ $eligibility['title'] }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="list-group">
                                                <a href="#" class="list-group-item text-center disabled">no data available</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div role="tabpanel" class="tab-pane fade in" id="attachment_tab">
                                @if ( !$interviewee->hasApplicant->attachments )
                                    <div class="list-group">
                                    @foreach ( $interviewee->hasApplicant->attachments as $file )
                                        <a href="#" class="list-group-item font-underline col-blue p-t-10 p-b-10"> {{ $file['filename'] }}</a>
                                    @endforeach
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="list-group">
                                                <a href="#" class="list-group-item text-center disabled">no data available</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div><!-- tab end -->
</div>
@endsection

@section('scripts')
<!-- Editable Table Plugin Js -->
<script src="{{ asset('plugins/editable-table/mindmup-editabletable.js') }}"></script>
<!-- Readmore JS -->
<script src="{{ asset('bower/readmore-js/readmore.min.js') }}"></script>
<!-- Autosize Plugin Js -->
<script src="{{ asset('plugins/autosize/autosize.js') }}"></script>
<script src="{{ asset('js/pages/psbrs/show.js') }}"></script>
<script>

    $('.count-to').countTo();
    $('#table_rating').editableTableWidget();
    /*$('#table_rating').editableTableWidget({
        editor: $('<input type="number">')
    });*/
    //Textare auto growth
    autosize($('textarea.auto-growth'));

    $('table#table_rating td').on('validate', function(evt, newValue) {
        if ( $.isNumeric( newValue ) ) { 
            // return false;
        } else {
            //$(this).text();
            return false;
        }
    });

    $('p.comments').readmore({
        collapsedHeight: 60,
        speed: 275,
        lessLink: '<a href="#">Read less</a>',
        embedCSS: false
    });
</script>
@endsection
