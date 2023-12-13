@extends('website.layouts.master')
@section('content')

<!-- dashboardarea__area__start  -->
<div class="dashboardarea sp_bottom_100">
    @include('website.dashboards.dashboard-wraper')
    <div class="dashboard">
        <div class="container-fluid full__width__padding">
            <div class="row">
                @include('website.dashboards.dashboard-inner')
                <div class="col-xl-9 col-lg-9 col-md-12">
                    <div class="dashboard__content__wraper">
                        <div class="dashboard__section__title">
                            <h4>{{__('account.my_page')}}</h4>
                        </div>
                        <div class="row">
                            <div class="tab-content tab__content__wrapper aos-init aos-animate" id="myTabContent"
                                data-aos="fade-up">

                                <div class="tab-pane fade active show" id="projects__one" role="tabpanel"
                                    aria-labelledby="projects__one">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <form method="POST"
                                                action="{{ route('website.accounts.update',['site_name' => $site_name]) }}">
                                                @if(session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                                @endif
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="dashboard__form__wraper">
                                                            <div class="dashboard__form__input">
                                                                <label>{{__('account.full_name')}}</label>
                                                                <input type="text" name="name" id="name"
                                                                    value="{{ old('name', $student->name) }}">
                                                                @if ($errors->any())
                                                                <p style="color:red">{{ $errors->first('name') }}
                                                                </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="dashboard__form__wraper">
                                                            <div class="dashboard__form__input">
                                                                <label>{{__('account.zip_code')}}</label>
                                                                <input type="text" name="code" id="code"
                                                                    value="{{ old('code', $student->code) }}">
                                                                @if ($errors->any())
                                                                <p style="color:red">{{ $errors->first('code') }}
                                                                </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="dashboard__form__wraper">
                                                            <div class="dashboard__form__input">
                                                                <label>{{__('account.email_address')}}</label>
                                                                <input type="email" placeholder="email" name="email"
                                                                    value="{{ old('email', $student->email) }}">
                                                                <p style="color:red">{{ $errors->first('email') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="dashboard__form__wraper">
                                                            <div class="dashboard__form__input">
                                                                <label>{{__('account.phone_number')}}</label>
                                                                <input type="text" placeholder="Phone Number"
                                                                    name="phone"
                                                                    value="{{ old('phone', $student->phone) }}">
                                                                @if ($errors->any())
                                                                <p style="color:red">{{ $errors->first('phone') }}
                                                                </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="dashboard__form__wraper">
                                                            <div class="dashboard__form__input">
                                                                <label>{{__('account.password')}}</label>
                                                                <input type="password" name="password" id="password">
                                                                @if ($errors->any())
                                                                <p style="color:red">{{ $errors->first('password') }}
                                                                </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="dashboard__form__wraper">
                                                            <div class="dashboard__form__input">
                                                                <label>{{__('account.confirm_new_password')}}</label>
                                                                <input type="password" name="repeatpassword">
                                                                @if ($errors->any())
                                                                <p style="color:red">
                                                                    {{ $errors->first('repeatpassword') }}
                                                                </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="dashboard__form__wraper">
                                                            <div class="dashboard__form__input">
                                                                <label>{{__('account.address')}}</label>
                                                                <input type="text" placeholder="John" name="address"
                                                                    id="address"
                                                                    value="{{ old('address', $student->address) }}">
                                                                @if ($errors->any())
                                                                <p style="color:red">{{ $errors->first('address') }}
                                                                </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="dashboard__form__wraper">
                                                            <div class="dashboard__form__input">
                                                                <label>{{__('account.city')}}</label>
                                                                <input type="text" name="city" id="city"
                                                                    value="{{ old('city', $student->city) }}">
                                                                @if ($errors->any())
                                                                <p style="color:red">{{ $errors->first('city') }}
                                                                </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12">
                                                        <div class="dashboard__form__wraper">
                                                            <div class="dashboard__form__input">
                                                                <label>{{__('account.status')}}</label>
                                                                <select name="status" id="status" class="form-control">
                                                                    <option value='0'
                                                                        {{ old('status', $student->status) == 0 ? 'selected' : '' }}>
                                                                        Inactive</option>
                                                                    <option value='1'
                                                                        {{ old('status', $student->status) == 1 ? 'selected' : '' }}>
                                                                        Active</option>
                                                                </select>
                                                                @if ($errors->any())
                                                                <p style="color:red">{{ $errors->first('status') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-12">
                                                        <div class="dashboard__form__button">
                                                            <a href="{{ route('website.accounts',['site_name' => $site_name]) }}"
                                                                class="btn btn-secondary"
                                                                style="margin: 30px auto 0;">{{__('account.cancel')}}</a>
                                                            <button type="submit" class="btn btn-primary"
                                                                style="margin: 30px auto 0;">{{__('account.save')}}</button>
                                                        </div>
                                                    </div>

                                            </form>
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
<!-- dashboardarea__area__end   -->

@endsection