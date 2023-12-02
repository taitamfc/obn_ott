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
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 aos-init aos-animate" data-aos="fade-up">
                                        <ul class="nav  about__button__wrap dashboard__button__wrap" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="single__tab__link active" data-bs-toggle="tab" data-bs-target="#projects__one" type="button" aria-selected="true" role="tab">Enrolled Courses</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="single__tab__link" data-bs-toggle="tab" data-bs-target="#projects__two" type="button" aria-selected="false" role="tab" tabindex="-1">Active Courses</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="single__tab__link" data-bs-toggle="tab" data-bs-target="#projects__three" type="button" aria-selected="false" role="tab" tabindex="-1">Completed Courses</button>
                                            </li>
                                     
                
                
                                        </ul>
                                    </div>


                                    <div class="tab-content tab__content__wrapper aos-init aos-animate" id="myTabContent" data-aos="fade-up">

                                        <div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                                            <div class="row">
                                           
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                                                    <div class="gridarea__wraper">
                                                        <div class="gridarea__img">
                                                            <a href="../course-details.html"><img loading="lazy"  src="{{ asset('website/img/grid/grid_1.png')}}" alt="grid"></a>
                                                            <div class="gridarea__small__button">
                                                                <div class="grid__badge">Data &amp; Tech</div>
                                                            </div>
                                                            <div class="gridarea__small__icon">
                                                                <a href="#"><i class="icofont-heart-alt"></i></a>
                                                            </div>
                            
                                                        </div>
                                                        <div class="gridarea__content">
                                                            <div class="gridarea__list">
                                                                <ul>
                                                                    <li>
                                                                        <i class="icofont-book-alt"></i> 23 Lesson
                                                                    </li>
                                                                    <li>
                                                                        <i class="icofont-clock-time"></i> 1 hr 30 min
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="gridarea__heading">
                                                                <h3><a href="../course-details.html">Foundation course to under stand
                                                                    about softwere</a></h3>
                                                            </div>
                                                            <div class="gridarea__price">
                                                                $32.00 <del>/ $67.00</del>
                                                                <span> <del class="del__2">Free</del></span>
                            
                                                            </div>
                                                            <div class="gridarea__bottom">
                            
                                                                <a href="instructor-details.html">
                                                                    <div class="gridarea__small__img">
                                                                        <img loading="lazy"  src="{{ asset('website/img/grid/grid_small_1.jpg')}}" alt="grid">
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
                                                        <div class="grid__course__status populerarea__button">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="100"
                                                                aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                                                  100% Complete
                                                                </div>
                                                              </div>
                                                              
                                                            <a class="default__button" href="#">Download Certificate</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                                                    <div class="gridarea__wraper">
                                                        <div class="gridarea__img">
                                                            <img loading="lazy"  src="{{ asset('website/img/grid/grid_2.png')}}" alt="grid">
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
                                                                        <img loading="lazy"  src="{{ asset('website/img/grid/grid_small_2.jpg')}}" alt="grid">
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
                                                        <div class="grid__course__status populerarea__button">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="100"
                                                                aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                                                  100% Complete
                                                                </div>
                                                              </div>
                                                              
                                                            <a class="default__button" href="#">Download Certificate</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                                                    <div class="gridarea__wraper">
                                                        <div class="gridarea__img">
                                                            <img loading="lazy"  src="{{ asset('website/img/grid/grid_3.png')}}" alt="grid">
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
                                                                        <img loading="lazy"  src="{{ asset('website/img/grid/grid_small_2.jpg')}}" alt="grid">
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
                                                        <div class="grid__course__status populerarea__button">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="100"
                                                                aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                                                  100% Complete
                                                                </div>
                                                              </div>
                                                              
                                                            <a class="default__button" href="#">Download Certificate</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                                                    <div class="gridarea__wraper">
                                                        <div class="gridarea__img">
                                                            <a href="../course-details.html"><img loading="lazy"  src="{{ asset('website/img/grid/grid_1.png')}}" alt="grid"></a>
                                                            <div class="gridarea__small__button">
                                                                <div class="grid__badge">Data &amp; Tech</div>
                                                            </div>
                                                            <div class="gridarea__small__icon">
                                                                <a href="#"><i class="icofont-heart-alt"></i></a>
                                                            </div>
                            
                                                        </div>
                                                        <div class="gridarea__content">
                                                            <div class="gridarea__list">
                                                                <ul>
                                                                    <li>
                                                                        <i class="icofont-book-alt"></i> 23 Lesson
                                                                    </li>
                                                                    <li>
                                                                        <i class="icofont-clock-time"></i> 1 hr 30 min
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="gridarea__heading">
                                                                <h3><a href="../course-details.html">Foundation course to under stand
                                                                    about softwere</a></h3>
                                                            </div>
                                                            <div class="gridarea__price">
                                                                $32.00 <del>/ $67.00</del>
                                                                <span> <del class="del__2">Free</del></span>
                            
                                                            </div>
                                                            <div class="gridarea__bottom">
                            
                                                                <a href="instructor-details.html">
                                                                    <div class="gridarea__small__img">
                                                                        <img loading="lazy"  src="{{ asset('website/img/grid/grid_small_1.jpg')}}" alt="grid">
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

                                                        <div class="grid__course__status populerarea__button">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                                aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                                                  80% Complete
                                                                </div>
                                                              </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                                                    <div class="gridarea__wraper">
                                                        <div class="gridarea__img">
                                                            <img loading="lazy"  src="{{ asset('website/img/grid/grid_2.png')}}" alt="grid">
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
                                                                        <img loading="lazy"  src="{{ asset('website/img/grid/grid_small_2.jpg')}}" alt="grid">
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
                                                        <div class="grid__course__status populerarea__button">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                                aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                                                  70% Complete
                                                                </div>
                                                              </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                                                    <div class="gridarea__wraper">
                                                        <div class="gridarea__img">
                                                            <a href="../course-details.html"><img loading="lazy"  src="{{ asset('website/img/grid/grid_8.png')}}" alt="grid"></a>
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
                                                                        <img loading="lazy"  src="{{ asset('website/img/grid/grid_small_3.jpg')}}" alt="grid">
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
                
                                        <div class="tab-pane fade" id="projects__two" role="tabpanel" aria-labelledby="projects__two">
                
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                                                    <div class="gridarea__wraper">
                                                        <div class="gridarea__img">
                                                            <a href="../course-details.html"><img loading="lazy"  src="{{ asset('website/img/grid/grid_1.png')}}" alt="grid"></a>
                                                            <div class="gridarea__small__button">
                                                                <div class="grid__badge">Data &amp; Tech</div>
                                                            </div>
                                                            <div class="gridarea__small__icon">
                                                                <a href="#"><i class="icofont-heart-alt"></i></a>
                                                            </div>
                            
                                                        </div>
                                                        <div class="gridarea__content">
                                                            <div class="gridarea__list">
                                                                <ul>
                                                                    <li>
                                                                        <i class="icofont-book-alt"></i> 23 Lesson
                                                                    </li>
                                                                    <li>
                                                                        <i class="icofont-clock-time"></i> 1 hr 30 min
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="gridarea__heading">
                                                                <h3><a href="../course-details.html">Foundation course to under stand
                                                                    about softwere</a></h3>
                                                            </div>
                                                            <div class="gridarea__price">
                                                                $32.00 <del>/ $67.00</del>
                                                                <span> <del class="del__2">Free</del></span>
                            
                                                            </div>
                                                            <div class="gridarea__bottom">
                            
                                                                <a href="instructor-details.html">
                                                                    <div class="gridarea__small__img">
                                                                        <img loading="lazy"  src="{{ asset('website/img/grid/grid_small_1.jpg')}}" alt="grid">
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

                                                        <div class="grid__course__status populerarea__button">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                                                aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                                                  80% Complete
                                                                </div>
                                                              </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                                                    <div class="gridarea__wraper">
                                                        <div class="gridarea__img">
                                                            <img loading="lazy"  src="{{ asset('website/img/grid/grid_2.png')}}" alt="grid">
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
                                                                        <img loading="lazy"  src="{{ asset('website/img/grid/grid_small_2.jpg')}}" alt="grid">
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
                                                        <div class="grid__course__status populerarea__button">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                                aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                                                  70% Complete
                                                                </div>
                                                              </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                            </div>
                
                                        </div>
                
                                        <div class="tab-pane fade" id="projects__three" role="tabpanel" aria-labelledby="projects__three">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                                                    <div class="gridarea__wraper">
                                                        <div class="gridarea__img">
                                                            <a href="../course-details.html"><img loading="lazy"  src="{{ asset('website/img/grid/grid_1.png')}}" alt="grid"></a>
                                                            <div class="gridarea__small__button">
                                                                <div class="grid__badge">Data &amp; Tech</div>
                                                            </div>
                                                            <div class="gridarea__small__icon">
                                                                <a href="#"><i class="icofont-heart-alt"></i></a>
                                                            </div>
                            
                                                        </div>
                                                        <div class="gridarea__content">
                                                            <div class="gridarea__list">
                                                                <ul>
                                                                    <li>
                                                                        <i class="icofont-book-alt"></i> 23 Lesson
                                                                    </li>
                                                                    <li>
                                                                        <i class="icofont-clock-time"></i> 1 hr 30 min
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="gridarea__heading">
                                                                <h3><a href="../course-details.html">Foundation course to under stand
                                                                    about softwere</a></h3>
                                                            </div>
                                                            <div class="gridarea__price">
                                                                $32.00 <del>/ $67.00</del>
                                                                <span> <del class="del__2">Free</del></span>
                            
                                                            </div>
                                                            <div class="gridarea__bottom">
                            
                                                                <a href="instructor-details.html">
                                                                    <div class="gridarea__small__img">
                                                                        <img loading="lazy"  src="{{ asset('website/img/grid/grid_small_1.jpg')}}" alt="grid">
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
                                                        <div class="grid__course__status populerarea__button">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="100"
                                                                aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                                                  100% Complete
                                                                </div>
                                                              </div>
                                                              
                                                            <a class="default__button" href="#">Download Certificate</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                                                    <div class="gridarea__wraper">
                                                        <div class="gridarea__img">
                                                            <img loading="lazy"  src="{{ asset('website/img/grid/grid_2.png')}}" alt="grid">
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
                                                                        <img loading="lazy"  src="{{ asset('website/img/grid/grid_small_2.jpg')}}" alt="grid">
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
                                                        <div class="grid__course__status populerarea__button">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="100"
                                                                aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                                                  100% Complete
                                                                </div>
                                                              </div>
                                                              
                                                            <a class="default__button" href="#">Download Certificate</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                                                    <div class="gridarea__wraper">
                                                        <div class="gridarea__img">
                                                            <img loading="lazy"  src="{{ asset('website/img/grid/grid_3.png')}}" alt="grid">
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
                                                                        <img loading="lazy"  src="{{ asset('website/img/grid/grid_small_2.jpg')}}" alt="grid">
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
                                                        <div class="grid__course__status populerarea__button">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="100"
                                                                aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                                                  100% Complete
                                                                </div>
                                                              </div>
                                                              
                                                            <a class="default__button" href="#">Download Certificate</a>
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