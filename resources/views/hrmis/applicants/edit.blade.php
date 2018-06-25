@extends('layouts.hrmis.app')

@section('styles')
<!-- Bootstrap Material Datetime Picker Css -->
<link href="{{ asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>APPLICANT-NO-{{ $applicant['id'] }}</h2>
            <ol class="breadcrumb p-l-0">
              <li><a href="{{ route('applicants.index') }}">Dashboard</a></li>
              <li><a href="{{ route('applicants.showApplicants') }}">Applicants</a></li>
              <li class="active">{{ $applicant['id'] }}</li>
            </ol>
        </div>

        <div class="row clearfix">
            <div class="col-lg-8">
                <div class="card">
                    <div class="header">
                        <h2>
                            <span class="font-32">{{ $applicant['firstname'] }} {{ $applicant['middlename'] ? $applicant['middlename'][0].'.' : ''}} {{ $applicant['lastname'] }} (edit)</span>
                        </h2>
                    </div>
                    <div class="body">
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
                        </ul>

                        {!! Form::model($applicant, ['url' => '/hrmis/applicants/'. $applicant->id, 'method' => 'put']) !!}
                            <br>
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            <br>
                            <br>
                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div role="tabpanel" class="tab-pane fade in active" id="applicant_tab">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-float">
                                                        <label for="fullname">Date of Application</label>
                                                        <div class="form-line">
                                                            <input id="date_of_application" type="text" class="datepicker form-control" name="date_of_application" value="{{ $applicant['date_of_application'] }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-float">
                                                        <label for="age">Date Received</label>
                                                        <div class="form-line">
                                                            
                                                            <input id="date_received" type="text" class="datepicker form-control" name="date_received" value="{{ $applicant['date_received'] }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group form-float">
                                                        <label for="fullname">Firstname</label>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="firstname" value="{{ $applicant['firstname'] }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <label for="fullname">Middlename</label>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="middlename" value="{{ $applicant['middlename'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <label for="fullname">Lastname</label>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="lastname" value="{{ $applicant['lastname'] }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-float">
                                                        <label for="age">Age</label>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="age" value="{{ $applicant['age'] }}">
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
                                                            <input type="text" class="form-control" name="contact_number" value="{{ $applicant['contact_number'] }}">
                                                            <label class="form-label">Mobile number</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-float">
                                                        <label for="contact">&nbsp;</label>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="email" value="{{ $applicant['email'] }}">
                                                            <label class="form-label">Email</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade in" id="education_tab">
                                    @foreach ( $applicant->educations as $education)
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="form-group form-float">
                                                    <label for="fullname">Program</label>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="program" value="{{ $education['program'] }}">
                                                    </div>
                                                </div>

                                                <div class="form-group form-float">
                                                    <label for="fullname">School</label>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="school" value="{{ $education['school'] }}">
                                                    </div>
                                                </div>

                                                <div class="form-group form-float">
                                                    <label for="fullname">School</label>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="year_graduated" value="{{ $education['year_graduated'] }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div role="tabpanel" class="tab-pane fade in" id="training_tab">
                                    @if ( $applicant->trainings )
                                        @foreach ( $applicant->trainings as $training )
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group form-float">
                                                        <label for="fullname">Activity title</label>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="training_title" value="{{ $training['title'] }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group form-float">
                                                        <label for="fullname">Conducted by</label>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="conducted_by" value="{{ $training['conducted_by'] }}">
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
                                    @if ( $applicant->experiences )
                                        @foreach ( $applicant->experiences as $experience )
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group form-float">
                                                        <label for="fullname">Position</label>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" value="{{ $experience['position'] }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group form-float">
                                                        <label for="fullname">Agency</label>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" value="{{ $experience['agency'] }}" readonly>
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
                                    @if ( $applicant->eligibilities )
                                        @foreach ( $applicant->eligibilities as $eligibility )
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-1">
                                                    <div class="form-group form-float">
                                                        <label for="fullname">Title</label>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" value="{{ $eligibility['title'] }}">
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
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>
                            File Attachments
                        </h2>
                    </div>
                    <div class="body" style="padding: 0 !important">
                        <div class="list-group">
                            @foreach ( $applicant->attachments as $file )
                                <a href="#" class="list-group-item font-underline col-blue p-t-10 p-b-10"> {{ $file['filename'] }}</a>
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
<!-- Moment Plugin Js -->
<script src="{{ asset('plugins/momentjs/moment.js') }}"></script>
<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
<script>
    $(document).ready(function() {
        /* DATE PICKER*/
        $('.datepicker').bootstrapMaterialDatePicker({
            clearButton: true,
            weekStart: 0,
            time: false
        });

        /* DATE TRAINING */
        $('#date-end-training').bootstrapMaterialDatePicker({ 
            clearButton: true,
            weekStart: 0,
            time: false
        });

        $('#date-start-training').bootstrapMaterialDatePicker({
            clearButton: true,
            weekStart: 0,
            time: false 
        }).on('change', function(e, date) {
            $('#date-end-training').bootstrapMaterialDatePicker('setMinDate', date);
        });

        /* DATE WORK */
        $('#date-end-work').bootstrapMaterialDatePicker({ 
            clearButton: true,
            weekStart: 0,
            time: false
        });
        $('#date-start-work').bootstrapMaterialDatePicker({
            clearButton: true,
            weekStart: 0,
            time: false 
        }).on('change', function(e, date) {
            $('#date-end-work').bootstrapMaterialDatePicker('setMinDate', date);
        });

        $('.dtp-buttons').each(function(){
            $(this).find('button').addClass('col-black');
        });
    });
</script>
@endsection
