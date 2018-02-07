@extends('layouts.psboard.app')

@section('styles')
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>

        <section class="row clearfix">
            <div class="col-md-12">

                <div class="alert alert-info">
                    <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
                </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                
            </div>
        </section>

    </div><!-- tab end -->
</div>
@endsection

@section('scripts')
@endsection
