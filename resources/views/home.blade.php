@extends('layouts.login')

@section('styles')
<style>

</style>
@endsection

@section('content')
<div id="content" class="pmd-content inner-page">
    <div class="container-fluid full-width-container">
        <!-- Title -->
        <h1 class="section-title" id="services">
            <span>&nbsp;</span>
        </h1><!-- End Title -->

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="row">
                    <div class="col-md-12">
                        @if (Auth::check())
                            <div class="alert alert-info" role="alert">
                                <p class="">Welcome <strong>{{ Auth::user()->firstname }}</strong>! Start using the system by clicking an application below.</p>
                            </div>
                        @endif
                        @if (session('unauthorize'))
                            <div class="alert alert-danger">
                                {{ session('unauthorize') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="pmd-card pmd-card-default pmd-z-depth">
                            <!-- Card media -->
                            <div class="pmd-card-media">
                                <img width="1184" height="666" class="img-responsive" src="http://propeller.in/assets/images/profile-pic.png">
                            </div>
                            
                            <!-- Card header -->
                            <div class="pmd-card-title ellipsis">
                                <h2 class="pmd-card-title-text">HRMIS</h2>
                                <span class="pmd-card-subtitle-text subtitle">
                                    {{ mb_strimwidth("lurem ipsum", 0, 80, "...") }}
                                </span>  
                            </div>
                            
                            <!-- Card action -->
                            <div class="pmd-card-actions">
                                <a href="{{ route('hrmis.index') }}" class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="button">Open Application</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
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
</div>
@endsection

@section('script')
<script>

</script>
@endsection
