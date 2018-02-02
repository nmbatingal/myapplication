@extends('layouts.app')

@section('styles')
<!-- Bootstrap Select Css -->
<link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
<!-- build:[href] components/file-upload/css/ -->
<link rel="stylesheet" type="text/css" href="{{ asset('components/file-upload/css/upload-file.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('components/file-upload/css/image-upload.css') }}">
<!-- /build -->
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>USERS</h2>
            <ol class="breadcrumb p-l-0">
              <li><a href="{{ route('home') }}">Home</a></li>
              <li><a href="{{ route('users.index') }}">Users</a></li>
              <li class="active">Edit</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h2>PERSONAL INFORMATION</h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div data-provides="fileinput" class="fileinput fileinput-new col-lg-3">
                                <div data-trigger="fileinput" class="fileinput-preview thumbnail img-circle img-responsive">
                                    <img id="profile_img" src="{{ asset($user['__img']) }}">
                                </div>
                                <div class="action-button"> 
                                    <span class="btn btn-default btn-raised btn-file ripple-effect">
                                        <span class="fileinput-new"><i class="material-icons md-light pmd-xs">add</i></span>
                                        <span class="fileinput-exists"><i class="material-icons md-light pmd-xs">mode_edit</i></span>
                                        <input type="file" name="u_img">
                                    </span> 
                                    <a data-dismiss="fileinput" class="btn btn-default btn-raised btn-file ripple-effect fileinput-exists" href="javascript:void(0);"><i class="material-icons md-light pmd-xs">close</i></a>
                                </div>
                            </div>
                            <div class="col-md-9">

                                {{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'form-user']) }}

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
                                                            @if( $user['div_unit'] == $office['id'] )
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
                                                    <input type="text" class="form-control u_position" id="" name="position" value="{{ $user['position'] }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5 m-t-15">
                                            <button type="submit" class="btn btn-success waves-effect">Save</button>
                                            <a class="btn pmd-ripple-effect btn-link" id="resetPassword"><span class="text-danger font-underline">Password Reset</span></a>
                                        </div>
                                    </div>

                                {{ Form::close() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h2>ACCOUNT SETTINGS</h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                {{ Form::model($user, ['route' => ['users.accountUpdate', $user->id], 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'form-settings']) }}
                                    {{ csrf_field() }}

                                    <h2 class="card-inside-title">Account Role</h2>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label>&nbsp;</label>
                                        </div>

                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">

                                                @foreach ($roles as $role)
                                                
                                                    {{ Form::checkbox('roles[]',  $role->id, $user->roles, ['id' => $role->name] ) }}
                                                    {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <h2 class="card-inside-title">Account Status</h2>
                                    <div class="row clearfix">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <h2 class="card-inside-title"></h2>
                                            <div class="demo-switch">
                                                <div class="switch">
                                                    <label>OFF<input type="checkbox" class="u_active" {{ $user['__isActive'] ? 'checked' : '' }} name="u_active"><span class="lever"></span>ACTIVE</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <h2 class="card-inside-title"></h2>
                                            <div class="demo-switch">
                                                <div class="switch">
                                                    <label>OFF<input type="checkbox" class="u_admin" {{ $user['__isAdmin'] ? 'checked' : '' }} name="u_admin"><span class="lever"></span>ADMIN</label>
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
<script src="{{ asset('components/jquery-inputmask/jquery.inputmask.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('components/file-upload/js/upload-image.js') }}"></script>
<script src="{{ asset('js/pages/jquery-users.js') }}" type="text/javascript"></script>
@endsection
