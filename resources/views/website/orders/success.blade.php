@extends('website.layouts.master')
@section('content')
    @include('website.includes.header.breadcrumb',[
    'page_title' => 'Success'
    ])

    <div class="errorarea sp_top_100 sp_bottom_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-sm-12 col-12 m-auto">
                    <div class="errorarea__inner aos-init aos-animate" data-aos="fade-up">
                        <div class="error__text">
                            <h3>Order success</h3>
                            <p>Thanks for your order</p>
                        </div>
                        <div class="order-checkout-info">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Item ID</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Payment Method</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->payment_method }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="error__button">
                            <a class="default__button" href="{{ route('cms', ['site_name' => $site_name]) }}">Back To Home
                                <i class="icofont-simple-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
