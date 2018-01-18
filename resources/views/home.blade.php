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
            
        <!--breadcrum start-->
        <ol class="breadcrumb text-left">
          <li><a href="index.html">&nbsp;</a></li>
        </ol><!--breadcrum end-->

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                
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
                                    {{ mb_strimwidth("Hum.. Management Information System asd asa sa  asaddadadada asd asd asd asdas das a as", 0, 80, "...") }}
                                </span>  
                            </div>
                            
                            <!-- Card action -->
                            <div class="pmd-card-actions">
                                <button class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="button">Open Application</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="pmd-card pmd-card-default pmd-z-depth">
                            <!-- Card media -->
                            <div class="pmd-card-media">
                                <img width="1184" height="666" class="img-responsive" src="http://propeller.in/assets/images/profile-pic.png">
                            </div>
                            
                            <!-- Card header -->
                            <div class="pmd-card-title ellipsis">
                                <h2 class="pmd-card-title-text">PSBRS</h2>
                                <span class="pmd-card-subtitle-text subtitle">
                                    {{ mb_strimwidth("Hum.. Management Information System asd asa sa  asaddadadada asd asd asd asdas das a as", 0, 80, "...") }}
                                </span>  
                            </div>
                            
                            <!-- Card action -->
                            <div class="pmd-card-actions">
                                <button class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="button">Open Application</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="pmd-card pmd-card-default pmd-z-depth">
                            <!-- Card media -->
                            <div class="pmd-card-media">
                                <img width="1184" height="666" class="img-responsive" src="http://propeller.in/assets/images/profile-pic.png">
                            </div>
                            
                            <!-- Card header -->
                            <div class="pmd-card-title ellipsis">
                                <h2 class="pmd-card-title-text">PTS</h2>
                                <span class="pmd-card-subtitle-text subtitle">
                                    {{ mb_strimwidth("Hum.. Management Information System asd asa sa  asaddadadada asd asd asd asdas das a as", 0, 80, "...") }}
                                </span>  
                            </div>
                            
                            <!-- Card action -->
                            <div class="pmd-card-actions">
                                <button class="btn pmd-btn-flat pmd-ripple-effect btn-primary" type="button">Open Application</button>
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
