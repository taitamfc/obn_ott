@extends('website.layouts.master')
@section('title')
{{ $item->name }}
@endsection
@section('content')
    @include('website.includes.header.breadcrumb',[
        'page_title' => $item->name
    ])
<div class="tution sp_bottom_100 sp_top_50">
    <div class="container-fluid full__width__padding">
        <div class="row">
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 aos-init aos-animate" data-aos="fade-up">

                <div class="accordion content__cirriculum__wrap" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          {{ $item->course->name }}
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            @foreach($item->course->lessons as $lesson)
                                <div class="scc__wrap @if($item->id == $lesson->id) active-lesson @endif">
                                    <div class="scc__info">
                                        @if(!$lesson->is_bought)
                                        <i class="icofont-lock"></i>
                                        @else
                                        <i class="icofont-video-alt"></i>
                                        @endif
                                        <h5> 
                                            @if(!$lesson->is_bought)
                                            <a href="{{ route('website.orders.create', ['item_id' => $lesson->course_id, 'type' => 'course', 'site_name' => $site_name]) }}">
                                            <span>{{ $lesson->name }}</span>
                                            </a>
                                            @else
                                            <a href="{{ route('website.lessons.show',['id'=> $lesson->id,'site_name'=> $site_name]) }}">
                                            <span>{{ $lesson->name }}</span>
                                            </a>
                                            @endif
                                        </h5>
                                    </div>
                                </div>
                            @endforeach
                         </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 aos-init aos-animate" data-aos="fade-up">
                <div class="lesson__content__main">
                    <div class="lesson__content__wrap">
                        <h3>{{ $item->name }}</h3>
                        <span><a href="{{ route('website.lessons',['site_name' => $site_name]) }}">Close</a></span>
                    </div>
                    <div class="plyr__video-embed rbtplayer">
                        <iframe src="https://www.youtube.com/embed/vHdclsdkp28" allowfullscreen=""
                            allow="autoplay" width="100%" height="500"></iframe>
                    </div>
                    <div class="lesson__description">
                        {!! $item->description !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection