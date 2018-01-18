@extends('layouts.login')

@section('content')
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
                                </div>

                                <div class="pmd-card-body">
                                    @if( session('logout') )
                                        <div class="pmd-card-title">
                                            <div class="alert alert-info" role="alert">
                                                <p class="text-center">{!! session('logout') !!}</p>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($errors->has('username') || $errors->has('password'))
                                        <div role="alert" class="alert alert-danger alert-dismissible">
                                            <p class="text-center"><a href="javascript:void(0);" class="alert-link">Invalid username or password.</a></p>
                                        </div>
                                    @endif

                                    <div class="form-group pmd-textfield pmd-textfield-floating-label  @if ($errors->has('username') || $errors->has('password')) {{ 'has-error' }} @endif ">
                                        <label for="inputError1" class="control-label pmd-input-group-label">Username</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>
                                            <input id="username" type="text" class="form-control" name="username">
                                        </div>
                                    </div>

                                    <div class="form-group pmd-textfield pmd-textfield-floating-label  @if ($errors->has('username') || $errors->has('password')) {{ 'has-error' }} @endif ">
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
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
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
                                            <p class="text-center">{!! session('info') !!}</p>
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
                                                <input id="signup_username" type="text" name="signup_username" class="form-control" value="{{ @old('username') }}">
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
                                
                                <!-- <div class="group-fields clearfix row">
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
                                </div> -->

                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label pmd-input-group-label">Division/Unit/Section</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">business</i></div>
                                        <select class="form-control" name="division_unit" required>
                                            <option value=""></option>
                                            @foreach( $offices as $office )
                                                <option value="{{ $office['id'] }}">{{ $office['div_name'] }}</option>
                                            @endforeach
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
@endsection

@section('scripts')
<script src="{{ asset('components/jquery-inputmask/jquery.inputmask.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/jquery-login.js') }}" type="text/javascript"></script>
@endsection