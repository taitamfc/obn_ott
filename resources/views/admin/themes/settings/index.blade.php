@extends('admin.layouts.master')
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">My Plan</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">My Plan</p>
                        </div>
                    </div>
                    <div class="buttons">
                    <a class="btn btn-dark mr-1" href="{{ url()->previous() }}">{{ __('sys.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">

            <div id="theme_setting">

                <div class="row mt-4">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>Auth Page Background Image</h6>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" class="form-control" onchange="loadFile(event)">
                                        <img id="output" width="100px" />

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6>Body Background Color</h6>
                                                <input type="color" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6>Footer Background Color</h6>
                                                <input type="color" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>Plan Page Background Image</h6>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" class="form-control" onchange="loadFile(event)">
                                        <img id="output" width="100px" />

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6>Header Background Color</h6>
                                                <input type="color" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6>Event Background Color</h6>
                                                <input type="color" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <button id="saveButton" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection