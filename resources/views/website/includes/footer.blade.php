 <!-- footer__section__start -->
 <div class="footerarea">
     <div class="container">
         <!-- <div class="footerarea__newsletter__wraper">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" data-aos="fade-up">
                            <div class="footerarea__text">
                                <h3>Still You Need Our <span>Support</span> ?</h3>
                                <p>Don’t wait make a smart & logical quote here. Its pretty easy.</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" data-aos="fade-up">
                            <div class="footerarea__newsletter">
                                <div class="footerarea__newsletter__input">
                                    <form action="#">
                                        <input type="text" placeholder="Enter your email here">
                                        <div class="footerarea__newsletter__button">
                                            <button type="submit" class="subscribe__btn">Subscribe Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

         <div class="footerarea__wrapper footerarea__wrapper__2">
             <div class="row">
                 <div class="col-xl-5 col-lg-5 col-sm-12 col-md-12" data-aos="fade-up">
                     <div class="footerarea__inner footerarea__about__us">
                         <div class="footerarea__heading">
                             <h3>{{__('footer.about')}}</h3>
                         </div>
                         <div class="footerarea__content">
                             <p>orporate clients and leisure travelers has been relying on Groundlink for dependable
                                 safe, and professional chauffeured car end service in major cities across World.</p>
                         </div>
                         <!-- <div class="foter__bottom__text">
                                    <div class="footer__bottom__icon">
                                        <i class="icofont-clock-time"></i>
                                    </div>
                                    <div class="footer__bottom__content">
                                        <h6>Opening Houres</h6>
                                        <span>Mon - Sat(8.00 - 6.00)</span>
                                        <span>Sunday - Closed</span>
                                    </div>
                                </div> -->

                     </div>
                 </div>
                 <div class="col-xl-2 col-lg-2 col-sm-6 col-md-6" data-aos="fade-up">
                     <div class="footerarea__inner">
                         <div class="footerarea__heading">
                             <h3>{{__('footer.pages')}}</h3>
                         </div>
                         <div class="footerarea__list">
                             <ul>
                                 @foreach($site_pages as $page)
                                 <li>
                                 <a href="{{ route('website.pages.show', ['site_name' => $site_name, 'id' => $page->id]) }}">{{ $page->title }} </a>
                                 </li>
                                 @endforeach
                             </ul>
                         </div>

                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-sm-6 col-md-6" data-aos="fade-up">
                        <div class="footerarea__inner footerarea__padding__left">
                            <div class="footerarea__heading">
                                <h3>{{__('footer.course')}}</h3>
                            </div>
                            <div class="footerarea__list">
                                <ul>
                                    @foreach($site_courses as $course)
                                    <li>
                                 <a href="{{ route('website.courses.show', ['site_name' => $site_name, 'id' => $course->id]) }}">{{ $course->name }}</a>
                                 </li>
                                 @endforeach
                             </ul>
                         </div>


                     </div>
                 </div>

                 <!-- <div class="col-xl-3 col-lg-3 col-sm-12" data-aos="fade-up">
                            <div class="footerarea__right__wraper footerarea__inner">
                                <div class="footerarea__heading">
                                    <h3>Recent Post</h3>
                                </div>
                                <div class="footerarea__right__list">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <div class="footerarea__right__img">
                                                    <img loading="lazy"  src="{{ asset('website/img/footer/footer__1.png')}}" alt="footerphoto">
                                                </div>
                                                <div class="footerarea__right__content">
                                                    <span>02 Apr 2023 </span>
                                                    <h6>Best Your Business</h6>
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <div class="footerarea__right__img">
                                                    <img loading="lazy"  src="{{ asset('website/img/footer/footer__2.png')}}" alt="footerphoto">
                                                </div>
                                                <div class="footerarea__right__content">
                                                    <span>02 Apr 2023 </span>
                                                    <h6>Keep Your Business</h6>
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <div class="footerarea__right__img">
                                                    <img loading="lazy"  src="{{ asset('website/img/footer/footer__3.png')}}" alt="footerphoto">
                                                </div>
                                                <div class="footerarea__right__content">
                                                    <span>02 Apr 2023 </span>
                                                    <h6>Nice Your Business</h6>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
             </div>
         </div>
         <div class="footerarea__copyright__wrapper footerarea__copyright__wrapper__2">
             <div class="row">
                 <div class="col-xl-3 col-lg-3">
                     <div class="copyright__logo">
                         <a href="/"><img loading="lazy" src="{{ asset('website/img/logo/logo_2.png')}}" alt="logo"></a>
                     </div>
                 </div>
                 <div class="col-xl-6 col-lg-6">
                     <div class="footerarea__copyright__content footerarea__copyright__content__2">
                         <p>Copyright © <span>2023</span> by edurock. All Rights Reserved.</p>
                     </div>
                 </div>
                 <div class="col-xl-3 col-lg-3">
                     <div class="footerarea__icon footerarea__icon__2">
                         <ul>
                             <li><a href="//facebook.com"><i class="icofont-facebook"></i></a></li>
                             <li><a href="//twitter.com"><i class="icofont-twitter"></i></a></li>
                             <li><a href="//vimeo.com"><i class="icofont-vimeo"></i></a></li>
                             <li><a href="//linkedin.com"><i class="icofont-linkedin"></i></a></li>
                             <li><a href="//skype.com"><i class="icofont-skype"></i></a></li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>

     </div>
 </div>
 <!-- footer__section__end -->