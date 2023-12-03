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

                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="dashboard__form__wraper">
                                                        <div class="dashboard__form__input">
                                                            <label>Name</label>
                                                            <input type="text" placeholder="John" name="name" id="name">
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
                                                            <label>Email Address</label>
                                                            <input type="email" placeholder="email" name="email">
                                                            @if ($errors->any())
                                                            <p style="color:red">{{ $errors->first('email') }}
                                                            </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6">
                                                    <div class="dashboard__form__wraper">
                                                        <div class="dashboard__form__input">
                                                            <label>Phone Number</label>
                                                            <input type="text" placeholder="Phone Number" name="phone" >
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
                                                            <input type="password" placeholder="password"
                                                                name="password" id="password">
                                                                @if ($errors->any())
                                                            <p style="color:red">{{ $errors->first('password') }}
                                                            </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-12">
                                                    <div class="dashboard__form__wraper">
                                                        <div class="dashboard__form__input">
                                                            <label>Confirm Password</label>
                                                            <input type="password" placeholder="Confirm Password"
                                                                name="repeatpassword" value="{{ old('password') }}">
                                                            @if ($errors->any())
                                                            <p style="color:red">{{ $errors->first('repeatpassword') }}
                                                            </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-12">
                                                    <div class="dashboard__form__button">
                                                        <a class="default__button" href="#">Update Info</a>
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

</div>
<!-- dashboardarea__area__end   -->

@endsection