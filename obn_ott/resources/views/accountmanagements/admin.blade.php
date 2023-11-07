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
                                <h5 class="mr-4 mb-0 font-weight-bold">Dashboard</h5>
                                <div class="d-flex align-items-baseline dashboard-breadcrumb">
                                    <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                                    <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                                    <p class="text-muted mb-0 mr-1 hover-cursor">Dashboard</p>
                                </div>
                            </div>
                            <div class="buttons">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="" style="padding: 20px">
                        <div id="admin">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card_title">Admin account</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Account</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Mark</td>
                                            <td>ott@gmailc.com</td>
                                            <td>Admin</td>
                                        </tr>
                                        <tr>
                                            <td>Mark</td>
                                            <td>ott@gmailc.com</td>
                                            <td>Admin</td>
                                        </tr>
                                        <tr>
                                            <td>Mark</td>
                                            <td>ott@gmailc.com</td>
                                            <td>Admin</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header" style="display: flex ; justify-content: space-between">
                        <h4>Edit Admin Account</h4>
                        <a href="https://ott.rrtech247.com/studio/account/admin/create">Adđ</a>
                    </div>
                    <div class="card-body">
                        <form action="">

                            <div class="form-row align-items-center">
                                <div class="col-sm-3 my-1">
                                    <label class="sr-only" for="inlineFormInputName">Name</label>
                                    <input type="text" class="form-control" id="inlineFormInputName"
                                        placeholder="Jane Doe">
                                </div>
                                <div class="col-auto my-1">
                                    <a href="https://ott.rrtech247.com/studio/account/admin/edit" class="btn btn-primary">Edit</a>
                                </div>
                            </div>
                            <div class="form-row align-items-center">
                                <div class="col-sm-3 my-1">
                                    <label class="sr-only" for="inlineFormInputName">Name</label>
                                    <input type="text" class="form-control" id="inlineFormInputName"
                                        placeholder="Jane Doe">
                                </div>
                                <div class="col-auto my-1">
                                    <a href="https://ott.rrtech247.com/studio/account/admin/edit" class="btn btn-primary">Edit</a>
                                </div>
                            </div>
                            <div class="form-row align-items-center">
                                <div class="col-sm-3 my-1">
                                    <label class="sr-only" for="inlineFormInputName">Name</label>
                                    <input type="text" class="form-control" id="inlineFormInputName"
                                        placeholder="Jane Doe">
                                </div>
                                <div class="col-auto my-1">
                                    <a href="https://ott.rrtech247.com/studio/account/admin/edit" class="btn btn-primary">Edit</a>
                                </div>
                            </div>

                        </form>

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