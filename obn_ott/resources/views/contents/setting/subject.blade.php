@extends('layouts.master')
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">My Subject</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">My Subject</p>
                        </div>
                    </div>
                    <div class="buttons">

                    </div>
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">
            <style>
            #grade .grade-header {
                display: flex;
                justify-content: space-between;
            }

            #grade .grade-header {
                display: flex;
                justify-content: space-between;
            }

            #grade ul li {
                width: 100%;
                background-color: var(--color-main);
                padding: 10px 10px;
                color: #fff;
                display: flex;
                justify-content: space-between;
                margin-bottom: 10px
            }
            </style>
        </div>
        <div id="grade">
            <div class="card">
                <div class="card-body">
                    <div class="grade-header">
                        <button class="btn btn-primary">Subject</button>
                        <button data-toggle="modal" data-target="#create" class="btn  btn-primary">Create
                            New</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <!-- Progress Table start -->
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card_title">Progress Table</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover progress-table text-center">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">task</th>
                                            <th scope="col">Deadline</th>
                                            <th scope="col">Progress</th>
                                            <th scope="col">status</th>
                                            <th scope="col">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>09 / 07 / 2018</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: 50%;" aria-valuenow="25" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-info">in progress</span></td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-3"><a href="#" class="text-primary"><i
                                                                class="fa fa-edit"></i></a></li>
                                                    <li><a href="#" class="text-danger"><i class="ti-trash"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Mark</td>
                                            <td>09 / 07 / 2018</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: 80%;" aria-valuenow="25" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-warning">pending</span></td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-3"><a href="#" class="text-primary"><i
                                                                class="fa fa-edit"></i></a></li>
                                                    <li><a href="#" class="text-danger"><i class="ti-trash"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Mark</td>
                                            <td>09 / 07 / 2018</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 100%;" aria-valuenow="25" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-success">complate</span></td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-3"><a href="#" class="text-primary"><i
                                                                class="fa fa-edit"></i></a></li>
                                                    <li><a href="#" class="text-danger"><i class="ti-trash"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Mark</td>
                                            <td>09 / 07 / 2018</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                        style="width: 85%;" aria-valuenow="25" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-danger">stopped</span></td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-3"><a href="#" class="text-primary"><i
                                                                class="fa fa-edit"></i></a></li>
                                                    <li><a href="#" class="text-danger"><i class="ti-trash"></i></a>
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
            <!-- Progress Table end -->
        </div>
        <div class="modal fade" id="create" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create New</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <input type="hidden" name="_token" value="7oXjo9AKrN9vq2RhaTQhY2cBEpjfFQRl3d7petHq">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Title</label>
                                <input class="form-control" type="text" value="" id="title">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                            </div>


                            <div class="form-group">
                                <label for="banner" class="col-form-label">Banner</label>
                                <input class="form-control" type="file" value="" id="banner">
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-form-label">Status</label>
                                <div style="display: flex">
                                    <div class="custom-control custom-radio primary-radio custom-control-inline mb-2">
                                        <input type="radio" checked="" id="active" name="status"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="active">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio primary-radio custom-control-inline mb-2">
                                        <input type="radio" checked="" id="inactive" name="status"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="inactive">Inactive</label>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
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