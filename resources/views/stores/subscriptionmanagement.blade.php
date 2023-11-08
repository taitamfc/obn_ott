@extends('layouts.master')
@section('content')
<div class="main-content page-content bg-light">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">My Subdescription Management</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">My Subdescription Management</p>
                        </div>
                    </div>
                    <div class="buttons">

                    </div>
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">
            <style>
                select.form-control:not([size]):not([multiple]) {
                    height: auto;
                }
            </style>
            <div id="subsctiption">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-form-label">Name Subscription</label>
                                        <input class="form-control" type="text" value="Carlos Rath"
                                            id="example-text-input">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-form-label">Price</label>
                                        <input class="form-control" type="text" value="Carlos Rath"
                                            id="example-text-input">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-form-label">Duration</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Month</option>
                                            <option value="">Year</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-form-label">Course</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">1st Grade Advanced Math</option>
                                            <option value="">1st Grade Advanced Math</option>
                                        </select>
                                        <span class="btn btn-primary mt-4">Add more Course</span>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-12 mt-4 stretched_card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card_title">Current Active</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">SUBSCRIPTION NAM</th>
                                        <th scope="col">PRICE</th>
                                        <th scope="col">DURATION</th>
                                        <th scope="col">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Mark</td>
                                        <td>$120</td>
                                        <td>09 / 07 / 2018</td>
                                        <td>
                                            <i class="ti-pencil mr-1 btn btn-success"></i>
                                            <i class="ti-trash btn btn-danger"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>jone</td>
                                        <td>$150</td>
                                        <td>09 / 07 / 2018</td>
                                        <td>
                                            <i class="ti-pencil mr-1 btn btn-success"></i>
                                            <i class="ti-trash btn btn-danger"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mark</td>
                                        <td>$120</td>
                                        <td>09 / 07 / 2018</td>
                                        <td>
                                            <i class="ti-pencil mr-1 btn btn-success"></i>
                                            <i class="ti-trash btn btn-danger"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>jone</td>
                                        <td>$150</td>
                                        <td>09 / 07 / 2018</td>
                                        <td>
                                            <i class="ti-pencil mr-1 btn btn-success"></i>
                                            <i class="ti-trash btn btn-danger"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hoverable Rows Table end -->
    </div>
    <!--==================================*
                   End Main Section
        *====================================-->
</div>
@endsection