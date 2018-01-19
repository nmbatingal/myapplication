@extends('layouts.login')

@section('styles')
<!-- DataTables css-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css">
<!-- Propeller dataTables css-->

<!-- build:[href] components/file-upload/css/ -->
<link rel="stylesheet" type="text/css" href="{{ asset('components/file-upload/css/upload-file.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('components/file-upload/css/image-upload.css') }}">
<!-- /build -->

<link rel="stylesheet" type="text/css" href="{{ asset('bower/bootstrap-switch-master/dist/css/bootstrap3/bootstrap-switch.css') }}">
@endsection

@section('content')
<div id="content" class="pmd-content inner-page">
    <!--tab start-->
    <div class="container-fluid full-width-container">
        <!--- Title -->
        <h1 class="section-title" id="services">
            <span>User Accounts</span>
        </h1>
        <!-- End Title -->
    
        <!--breadcrum start-->
        <ol class="breadcrumb text-left">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="active">User Accounts</li>
        </ol>
        <!--breadcrum end-->

        <section class="row component-section">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group pmd-textfield">
                            <div class="input-group"> 
                                <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">search</i></div>
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="pmd-card pmd-z-depth">
                            @if( count($users) > 0 )
                                @foreach($users as $user)
                                    <ul class="list-group pmd-z-depth pmd-list pmd-card-list">
                                        <li class="list-group-item">
                                            <div class="media-left">
                                                <a href="javascript:void(0);" class="avatar-list-img">
                                                    <img alt="40x40" data-src="holder.js/40x40" class="img-responsive" src="{{ asset($user['__img']) }}" data-holder-rendered="true">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <a href="{{ route('users.show', ['id'=> $user['id']]) }}" class="list-user"> 
                                                    <h3 class="list-group-item-heading"><b>{{ $user['firstname'] }} {{ !empty($user['middlename']) ? $user['middlename'][0].'. ' : '' }}{{ $user['lastname'] }}</b></h3>
                                                    <span class="list-group-item-text">Position - Office</span>
                                                </a>
                                            </div>
                                            <div class="media-right"> 
                                                <div class="pull-right">
                                                    @if ( $user['__is'] > 0 )
                                                        <span class="badge badge-warning">admin</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach
                            @else
                                <ul class="list-group pmd-z-depth pmd-list pmd-card-list">
                                    <li class="list-group-item">
                                        <div class="media-body media-left">
                                            <i class="material-icons media-left pmd-sm">error_outline</i>
                                            <span class="media-body">no record found</span>
                                        </div>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="pmd-card pmd-z-depth">
                    <div class="pmd-card-body">
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
                            
                            <div class="col-lg-9 custom-col-9">
                                <form id="form-user" class="form-horizontal" action="{{ route('users.update', '') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="u_id">
                                    <h3 class="heading">Personal Information</h3>
                                    <div class="row">
                                        <fieldset>
                                            <div class="form-group prousername pmd-textfield">
                                                <label class="control-label col-sm-3">Username</label>
                                                <div class="col-sm-9">
                                                    <p class="form-control-static"><strong class="u_username"></strong></p>
                                                </div>
                                            </div>
                                            <div class="form-group pmd-textfield">
                                              <label class="col-sm-3 control-label" for="u_fname">First Name</label>
                                              <div class="col-sm-9">
                                                  <input type="text" class="form-control u_fname" name="u_fname">
                                              </div>
                                            </div>
                                            <div class="form-group pmd-textfield">
                                              <label class="col-sm-3 control-label" for="u_fname">Middle Name</label>
                                              <div class="col-sm-9">
                                                  <input type="text" class="form-control u_mname" name="u_mname">
                                              </div>
                                            </div>
                                            <div class="form-group pmd-textfield">
                                              <label class="col-sm-3 control-label" for="u_lname">Last Name</label>
                                              <div class="col-sm-9">
                                                  <input type="text" class="form-control u_lname" name="u_lname">
                                              </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <h3 class="heading">Contact Information</h3>
                                    <div class="row">
                                        <fieldset>
                                            <div class="form-group pmd-textfield">
                                                <label class="col-sm-3 control-label" for="u_fname">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control u_email" name="u_email">
                                                </div>
                                            </div>
                                            <div class="form-group pmd-textfield">
                                                <label class="col-sm-3 control-label" for="u_fname">Contact Number</label>
                                                <div class="col-sm-9">
                                                    <input name="u_contact" type="text" class="form-control u_contact">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <h3 class="heading">Other Details</h3>
                                    <div class="row">
                                        <fieldset>
                                            <div class="form-group pmd-textfield">
                                                <label class="col-sm-3 control-label" for="u_fname">Unit</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="u_unit">
                                                        <option value=""></option>
                                                        @foreach( $offices as $office )
                                                            <option value="{{ $office['id'] }}">{{ $office['div_name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group pmd-textfield">
                                                <label class="col-sm-3 control-label" for="u_fname">Position</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control u_position" name="u_position">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <h3 class="heading">Account Settings</h3>
                                    <div class="row">
                                        <fieldset>
                                            <div class="form-group pmd-textfield">
                                                <label class="col-sm-3 control-label" for="u_active">Active</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" name="u_active">
                                                </div>
                                            </div>

                                            <div class="form-group pmd-textfield">
                                                <label class="col-sm-3 control-label" for="u_admin">Administrator</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" name="u_admin">
                                                </div>
                                            </div>

                                            <div class="form-group pmd-textfield">
                                                <label class="col-sm-3 control-label" for="reset_password">Reset Password</label>
                                                <div class="col-sm-9">
                                                    <a class="btn pmd-ripple-effect btn-link" id="resetPassword"><span class="text-danger">Reset</span></a>
                                                </div>
                                            </div>

                                            <div id="form_button" class="form-group hidden">
                                                <div class="col-sm-9 col-sm-offset-3">
                                                    <button type="submit" class="btn btn-primary pmd-ripple-effect">Update</button>
                                                    <button type="reset" class="btn btn-default btn-link pmd-ripple-effect reset">Cancel</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </form>
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
<script src="{{ asset('components/file-upload/js/upload-image.js') }}"></script>
<script src="{{ asset('bower/bootstrap-switch-master/dist/js/bootstrap-switch.js') }}"></script>
<script src="{{ asset('js/pages/jquery-users.js') }}" type="text/javascript"></script>
<script>

    $("#form-user").on('submit', function(e) {

           /*e.preventDefault();

           var form = $(this);

           console.log(form.serializeArray());*/
    });

</script>
@endsection
