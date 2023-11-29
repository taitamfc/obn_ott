@extends('layouts.master')
@section('header')
<style>
select.form-control:not([size]):not([multiple]) {
    height: auto;
}
</style>
@endsection
@section('content')
@php
$lessonHistory = $items['lessonHistory'];
$transactionHistory = $items['transactionHistory'];
$informationStudent = $items['informationStudent'];
@endphp
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
                    <div class="buttons d-flex">
                        <a class="btn btn-dark mr-1" href="{{ route('classes.students') }}">Back to Students</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">
            <div class="row">
                <div class="col-sm-6">
                    <div id="class">
                        <div class="card">
                            <div class="card-body">
                                <div class="grade-header">
                                    <button class="btn btn-primary">Information Student</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover progress-table text-left ">
                                        <tr>
                                            <th>Student ID : </th>
                                            <td>{{ $informationStudent->code }}</td>
                                        </tr>
                                        <tr>
                                            <th>Name : </th>
                                            <td>{{ $informationStudent->name }}</td>
                                        <tr>
                                            <th>Email :</th>
                                            <td>{{ $informationStudent->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone : </th>
                                            <td>{{ $informationStudent->phone }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div id="class">
                        <div class="card">
                            <div class="card-body">
                                <div class="grade-header">
                                    <button class="btn btn-primary">Transaction History</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover progress-table text-left ">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th>Date</th>
                                                <th>Course</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($transactionHistory as $item)
                                            <tr>
                                                <td>{{ $item->date }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->total_sales }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">
            <div id="class">
                <div class="card">
                    <div class="card-body">
                        <div class="grade-header">
                            <button class="btn btn-primary">Viewing History</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover progress-table text-left ">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Last view</th>
                                                <th scope="col">Lesson</th>
                                                <th scope="col">Course</th>
                                                <th scope="col">Complete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($lessonHistory as $item)
                                            <tr class="item" id='item-{{ $item->id}}'>
                                                <th scope="row">{{ $item->id }}</th>
                                                <td>{{ $item->last_view }}</td>
                                                <td>{{ isset($item->lesson)? $item->lesson->name : '' }}</td>
                                                <td>{{ isset($item->course)? $item->course->name : '' }}</td>
                                                <td>{!! $item->is_complete() !!}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="pagination" style="float:right">
                                        {{ $lessonHistory->appends(request()->query())->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection