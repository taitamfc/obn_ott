@extends('admin.layouts.master')
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
                        <h5 class="mr-4 mb-0 font-weight-bold">{{__('admin-class.my-class')}}</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">{{__('admin-class.ott')}}</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">{{__('admin-class.my-class')}}</p>
                        </div>
                    </div>
                    <div class="buttons d-flex">
                        <a class="btn btn-dark mr-1" href="{{ url()->previous() }}">{{ __('sys.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="" style="padding: 20px">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                        {{__('admin-class.information-history')}}
                        </div>
                        <div class="card-body">
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover progress-table text-left ">
                                        <tr>
                                            <th>{{__('admin-class.student')}} : </th>
                                            <td>{{ $informationStudent->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{__('admin-class.name')}} : </th>
                                            <td>{{ $informationStudent->name }}</td>
                                        <tr>
                                            <th>{{__('admin-class.email')}} :</th>
                                            <td>{{ $informationStudent->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{__('admin-class.phone')}} : </th>
                                            <td>{{ $informationStudent->phone }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                        {{__('admin-class.transaction-history')}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover progress-table text-left ">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th>{{__('admin-class.date')}}</th>
                                            <th>{{__('admin-class.course')}}</th>
                                            <th>{{__('admin-class.amount')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transactionHistory as $item)
                                        <tr>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->price }}</td>
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
        <div class="" style="padding: 20px">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            {{__('admin-class.viewing-history')}}
                        </div>
                        <div class="card-body">
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover progress-table text-left ">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">{{__('admin-class.last-view')}}</th>
                                                <th scope="col">{{__('admin-class.lesson')}}</th>
                                                <th scope="col">{{__('admin-class.course')}}</th>
                                                <th scope="col">{{__('admin-class.complete')}}</th>
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