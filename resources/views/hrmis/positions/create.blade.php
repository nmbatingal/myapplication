@extends('layouts.hrmis.app')

@section('styles')
<!-- Google icon -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Bootstrap Tagsinput Css -->
<link href="{{ asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">

<!-- DataTables css-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css">

<!-- build:[href] components/data-table/css/ -->
<link rel="stylesheet" type="text/css" href="{{ asset('components/data-table/css/pmd-datatable.css') }}">
<!-- /build -->
<style>
    span.tag {
        font-size: 12px;
    }
</style>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>POSITIONS</h2>
            <ol class="breadcrumb p-l-0">
              <li><a href="{{ route('applicants.index') }}">Dashboard</a></li>
              <li class="active">Positions</li>
            </ol>
        </div>

        @if (session('info'))
            <div class="alert bg-green" role="alert">
                {!! session('info') !!}
            </div>
        @endif

        <section class="row clearfix">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-green">
                        <h2>Add New Position Opening</h2>
                    </div>
                    <form id="form_add_position" action="{{ route('positions.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="body">
                            <h2 class="card-inside-title">Position Details</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="title">
                                            <label class="form-label">Title</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="acronym">
                                            <label class="form-label">Acronym</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="slots">
                                            <label class="form-label">Slots</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="sal_grade">
                                            <label class="form-label">Salary grade</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h2 class="card-inside-title">Item No</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <input type="text" class="form-control" data-role="tagsinput" name="item_no">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h2 class="card-inside-title">Publication No</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <input type="text" class="form-control" data-role="tagsinput" name="publication_no">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h2 class="card-inside-title">Position Requirements</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea rows="1" class="form-control no-resize auto-growth" name="education_req"></textarea>
                                            <label class="form-label">Education</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea rows="1" class="form-control no-resize auto-growth" name="experience_req"></textarea>
                                            <label class="form-label">Experience</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea rows="1" class="form-control no-resize auto-growth" name="training_req"></textarea>
                                            <label class="form-label">Training</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea rows="1" class="form-control no-resize auto-growth" name="eligibility_req"></textarea>
                                            <label class="form-label">Eligibility</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="body">
                            <button type="submit" class="btn btn-md btn-success waves-effect">Submit</button>
                            <button type="reset" class="btn btn-md btn-default waves-effect">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div><!-- tab end -->
</div>
@endsection

@section('scripts')
<!-- Bootstrap Tags Input Plugin Js -->
<script src="{{ asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<!-- Autosize Plugin Js -->
<script src="{{ asset('plugins/autosize/autosize.js') }}"></script>

<!-- Datatable js -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<!-- Datatable Bootstrap -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<!-- Datatable responsive js-->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
<!-- Datatable select js-->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<!-- Propeller Data table js-->

<script src="{{ asset('js/pages/hrmis/position-index.js') }}"></script>
@endsection