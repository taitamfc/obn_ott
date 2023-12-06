@extends('website.layouts.master')
@section('title')
{{ $item->name }}
@endsection
@section('content')
@include('website.includes.header.breadcrumb',[
'page_title' => $item->name
])

<div class="blogarea__2 zoom__meetings__details sp_top_100 sp_bottom_100">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
				<div class="blogarae__img__2 course__details__img__2 aos-init aos-animate" data-aos="fade-up">
                    <img loading="lazy" src="{{ asset($item->image_url )}}" alt="blog">
                    <div class="registerarea__content course__details__video">
                        <div class="registerarea__video">
                            <div class="video__pop__btn">
                                <a class="video-btn" href="{{ $item->video_url }}">
                                    <img loading="lazy" src="{{ asset('website/img/icon/video.png')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog__details__content__wraper">
                    <div class="course__list__wraper aos-init aos-animate" data-aos="fade-up">
                        <div class="experence__description">
                            {!! $item->description !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="course__details__sidebar--2">
                    <div class="event__sidebar__wraper aos-init aos-animate" data-aos="fade-up">
                        <div class="event__details__list">
                            <ul>
                                <li>
                                    <div class="event__details__icon">
                                        <i class="icofont-teacher"></i>
                                    </div>
                                    <div class="event__details__date">
                                        <span class="sb_label">Instructor:</span><span><a
                                                href="instructor-details.html">D. Willaim</a></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="event__details__button">
                            <a class="default__button" href="#">Complete</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection