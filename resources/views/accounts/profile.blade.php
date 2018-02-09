@extends('layouts.app')

@section('styles')
<!-- Bootstrap Select Css -->
<link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
<!-- build:[href] components/file-upload/css/ -->
<link rel="stylesheet" type="text/css" href="{{ asset('components/file-upload/css/upload-file.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('components/file-upload/css/image-upload.css') }}">
<!-- /build -->
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('bower/bootstrap-switch-master/dist/css/bootstrap3/bootstrap-switch.css') }}"> -->
<!-- Dropzone Css -->
<link href="{{ asset('plugins/dropzone/dropzone.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Profile</h2>
            <ol class="breadcrumb p-l-0">
              <li><a href="{{ route('home') }}">Home</a></li>
              <li class="active">Profile</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header bg-blue">
                        <h2>PERSONAL INFORMATION</h2>
                    </div>
                    <div class="body">
                        <div class="row">

                            <div class="col-md-3">
                                <form action="/" id="frmImgUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                    <!-- <div class="dz-message">
                                        <div class="drag-icon-cph">
                                            <i class="material-icons">touch_app</i>
                                        </div>
                                        <h3>Drop files here or click to upload.</h3>
                                    </div> -->
                                    <div class="fallback">
                                        <input name="file" type="file" />
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-9">
                                <form id="form-profile" action="{{ route('profile.update', ['id' => $user['id']]) }}" class="form-horizontal" method="POST">
                                    {{ csrf_field() }}

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="username">Username</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <p class="form-control-static"><strong class="u_username">{{ $user['username'] }}</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="firstname">Name</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control u_fname" name="u_fname" placeholder="firstname" value="{{ $user['firstname'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control u_mname" name="u_mname" placeholder="middlename" value="{{ $user['middlename'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control u_lname" name="u_lname" placeholder="lastname" value="{{ $user['lastname'] }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="email">Email</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="email" class="form-control u_email" name="u_email" value="{{ $user['email'] }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="email">Contact</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="u_contact" type="text" class="form-control u_contact" value="{{ $user['mobile_number'] }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="email_address_2">Unit</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control show-tick" name="u_unit">
                                                        <option value="">-- Please select --</option>
                                                        @foreach( $offices as $office )
                                                            @if ( $office['id'] == $user['div_unit'] )
                                                                <option value="{{ $office['id'] }}" selected>{{ $office['div_name'] }}</option>
                                                            @else
                                                                <option value="{{ $office['id'] }}">{{ $office['div_name'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="email_address_2">Position</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control u_position" id="" name="u_position" value="{{ $user['position'] }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5 m-t-15">
                                            <button type="submit" class="btn btn-primary waves-effect">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="header bg-blue">
                        <h2>UPDATE PASSWORD</h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-12">
                                <form id="form-password" class="form-horizontal" action="{{ route( 'profile.passwordUpdate', ['id' => $user['id']] ) }}" method="POST">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="u_id">

                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-4 col-sm-4 form-control-label">
                                            <label for="firstname">Password</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" class="form-control u_password" name="u_password" placeholder="Enter your password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-4 col-sm-4 form-control-label">
                                            <label for="firstname">Confirm</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" class="form-control u_confirm" name="u_confirm" placeholder="Confirm your password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5 m-t-15">
                                            <button type="submit" class="btn btn-primary waves-effect">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Dropzone Plugin Js -->
<script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('components/jquery-inputmask/jquery.inputmask.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('components/file-upload/js/upload-image.js') }}"></script>
<script src="{{ asset('js/pages/jquery-profile.js') }}" type="text/javascript"></script>
<script>
    //Dropzone
    Dropzone.options.frmImgUpload = {
        paramName: "file",
        maxFilesize: 2,
        maxFiles: 1,
        acceptedFiles: 'image/*',
        dictDefaultMessage: 'Drag an image here to upload, or click to select one'
    };
</script>
@endsection
