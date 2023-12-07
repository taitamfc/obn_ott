@extends('website.layouts.master')

@section('title')
{{ __('plan.title') }}
@endsection

@section('content')
@include('website.includes.header.breadcrumb',[
'page_title' => 'Plan'
])

<div class="coursearea sp_top_100 sp_bottom_100">
    <div class="container">
        <div class="row">

            <div class="col-xl-12 aos-init aos-animate" data-aos="fade-up">
                <ul class="nav  about__button__wrap dashboard__button__wrap" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="single__tab__link active" data-bs-toggle="tab" data-bs-target="#projects__one"
                            type="button" aria-selected="true" role="tab">{{__('plan.courses')}}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="single__tab__link" data-bs-toggle="tab" data-bs-target="#projects__two"
                            type="button" aria-selected="false" role="tab"
                            tabindex="-1">{{__('plan.subscriptions')}}</button>
                    </li>
                </ul>
            </div>
            <div class="col-xl-12">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="projects__one" role="tabpanel">
                        <div class="row">
                            @if(count($items))
                            @foreach( $items as $course )
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 aos-init aos-animate"
                                data-aos="fade-up">
                                @include('website.global.elm-course')
                            </div>
                            @endforeach
                            @else
                            <p class="text-center">{{__('sys.no_item_found')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="tab-pane fade" id="projects__two" role="tabpanel">
                        <div class="row">
                            @if(count($subscriptions))
                            @foreach( $subscriptions as $subscription )
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 aos-init aos-animate"
                                data-aos="fade-up">
                                @include('website.global.elm-subsciprtion')
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
</div>
@endsection