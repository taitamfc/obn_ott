@extends('website.layouts.master')
@section('content')

<!-- .about__tap__section__end -->
@if( $lessons && count($lessons ) )
<div class="gridarea__2 sp_bottom_30 sp_top_30" data-aos="fade-up">
    <div class="container">
        <div class="section__title">
            <div class="section__title__heading">
                <h2>{{__('home.lessons')}}</h2>
            </div>
        </div>
        <div class="row row__custom__class">
            <div class="swiper featured__course">
                <div class="swiper-wrapper">
                    @foreach( $lessons as $lesson )
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 grid-item column__custom__class swiper-slide">
                    @include('website.global.elm-lesson')
                    </div>
                    @endforeach
                </div>
                <div class="slider__controls__wrap slider__controls__arrows">
                    <div class="swiper-button-next arrow-btn"></div>
                    <div class="swiper-button-prev arrow-btn"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- .about__tap__section__end -->
@if( $subjects && count($subjects ) )
<div class="gridarea__2 sp_bottom_30 sp_top_30" data-aos="fade-up">
    <div class="container">
        <div class="section__title">
            <div class="section__title__heading">
                <h2>{{__('search.new-subjects')}}</h2>
            </div>
        </div>
        <div class="row row__custom__class">
            <div class="swiper featured__course">
                <div class="swiper-wrapper">
                    @foreach( $subjects as $subject )
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 grid-item column__custom__class swiper-slide">
                    @include('website.global.elm-subject')
                    </div>
                    @endforeach
                </div>
                <div class="slider__controls__wrap slider__controls__arrows">
                    <div class="swiper-button-next arrow-btn"></div>
                    <div class="swiper-button-prev arrow-btn"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- .about__tap__section__end -->
@if( $courses && count($courses ) )
<div class="gridarea__2 sp_bottom_30 sp_top_30" data-aos="fade-up">
    <div class="container">
        <div class="section__title">
            <div class="section__title__heading">
                <h2>{{__('search.new-courses')}}</h2>
            </div>
        </div>
        <div class="row row__custom__class">
            <div class="swiper featured__course">
                <div class="swiper-wrapper">
                    @foreach( $courses as $course )
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 grid-item column__custom__class swiper-slide">
                    @include('website.global.elm-course')
                    </div>
                    @endforeach
                </div>
                <div class="slider__controls__wrap slider__controls__arrows">
                    <div class="swiper-button-next arrow-btn"></div>
                    <div class="swiper-button-prev arrow-btn"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if(!count($courses ) && !count($subjects ) && !count($lessons ) )
<div class="coursearea sp_top_100 sp_bottom_100">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <p class="text-center">{{__('sys.no_item_found')}}</p>
            </div>
        </div>
    </div>
</div>
@endif

@endsection