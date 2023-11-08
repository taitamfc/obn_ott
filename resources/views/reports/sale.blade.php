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
                                <h5 class="mr-4 mb-0 font-weight-bold">Report Sale</h5>
                                <div class="d-flex align-items-baseline dashboard-breadcrumb">
                                    <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                                    <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                                    <p class="text-muted mb-0 mr-1 hover-cursor">Report Sale</p>
                                </div>
                            </div>
                            <div class="buttons">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="" style="padding: 20px">
                        <style>
        #report_user .card-header {
            display: flex;
            justify-content: space-between
        }

        #report_user .card-footer a {
            margin: 0 10px;
        }
    </style>
    <div id="report_user">
        <div class="card">
            <div class="card-header">
                <h2>Sale</h2>
                <a href="#">Export to Excel</a>
            </div>
            <div class="card-body">
                <div class="chart_container">
                    <canvas id="bar_chart"></canvas>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-primary">Daily</a>
                    <a href="#" class="btn btn-primary">Weekly</a>
                    <a href="#" class="btn btn-primary">Monthly</a>
                    <input class=" btn btn-primary" type="text" name="dates">
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table id="dataTable" class="datatable-primary text-center dataTable no-footer " style="width: 40%;">
                    <thead class=" text-capitalize">
                        <tr>
                            <th>Date</th>
                            <th>User</th>
                            <th></th>
                            <th>Sold Quanlity</th>
                            <th>Revenue</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1 Oct</td>
                            <td>18</td>
                            <th>3st Grade Advanced Math</th>
                            <th>2</th>
                            <th>$99</th>
                        </tr>
                        <tr>
                            <td>2 Oct</td>
                            <td>20</td>
                            <th>3st Grade Advanced Math</th>
                            <th>2</th>
                            <th>$99</th>
                        </tr>
                        <tr>
                            <td>3 Oct</td>
                            <td>21</td>
                            <th>3st Grade Advanced Math</th>
                            <th>2</th>
                            <th>$99</th>
                        </tr>

                    </tbody>
                </table>
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