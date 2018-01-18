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
        <link rel="stylesheet" type="text/css" href="{{ asset('bower/bootstrap-material-design-icons/css/material-icons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('propeller/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('propeller/assets/css/propeller.min.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('components/datetimepicker/css/bootstrap-datetimepicker.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('components/datetimepicker/css/pmd-datetimepicker.css') }}" />

        @yield('styles')

        <link rel="stylesheet" type="text/css" href="{{ asset('propeller/themes/css/propeller-theme.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('propeller/themes/css/propeller-admin.css' ) }}">

        <style>
            .list-avatar-padding li {
                padding: 0 !important;
            }
        </style>
    </head>

<body class="body-custom">

    <nav class="navbar navbar-inverse navbar-fixed-top pmd-navbar pmd-z-depth">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a href="{{ route('home') }}" class="navbar-brand navbar-brand-custome">My Application</a>
            </div>

            @if (Auth::check())
            <!-- User information -->
            <div class="dropdown pmd-dropdown pmd-user-info pull-right">
                <a href="javascript:void(0);" class="btn-user dropdown-toggle media" data-toggle="dropdown" aria-expanded="false">
                    <!-- <div class="media-left">
                        <span class="avatar-list-img40x40">
                            <img src=" Auth::user()->__img }}" width="40" height="40" alt="avatar">
                        </span>
                    </div> -->
                    <div class="media-body media-middle">
                        {{ Auth::user()->firstname }}&nbsp;{{ Auth::user()->lastname }}
                    </div>
                    <div class="media-right media-middle">
                        &nbsp;
                    </div>
                </a>

                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                    <li><a href="javascript:void(0);">Edit Profile</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown pmd-dropdown">
                    <a aria-expanded="false" role="button" data-toggle="dropdown" data-sidebar="true" class="pmd-ripple-effect dropdown-toggle" href="javascript:void(0);">
                        <div data-badge="3" class="material-icons md-light md-24 pmd-sm pmd-badge pmd-badge-overlap">notifications_none</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right pmd-card pmd-card-default pmd-z-depth" role="menu">
                    <!-- Card header -->
                    <div class="pmd-card-title">
                        <div class="media-body media-middle">
                            <a href="notifications.html" class="pull-right">3 new notifications</a>
                            <h3 class="pmd-card-title-text">Notifications</h3>
                        </div>
                    </div>
                    <!-- dropdown-menu dropdown-menu-right pmd-card pmd-card-default pmd-z-depth" role="menu" -->
                    <!-- Notifications list -->
                    <ul class="list-group pmd-list-avatar pmd-card pmd-card-default list-avatar-padding">
                        <li class="list-group-item hidden">
                            <p class="notification-blank">
                                <span class="dic dic-notifications-none"></span> 
                                <span>You don´t have any notifications</span>
                            </p>
                        </li>
                        <li class="list-group-item unread">
                            <a href="javascript:void(0)">
                                <div class="media-left">
                                    <span class="avatar-list-img40x40">
                                        <img alt="40x40" data-src="holder.js/40x40" class="img-responsive" src="{{ asset('propeller/themes/images/profile-1.png') }}" data-holder-rendered="true">
                                    </span>
                                </div>
                                <div class="media-body">
                                    <span class="list-group-item-heading"><span>Prathit</span> posted a new challanegs</span>
                                    <span class="list-group-item-text">5 Minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="javascript:void(0)">
                                <div class="media-left">
                                    <span class="avatar-list-img40x40">
                                        <img alt="40x40" data-src="holder.js/40x40" class="img-responsive" src="{{ asset('propeller/themes/images/profile-2.png') }}" data-holder-rendered="true">
                                    </span>
                                </div>
                                <div class="media-body">
                                    <span class="list-group-item-heading"><span>Keel</span> Cloned 2 challenges.</span>
                                    <span class="list-group-item-text">15 Minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item unread">
                            <a href="javascript:void(0)">
                                <div class="media-left">
                                    <span class="avatar-list-img40x40">
                                        <img alt="40x40" data-src="holder.js/40x40" class="img-responsive" src="{{ asset('propeller/themes/images/profile-3.png') }}" data-holder-rendered="true">
                                    </span>
                                </div>
                            
                                <div class="media-body">
                                    <span class="list-group-item-heading"><span>John</span> posted new collection.</span>
                                    <span class="list-group-item-text">25 Minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item unread">
                            <a href="javascript:void(0)">
                                <div class="media-left">
                                    <span class="avatar-list-img40x40">
                                        <img alt="40x40" data-src="holder.js/40x40" class="img-responsive" src="{{ asset('propeller/themes/images/profile-4.png') }}" data-holder-rendered="true">
                                    </span>
                                </div>
                                <div class="media-body">
                                    <span class="list-group-item-heading"><span>Valerii</span> Shared 5 collection.</span>
                                    <span class="list-group-item-text">30 Minutes ago</span>
                                </div>
                            </a>
                        </li>
                    </ul><!-- End notifications list -->
                </div>
                </li>
            </ul>
            @endif
        </div>
        <!--<div class="pmd-sidebar-overlay"></div> -->
    </nav>
    
    @yield('content')

    <!-- Scripts Starts -->
    <!-- build:[src] assets/js/ -->
    <script src="{{ asset('propeller/assets/js/jquery-1.12.2.min.js') }}"></script>
    <script src="{{ asset('propeller/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('propeller/assets/js/propeller.min.js') }}"></script>
    <script src="{{ asset('bower/jquery-validation/dist/jquery.validate.min.js') }}" type="text/javascript"></script>

    @yield('scripts')

</body>
</html>