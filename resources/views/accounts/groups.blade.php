@extends('layouts.app')

@section('styles')
<!-- DataTables css-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css">
<!-- Propeller dataTables css-->

<!-- build:[href] components/data-table/css/ -->
<link rel="stylesheet" type="text/css" href="{{ asset('components/data-table/css/pmd-datatable.css') }}">
<!-- /build -->
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

        <section class="row component-section">
            <div class="col-md-4">
                <div class="form-group pmd-textfield">
                    <div class="input-group masked-input"> 
                        <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">search</i></div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </div>
            </div>
        </section>

        <section class="row component-section">
            <div class="col-md-4">
                <div class="pmd-card pmd-z-depth">
                    @if( count($groups) > 0 )
                        @foreach($groups as $group)
                            <ul class="list-group pmd-z-depth pmd-list pmd-card-list">
                                <li class="list-group-item">
                                    <div class="media-left">
                                            <i class="material-icons media-left pmd-md">people</i>
                                    </div>
                                    <div class="media-body">
                                        <a href="javascript:void(0);"> 
                                            <h3 class="list-group-item-heading"><b>{{ $group['div_name'] }}</b></h3>
                                            <span class="list-group-item-text">{{ $group['acronym'] }}</span>
                                        </a>
                                    </div>
                                    <div class="media-right"> 
                                        <div class="pull-right">
                                            <span class="badge badge-info">{{ $group->officeCount($group['id']) }} {{ $group->officeCount($group['id']) > 1 ? 'members' : 'member' }}</span>
                                        </div>
                                    </div>
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
            <div class="col-md-5">
                <div class="pmd-card pmd-z-depth">
                    <div class="pmd-card-body">

                        <h3 class="heading">Group Information</h3>
                        <div class="row">
                            <form id="form-group" class="form-horizontal" action="{{ route('groups.store') }}"  method="POST">
                                {{ csrf_field() }}
                                <fieldset>
                                    <div class="form-group pmd-textfield">
                                        <label class="col-sm-3 control-label" for="">Division / Office</label>
                                        <div class="col-sm-9 group-input">
                                            <input type="text" class="form-control" id="" name="div_name">
                                        </div>
                                    </div>
                                    <div class="form-group pmd-textfield">
                                        <label class="col-sm-3 control-label" for="">Acronym</label>
                                        <div class="col-sm-9 group-input">
                                            <input type="text" class="form-control" id="" name="acronym">
                                        </div>
                                    </div>
                                    <div class="form-group pmd-textfield">
                                        <label class="col-sm-3 control-label" for="">Office Head</label>
                                        <div class="col-sm-9 group-input">
                                            <select class="form-control" name="u_unit">
                                                <option value=""></option>
                                                @foreach( $users as $user )
                                                    <option value="{{ $user['id'] }}">{{ $user['firstname'] }} {{ $user['middlename'][0] }}. {{ $user['lastname'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group pmd-textfield">
                                        <label class="col-sm-3 control-label" for="">Position</label>
                                        <div class="col-sm-9 group-input">
                                            <input type="text" class="form-control" id="" name="position">
                                        </div>
                                    </div>
                                    <div class="form-group btns margin-bot-30">
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <button type="submit" class="btn btn-success pmd-ripple-effect">Save</button>
                                            <button type="reset" class="btn btn-default btn-link pmd-ripple-effect">Reset</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div><!-- tab end -->
</section>
@endsection

@section('scripts')
<script src="{{ asset('js/pages/jquery-group.js') }}" type="text/javascript"></script>
@endsection
