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
                                    <a href="{{ route('website.accounts.edit', ['site_name' => $site_name]) }}" class="btn btn-primary">Edit</a>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="dashboard__form">Registration Date</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="dashboard__form">20, January 2024 9:00 PM</div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="dashboard__form dashboard__form__margin">Username</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="dashboard__form dashboard__form__margin">obema007</div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="dashboard__form dashboard__form__margin">Email Address</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="dashboard__form dashboard__form__margin">obema@example.com</div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="dashboard__form dashboard__form__margin">Phone Number</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="dashboard__form dashboard__form__margin">+55 669 4456 25987</div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="dashboard__form dashboard__form__margin">Password</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="dashboard__form dashboard__form__margin">Graphics Design</div>
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