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
              <li><a href="{{ route('role.index') }}">Roles</a></li>
              <li class="active">Create</li>
            </ol>
        </div>

        <section class="row clearfix">
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h2>ADD NEW ROLE <small>Description text here...</small></h2>
                    </div>
                    <div class="body">

                        {{ Form::open(['url' => route('role.store')]) }}

                        <div class="form-group form-float">
                            <div class="form-line">
                                {{ Form::text('name', null, ['class' => 'form-control']) }}
                                {{ Form::label('name', 'Role name', ['class' => 'form-label']) }}
                            </div>
                        </div>

                        <h5><b>Assign Permissions</b></h5>

                        @foreach ($permissions as $permission)

                            {{Form::checkbox('permissions[]',  $permission->id, false, ['id' => $permission->name] ) }}

                            {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

                        @endforeach

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
