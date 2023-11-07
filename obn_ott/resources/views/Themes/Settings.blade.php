@extends('layouts.master')
@section('content')
<div class="main-content page-content">
            <!--==================================*
                   Main Section
        *====================================-->
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
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="" style="padding: 20px">
                        <style>
        #theme_setting .btn-close {
            right: 10%;
            top: 10%;
            font-size: 25px;
            color: red;
            border: 1px solid red;
            border-radius: 50%;
            padding: 5px;

        }

        #theme_setting .button-control i {
            color: #fff
        }
    </style>
    <div id="theme_setting">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h6>Setting</h6>
                <a href="#" class="btn btn-primary align-center d-flex " data-toggle="modal" data-target="#modal"
                    style="align-items: center">New banner</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body d-flex justify-center align-center" class="position-relative">
                                <video controls width="100%">
                                    <source type="video/mp4" src="https://ott.rrtech247.com/public/assets/studio/video/demo.mp4">
                                </video>
                                <i class="fa fa-close position-absolute  z-10  btn-close"></i>
                            </div>
                            <div class="card-footer">
                                <h6 class="mt-0 pb-0">Title</h6>
                                <div class="button-control d-flex justify-content-end">
                                    <a href="#" class="pt-1 pb-1 pl-3 pr-3 bg-primary mr-2" data-toggle="modal"
                                        data-target="#modal"><i class="fa fa-eye "></i></a>
                                    <a href="#" data-toggle="modal" data-target="#modal"
                                        class="pt-1 pb-1 pl-3 pr-3 bg-danger mr-2"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="pt-1 pb-1 pl-3 pr-3 bg-warning mr-2"><i
                                            class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body d-flex justify-center align-center" class="position-relative">
                                <video controls width="100%">
                                    <source type="video/mp4" src="https://ott.rrtech247.com/public/assets/studio/video/demo.mp4">
                                </video>
                                <i class="fa fa-close position-absolute  z-10  btn-close"></i>
                            </div>
                            <div class="card-footer">
                                <h6 class="mt-0 pb-0">Title</h6>
                                <div class="button-control d-flex justify-content-end">
                                    <a href="#" class="pt-1 pb-1 pl-3 pr-3 bg-primary mr-2" data-toggle="modal"
                                        data-target="#modal"><i class="fa fa-eye "></i></a>
                                    <a href="#" data-toggle="modal" data-target="#modal"
                                        class="pt-1 pb-1 pl-3 pr-3 bg-danger mr-2"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="pt-1 pb-1 pl-3 pr-3 bg-warning mr-2"><i
                                            class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body d-flex justify-center align-center" class="position-relative">
                                <video controls width="100%">
                                    <source type="video/mp4" src="https://ott.rrtech247.com/public/assets/studio/video/demo.mp4">
                                </video>
                                <i class="fa fa-close position-absolute  z-10  btn-close"></i>
                            </div>
                            <div class="card-footer">
                                <h6 class="mt-0 pb-0">Title</h6>
                                <div class="button-control d-flex justify-content-end">
                                    <a href="#" class="pt-1 pb-1 pl-3 pr-3 bg-primary mr-2" data-toggle="modal"
                                        data-target="#modal"><i class="fa fa-eye "></i></a>
                                    <a href="#" data-toggle="modal" data-target="#modal"
                                        class="pt-1 pb-1 pl-3 pr-3 bg-danger mr-2"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="pt-1 pb-1 pl-3 pr-3 bg-warning mr-2"><i
                                            class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Home Page Banner</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">

                        <div class="form-group">
                            <label for="" class="col-label">Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="col-label">Description</label>
                            <textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-label">Media file</label>
                            <input type="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="col-label">Link</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label">Status</label>

                            <div>
                                <div class="custom-control custom-radio primary-radio custom-control-inline mb-2">
                                    <input type="radio" checked="" id="on" name="status"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="on">Active</label>
                                </div>
                                <div class="custom-control custom-radio primary-radio custom-control-inline mb-2">
                                    <input type="radio" checked="" id="off" name="status"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="off">Inactive</label>
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