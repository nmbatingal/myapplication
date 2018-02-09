<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Propeller Admin Dashboard">
    <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register | MyApplication</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('plugins/animate-css/animate.css') }}" rel="stylesheet" />
    
    @yield('styles')

    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">

        <div class="logo">
            <a href="javascript:void(0);">My<b>Application</b></a>
            <!-- <small>Admin BootStrap Based - Material Design</small> -->
        </div>

        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="msg">Sign up now to use the application</div>

                    <label class="control-label">Account Information</label>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="firstname" autofocus value="{{ @old('firstname') }}">
                            <label class="form-label">Firstname</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="middlename" value="{{ @old('middlename') }}">
                            <label class="form-label">Middlename</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="lastname" value="{{ @old('lastname') }}">
                            <label class="form-label">Lastname</label>
                        </div>
                    </div>

                    <label class="control-label">Contact Details</label>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" data-url="{{ route('email.exist') }}">
                            <label class="form-label">Email</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line masked-input">
                            <input name="contact_number" type="text" class="form-control mobile-phone-number" value="+639">
                            <label class="form-label">Contact number</label>
                        </div>
                    </div>

                    <label class="control-label">Other Details</label>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="username" class="form-control" value="{{ @old('username') }}" data-url="{{ route('username.exist') }}">
                            <label class="form-label">Username</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <select class="form-control" name="division_unit" required>
                                <option value=""></option>
                                @foreach( $offices as $office )
                                    <option value="{{ $office['id'] }}">{{ $office['div_name'] }}</option>
                                @endforeach
                            </select>
                            <label class="form-label">Unit Assignment</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="position" name="position" type="text" class="form-control">
                            <label class="form-label">Position</label>
                        </div>
                    </div>
                  
                    <div class="pmd-card-footer card-footer-no-border card-footer-p16 text-center">
                        <button class="btn waves-effect btn-primary btn-block" type="submit">Sign up</button>
                        <a href="{{ route('login') }}" class="btn waves-effect btn-default btn-block" type="submit">Return to login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('plugins/node-waves/waves.js') }}"></script>

    <!-- Validation Plugin Js -->
    <script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>

    <script src="{{ asset('components/jquery-inputmask/jquery.inputmask.bundle.js') }}" type="text/javascript"></script>
    
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{ asset('js/jquery.backstretch.min.js') }}"></script>
    <script>
        var $image = "{{ asset('img/login-bg.jpg') }}";
        
        $.backstretch($image, {transitionDuration: 500});
    </script>
    <!-- Custom Js -->
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/pages/login/sign-up.js') }}"></script>
</body>

</html>