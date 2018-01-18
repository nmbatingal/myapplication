@extends('layouts.psbrs.app')

@section('styles')
<!-- build:[href] components/data-table/css/ -->
<link rel="stylesheet" type="text/css" href="{{ asset('components/data-table/css/pmd-datatable.css') }}">
<!-- /build -->

<style type="text/css">
    thead > tr > th {
        text-align: center;
        vertical-align: middle !important;
        padding-top: 0 !important;
        padding-bottom: 0 !important;
    }
    .text-center {
        text-align: right !important;
    }
</style>
@endsection

@section('header-title')
HRMIS
@endsection

@section('content')
<div id="content" class="pmd-content inner-page">
    <!--tab start-->
    <div class="container-fluid full-width-container">

        <section class="row component-section">
            <div class="col-md-12">
                <div class="pmd-card pmd-z-depth">
                    <div class="pmd-card-title">
                        <h2 class="pmd-card-title-text">Dashboard</h2>
                        <span class="pmd-card-subtitle-text">Secondary text</span>
                    </div>
                    <div class="pmd-card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (session('unauthorize'))
                            <div class="alert alert-danger">
                                {{ session('unauthorize') }}
                            </div>
                        @endif 
                    </div>
                </div>
            </div>
        </section>

    </div><!-- tab end -->
</div>
@endsection

@section('scripts')
@endsection
