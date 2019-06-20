@extends('layouts.hrmis.app')

@section('styles')
<!-- Animation Css -->
<!-- <link href="{{ asset('plugins/animate-css/animate.css') }}" rel="stylesheet" /> -->
<!-- Bootstrap Material Datetime Picker Css -->
<link href="{{ asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>CREATE NEW APPLICANT</h2>
            <ol class="breadcrumb p-l-0">
              <li><a href="{{ route('applicants.index') }}">Dashboard</a></li>
              <li><a href="{{ route('applicants.showApplicants') }}">Applicants</a></li>
              <li class="active">Create</li>
            </ol>
        </div>

        <!-- Advanced Form Example With Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>NEW APPLICANT FORM <small>Description text here...</small></h2>
                    </div>
                    <div class="body">
                        <form id="form_new_applicant" action="{{ route('applicants.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <!--
                            <h3>Applicant Information</h3>
                            <fieldset>
                                <div class="row clearfix">
                                    <div class="col-sm-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id="date_of_application" type="text" class="datepicker form-control" name="date_of_application" required>
                                                <label class="form-label">Date of Application</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id="date_received" type="text" class="datepicker form-control" name="date_received" required>
                                                <label class="form-label">Date Received</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title">Name</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="firstname" autofocus>
                                                <label class="form-label">Firstname</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="middlename">
                                                <label class="form-label">Middlename</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="lastname">
                                                <label class="form-label">Lastname</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h2 class="card-inside-title">Sex</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <input name="sex" type="radio" id="radio_1" value="1" />
                                            <label for="radio_1">Male</label>
                                            <input name="sex" type="radio" id="radio_2" value="2" />
                                            <label for="radio_2">Female</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="age" min="0">
                                                <label class="form-label">Age</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h2 class="card-inside-title">Contact</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line masked-input">
                                                <input type="text" class="form-control mobile-phone-number" name="contact_number">
                                                <label class="form-label">Mobile Number</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="email" class="form-control" name="email">
                                                <label class="form-label">Email</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            -->

                            <h3>Education</h3>
                            <fieldset>
                                <h2 class="card-inside-title">Program Information</h2><br>

                                <button
                                    class="btn btn-success"
                                    type="button"
                                    v-on:click.prevent="addProgramsCount()"
                                >Add Program</button>

                                <button
                                    class="btn btn-default"
                                    v-on:click.prevent="alert('test')"
                                >TEST</button>

                                <template v-for="n in applicantProgramsCount">
                                    <hr>
                                    <div class="row clearfix">
                                        <div class="col-sm-9">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="program" class="form-control">
                                                    <label class="form-label">Program</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="acronym" class="form-control">
                                                    <label class="form-label">Acronym</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row clearfix">
                                        <div class="col-sm-9">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="school">
                                                    <label class="form-label">School</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="datepicker form-control" name="year_graduated">
                                                    <label class="form-label">Year graduated</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </fieldset>

                            <h3>Trainings</h3>
                            <fieldset>
                                <h2 class="card-inside-title">Training Details</h2>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="training_title" class="form-control">
                                        <label class="form-label">Title</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="conducted_by" class="form-control">
                                        <label class="form-label">Conducted by</label>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-2">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="training_hours">
                                                <label class="form-label">Hours</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id="date-start-training" type="text" class="form-control" name="from_date_training">
                                                <label class="form-label">From date</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id="date-end-training" type="text" class="form-control" name="to_date_training">
                                                <label class="form-label">To date</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <h3>Work Experience</h3>
                            <fieldset>
                                <h2 class="card-inside-title">Work Details</h2>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="work_position" class="form-control">
                                        <label class="form-label">Position</label>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-9">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="work_agency">
                                                <label class="form-label">Agency</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="salary_grade">
                                                <label class="form-label">Salary Grade</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id="date-start-work" type="text" class="form-control" name="from_date_agency">
                                                <label class="form-label">From date</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id="date-end-work" type="text" class="form-control" name="to_date_agency">
                                                <label class="form-label">To date</label>
                                            </div>
                                        </div>
                                    </div>
                            </fieldset>

                            <h3>Eligibility</h3>
                            <fieldset>
                                <h2 class="card-inside-title">Eligibility</h2>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="title_eligibility" class="form-control">
                                        <label class="form-label">Title</label>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="license_number">
                                                <label class="form-label">License number</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="rating">
                                                <label class="form-label">Rating</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="datepicker form-control" name="exam_date">
                                                <label class="form-label">Exam date</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset><!-- 

                            <h3>Other Details</h3>
                            <fieldset>
                                <h2 class="card-inside-title">File Attachments</h2>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" class="form-control" name="attachment[]" accept=".doc,.docx,.xls,.xlsx,.pdf" multiple>
                                    </div>
                                </div>

                                <h2 class="card-inside-title">Remarks</h2>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea class="form-control" name="remarks" rows="1"></textarea>
                                    </div>
                                </div>
                            </fieldset> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Advanced Form Example With Validation -->

    </div><!-- tab end -->
</div>
@endsection

@section('scripts')
<!-- JQuery Steps Plugin Js -->
<script src="{{ asset('plugins/jquery-steps/jquery.steps.js') }}"></script>
<!-- Moment Plugin Js -->
<script src="{{ asset('plugins/momentjs/moment.js') }}"></script>
<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>

<script src="{{ asset('js/vue.js') }}"></script>
<script src="{{ asset('js/pages/hrmis/create-applicants.js') }}"></script>

@endsection