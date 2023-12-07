@extends('website.layouts.master')
@section('title')
Whitlist
@endsection
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
                            <h4>{{__('account.whitlist')}}</h4>
                        </div>
                        <div class="row">
                            @if(count($lessons))
                            @foreach($lessons as $lesson)
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                @include('website.global.elm-lesson')
                            </div>
                            @endforeach
                            @else
                            <p class="text-center">{{__('sys.no_item_found')}}</p>
                            @endif
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