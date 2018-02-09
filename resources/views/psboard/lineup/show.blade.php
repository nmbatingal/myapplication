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
                        <div class="row" style="height: 50px;">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="info-box">
                                    <div class="icon bg-green">
                                        <i class="material-icons">star</i>
                                    </div>
                                    <div class="content">
                                        <div class="text">YOUR RATING</div>
                                        <div class="number count-to" data-from="0" data-to="0" data-speed="1000" data-fresh-interval="20"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="body">
                        <div class="media">
                            <div class="media-left">
                                <a href="javascript:void(0);">
                                    <img class="media-object" src="{{ asset(Auth::user()->__img) }}" width="64" height="64">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Top aligned media</h4>
                                <p class="comments">
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                                    commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                    Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
                                    in faucibus.
                                </p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <a href="javascript:void(0);">
                                    <img class="media-object" src="{{ asset(Auth::user()->__img) }}" width="64" height="64">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Top aligned media</h4>
                                <p class="comments">
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                                    commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                    Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
                                    in faucibus.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="body">
                        <form method="POST" >
                            <div class="alert bg-light-blue alert-dismissible" role="alert">
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
                                            <td id="cell_1">0</td>
                                            <td id="cell_2">0</td>
                                            <td id="cell_3">0</td>
                                            <td id="cell_4">0</td>
                                            <td id="cell_5">0</td>
                                            <td id="cell_6">0</td>
                                            <td id="cell_7">0</td>
                                            <td id="cell_8">0</td>
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
                                            <textarea rows="1" class="form-control no-resize auto-growth" placeholder="say something about the interviewee..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="media-right">
                                    <button type="button" class="btn bg-teal waves-effect">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="header">
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

<script>

    $('.count-to').countTo();
    $('#table_rating').editableTableWidget();
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
