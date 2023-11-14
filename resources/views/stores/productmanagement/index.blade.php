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
                </div>
            </div>
        </div>
        <div class="col-sm-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card_title">Course</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-hover progress-table text-center">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">COURSE</th>
                                        <th scope="col">PRICE </th>
                                        <th scope="col">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>${{ $item->price }}</td>
                                        <td>
                                            <button data-toggle="modal" data-target="#modalUpdate"
                                                data-id="{{ $item->id }}"
                                                data-action="{{ route('courses.editProduct') }}"
                                                class='btn btn-success show-form-edit'>
                                                <i class="ti-pencil mr-1"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('stores.productmanagement.edit')
    </div>
</div>
@endsection