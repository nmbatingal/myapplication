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

        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DEFAULT MEDIA
                                <small>The default media displays a media object (images, video, audio) to the left or right of a content block.</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="media">
                                <div class="media-left">
                                    <a href="javascript:void(0);">
                                        <img class="media-object" src="http://placehold.it/64x64" width="64" height="64">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Media heading</h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                    ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra
                                    turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
                                    in faucibus.
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="http://placehold.it/64x64" width="64" height="64">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Media heading</h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                    ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra
                                    turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
                                    in faucibus.
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="http://placehold.it/64x64" width="64" height="64">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">Nested media heading</h4> Cras sit amet nibh libero, in gravida nulla. Nulla
                                            vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum
                                            in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
                                            fringilla. Donec lacinia congue felis in faucibus.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">Media heading</h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                    ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra
                                    turpis.
                                </div>
                                <div class="media-right">
                                    <a href="#">
                                        <img class="media-object" src="http://placehold.it/64x64" width="64" height="64">
                                    </a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="http://placehold.it/64x64" width="64" height="64">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Media heading</h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                    ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra
                                    turpis.
                                </div>
                                <div class="media-right">
                                    <a href="#">
                                        <img class="media-object" src="http://placehold.it/64x64" width="64" height="64">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
