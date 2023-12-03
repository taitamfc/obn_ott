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
                            <h4>Wishlist</h4>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="gridarea__wraper">
                                    <div class="gridarea__img">
                                        <img loading="lazy" src="{{ asset('website/img/grid/grid_2.png')}}" alt="grid">
                                        <div class="gridarea__small__button">
                                            <div class="grid__badge blue__color">Mechanical</div>
                                        </div>
                                        <div class="gridarea__small__icon">
                                            <a href="#"><i class="icofont-heart-alt"></i></a>
                                        </div>

                                    </div>
                                    <div class="gridarea__content">
                                        <div class="gridarea__list">
                                            <ul>
                                                <li>
                                                    <i class="icofont-book-alt"></i> 29 Lesson
                                                </li>
                                                <li>
                                                    <i class="icofont-clock-time"></i> 2 hr 10 min
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="gridarea__heading">
                                            <h3><a href="#">Nidnies course to under stand
                                                    about softwere</a></h3>
                                        </div>
                                        <div class="gridarea__price green__color">
                                            $32.00<del>/$67.00</del>
                                            <span>.Free</span>

                                        </div>
                                        <div class="gridarea__bottom">
                                            <a href="instructor-details.html">
                                                <div class="gridarea__small__img">
                                                    <img loading="lazy"
                                                        src="{{ asset('website/img/grid/grid_small_2.jpg')}}"
                                                        alt="grid">
                                                    <div class="gridarea__small__content">
                                                        <h6>Rinis Jhon</h6>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="gridarea__star">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <span>(44)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="gridarea__wraper">
                                    <div class="gridarea__img">
                                        <a href="../course-details.html"><img loading="lazy"
                                                src="{{ asset('website/img/grid/grid_3.png')}}" alt="grid"></a>
                                        <div class="gridarea__small__button">
                                            <div class="grid__badge pink__color">Development</div>
                                        </div>
                                        <div class="gridarea__small__icon">
                                            <a href="#"><i class="icofont-heart-alt"></i></a>
                                        </div>

                                    </div>
                                    <div class="gridarea__content">
                                        <div class="gridarea__list">
                                            <ul>
                                                <li>
                                                    <i class="icofont-book-alt"></i> 25 Lesson
                                                </li>
                                                <li>
                                                    <i class="icofont-clock-time"></i> 1 hr 40 min
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="gridarea__heading">
                                            <h3><a href="../course-details.html">Minws course to under stand
                                                    about solution</a></h3>
                                        </div>
                                        <div class="gridarea__price">
                                            $40.00 <del>/ $67.00</del>
                                            <span> <del class="del__2">Free</del></span>

                                        </div>
                                        <div class="gridarea__bottom">

                                            <a href="instructor-details.html">
                                                <div class="gridarea__small__img">
                                                    <img loading="lazy"
                                                        src="{{ asset('website/img/grid/grid_small_3.jpg')}}"
                                                        alt="grid">
                                                    <div class="gridarea__small__content">
                                                        <h6>Micle Jhon</h6>
                                                    </div>
                                                </div>
                                            </a>

                                            <div class="gridarea__star">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <span>(44)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="gridarea__wraper">
                                    <div class="gridarea__img">
                                        <a href="../course-details.html"><img loading="lazy"
                                                src="{{ asset('website/img/grid/grid_3.png')}}" alt="grid"></a>
                                        <div class="gridarea__small__button">
                                            <div class="grid__badge pink__color">Development</div>
                                        </div>
                                        <div class="gridarea__small__icon">
                                            <a href="#"><i class="icofont-heart-alt"></i></a>
                                        </div>

                                    </div>
                                    <div class="gridarea__content">
                                        <div class="gridarea__list">
                                            <ul>
                                                <li>
                                                    <i class="icofont-book-alt"></i> 25 Lesson
                                                </li>
                                                <li>
                                                    <i class="icofont-clock-time"></i> 1 hr 40 min
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="gridarea__heading">
                                            <h3><a href="../course-details.html">Minws course to under stand
                                                    about solution</a></h3>
                                        </div>
                                        <div class="gridarea__price">
                                            $40.00 <del>/ $67.00</del>
                                            <span> <del class="del__2">Free</del></span>

                                        </div>
                                        <div class="gridarea__bottom">

                                            <a href="instructor-details.html">
                                                <div class="gridarea__small__img">
                                                    <img loading="lazy"
                                                        src="{{ asset('website/img/grid/grid_small_3.jpg')}}"
                                                        alt="grid">
                                                    <div class="gridarea__small__content">
                                                        <h6>Micle Jhon</h6>
                                                    </div>
                                                </div>
                                            </a>

                                            <div class="gridarea__star">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <span>(44)</span>
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