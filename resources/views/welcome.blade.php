<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Propeller Admin Dashboard">
        <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Propeller Admin Dashboard</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

        <!-- Google icon -->
        <link rel="stylesheet" type="text/css" href="{{ asset('bower/bootstrap-material-design-icons/css/material-icons.css') }}">

        <!-- Bootstrap css -->
        <!-- build:[href] assets/css/ -->
        <link rel="stylesheet" type="text/css" href="{{ asset('propeller/assets/css/bootstrap.min.css')}}">
        <!-- /build -->

        <!-- Propeller css -->
        <!-- build:[href] assets/css/ -->
        <!-- build:[href] assets/css/ -->
        <link rel="stylesheet" type="text/css" href="{{ asset('propeller/assets/css/propeller.min.css') }}" >
        <!-- /build -->
        <!-- /build -->

        <!-- Propeller date time picker css-->
        <!-- build:[href] components/datetimepicker/css/ -->
        <link rel="stylesheet" type="text/css" href="{{ asset('propeller/components/datetimepicker/css/bootstrap-datetimepicker.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('propeller/components/datetimepicker/css/pmd-datetimepicker.css') }}" />
        <!-- /build -->

        <!-- Propeller theme css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('propeller/themes/css/propeller-theme.css') }}" />

        <!-- Propeller admin theme css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('propeller/themes/css/propeller-admin.css' ) }}">

    </head>

<body>

    <!-- Nav menu with user information -->
    <nav class="navbar navbar-inverse navbar-fixed-top pmd-navbar pmd-z-depth">
        <div class="container-fluid">
            @if (Auth::check())
            <!-- User information -->
            <div class="dropdown pmd-dropdown pmd-user-info pull-right">
                <a href="javascript:void(0);" class="btn-user dropdown-toggle media" data-toggle="dropdown" aria-expanded="false">
                    <div class="media-left">
                        <img src="http://propeller.in/assets/images/avatar-icon-40x40.png" width="40" height="40" alt="avatar">
                    </div>
                    <div class="media-body media-middle">
                        User
                    </div>
                </a>
            </div>
            @endif
        
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <a href="javascript:void(0);" class="navbar-brand navbar-brand-custome">My Application</a>
            </div>
        </div>

        <div class="pmd-sidebar-overlay"></div>
    </nav>

    
    <div id="content" class="pmd-content inner-page">
        <div class="container-fluid full-width-container">
            <!-- Title -->
            <h1 class="section-title" id="services">
                <span>&nbsp;</span>
            </h1><!-- End Title -->
                
            <!--breadcrum start-->
            <ol class="breadcrumb text-left">
              <li><a href="index.html">&nbsp;</a></li>
            </ol><!--breadcrum end-->

            <div class="row">
                <!-- login panel start -->
                <div class="col-md-4 col-md-offset-1">
                    <div class="login-card-section">
                        <div class="pmd-card card-default pmd-z-depth">
                            <div class="login-card">
                                <form class="form-login" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                    <div class="pmd-card-title card-header-border">
                                        <h2 class="pmd-card-title-text">User Login</h2>
                                        <span class="pmd-card-subtitle-text">Secondary text</span>
                                    </div>


                                    <div class="pmd-card-body">
                                        @if ($errors->has('username'))
                                            <div role="alert" class="alert alert-danger alert-dismissible">
                                                <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
                                                <p class="text-center"><a href="javascript:void(0);" class="alert-link">Invalid username or password.</a></p>
                                            </div>
                                        @endif

                                        <div class="form-group pmd-textfield pmd-textfield-floating-label @if ($errors->has('username')) {{ 'has-error' }} @endif ">
                                            <label for="inputError1" class="control-label pmd-input-group-label">Username</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>
                                                <input id="username" type="text" class="form-control" name="username" >
                                            </div>
                                        </div>

                                        <div class="form-group pmd-textfield pmd-textfield-floating-label @if ($errors->has('username')) {{ 'has-error' }} @endif ">
                                            <label for="inputError1" class="control-label pmd-input-group-label">Password</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">lock_outline</i></div>
                                                <input id="password" type="password" class="form-control form-control-danger" name="password" >
                                            </div>
                                        </div>

                                            
                                    </div>

                                    <div class="pmd-card-footer card-footer-no-border card-footer-p16 text-center">
                                        
                                        <div class="form-group clearfix">
                                            <div class="checkbox pull-left">
                                                <label class="pmd-checkbox checkbox-pmd-ripple-effect">
                                                    <input checked="" value="" type="checkbox">
                                                    <span class="pmd-checkbox-label">&nbsp;</span><span class="pmd-checkbox"> Remember me</span>
                                                </label>
                                            </div>
                                            <span class="pull-right forgot-password">
                                                <a href="javascript:void(0);">Forgot password?</a>
                                            </span>
                                        </div>

                                        <button class="btn pmd-ripple-effect btn-primary btn-block" type="submit">Login</button>

                                        <br><br>
                    
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- login panel end -->

                <!-- user register panel start -->
                <div class="col-md-6">
                    <div class="pmd-card card-default pmd-z-depth">
                        <div class="login-card">
                            <div class="pmd-card-title card-header-border">
                                <h2 class="pmd-card-title-text">Sign up for an account now</h2>
                                <span class="pmd-card-subtitle-text">Secondary text</span>
                            </div>

                            <form id="form-signup" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
                                <div class="pmd-card-body">
                                    @if(session('info'))
                                        <div class="pmd-card-title">
                                            <div class="alert alert-warning" role="alert">
                                                <p class="text-center">{{ session('info') }}</p>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="group-fields clearfix row">
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="form-group pmd-textfield">
                                                <label class="control-label">Name</label>
                                                <input id="firstname" type="text" name="firstname" class="form-control" placeholder="First*" value="{{ @old('firstname') }}" required>
                                                <!-- <p class="help-block has-error">You can't leave this empty.</p> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="form-group pmd-textfield">
                                                <label class="control-label">&nbsp;</label>
                                                <input id="middlename" type="text" name="middlename" class="form-control" placeholder="Middle" value="{{ @old('middlename') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="form-group pmd-textfield">
                                                <label class="control-label">&nbsp;</label>
                                                <input id="lastname" type="text" name="lastname" class="form-control" placeholder="Last*" value="{{ @old('lastname') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="group-fields clearfix row">
                                        <div class="col-md-6">
                                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                                <label class="control-label pmd-input-group-label">Username</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">person</i></div>
                                                    <input id="signup_username" type="text" name="username" class="form-control" value="{{ @old('username') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="group-fields clearfix row">
                                        <div class="col-md-6">
                                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                                <label class="control-label pmd-input-group-label">Email address</label>
                                                <div class="input-group"> 
                                                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">email</i></div>
                                                    <input id="signup_email" name="email" type="email" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                                <label class="control-label pmd-input-group-label">Contact number</label>
                                                <div class="input-group masked-input"> 
                                                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">phone</i></div>
                                                    <input id="contact_number" name="contact_number" type="text" class="form-control mobile-phone-number" value="+639">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="group-fields clearfix row">
                                        <div class="col-md-6">
                                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                                <label class="control-label pmd-input-group-label">Password</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">lock_outline</i></div>
                                                    <input id="signup_password" name="password" type="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                                <label class="control-label">Confirm password</label>
                                                <input id="confirm_password" name="confirm_password" type="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                        <label class="control-label pmd-input-group-label">Division/Unit/Section</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">business</i></div>
                                            <select class="form-control" name="division_unit" required>
                                                <option value=""></option>
                                                <!-- foreach( $offices as $office )
                                                    <option value=" $office['id'] }}"> $office['div_name'] }}</option>
                                                endforeach -->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                        <label class="control-label pmd-input-group-label">Position</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">assignment_ind</i></div>
                                            <input id="position" name="position" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="pmd-card-footer card-footer-no-border card-footer-p16 text-center">
                                    <br><br>
                                    <button class="btn pmd-ripple-effect btn-primary btn-block" type="submit">Sign up</button>
                                    <br><br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- user register panel end -->

            </div>
        </div>
    </div>

</body>
</html>