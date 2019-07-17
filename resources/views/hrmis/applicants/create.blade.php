@extends('layouts.hrmis.app')

@section('styles')
<!-- Animation Css -->
<!-- <link href="{{ asset('plugins/animate-css/animate.css') }}" rel="stylesheet" /> -->
<!-- Bootstrap Material Datetime Picker Css -->

<link href="{{ asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />
<link href="{{ asset('css/animate-css/animate.min.css') }}" rel="stylesheet" />

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
                        <div style="display: flex; justify-content: space-between;">
                            <h2>NEW APPLICANT FORM <small>Description text here...</small></h2>

                            <button
                                type="button"
                                class="
                                    btn btn-success 
                                    animated slideInRight"
                                data-toggle="modal"
                                data-target="#excelUploadForm"
                            >
                                Import Excel
                            </button>
                        </div>

                        <!-- MODAL start -->
                        <div 
                            class="modal fade" 
                            id="excelUploadForm" 
                            tabindex="-1" 
                            role="dialog" 
                            aria-labelledby="excelUploadFormLabel" 
                            aria-hidden="true">

                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">
                                            Upload Excel File
                                        </h5>
                                    </div>

                                    <div class="modal-body" style="display:flex; flex-direction:row-reverse;">
                                        <!-- EXCEL upload form -->
                                        <form 
                                            method="POST" 
                                            action="{{ route('applicants.csvUpload') }}"
                                            enctype="multipart/form-data"
                                        >
                                            {{ csrf_field() }}
                                            <label for="applicantsFile"></label>
                                            <input
                                                type="file"
                                                name="applicantsFile"
                                                id="applicantsFile"
                                            >

                                            <button type="submit" class="btn btn-warning">
                                                Upload
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div><!-- MODAL FORM -->

                    </div>

                    <div id="form-new-applicant" class="body">
                        <form id="form_new_applicant" action="{{ route('applicants.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <h3>Applicant Information</h3>
                            <fieldset>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id="date_of_application" type="text" class="datepicker form-control" name="date_of_application" required>
                                                <label class="form-label">Date of Application</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
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

                                <div style="
                                    display: flex; 
                                    justify-content: flex-start; 
                                ">
                                    <!-- SEX -->
                                    <div style="display: flex; flex-direction: column;" class="col-sm-4">
                                        <h2 class="card-inside-title">Sex</h2>
                                        <div class="form-check form-check-inline">
                                            <input name="sex" type="radio" id="radio_1" class="form-check-input" value="1" />
                                            <label for="radio_1" class="form-check-label">Male</label>
                                            <input name="sex" type="radio" id="radio_2" class="form-check-input" value="2" />
                                            <label for="radio_2" class="form-check-label">Female</label>
                                        </div>
                                    </div>

                                    <!-- AGE -->
                                    <div style="
                                        display: flex; 
                                        flex-direction: column;" 
                                    class="col-sm-4">
                                        <h2 class="card-inside-title">Age</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="age" min="0">
                                                <!-- <label class="form-label">Age</label> -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- CIVIL STATUS -->
                                    <div style="
                                        display: flex; 
                                        flex-direction: column;
                                    " class="col-sm-4">
                                        <h2 class="card-inside-title">Civil Status</h2>
                                        <div class="form-group">
                                            <select
                                                name="civil_status" 
                                                id="civil_status"
                                                class="form-control"
                                            >
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Widowed">Widowed</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <!--
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
                                -->

                                <h2 class="card-inside-title">Home Address</h2>
                                <!-- HOME ADDRESS fieldset-->
                                <div
                                    id="address-fieldset"
                                    style="
                                        display: flex;
                                        flex-direction: column;
                                    "
                                >
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="region">Region</label>
                                                <select 
                                                    v-model="selected.regionCode"
                                                    @change="getProvinces"
                                                    name="region" 
                                                    id="region" 
                                                    class="form-control"
                                                    autofocus
                                                >
                                                    <option
                                                        v-for="region in regions"
                                                        v-bind:value="region.code"
                                                    >
                                                        @{{ region.name }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div 
                                        v-bind:class="{
                                            slideInDown: selected.regionCode != '',
                                            slideOutUp: selected.regionCode == ''
                                        }"
                                        class="col-sm-10 animated"
                                    >
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="province">Province</label>
                                                <select 
                                                    v-model="selected.provinceCode"
                                                    @change="getMunicipalities"
                                                    name="province"
                                                    id="province" 
                                                    class="form-control"
                                                >
                                                    <option
                                                        v-for="province in provinces"
                                                        v-bind:value="province.code"
                                                    >
                                                        @{{ province.name }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div 
                                        v-bind:class="{
                                            slideOutUp: selected.provinceCode == '',
                                            slideInDown: selected.provinceCode != ''
                                        }"
                                        class="col-sm-10 animated"
                                    >
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label id="municipality">Municipality</label>
                                                <select 
                                                    v-model="selected.municipalityCode"
                                                    @change="getBarangays"
                                                    name="municipality" 
                                                    id="municipality" 
                                                    class="form-control"
                                                >
                                                    <option
                                                        v-for="municipality in municipalities"
                                                        v-bind:value="municipality.code"
                                                    >
                                                        @{{ municipality.name }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div 
                                        v-bind:class="{
                                            slideInDown: selected.municipalityCode != '',
                                            slideOutUp: selected.municipalityCode == ''
                                        }"
                                        class="col-sm-10 animated"
                                    >
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="barangay">Barangay</label>
                                                <select 
                                                    v-model="selected.barangayCode"
                                                    name="barangay"
                                                    id="barangay" 
                                                    class="form-control"
                                                >
                                                    <option
                                                        v-for="barangay in barangays"
                                                        v-bind:value="barangay.code"
                                                    >
                                                        @{{ barangay.name }}
                                                    </option>
                                                </select>
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

                            <h3>Education</h3>
                            <fieldset>
                                <h2 class="card-inside-title">Program Information</h2><br>

                                <button
                                    id="button-add-program"
                                    class="btn btn-info animated slideInLeft"
                                    type="button"
                                >Add Program</button>

                                <!-- Populated by Vanilla JS (custom), that generates new entry. -->
                                <div id="programs-info"></div>

                                <template class="template-programs-info">
                                    <hr>
                                    <div style="
                                        display: grid;
                                        grid-template-columns: repeat(4, 1fr);
                                        grid-column-gap: 1em;
                                        grid-row-gap: 1em;
                                    ">
                                        <!-- Academic Degree -->
                                        <div style="
                                            grid-column: 1/3;
                                            grid-row: 1/2;
                                        " class="animated slideInDown">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Academic Degree</label>
                                                    <select
                                                        class="form-control" 
                                                        name="degree_types[]"
                                                    >
                                                        <option value="0"></option>
                                                        @foreach($academicDegrees as $academicDegree)
                                                            <optgroup label="{{ $academicDegree->name }}">
                                                                @foreach($academicDegree->degreeTypes as $degreeType)
                                                                    <option value="{{ $degreeType->id }}">{{ $degreeType->name }}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Course Category -->
                                        <div style="
                                            grid-column: 3/5;
                                            grid-row: 1/2;
                                        " class="animated slideInDown">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Course Category</label>
                                                    <select
                                                        class="form-control"
                                                        name="course_categories[]"
                                                    >
                                                        <option value="0"></option>
                                                        @foreach($courseCategories as $courseCategory)
                                                            <option value="{{ $courseCategory->id }}">{{ $courseCategory->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Program -->
                                        <div
                                            style="
                                                grid-column: 1/4;
                                                grid-row: 2/3;
                                            "
                                            class="animated slideInDown"
                                        >
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input
                                                        type="text" 
                                                        name="programs[]" 
                                                        class="form-control"
                                                        placeholder=" e.g. Information Technology"
                                                    >
                                                    <label class="form-label">Program</label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Acronym -->
                                        <div
                                            class="animated slideInDown"
                                            style="
                                                grid-column: 4/5;
                                                grid-row: 2/3;
                                            "
                                        >
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="acronyms[]" class="form-control">
                                                    <label class="form-label">Acronym</label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- School/University -->
                                        <div 
                                            class="animated slideInDown"
                                            style="
                                                grid-column: 1/4;
                                                grid-row: 3/4;
                                            "
                                        >
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="schools[]">
                                                    <label class="form-label">School</label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Year Graduated -->
                                        <div 
                                            class="animated slideInDown"
                                            style="
                                                grid-column: 4/5;
                                                grid-row: 3/4;
                                            "
                                        >
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="datepicker form-control" name="years_graduated[]">
                                                    <label class="form-label">Year graduated</label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Honours received -->
                                        <div 
                                            class="animated slideInDown"
                                            style="
                                                grid-column: 1/4;
                                                grid-row: 4/5;
                                            "
                                        >
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="honors_received[]">
                                                    <label class="form-label">Honors Received</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!--
                                    <div class="row clearfix">

                                        <div class="col-sm-9">
                                            <div class="form-group form-float animated slideInDown">
                                                <div class="form-line">
                                                    <input type="text" name="programs[]" class="form-control">
                                                    <label class="form-label">Program</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group form-float animated slideInDown">
                                                <div class="form-line">
                                                    <input type="text" name="acronyms[]" class="form-control">
                                                    <label class="form-label">Acronym</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-sm-9">
                                            <div class="form-group form-float animated slideInDown">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="schools[]">
                                                    <label class="form-label">School</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float animated slideInDown">
                                                <div class="form-line">
                                                    <input type="text" class="datepicker form-control" name="years_graduated[]">
                                                    <label class="form-label">Year graduated</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    -->
                                </template>

                            </fieldset>

                            <h3>Trainings</h3>
                            <fieldset>
                                <h2 class="card-inside-title">Training Details</h2>

                                <button
                                    id="button-add-training"
                                    class="btn btn-info animated slideInLeft"
                                    type="button"
                                >Add Trainings</button>

                                <div id="trainings-info"></div>

                                <template class="template-trainings-info">
                                    <hr>
                                    <div class="form-group form-float animated slideInDown">
                                        <div class="form-line">
                                            <input type="text" name="training_titles[]" class="form-control">
                                            <label class="form-label">Title</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float animated slideInDown">
                                        <div class="form-line">
                                            <input type="text" name="conducted_by[]" class="form-control">
                                            <label class="form-label">Conducted by</label>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-2">
                                            <div class="form-group form-float animated slideInDown">
                                                <div class="form-line">
                                                    <input type="number" class="form-control" name="training_hours[]">
                                                    <label class="form-label">Hours</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float animated slideInDown">
                                                <div class="form-line">
                                                    <input id="date-start-training" type="text" class="form-control" name="from_date_training[]">
                                                    <label class="form-label">From date</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float animated slideInDown">
                                                <div class="form-line">
                                                    <input id="date-end-training" type="text" class="form-control" name="to_date_training[]">
                                                    <label class="form-label">To date</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </fieldset>

                            <h3>Work Experience</h3>
                            <fieldset>
                                <h2 class="card-inside-title">Work Details</h2>

                                <button
                                    id="button-add-work"
                                    class="btn btn-info animated slideInLeft"
                                    type="button"
                                >Add Work Experience</button>

                                <div id="work-info"></div>

                                <template class="template-work-info">
                                    <hr>
                                    <div class="form-group form-float animated slideInDown">
                                        <div class="form-line">
                                            <input type="text" name="work_positions[]" class="form-control">
                                            <label class="form-label">Position</label>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-9">
                                            <div class="form-group form-float animated slideInDown">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="work_agencies[]">
                                                    <label class="form-label">Agency</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float animated slideInDown">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="salary_grade[]">
                                                    <label class="form-label">Salary Grade</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-3">
                                            <div class="form-group form-float animated slideInDown">
                                                <div class="form-line">
                                                    <input id="date-start-work" type="text" class="form-control" name="from_date_agency[]">
                                                    <label class="form-label">From date</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float animated slideInDown">
                                                <div class="form-line">
                                                    <input id="date-end-work" type="text" class="form-control" name="to_date_agency[]">
                                                    <label class="form-label">To date</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </fieldset>

                            <h3>Eligibility</h3>
                            <fieldset>
                                <h2 class="card-inside-title">Eligibility</h2>

                                <button
                                    id="button-add-eligibility"
                                    class="btn btn-info animated slideInLeft"
                                    type="button"
                                >Add Eligibility</button>

                                <div id="eligibilities-info"></div>

                                <template class="template-eligibilities-info">
                                    <hr>
                                    <div class="form-group form-float animated slideInDown">
                                        <div class="form-line">
                                            <input type="text" name="title_eligibilities[]" class="form-control">
                                            <label class="form-label">Title</label>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group form-float animated slideInDown">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="license_numbers[]">
                                                    <label class="form-label">License number</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float animated slideInDown">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="ratings[]">
                                                    <label class="form-label">Rating</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-float animated slideInDown">
                                                <div class="form-line">
                                                    <input type="text" class="datepicker form-control" name="exam_date[]">
                                                    <label class="form-label">Exam date</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
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