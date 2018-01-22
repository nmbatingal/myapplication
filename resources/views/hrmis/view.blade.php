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
                            <form>
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

                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="card">
                                                <div class="header">
                                                    <h2>
                                                        Basic Card Title
                                                    </h2>
                                                </div>
                                                <div class="body" style="padding: 0 !important">
                                                    <div class="list-group">
                                                        <button type="button" class="list-group-item">Cras justo odio</button>
                                                        <button type="button" class="list-group-item">Dapibus ac facilisis in</button>
                                                        <button type="button" class="list-group-item">Morbi leo risus</button>
                                                        <button type="button" class="list-group-item">Porta ac consectetur ac</button>
                                                        <button type="button" class="list-group-item">Vestibulum at eros</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="body">
                        <div class="alert bg-teal alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            Lorem ipsum dolor sit amet, id fugit tollit pro, illud nostrud aliquando ad est, quo esse dolorum id
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>
                            Basic Card Title
                        </h2>
                    </div>
                    <div class="body">
                        Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra.
                    </div>
                </div>
            </div>
        </div>

    </div><!-- tab end -->
</div>
@endsection

@section('scripts')
@endsection
