@extends('layouts.app')

@section('styles')
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- #END# Special Class For User Entered Browser -->
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        @if (Auth::check())
                            <div class="alert alert-info">
                                Welcome <strong>{{ Auth::user()->firstname }}</strong>! Start using the system by clicking an application below.
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {!! session('success') !!}
                            </div>
                        @endif

                        @if ( Hash::check('dostcaraga', Auth::user()->password ) )
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> Change your default system password <a href="{{ route( 'profile.edit', [ 'id' => Auth::user()->id ]) }}" class="alert-link">here</a> and update your information.
                            </div>
                        @endif

                        @if (session('unauthorize'))
                            <div class="alert alert-danger">
                                {!! session('unauthorize') !!}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="info-box">
                            <div class="icon bg-blue">
                                <i class="material-icons">people</i>
                            </div>
                            <div class="content">
                                <div class="text">GROUPS</div>
                                <a href="{{ route('groups.index') }}" class="btn-link font-underline col-blue" type="button">Open settings</a>
                            </div>
                        </div>
                        <div class="info-box">
                            <div class="icon bg-red">
                                <i class="material-icons">face</i>
                            </div>
                            <div class="content">
                                <div class="text">USERS</div>
                                <a href="{{ route('users.index') }}" class="btn-link font-underline col-red" type="button">Open settings</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card card-default pmd-z-depth">
                                    <!-- Card media -->
                                    <div class="card-media">
                                        <img width="1184" height="666" class="img-responsive" src="http://propeller.in/assets/images/profile-pic.png">
                                    </div>

                                    <div class="header">
                                        <h2><a href="{{ route('applicants.index') }}">HRMIS</a> <small>Description text here...</small></h2>
                                        <ul class="header-dropdown m-r-0">
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <i class="material-icons col-blue">info_outline</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('applicants.index') }}">
                                                    <i class="material-icons col-green">launch</i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-default pmd-z-depth">
                                    <!-- Card media -->
                                    <div class="card-media">
                                        <img width="1184" height="666" class="img-responsive" src="http://propeller.in/assets/images/profile-pic.png">
                                    </div>

                                    <div class="header">
                                        <h2><a href="#">Application</a> <small>Description text here...</small></h2>
                                        <ul class="header-dropdown m-r-0">
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <i class="material-icons col-blue">info_outline</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <i class="material-icons col-green">launch</i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-default pmd-z-depth">
                                    <!-- Card media -->
                                    <div class="card-media">
                                        <img width="1184" height="666" class="img-responsive" src="http://propeller.in/assets/images/profile-pic.png">
                                    </div>

                                    <div class="header">
                                        <h2><a href="#">Application</a> <small>Description text here...</small></h2>
                                        <ul class="header-dropdown m-r-0">
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <i class="material-icons col-blue">info_outline</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <i class="material-icons col-green">launch</i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
@endsection
