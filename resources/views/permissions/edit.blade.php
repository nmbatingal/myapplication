@extends('layouts.app')

@section('styles')
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>ROLES</h2>
            <ol class="breadcrumb p-l-0">
              <li><a href="{{ route('home') }}">Home</a></li>
              <li><a href="{{ route('permission.index') }}">Permissions</a></li>
              <li class="active">Create</li>
            </ol>
        </div>

        <section class="row clearfix">
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h2>EDIT PERMISSION<small>{{ strtoupper($permission->name) }}</small></h2>
                    </div>
                    <div class="body">

                        {{ Form::model($permission, array('route' => array('permission.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

                        <div class="form-group form-float">
                            <div class="form-line">
                                {{ Form::text('name', null, ['class' => 'form-control']) }}
                                {{ Form::label('name', 'Permission Name', ['class' => 'form-label']) }}
                            </div>
                        </div>
                        <br>
                        {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </section>

    </div><!-- tab end -->
</div>
@endsection

@section('scripts')
@endsection
