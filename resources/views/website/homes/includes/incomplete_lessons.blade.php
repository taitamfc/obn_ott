<!-- .about__tap__section__end -->
@if( $incomplete_lessons && count($incomplete_lessons ) )
<div class="gridarea__2 sp_bottom_30 sp_top_30" data-aos="fade-up">
    <div class="container">
        <div class="section__title">
            <div class="section__title__heading">
                <h2>Continue Watching</h2>
            </div>
        </div>
        <div class="row row__custom__class">
            <div class="swiper featured__course">
                <div class="swiper-wrapper">
                    @foreach( $incomplete_lessons as $lesson )
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
