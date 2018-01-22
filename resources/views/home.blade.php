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
                        @if (session('unauthorize'))
                            <div class="alert alert-danger">
                                {!! session('unauthorize') !!}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="card card-default pmd-z-depth">
                            <!-- Card media -->
                            <div class="card-media">
                                <img width="1184" height="666" class="img-responsive" src="http://propeller.in/assets/images/profile-pic.png">
                            </div>

                            <div class="header">
                                <h2><a href="{{ route('hrmis.index') }}">HRMIS</a> <small>Description text here...</small></h2>
                                <ul class="header-dropdown m-r-0">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <i class="material-icons col-blue">info_outline</i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('hrmis.index') }}">
                                            <i class="material-icons col-green">launch</i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card card-default pmd-z-depth">
                            <!-- Card media -->
                            <div class="card-media">
                                <img width="1184" height="666" class="img-responsive" src="http://propeller.in/assets/images/profile-pic.png">
                            </div>

                            <div class="header">
                                <h2><a href="{{ route('hrmis.index') }}">HRMIS</a> <small>Description text here...</small></h2>
                                <ul class="header-dropdown m-r-0">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <i class="material-icons col-blue">info_outline</i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('hrmis.index') }}">
                                            <i class="material-icons col-green">launch</i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card card-default pmd-z-depth">
                            <!-- Card media -->
                            <div class="card-media">
                                <img width="1184" height="666" class="img-responsive" src="http://propeller.in/assets/images/profile-pic.png">
                            </div>

                            <div class="header">
                                <h2><a href="{{ route('hrmis.index') }}">HRMIS</a> <small>Description text here...</small></h2>
                                <ul class="header-dropdown m-r-0">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <i class="material-icons col-blue">info_outline</i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('hrmis.index') }}">
                                            <i class="material-icons col-green">launch</i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card card-default pmd-z-depth">
                            <!-- Card media -->
                            <div class="card-media">
                                <img width="1184" height="666" class="img-responsive" src="http://propeller.in/assets/images/profile-pic.png">
                            </div>

                            <div class="header">
                                <h2><a href="{{ route('hrmis.index') }}">HRMIS</a> <small>Description text here...</small></h2>
                                <ul class="header-dropdown m-r-0">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <i class="material-icons col-blue">info_outline</i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('hrmis.index') }}">
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

        <br>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <div class="pmd-card pmd-card-default pmd-z-depth">

                            <!-- Card header -->
                            <div class="pmd-card-title ellipsis">
                                <h2 class="pmd-card-title-text">Groups</h2>
                            </div>
                            
                            <!-- Card action -->
                            <div class="pmd-card-actions">
                                <a href="{{ route('groups.index') }}" class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="button">Open</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="pmd-card pmd-card-default pmd-z-depth">

                            <!-- Card header -->
                            <div class="pmd-card-title ellipsis">
                                <h2 class="pmd-card-title-text">Users</h2>
                            </div>
                            
                            <!-- Card action -->
                            <div class="pmd-card-actions">
                                <a href="{{ route('users.index') }}" class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="button">Open</a>
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
