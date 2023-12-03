@extends('website.layouts.master')
@section('content')
@include('website.includes.header.breadcrumb',[
'page_title' => 'Checkout'
])

<div class="checkoutarea sp_bottom_100 sp_top_100">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="checkoutarea__billing">
                    <div class="checkoutarea__billing__heading">
                        <h2>Billing Details</h2>
                    </div>
                    <div class="checkoutarea__billing__form">
                        <form action="#">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="checkoutarea__inputbox">
                                        <label for="first__name">First Name *</label>
                                        <input type="text" id="first__name" name="namm" class="info"
                                            placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="checkoutarea__inputbox">
                                        <label for="last__name">Last Name*</label>
                                        <input type="text" id="last__name" name="namm" class="info"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="checkoutarea__inputbox">
                                        <label for="company__name">Company Name</label>
                                        <input type="text" id="company__name" name="namm" class="info"
                                            placeholder="Company Name">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="checkoutarea__inputbox">
                                        <label for="email__address">Email Address*</label>
                                        <input type="text" id="email__address" name="namm" class="info"
                                            placeholder="Your email">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="checkoutarea__inputbox">
                                        <label for="phone__number">Phone Number*</label>
                                        <input type="text" id="phone__number" name="namm" class="info"
                                            placeholder="Phone Number">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="checkoutarea__inputbox">
                                        <label for="address__info">Address *</label>
                                        <input type="text" id="address__info" name="namm" class="info"
                                            placeholder="Address">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="checkoutarea__inputbox">
                                        <label for="town__city">Town/City *</label>
                                        <input type="text" id="town__city" name="namm" class="info"
                                            placeholder="Town/City">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="checkoutarea__inputbox">
                                        <label for="post__code">Post Code/Zip Code*</label>
                                        <input type="text" id="post__code" name="namm" class="info"
                                            placeholder="Post Code/Zip Code">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="checkoutarea__inputbox">
                                    <label for="order__note">Order Notes</label>
                                    <input type="text" id="order__note" name="namm" class="info"
                                        placeholder="Order Notes">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
                <div class="checkoutarea__payment__wraper">
                    <div class="checkoutarea__total">
                        <h3>{{ $item->name }}</h3>
                        <div class="course__details__sidebar">
                            <div class="event__sidebar__wraper aos-init aos-animate" data-aos="fade-up">
                                <div class="blogarae__img__2 course__details__img__2 aos-init aos-animate" data-aos="fade-up">
                                    <img loading="lazy" src="{{ asset($item->image_url)}}" alt="blog">
                                </div>
                                <div class="event__price__wraper">
                                    <div class="event__price">
                                        $32.00 <del>/ $67.00</del>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="checkoutarea__payment clearfix">
                        <div class="checkoutarea__payment__toggle">
                            <form action="#">
                                <div class="checkoutarea__payment__total">
                                    <div class="checkoutarea__payment__type">
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
                                    </div>
                                    <div class="checkoutarea__payment__type">
                                        <input type="radio" id="pay-toggle04" name="pay">
                                        <label for="pay-toggle04">Paypal</label>
                                    </div>
                                </div>
                                <div class="checkoutarea__payment__input__box">
                                    <a class="default__button" href="#">Place order</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection