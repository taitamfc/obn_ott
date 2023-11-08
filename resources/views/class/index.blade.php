@extends('layouts.master')
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">My Class</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">My Class</p>
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
            <div id="class">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="filer-class">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-sm-4"><input class="form-control" type="text" name="search"
                                                    placeholder="Search student" required=""></div>
                                            <div class="col-sm-4 text-center">
                                                <div class="form-group">
                                                    <button class="btn btn-primary"> View All</button>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="form-control">
                                                    <option>Couse</option>
                                                    <option>Couse</option>
                                                    <option>Couse</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Student ID</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Couse</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">6583</th>
                                                    <td>Mark Spence</td>
                                                    <td>Macbook Pro</td>
                                                    <td>09 / 07 / 2018</td>
                                                    <td>672.56$</td>
                                                    <td><span class="badge badge-primary">Progress</span></td>
                                                    <td>
                                                        <ul class="d-flex justify-content-center">
                                                            <li class="mr-3">
                                                                <button type="button" class="btn btn-inverse-info">
                                                                    <i class="fa fa-close"></i>
                                                                </button>
                                                            </li>
                                                            <li class="mr-3">
                                                                <a href="https://ott.rrtech247.com/studio/class/show"
                                                                    type="button" class="btn btn-inverse-success">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            </li>
                                                            <li class="mr-3">
                                                                <button type="button" class="btn btn-inverse-primary">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button type="button" class="btn btn-inverse-danger">
                                                                    <i class="ti-trash"></i>
                                                                </button>
                                                            </li>
                                                        </ul>
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
        </div>
    </div>
    <!--==================================*
                   End Main Section
        *====================================-->
</div>
@endsection