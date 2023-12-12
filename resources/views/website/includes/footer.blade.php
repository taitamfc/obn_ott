 <!-- footer__section__start -->
 <div class="footerarea">
     <div class="container">
       
         <div class="footerarea__wrapper footerarea__wrapper__2">
             <div class="row">
                 <div class="col-xl-5 col-lg-5 col-sm-12 col-md-12" data-aos="fade-up">
                     <div class="footerarea__inner footerarea__about__us">
                         <div class="footerarea__heading">
                             <h3>{{__('footer.about')}}</h3>
                         </div>
                         <div class="footerarea__content">
                            <p>{{ $site_setting['footer_about'] }}</p>
                         </div>
    
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
             </div>
         </div>
         <div class="footerarea__copyright__wrapper footerarea__copyright__wrapper__2">
             <div class="row">
                 <div class="col-xl-3 col-lg-3">
                     <div class="copyright__logo">
                         <a href="{{ route('cms',['site_name'=>$site_name]) }}">
                            <img loading="lazy" src="{{ asset($site_setting['logo']) }}" alt="logo">
                        </a>
                     </div>
                 </div>
                 <div class="col-xl-6 col-lg-6">
                     <div class="footerarea__copyright__content footerarea__copyright__content__2">
                         <p>{{ $site_setting['footer_copyright'] }}</p> 
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