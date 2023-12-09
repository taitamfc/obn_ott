@extends('website.layouts.master')
@section('content')
@include('website.includes.header.breadcrumb',[
'page_title' => 'Checkout'
])

<div class="checkoutarea sp_bottom_100 sp_top_100">
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif
        <form action="{{ route('website.orders.store',['site_name' => $site_name]) }}" method="post">
            @csrf
            <input type="hidden" name="type" value="{{ $type }}">
            <input type="hidden" name="item_id" value="{{ $item->id }}">
            <input type="hidden" name="price" value="{{ $item->price }}">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="checkoutarea__billing">
                        <div class="checkoutarea__billing__heading">
                            <h2>{{__('checkout.billing-details')}}</h2>
                        </div>
                        <div class="checkoutarea__billing__form">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="checkoutarea__inputbox">
                                        <label for="name">{{__('checkout.name')}} *</label>
                                        <input type="text" id="first__name" name="name" class="info" placeholder="Name"
                                            value="{{$student->name}}">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="checkoutarea__inputbox">
                                        <label for="company__name">{{__('checkout.email')}} *</label>
                                        <input type="text" id="company__name" name="email" class="info"
                                            value="{{$student->email}}" placeholder="Email *">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="checkoutarea__inputbox">
                                        <label for="email__address">{{__('checkout.phone-number')}} *</label>
                                        <input type="text" id="email__address" name="phone" class="info"
                                            value="{{$student->phone}}" placeholder="Your email">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="checkoutarea__inputbox">
                                        <label for="order__note">{{__('checkout.orders-notes')}}</label>
                                        <input type="text" id="order__note" name="note" class="info"
                                            placeholder="Order Notes">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="checkoutarea__payment__wraper">
                        <div class="checkoutarea__total">
                            <h3>{{ $item->name }}</h3>
                            <div class="course__details__sidebar">
                                <div class="event__sidebar__wraper aos-init aos-animate" data-aos="fade-up">
                                    <div class="blogarae__img__2 course__details__img__2 aos-init aos-animate"
                                        data-aos="fade-up">
                                        <img loading="lazy" src="{{ asset($item->image_url)}}" alt="blog">
                                    </div>
                                    <div class="event__price__wraper">
                                        <div class="event__price">
                                            ${{ $item->price }}
                                            <!-- <del>/ $67.00</del> -->
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="checkoutarea__payment clearfix">
                            <div class="checkoutarea__payment__toggle">
                                <div class="checkoutarea__payment__total">
                                    <!-- <div class="checkoutarea__payment__type">
                                        <input type="radio" id="pay-toggle01" name="pay">
                                        <label for="pay-toggle01">Direct Bank Transfer</label>
                                    </div>
                                    <div class="checkoutarea__payment__type">
                                        <input type="radio" id="pay-toggle02" name="pay">
                                        <label for="pay-toggle02">Cheque Payment</label>
                                    </div>
                                    <div class="checkoutarea__payment__type">
                                        <input type="radio" id="pay-toggle03" name="pay">
                                        <label for="pay-toggle03">Cash on Delivery</label>
                                    </div> -->
                                    <div class="checkoutarea__payment__type">
                                        <input type="radio" id="pay-toggle04" name="pay" checked="checked"
                                            value='paypal'>
                                        <label for="pay-toggle04">{{__('checkout.paypal')}}</label>
                                    </div>
                                </div>
                                <div class="checkoutarea__payment__input__box">
                                    <button class="default__button">{{__('checkout.place-order')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection