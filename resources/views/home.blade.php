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
                                <strong>Warning!</strong> Update your default system password and your personal information <a href="{{ route( 'profile.edit', [ 'id' => Auth::user()->id ]) }}" class="alert-link">here</a>.
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
                    <div class="col-sm-12">
                        <div class="row">

                            @role('Admin')
                            <div class="col-md-3">
                                <div class="card card-default pmd-z-depth">
                                    <!-- Card media -->
                                    <div class="card-media">
                                        <img width="1184" height="666" class="img-responsive" src="http://propeller.in/assets/images/profile-pic.png">
                                    </div>

                                    <div class="header">
                                        <h2><a href="{{ route('applicants.index') }}" class="font-bold">HRMIS</a> <small>Description text here...</small></h2>
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
                            @endrole

                            <div class="col-md-3">
                                <div class="card card-default pmd-z-depth">
                                    <!-- Card media -->
                                    <div class="card-media">
                                        <img width="1184" height="666" class="img-responsive" src="http://propeller.in/assets/images/profile-pic.png">
                                    </div>

                                    <div class="header">
                                        <h2><a href="{{ route('psbrs.index') }}" class="font-bold">PSBRS</a> <small>Personnel Selection Board Rating System...</small></h2>
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
