@extends('admin.layouts.master')
@section('title')
{{ __('admin-sidebar.order') }}
@endsection
@section('content')
<div class="main-content page-content">
    <div class="main-content-inner" style="max-width: 100% !important;">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">{{ __('admin-order.fail') }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Progress Table start -->
            <div class="col-12">
                <div class="card order-checkout-info">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Plan</th>
                                <th scope="col">Price</th>
                                <th scope="col">Site</th>
                                <th scope="col">Payment Method</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->plan->name }}</td>
                                <td>{{ $order->price }}</td>
                                <td>{{ $order->site->name }}</td>
                                <td>{{ $order->payment_method }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-center mt-2">
            <a class="btn btn-primary" href="{{ route('admin.home') }}">Back To Home
                <i class="icofont-simple-right"></i>
            </a>
        </div>
    </div>
</div>
@endsection