<div class="best__categories mt-3">
    <div class="container">
        <div class="row">
            @foreach( $grades as $grade )
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <!-- categories Item Start -->
                <div class="best__categories__item aos-init" data-aos="fade-up">
                    <a class="best__categories__link" href="{{ route('website.grades.show',['id'=> $grade->id,'site_name'=> $site_name]) }}">
                        <div class="best__categories__info">
                            <h3 class="best__categories__name">{{ $grade->name }}</h3>
                            <span class="best__categories__more">{{ $grade->subjects->count() }} {{__('home.subjects')}}</span>
                        </div>
                    </a>
                </div>
                <!-- categories Item End -->
            </div>
            @endforeach
        </div>
    </div>
</div>