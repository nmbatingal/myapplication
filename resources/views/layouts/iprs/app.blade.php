<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') {{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap -->
        <link href="{{ asset('bower/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset('bower/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- jQuery custom content scroller -->
        <link href="{{ asset('bower/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet"/>
        @yield('styles')
        <!-- Custom Theme Style -->
        <link href="{{ asset('gentelella/build/css/custom.min.css') }}" rel="stylesheet">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">

                <!-- sidebar navigation -->
                @include('layouts.iprs.sidebar')
                <!-- /sidebar navigation -->

                <!-- top navigation -->
                @include('layouts.iprs.topbar')
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left" style="width: 100%">
                                <h3>@yield('page-title')</h3>
                            </div>
                            <!-- <div class="title_right">
                                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search for...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">Go</button>
                                        </span>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        @yield('breadcrumb')

                        <div class="clearfix"></div>

                        @yield('content')
                    </div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer class="hidden-print">
                    <div class="pull-right">
                        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{ asset('bower/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('bower/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ asset('gentelella/vendors/fastclick/lib/fastclick.js') }}"></script>
        <!-- jQuery custom content scroller -->
        <script src="{{ asset('bower/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <!-- Jquery Validation Plugin Css -->
        <script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
        @yield('scripts')
        <!-- Custom Theme Scripts -->
        <script src="{{ asset('gentelella/build/js/custom.min.js') }}"></script>
	
    </body>
</html>