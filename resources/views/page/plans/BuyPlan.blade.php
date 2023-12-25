@extends('page.layouts.master')
@section('title')
{{ __('admin-sidebar.plan') }}
@endsection
@section('content')
<div class="checkoutarea sp_bottom_100 sp_top_100">
    <div class="container">
        <form action="{{route('planpage.storePlan')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="checkoutarea__billing">
                        <div class="checkoutarea__billing__heading">
                            <h2>SIGN UP</h2>
                        </div>
                        <div class="checkoutarea__billing__form">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="checkoutarea__inputbox">
                                        <label for="first__name">Full Name*</label>
                                        <input type="text" id="first__name" name="nameuser" class="mb-1"
                                            placeholder="Full Name" value="{{ old('nameuser') }}">
                                        @if($errors->has('nameuser'))
                                        <div class="text-danger error-message pd-0">
                                            {{ $errors->first('nameuser') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="checkoutarea__inputbox">
                                        <label for="email__address">Email Address*</label>
                                        <input type="text" id="email__address" name="email" class="mb-1"
                                            placeholder="Your email" value="{{ old('email') }}">
                                        @if($errors->has('email'))
                                        <div  class="text-danger error-message pd-0">
                                            {{ $errors->first('email') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="checkoutarea__inputbox">
                                        <label for="password">Password*</label>
                                        <input type="text" id="password" name="password" class="mb-1"
                                            placeholder="Password" value="{{ old('password') }}">
                                        @if($errors->has('password'))
                                        <div  class="text-danger error-message pd-0">
                                            {{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="checkoutarea__inputbox">
                                        <label for="phone__number">Phone Number*</label>
                                        <input type="text" id="phone__number" name="phone" class="mb-1"
                                            placeholder="Phone Number" value="{{ old('phone') }}">
                                        @if($errors->has('phone'))
                                        <div  class="text-danger error-message pd-0">
                                            {{ $errors->first('phone') }}</div>
                                        @endif
                                        <input style="display: none;" type="text" name="plan_id" value="{{$item->id}}">
                                        <input style="display: none;" type="text" name="price" value="{{$item->price}}">
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 pt-0">
                    <div class="checkoutarea__payment__wraper">
                        <div class="checkoutarea__total">
                            <h3>{{ $item->name }}</h3>
                            <div class="checkoutarea__table__wraper">
                                <table class="checkoutarea__table">
                                    <thead>
                                        <tr class="checkoutarea__item">
                                            <td class="checkoutarea__ctg__type">
                                                Price</td>
                                            <td class="checkoutarea__cgt__des">
                                                ${{ $item->price }}</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="checkoutarea__item prd-name">
                                            <td class="checkoutarea__ctg__type">
                                                Duration </td>
                                            <td class="checkoutarea__cgt__des">
                                                {{ $item->duration }}</td>
                                        </tr>
                                        <tr class="checkoutarea__item">
                                            <td class="checkoutarea__ctg__type">
                                                Number Day</td>
                                            <td class="checkoutarea__cgt__des">
                                                {{ $item->number_days }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="checkoutarea__payment clearfix">
                            <div class="checkoutarea__payment__toggle">
                                <div class="checkoutarea__payment__total">
                                    <div class="checkoutarea__payment__type">
                                        <input type="radio" value="paypal" id="pay-toggle04" name="pay" checked>
                                        <label for="pay-toggle04">Paypal</label>
                                    </div>
                                </div>
                                <div class="checkoutarea__payment__input__box">
                                    <button class="default__button" type="submit">Register</button>
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

@section('footer')
<script src="{{ asset('website/js/jquery.inputmask.bundle.js') }}"></script>
<script>
    jQuery(document).ready( function(){
        $('#phone__number').inputmask("(999) 999-9999");
    });
</script>
@endsection