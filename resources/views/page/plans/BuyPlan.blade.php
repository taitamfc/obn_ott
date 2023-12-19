@extends('page.layouts.master')
@section('title')
    {{ __('admin-sidebar.plan') }}
@endsection
@section('content')
    <div class="main-content page-content">
        <!--==================================*
                           Main Section
                *====================================-->
        <div class="main-content-inner" style="max-width: 100% !important;">
            {{-- <div class="row mb-4">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                        <h5 class="mr-4 mb-0 font-weight-bold">{{__('admin-account.plan')}}</h5>
                        <div class="d-flex align-items-baseline dashboard-breadcrumb">
                            <p class="text-muted mb-0 mr-1 hover-cursor">OTT</p>
                            <i class="mdi mdi-chevron-right mr-1 text-primary"></i>
                            <p class="text-muted mb-0 mr-1 hover-cursor">{{__('admin-account.plan')}}</p>
                        </div>
                    </div>
                    <div class="buttons d-flex">
                        <a class="btn btn-dark mr-1" href="{{ route('admin.users.plans') }}">{{ __('sys.back') }}</a>
                    </div>
                </div>
            </div>
        </div> --}}
            <div class="" style="padding: 20px">
                <div id="plan">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="buyPlans-table-results">
                                {{-- <div class="text-center pt-5 pb-5">{{ __('sys.loading_data') }}</div> --}}
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card_title">{{ __('admin-account.plan') }}</h4>
                                        <div id="mt_pricing">
                                            <div class="container">
                                                <div class="row d-flex justify-content-center align-items-center">
                                                    <div class="col-lg-2">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <form action="{{ route('planpage.storePlan') }}" method="post">
                                                                        @csrf
                                                                        
                                                                        <input style="display: none;" class="form-control" type="number" name="plan_id" value="{{ $item->id }}" id="plan_id" readonly>
                                                                    
                                                                        <label for="name" class="col-form-label">{{ __('admin-account.name') }}</label>
                                                                        <input class="form-control" type="text" name="name" value="{{ $item->name }}" id="name" readonly>
                                                                    
                                                                        <label for="name" class="col-form-label">{{ __('admin-account.price') }}($)</label>
                                                                        <input class="form-control" type="text" name="price" value="{{ $item->price }}" id="price" readonly>
                                                                    
                                                                        <label for="name" class="col-form-label">{{ __('admin-account.duration') }}</label>
                                                                        <input class="form-control" type="text" name="duration" value="{{ $item->duration }}" id="duration" readonly>
                                                                    
                                                                        <label for="name" class="col-form-label">{{ __('admin-account.expiration-date') }}</label>
                                                                        <input class="form-control" type="text" name="date" value="{{ $date->format('d-m-y') }}" id="date" readonly>
                                                                    
                                                                        <label for="nameuser" class="col-form-label">ADD NAME</Em></label>
                                                                        <input class="form-control" type="text" name="nameuser"  id="nameuser">

                                                                        <label for="email" class="col-form-label">ADD EMAIL</Em></label>
                                                                        <input class="form-control" type="text" name="email"  id="email">

                                                                        <label for="phone" class="col-form-label">ADD PHONE</Em></label>
                                                                        <input class="form-control" type="text" name="phone"  id="phone">


                                                                        <label for="pay" class="col-form-label">{{ __('admin-account.pay-method') }}</label>
                                                                        <div class="form-inline">
                                                                            <input class="form-check-input mr-2" type="radio" name="pay" value="paypal" id="pay-01" checked>
                                                                            <label class="form-check-label" for="pay-01">{{ __('admin-account.paypal') }}</label>
                                                                        </div>
                                                                        <div class="input-error text-danger">
                                                                            @error('pay')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </div>
                                                                    
                                                                        <button style="color: white;
                                                                                        background-color: #1515e0;
                                                                                        border-radius: 5px;
                                                                                        border: none;" type="submit">buy</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="main_pricing_conatiner highlight_pricing wow fadeInUpBig rounded"
                                                            data-wow-delay="0.6s">
                                                            <div class="price">
                                                                <h2>
                                                                    <span class="price_icon">
                                                                        <i class="fa fa-money"></i>
                                                                    </span>
                                                                    {{ $item->name }}
                                                                </h2>
                                                                <span class="price_tag">
                                                                    <span class="currency">${{ $item->price }}</span>
                                                                </span>
                                                                <span class="per_month">/{{ $item->duration }}</span>
                                                            </div>
                                                            <div class="price_listing">
                                                                <ul>
                                                                    <li>{{ __('admin-account.latin-words-consectetur') }}
                                                                    </li>
                                                                    <li>{{ __('admin-account.all-the-lorem-ipsum') }}</li>
                                                                    <li>{{ __('admin-account.it-has-survived-not-only') }}
                                                                    </li>
                                                                    <li>{{ __('admin-account.labore-et-dolore-magna-ali') }}
                                                                    </li>
                                                                    <li>{{ __('admin-account.nor-again-is-there-anyone') }}
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            {{-- <div class="choose_plan_btn">
                                                                <a href='{{ route('planpage.storePlan', [$item->id, $item->price]) }}'
                                                                    class='btn btn-light add-item'
                                                                    data-id="{{ $item->id }}" data-action=""
                                                                    data-price="{{ $item->price }}">{{ __('admin-account.confirm') }}</a>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
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
            </div>
        </div>
    </div>
@endsection

@section('footer')
@endsection
