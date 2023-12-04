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
                            <h4>My Profile</h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 aos-init aos-animate" data-aos="fade-up">
                                <ul class="nav  about__button__wrap dashboard__button__wrap" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="single__tab__link active" data-bs-toggle="tab"
                                            data-bs-target="#projects__one" type="button" aria-selected="true"
                                            role="tab">Profile</button>
                                    </li>
                                </ul>
                            </div>

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
                                                                <label>Name</label>
                                                                <input type="text" placeholder="John" name="name"
                                                                    id="name" value="{{ $student->name }}">
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
                                                                <label>Zip Code</label>
                                                                <input type="text" placeholder="John" name="code"
                                                                    id="code" value="{{ $student->code }}">
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
                                                                <label>Email Address</label>
                                                                <input type="email" placeholder="email" name="email"
                                                                    value="{{ $student->email }}">

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="dashboard__form__wraper">
                                                            <div class="dashboard__form__input">
                                                                <label>Phone</label>
                                                                <input type="text" placeholder="Phone Number"
                                                                    name="phone" value="{{ $student->phone }}">
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
                                                                <label>Passwword</label>
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
                                                                <label>Confirm New Password</label>
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
                                                                <label>Address</label>
                                                                <input type="text" placeholder="John" name="address"
                                                                    id="address" value="{{ $student->address }}">
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
                                                                <label>City</label>
                                                                <input type="text" placeholder="John" name="city"
                                                                    id="city" value="{{ $student->city }}">
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
                                                                <label>Status</label>
                                                                <select name="status" id="status" class="form-control">
                                                                <option @selected( $student->status == 0 )
                                                                    value='0'>Inactive</option>
                                                                <option @selected( $student->status == 1 ) value='1'>Active
                                                                </option>
                                                            </select>
                                                                @if ($errors->any())
                                                                <p style="color:red">{{ $errors->first('status') }}
                                                                </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-xl-12">
                                                        <div class="dashboard__form__button">
                                                        <a href="{{ route('website.accounts',['site_name' => $site_name]) }}"
                                                            class="btn btn-secondary" style="margin: 30px auto 0;"
                                                            >Cancel</a>
                                                            <button type="submit" class="btn btn-primary" style="margin: 30px auto 0;">Save</button>
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