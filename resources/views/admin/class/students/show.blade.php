@extends('admin.layouts.master')
@section('title')
{{ __('admin-sidebar.history') }}
@endsection
@section('header')
<style>
.table td,
.table th {
    border: 1 px solid;
}

.card-header {
    border: none;
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
        <div class="row">
            <div class="col-lg-12">
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
        <div class="card">
            <!-- Information -->
            <div class="card-header d-flex justify">
                <div class="col-sm-6">
                    <h4>{{__('admin-class.information-history')}}</h4>
                </div>
            </div>
            <div class="card-body ml-4">
                <div class="billing_info">
                    <div class="row">
                        <table class="table table-hover progress-table text-left ">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">
                                        {{__('admin-class.student')}}
                                    </th>
                                    <th scope="col">
                                        {{__('admin-class.name')}}
                                    </th>
                                    <th scope="col">
                                        {{__('admin-class.email')}}
                                    </th>
                                    <th scope="col">
                                        {{__('admin-class.phone')}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">{{ $informationStudent->id }}</td>
                                    <td>{{ $informationStudent->name }}</td>
                                    <td>{{ $informationStudent->email }}</td>
                                    <td>{{ $informationStudent->phone }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Transaction History -->
            <div class="card-header d-flex justify">
                <div class="col-sm-6">
                    <h4> {{__('admin-class.transaction-history')}}</h4>
                </div>
            </div>
            <div class="card-body ml-4">
                <div class="billing_info">
                    <div class="row">
                        <table class="table table-hover progress-table text-left ">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope='col'>
                                        {{__('admin-class.date')}}
                                    </th>
                                    <th scope='col'>
                                        {{__('admin-class.course')}}
                                    </th>
                                    <th scope='col'>
                                        {{__('admin-class.amount')}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactionHistory as $item)
                                <tr>
                                    <td scope="row">{{ $item->created_at }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Viewing History -->
            <div class="card-header d-flex justify">
                <div class="col-sm-6">
                    <h4>{{__('admin-class.viewing-history')}}</h4>
                </div>
            </div>
            <div class="card-body ml-4">
                <div class="billing_info">
                    <div class="row">
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
@endsection