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
                        <h2>ADD NEW PERMISSION <small>Description text here...</small></h2>
                    </div>
                    <div class="body">

                        {{ Form::open(['url' => route('permission.store')]) }}

                        <div class="form-group form-float">
                            <div class="form-line">
                                {{ Form::text('name', null, ['class' => 'form-control']) }}
                                {{ Form::label('name', 'Title', ['class' => 'form-label']) }}
                            </div>
                        </div>

                        <br>
                        @if(!$roles->isEmpty()) //If no roles exist yet
                            <h4>Assign Permission to Roles</h4>

                            @foreach ($roles as $role) 
                                {{ Form::checkbox('roles[]',  $role->id ) }}
                                {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                            @endforeach
                        @endif
                        <br>

                        {{ Form::button('Add', ['class' => 'btn btn-success waves-effect', 'type' => 'submit']) }}
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
