@extends('layouts.psbrs.app')

@section('styles')
@endsection

@section('header-title')
HRMIS
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
                            {{ $applicant['firstname'] .' ' . $applicant['middlename'].' '. $applicant['lastname'] }}
                        </h2>
                    </div>
                    <div class="body">
                        <div class="alert bg-teal alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            Lorem ipsum dolor sit amet, id fugit tollit pro, illud nostrud aliquando ad est, quo esse dolorum id
                        </div>
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
                                                        <input type="text" class="form-control" value="{{ $applicant['firstname'] .' ' . $applicant['middlename'].' '. $applicant['lastname'] }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                    <label for="age">Age</label>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" value="{{ $applicant['age'] }}" readonly>
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
                                                        <input type="text" class="form-control" value="{{ $applicant['contact_number'] }}" readonly>
                                                        <label class="form-label">Mobile number</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-float">
                                                    <label for="contact">&nbsp;</label>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" value="{{ $applicant['email'] }}" readonly>
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
                                @if ( !$applicant->trainings )
                                    @foreach ( $applicant->trainings as $training )
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
                                @if ( !$applicant->trainings )
                                    @foreach ( $applicant->trainings as $training )
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
                        </div>
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
@endsection
