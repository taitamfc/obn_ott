@extends('layouts.master')
@section('content')
<div class="main-content page-content bg-light">
    <div class="main-content-inner">
        <div class="row mb-4">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">My Product Management</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">My Product Management</p>
                        </div>
                    </div>
                    <div class="buttons">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 stretched_card mt-mob-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card_title">Course</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-striped text-center">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">COURSE</th>
                                        <th scope="col">PRICE </th>
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>3rd Grade Advanced Math</td>
                                        <td>$120</td>
                                        <td>
                                            <button><i class="ti-pencil mr-1 btn btn-success"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3rd Grade Advanced Math</td>
                                        <td>$120</td>
                                        <td>
                                            <button><i class="ti-pencil mr-1 btn btn-success"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3rd Grade Advanced Math</td>
                                        <td>$120</td>
                                        <td>
                                            <button><i class="ti-pencil mr-1 btn btn-success"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3rd Grade Advanced Math</td>
                                        <td>$150</td>
                                        <td>
                                            <button><i class="ti-pencil mr-1 btn btn-success"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection