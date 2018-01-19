<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Propeller Admin Dashboard">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <title>Laravel</title>

        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('bower/bootstrap-material-design-icons/css/material-icons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('propeller/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('propeller/assets/css/propeller.min.css') }}" >

        @yield('styles')

        <link rel="stylesheet" type="text/css" href="{{ asset('propeller/themes/css/propeller-theme.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('propeller/themes/css/propeller-admin.css' ) }}">

    </head>

<body>
    <div id="app">

        <!-- Header Starts -->
        @include('layouts.psbrs.header')
        <!-- Header Ends -->

        <!-- Sidebar Starts -->
        @include('layouts.psbrs.sidebar')
        <!-- Sidebar Ends -->

        <!--content area start-->
        @yield('content')
        <!-- content area end -->
         
    </div>


    <!-- Scripts Starts -->
    <!-- build:[src] assets/js/ -->
    <script src="{{ asset('propeller/assets/js/jquery-1.12.2.min.js') }}"></script>
    <script src="{{ asset('propeller/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('propeller/assets/js/propeller.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var sPath=window.location.pathname;
            var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
            $(".pmd-sidebar-nav").each(function(){
                $(this).find("a[href='"+sPage+"']").parents(".dropdown").addClass("open");
                $(this).find("a[href='"+sPage+"']").parents(".dropdown").find('.dropdown-menu').css("display", "block");
                $(this).find("a[href='"+sPage+"']").parents(".dropdown").find('a.dropdown-toggle').addClass("active");
                $(this).find("a[href='"+sPage+"']").addClass("active");
            });
            $(".auto-update-year").html(new Date().getFullYear());
        });
    </script>

    <script src="{{ asset('bower/jquery-validation/dist/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/common-scripts.js') }}"></script>

    @yield('scripts')
</body>
</html>
