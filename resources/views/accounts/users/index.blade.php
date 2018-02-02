@extends('layouts.app')

@section('styles')
<!-- Bootstrap Select Css -->
<link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css">
<!-- build:[href] components/data-table/css/ -->
<link rel="stylesheet" type="text/css" href="{{ asset('components/data-table/css/pmd-datatable.css') }}">
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>USERS</h2>
            <ol class="breadcrumb p-l-0">
              <li><a href="{{ route('home') }}">Home</a></li>
              <li class="active">Users</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-12" style="margin-bottom: -10px;">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">search</i>
                                    </span>
                                    <div class="form-line">
                                        <input id="global-search" type="text" class="form-control date" placeholder="Global search">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- responsive table example -->
                <div class="pmd-card pmd-z-depth pmd-card-custom-view">
                    <table id="user-list" class="table pmd-table table-hover table-striped display responsive nowrap" cellspacing="0" width="100%">
                        <colgroup>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col width="5%">
                            <col width="5%">
                            <col width="5%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Mobile number</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>Group</th>
                                <th>Active</th>
                                <th>Admin</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if( count($users) > 0 )
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <a href="{{ route('users.edit', ['id' => $user['id']]) }}" class="link">
                                                {{ $user['firstname'] }} {{ !empty($user['middlename']) ? $user['middlename'][0].'. ' : '' }}{{ $user['lastname'] }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $user['mobile_number'] }}
                                        </td>
                                        <td>
                                            {{ $user['email'] }}
                                        </td>
                                        <td>
                                            {{ $user['position'] }}
                                        </td>
                                        <td>
                                            {{ $user->hasOffice['div_name'] }}
                                        </td>
                                        <td>
                                            @if ( $user['__isActive'] == 1 )
                                                <span class="label label-success">active</span>
                                            @else
                                                <span class="label label-danger">inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ( $user['__isAdmin'] > 0 )
                                                <span class="label label-warning">admin</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('users.edit', ['id' => $user['id']]) }}" class="btn btn-xs btn-primary waves-effect" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="material-icons">mode_edit</i>
                                            </a>
                                            <a href="{{ route('users.edit', ['id' => $user['id']]) }}" class="btn btn-xs btn-danger waves-effect" data-toggle="tooltip" data-placement="top" title="Remove">
                                                <i class="material-icons">cancel</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            @endif
                        </tbody>
                    </table>
                </div> <!-- responsive table example end -->
            </div> <!-- responsive table code and example end-->
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Datatable js -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<!-- Datatable Bootstrap -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<!-- Datatable responsive js-->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>

<!-- Datatable select js-->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<!-- Responsive Data table js-->
<script>
//Propeller  Customised Javascript code 
$(document).ready(function() {
    var userTable = $('#user-list').DataTable({
        responsive: true,
        order: [ 0, 'asc' ],
        bFilter: true,
        bLengthChange: true,
        pagingType: "simple",
        "paging": true,
        "searching": true,
        "language": {
            "info": " _START_ - _END_ of _TOTAL_ ",
            "sLengthMenu": "<span class='custom-select-title'>Rows per page:</span> <span class='custom-select'> _MENU_ </span>",
            "sSearch": "",
            "sSearchPlaceholder": "Search",
            "paginate": {
                "sNext": " ",
                "sPrevious": " "
            },
        },
        dom:
            "<'pmd-card-title'<'data-table-responsive'>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'pmd-card-footer' <'pmd-datatable-pagination' l i p>>",
    });
    
    
    $(".data-table-responsive").html('<h2 class="pmd-card-title-text">User Accounts</h2>');

    $('#global-search').keyup( function() {
              userTable.search( $(this).val() ).draw() ;
        });
} );
</script>
@endsection
