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
                                <h5 class="mr-4 mb-0 font-weight-bold">Account Management</h5>
                                <div class="d-flex align-items-baseline dashboard-breadcrumb">
                                    <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                                    <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                                    <p class="text-muted mb-0 mr-1 hover-cursor">Account Management</p>
                                </div>
                            </div>
                            <div class="buttons">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="" style="padding: 20px">
                        <style>
        #billing_imfomation {}
    </style>
    <div id="billing_imfomation">
        <div class="card">
            <div class="card-header">
                <div class="col-sm-6">
                    <h4>Current Account Information</h4>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="#" data-toggle="modal" data-target="#edit_account_info">Edit</a>
                </div>
            </div>
            <div class="card-body">
                <div class="billing_info">
                    <div class="row">
                        <div class=" col-sm-12">
                            <div class="col-sm-4">
                                <h4>Name</h4>
                            </div>
                            <div class="col-sm-4">
                                <h4>Email Address </h4>
                            </div>
                            <div class="col-sm-4">
                                <h4>Phone Number</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="plan">

                </div>
                <div class="method">

                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <div class="col-sm-6">
                    <h4>Current Plan</h4>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="https://ott.rrtech247.com/studio/account/plan/change">Edit</a>
                </div>
            </div>
            <div class="card-body">
                <div class="billing_info">
                    <div class="row">
                        <div class=" col-sm-12">
                            <div class="col-sm-4">
                                <h4>PLan B</h4>
                            </div>
                            <div class="col-sm-4">
                                <input name="dates" type="text" />
                            </div>
                            <div class="col-sm-4">
                                <h4>Phone Number</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="plan">

                </div>
                <div class="method">

                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <div class="col-sm-6">
                    <h4>Billing Method</h4>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="https://ott.rrtech247.com/studio/account/billing">Edit</a>
                </div>
            </div>
            <div class="card-body">
                <div class="billing_info">
                    <div class="row">
                        <div class=" col-sm-12">
                            <div class="col-sm-4">
                                <img src="https://ott.rrtech247.com/public/assets/studio/images/Paypal-logo.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit_account_info" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ACcounnt Info</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="" class="col-form-label"> Name</label>
                            <input type="text" name="" value="Name" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label"> Email</label>
                            <input type="text" name="" value="Name" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label"> Phone</label>
                            <input type="text" name="" value="Name" class="form-control" id="">
                        </div>
                        <input type="submit" class="btn btn-primary">
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