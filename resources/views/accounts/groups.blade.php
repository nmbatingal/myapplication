@extends('layouts.app')

@section('styles')
<!-- Bootstrap Select Css -->
<link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>GROUPS</h2>
            <ol class="breadcrumb p-l-0">
              <li><a href="{{ route('home') }}">Home</a></li>
              <li class="active">Groups</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    @if( count($groups) > 0 )
                        @foreach($groups as $group)
                            <ul class="list-group pmd-z-depth pmd-list pmd-card-list">
                                <li class="list-group-item">
                                    <a href="javascript:void(0);">
                                        <div class="media-body">
                                            <h3 class="list-group-item-heading"><b>{{ $group['acronym'] }}</b></h3>
                                            <span class="list-group-item-text">{{ $group['div_name'] }}</span>
                                        </div>
                                        <div class="media-right"> 
                                            <div class="pull-right">
                                                <span class="badge badge-info">{{ $group->officeCount($group['id']) }} {{ $group->officeCount($group['id']) > 1 ? 'members' : 'member' }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        @endforeach
                    @else
                        <ul class="list-group pmd-z-depth pmd-list pmd-card-list">
                            <li class="list-group-item">
                                <div class="media-body media-left">
                                    <i class="material-icons media-left pmd-sm">error_outline</i>
                                    <span class="media-body">no record found</span>
                                </div>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h2>GROUP INFORMATION</h2>
                    </div>
                    <div class="body">
                        <form id="form-group" class="form-horizontal" action="{{ route('groups.store') }}"  method="POST">
                            {{ csrf_field() }}
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Division Unit</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="" name="div_name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Acronym</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="" name="acronym">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Office Head</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="head">
                                                <option value="">-- Please select --</option>
                                                @foreach( $users as $user )
                                                    <option value="{{ $user['id'] }}">{{ $user['firstname'] }} {{ $user['middlename'][0] }}. {{ $user['lastname'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Position</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="" name="position">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5 m-t-15">
                                    <button type="submit" class="btn btn-success waves-effect">Save</button>
                                    <button type="reset" class="btn btn-default btn-link waves-effect">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<!-- Select Plugin Js -->
<script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
<script src="{{ asset('js/pages/jquery-group.js') }}" type="text/javascript"></script>
@endsection
