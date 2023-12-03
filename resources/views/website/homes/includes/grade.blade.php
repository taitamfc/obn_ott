<!-- .about__tap__section__end -->
@if( $grade->subjects && count($grade->subjects ) )
<div class="gridarea__2 sp_bottom_30 sp_top_30" data-aos="fade-up">
    <div class="container">
        <div class="section__title">
            <div class="section__title__heading">
                <h2>{{ $grade->name }}</h2>
            </div>
        </div>
        <div class="row row__custom__class">
            <div class="swiper featured__course">
                <div class="swiper-wrapper">
                    @foreach( $grade->subjects as $subject )
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 grid-item column__custom__class swiper-slide">
                        <div class="gridarea__wraper">
                            <div class="gridarea__img">
                                <a href="{{ route('website.subjects.show',['id'=> $subject->id,'site_name'=> $site_name]) }}">
                                    <img src="{{ asset($subject->img)}}" alt="grid">
                                </a>
                            </div>
                            <div class="gridarea__content">
                                <div class="gridarea__heading">
                                    <h3><a href="{{ route('website.subjects.show',['id'=> $subject->id,'site_name'=> $site_name]) }}">{{ $subject->name }}</a></h3>
                                </div>
                            </div>
                        </div>
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
