
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Become An Instructor | Edurock - Education LMS Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assetPages/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assetPages/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assetPages/css/aos.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assetPages/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('assetPages/css/icofont.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assetPages/css/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('assetPages/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assetPages/css/style.css')}}">


    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
          document.documentElement.classList.add("is_dark");
        } 
        if (localStorage.getItem("theme-color") === "light") {
          document.documentElement.classList.remove("is_dark");
        } 
    </script>

</head>

<body class="body__wrapper">
    <!-- pre loader area start -->
    <div id="back__preloader">
        <div id="back__circle_loader"></div>
        <div class="back__loader_logo">
            <img loading="lazy"  src="{{ asset('assetPages/img/pre.png')}}" alt="Preload">
        </div>
    </div>
    <!-- pre loader area end -->
    
        <!-- Dark/Light area start -->
        <div class="mode_switcher my_switcher">
            <button id="light--to-dark-button" class="light align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon dark__mode" viewBox="0 0 512 512"><path d="M160 136c0-30.62 4.51-61.61 16-88C99.57 81.27 48 159.32 48 248c0 119.29 96.71 216 216 216 88.68 0 166.73-51.57 200-128-26.39 11.49-57.38 16-88 16-119.29 0-216-96.71-216-216z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
    
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon light__mode" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M256 48v48M256 416v48M403.08 108.92l-33.94 33.94M142.86 369.14l-33.94 33.94M464 256h-48M96 256H48M403.08 403.08l-33.94-33.94M142.86 142.86l-33.94-33.94"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32"/></svg>
    
                <span class="light__mode">Light</span>
                <span class="dark__mode">Dark</span>
            </button>
        </div>
        <!-- Dark/Light area end -->

    <main class="main_wrapper overflow-hidden">


        <!-- topbar__section__stert -->
        <div class="topbararea">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="topbar__left">
                            <ul>
                                <li>
                                    Call Us: +1 800 123 456 789
                                </li>
                                <li>
                                    - Mail Us: Itcroc@mail.com
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="topbar__right">
                            <div class="topbar__icon">
                                <i class="icofont-location-pin"></i>
                            </div>
                            <div class="topbar__text">
                                <p>684 West College St. Sun City, USA</p>
                            </div>
                            <div class="topbar__list">
                                <ul>
                                    <li>
                                        <a href="#"><i class="icofont-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icofont-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icofont-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icofont-youtube-play"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- topbar__section__end -->


        <!-- headar section start -->
        <header>
            <div class="headerarea headerarea__3 header__sticky header__area">
                <div class="container desktop__menu__wrapper">
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-6">
                            <div class="headerarea__left">
                                <div class="headerarea__left__logo">

                                    <a href="../index.html"><img loading="lazy"  src="../img/logo/logo_1.png" alt="logo"></a>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 main_menu_wrap">
                            <div class="headerarea__main__menu">
                                <nav>
                                    <ul>


                                        <li class="mega__menu position-static">
                                            <a class="headerarea__has__dropdown" href="index.html">Demos<i class="icofont-rounded-down"></i> </a>
                                            <div class="headerarea__submenu mega__menu__wrapper mega__menu__grid__5">

                                                <ul class="nav  tab__button__wrap" id="myTab2" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="single__tab__link active" data-bs-toggle="tab" data-bs-target="#projects__light" type="button">Light</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="single__tab__link" data-bs-toggle="tab" data-bs-target="#projects__dark" type="button">Dark</button>
                                                    </li>                        
                                                </ul>


                                                <div class="tab-content tab__content__wrapper" id="myTabContent2">
                                                    <div class="tab-pane fade active show" id="projects__light" role="tabpanel" aria-labelledby="projects__light">

                                                        <div class="row">

                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="../index.html">
                                                                        <img loading="lazy"  src="../img/mega/home-1.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (Default)</span>
                                                                    </a>
                                                                </div>                                            
                                                            </div>

                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="../home-2.html">
                                                                        <img loading="lazy"  src="../img/mega/home-2.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (Elegant)</span>
                                                                    </a>
                                                                </div>                                            
                                                            </div>

                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="../home-3.html">
                                                                        <img loading="lazy"  src="../img/mega/home-3.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (Classic)</span>
                                                                    </a>
                                                                </div>                                            
                                                            </div>

                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="../home-4.html">
                                                                        <img loading="lazy"  src="../img/mega/home-4.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (Classic LMS)</span>
                                                                    </a>
                                                                </div>                                            
                                                            </div>

                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="../home-5.html">
                                                                        <img loading="lazy"  src="../img/mega/home-5.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (Online Course)</span>
                                                                    </a>
                                                                </div>                                            
                                                            </div>

                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="../home-6.html">
                                                                        <img loading="lazy"  src="../img/mega/home-6.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (Marketplace)</span>
                                                                    </a>
                                                                    <span class="mega__menu__thumb__label">New</span>
                                                                </div>                                            
                                                            </div>

                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="../home-7.html">
                                                                        <img loading="lazy"  src="../img/mega/home-7.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (University)</span>
                                                                    </a>
                                                                    <span class="mega__menu__thumb__label">New</span>
                                                                </div>                                            
                                                            </div>

                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="../home-8.html">
                                                                        <img loading="lazy"  src="../img/mega/home-8.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (eCommerce)</span>
                                                                    </a>
                                                                    <span class="mega__menu__thumb__label">New</span>
                                                                </div>                                            
                                                            </div>

                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="../home-9.html">
                                                                        <img loading="lazy"  src="../img/mega/home-9.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (Kindergarten)</span>
                                                                    </a>
                                                                    <span class="mega__menu__thumb__label">New</span>
                                                                </div>                                            
                                                            </div>

                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="../home-10.html">
                                                                        <img loading="lazy"  src="../img/mega/home-10.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (Machine Learning)</span>
                                                                    </a>
                                                                    <span class="mega__menu__thumb__label">New</span>
                                                                </div>                                            
                                                            </div>
        
                                                            

                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="../home-11.html">
                                                                        <img loading="lazy"  src="../img/mega/home-11.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (Single Course)</span>
                                                                    </a>
                                                                    <span class="mega__menu__thumb__label">New</span>
                                                                </div>                                            
                                                            </div>

                                                            

                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="#">
                                                                        <img loading="lazy"  src="../img/mega/coming.png" alt="Mega Menu 1">
                                                                        <span class="mega__menu__thumb__title">Layout Coming Soon 1</span>
                                                                    </a>
                                                                </div>                                            
                                                            </div>
                                                            

                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="#">
                                                                        <img loading="lazy"  src="../img/mega/coming.png" alt="Mega Menu 2">
                                                                        <span class="mega__menu__thumb__title">Layout Coming Soon 2</span>
                                                                    </a>
                                                                </div>                                            
                                                            </div>
                                                            

                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="#">
                                                                        <img loading="lazy"  src="../img/mega/coming.png" alt="Mega Menu 3">
                                                                        <span class="mega__menu__thumb__title">Layout Coming Soon 3</span>
                                                                    </a>
                                                                </div>                                            
                                                            </div>
                                                            

                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="#">
                                                                        <img loading="lazy"  src="../img/mega/coming.png" alt="Mega Menu 4">
                                                                        <span class="mega__menu__thumb__title">Layout Coming Soon 4</span>
                                                                    </a>
                                                                </div>                                            
                                                            </div>
        
                                                        </div>

                                                    </div>
                                
                                                    <div class="tab-pane fade" id="projects__dark" role="tabpanel" aria-labelledby="projects__dark">

                                                        <div class="row">

                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="../index-dark.html">
                                                                        <img loading="lazy"  src="../img/mega/home-1-dark.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (Default)</span>
                                                                    </a>
                                                                </div>                                            
                                                            </div>
        
                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="../home-2-dark.html">
                                                                        <img loading="lazy"  src="../img/mega/home-2-dark.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (Elegant)</span>
                                                                    </a>
                                                                </div>                                            
                                                            </div>
        
                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="../home-3-dark.html">
                                                                        <img loading="lazy"  src="../img/mega/home-3-dark.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (Classic)</span>
                                                                    </a>
                                                                </div>                                            
                                                            </div>

                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="../home-4-dark.html">
                                                                        <img loading="lazy"  src="../img/mega/home-4-dark.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (Classic LMS)</span>
                                                                    </a>
                                                                </div>                                            
                                                            </div>
        
                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="../home-5-dark.html">
                                                                        <img loading="lazy"  src="../img/mega/home-5-dark.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (Online Course)</span>
                                                                    </a>
                                                                </div>                                            
                                                            </div>
        
                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="../home-6-dark.html">
                                                                        <img loading="lazy"  src="../img/mega/home-6-dark.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (Marketplace)</span>
                                                                    </a>
                                                                    <span class="mega__menu__thumb__label">New</span>
                                                                </div>                                            
                                                            </div>

                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="../home-7-dark.html">
                                                                        <img loading="lazy"  src="../img/mega/home-7-dark.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (University)</span>
                                                                    </a>
                                                                    <span class="mega__menu__thumb__label">New</span>
                                                                </div>                                            
                                                            </div>
        
                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="../home-8-dark.html">
                                                                        <img loading="lazy"  src="../img/mega/home-8-dark.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (eCommerce)</span>
                                                                    </a>
                                                                    <span class="mega__menu__thumb__label">New</span>
                                                                </div>                                            
                                                            </div>
        
                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="../home-9-dark.html">
                                                                        <img loading="lazy"  src="../img/mega/home-9-dark.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (Kindergarten)</span>
                                                                    </a>
                                                                    <span class="mega__menu__thumb__label">New</span>
                                                                </div>                                            
                                                            </div>
        
                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="../home-10-dark.html">
                                                                        <img loading="lazy"  src="../img/mega/home-10-dark.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (Machine Learning)</span>
                                                                    </a>
                                                                    <span class="mega__menu__thumb__label">New</span>
                                                                </div>                                            
                                                            </div>
                                                            
                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="home-11-dark.html">
                                                                        <img loading="lazy"  src="../img/mega/home-11-dark.png" alt="Mega Menu">
                                                                        <span class="mega__menu__thumb__title">Home (Single Course)</span>
                                                                    </a>
                                                                    <span class="mega__menu__thumb__label">New</span>
                                                                </div>                                            
                                                            </div>

                                                            
                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="#">
                                                                        <img loading="lazy"  src="../img/mega/coming-dark.png" alt="Mega Menu 1">
                                                                        <span class="mega__menu__thumb__title">Layout Coming Soon 1</span>
                                                                    </a>
                                                                </div>                                            
                                                            </div>

                                                            
                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="#">
                                                                        <img loading="lazy"  src="../img/mega/coming-dark.png" alt="Mega Menu 2">
                                                                        <span class="mega__menu__thumb__title">Layout Coming Soon 2</span>
                                                                    </a>
                                                                </div>                                            
                                                            </div>

                                                            
                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="#">
                                                                        <img loading="lazy"  src="../img/mega/coming-dark.png" alt="Mega Menu 3">
                                                                        <span class="mega__menu__thumb__title">Layout Coming Soon 3</span>
                                                                    </a>
                                                                </div>                                            
                                                            </div>

                                                            
                                                            <div class="col-3 mega__menu__single__wrap">                                            
                                                                <div class="mega__menu__thumb">
                                                                    <a href="#">
                                                                        <img loading="lazy"  src="../img/mega/coming-dark.png" alt="Mega Menu 4">
                                                                        <span class="mega__menu__thumb__title">Layout Coming Soon 4</span>
                                                                    </a>
                                                                </div>                                            
                                                            </div>
        
                                                        </div>
                                
                                                    </div>
                                
                                                </div>

                                            </div>

                                        </li>

                                        <li class="mega__menu position-static">
                                            <a class="headerarea__has__dropdown" href="about.html">Pages<i class="icofont-rounded-down"></i> </a>
                                            <div class="headerarea__submenu mega__menu__wrapper">

                                                <div class="row">
                                                    <div class="col-3 mega__menu__single__wrap">
                                                        <h4 class="mega__menu__title"><a href="#">Get Started 1 </a></h4>
                                                        <ul class="mega__menu__item">
                                                            <li><a href="../about.html">About <span class="mega__menu__label">Sale Everything</span></a></li>
                                                            <li><a href="../about-dark.html">About (Dark)<span class="mega__menu__label new">New</span></a></li>
                                                            <li><a href="../blog.html">Blog</a></li>
                                                            <li><a href="../blog-dark.html">Blog (Dark)</a></li>
                                                            <li><a href="../blog-details.html">Blog Details</a></li>
                                                            <li><a href="../blog-details-dark.html">Blog Details (Dark)</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-3 mega__menu__single__wrap">
                                                        <h4 class="mega__menu__title"><a href="#">Get Started 2 </a></h4>
                                                        <ul class="mega__menu__item">
                                                            <li><a href="../error.html">Error 404</a></li>
                                                            <li><a href="../error-dark.html">Error (Dark)</a></li>
                                                            <li><a href="../event-details.html">Event Details</a></li>
                                                            <li><a href="../zoom/zoom-meetings.html">Zoom<span class="mega__menu__label">Online Call</span></a></li>
                                                            <li><a href="../zoom/zoom-meetings-dark.html">Zoom Meeting (Dark)</a></li>
                                                            <li><a href="../zoom/zoom-meeting-details.html">Zoom Meeting Details</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-3 mega__menu__single__wrap">
                                                        <h4 class="mega__menu__title"><a href="#">Get Started 3</a></h4>
                                                        <ul class="mega__menu__item">
                                                            <li><a href="../zoom/zoom-meeting-details-dark.html">Meeting Details (Dark)</a></li>
                                                            <li><a href="../login.html">Login</a></li>
                                                            <li><a href="../login-dark.html">Login (Dark)</a></li>
                                                            <li><a href="#">Maintenance</a></li>
                                                            <li><a href="#">Maintenance (Dark)</a></li>
                                                            <li><a href="#">Terms & Condition</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-3 mega__menu__single__wrap">
                                                        <h4 class="mega__menu__title"><a href="#">Get Started 4</a></h4>
                                                        <ul class="mega__menu__item">                                                            
                                                            <li><a href="#">Terms & Condition (Dark)</a></li>
                                                            <li><a href="#">Privacy Policy</a></li>
                                                            <li><a href="#">Privacy Policy (Dark)</a></li>
                                                            <li><a href="#">Success Stories</a></li>
                                                            <li><a href="#">Success Stories (Dark)</a></li>
                                                            <li><a href="#">Work Policy</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-12 mega__menu__single__wrap sp_top_30">
                                                        <div class="mega__menu__img">
                                                            <a href="#"><img loading="lazy"  src="../img/mega/mega_menu_2.png" alt="Mega Menu"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>


                                        <li class="mega__menu position-static">
                                            <a class="headerarea__has__dropdown" href="../course.html">Courses<i class="icofont-rounded-down"></i> </a>
                                            <div class="headerarea__submenu mega__menu__wrapper">

                                                <div class="row">
                                                    <div class="col-3 mega__menu__single__wrap">
                                                        <h4 class="mega__menu__title"><a href="#">Get Started 1 </a></h4>
                                                        <ul class="mega__menu__item">
                                                            <li><a href="../course.html">Grid <span class="mega__menu__label">All Courses</span></a></li>
                                                            <li><a href="../course-dark.html">Course Grid (Dark)</a></li>
                                                            <li><a href="../course-grid.html">Course Grid</a></li>
                                                            <li><a href="../course-grid-dark.html">Course Grid (Dark)</a></li>
                                                            <li><a href="../course-list.html">Course List</a></li>
                                                            <li><a href="../course-list-dark.html">Course List (Dark)</a></li>
                                                            
                                                        </ul>
                                                    </div>
                                                    <div class="col-3 mega__menu__single__wrap">
                                                        <h4 class="mega__menu__title"><a href="#">Get Started 2 </a></h4>
                                                        <ul class="mega__menu__item">
                                                            <li><a href="../course-details.html">Course Details</a></li>
                                                            <li><a href="../course-details-dark.html">Course Details (Dark)</a></li>
                                                            <li><a href="../course-details-2.html">Course Details 2</a></li>
                                                            <li><a href="../course-details-2-dark.html">Details 2 (Dark)</a></li>
                                                            <li><a href="../ourse-details-3.html">Course Details 3</a></li>
                                                            <li><a href="../ourse-details-3.html">Details 3 (Dark)</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-3 mega__menu__single__wrap">
                                                        <h4 class="mega__menu__title"><a href="#">Get Started 3</a></h4>
                                                        <ul class="mega__menu__item">
                                                            <li><a href="../dashboard/become-an-instructor.html">Become An Instructor</a>
                                                            <li><a href="../dashboard/create-course.html">Create Course <span class="mega__menu__label">Career</span></a></li>
                                                            <li><a href="../instructor.html">Instructor</a></li>
                                                            <li><a href="../instructor-dark.html">Instructor (Dark)</a></li>
                                                            <li><a href="../instructor-details.html">Instructor Details</a></li>
                                                            <li><a href="../lesson.html">Course Lesson<span class="mega__menu__label new">New</span></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-3 mega__menu__single__wrap">
                                                        <div class="mega__menu__img">
                                                            <a href="#"><img loading="lazy"  src="../img/mega/mega_menu_1.png" alt="Mega Menu"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>


                                    <li><a class="headerarea__has__dropdown" href="../dashboard/instructor-dashboard.html">Dashboard
                                            <i class="icofont-rounded-down"></i>
                                        </a>
                                        <ul class="headerarea__submenu headerarea__submenu--third--wrap">
                                            <li><a href="../dashboard/admin-dashboard.html">Admin <i class="icofont-rounded-right"></i></a>
                                    
                                                <ul class="headerarea__submenu--third">
                                                    <li><a href="../dashboard/admin-dashboard.html">Admin Dashboard</a></li>
                                                    <li><a href="../dashboard/admin-profile.html">Admin Profile</a></li>
                                                    <li><a href="../dashboard/admin-message.html">Message</a></li>
                                                    <li><a href="../dashboard/admin-course.html">Courses</a></li>
                                                    <li><a href="../dashboard/admin-reviews.html">Review</a></li>
                                                    <li><a href="../dashboard/admin-quiz-attempts.html">Admin Quiz</a></li>
                                                    
                                                    <li><a href="../dashboard/admin-settings.html">Settings</a></li>
                                                </ul>
                                    
                                            </li>
                                            <li>
                                                <a href="../dashboard/instructor-dashboard.html">Instructor <i class="icofont-rounded-right"></i></a>
                                                <ul class="headerarea__submenu--third">
                                                    <li><a href="../dashboard/instructor-dashboard.html">Inst. Dashboard</a></li>
                                                    <li><a href="../dashboard/instructor-profile.html">Inst. Profile</a></li>
                                                    <li><a href="../dashboard/instructor-message.html">Message</a></li>
                                                    <li><a href="../dashboard/instructor-wishlist.html">Wishlist</a></li>
                                                    <li><a href="../dashboard/instructor-reviews.html">Review</a></li>
                                                    <li><a href="../dashboard/instructor-my-quiz-attempts.html">My Quiz</a></li>
                                                    <li><a href="../dashboard/instructor-order-history.html">Order History</a></li>
                                                    <li><a href="../dashboard/instructor-course.html">My Courses</a></li>
                                                    <li><a href="../dashboard/instructor-announcments.html">Announcements</a></li>
                                                    <li><a href="../dashboard/instructor-quiz-attempts.html">Quiz Attempts</a></li>
                                                    <li><a href="../dashboard/instructor-assignments.html">Assignment</a></li>
                                                    <li><a href="../dashboard/instructor-settings.html">Settings</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="../dashboard/student-dashboard.html">Student <i class="icofont-rounded-right"></i></a>
                                                <ul class="headerarea__submenu--third">
                                                    <li><a href="../dashboard/student-dashboard.html">Dashboard</a></li>
                                                    <li><a href="../dashboard/student-profile.html">Profile</a></li>
<li><a href="../dashboard/student-message.html">Message</a></li>
                                                    <li><a href="../dashboard/student-enrolled-courses.html">Enrolled Courses</a></li>
                                                    <li><a href="../dashboard/student-wishlist.html">Wishlist</a></li>
                                                    <li><a href="../dashboard/student-reviews.html">Review</a></li>
                                                    <li><a href="../dashboard/student-my-quiz-attempts.html">My Quiz</a></li>
                                                    <li><a href="../dashboard/student-assignments.html">Assignment</a></li>
                                                    <li><a href="../dashboard/student-settings.html">Settings</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>

                                    <li><a class="headerarea__has__dropdown" href="ecommerce/shop.html">eCommerce
                                        <i class="icofont-rounded-down"></i>
                                    </a>
                                    <ul class="headerarea__submenu">
                                        <li><a href="../ecommerce/shop.html">Shop<span class="mega__menu__label">Online Store</span></a></li>
                                        <li><a href="../ecommerce/product-details.html">Product Details</a></li>
                                        <li><a href="../ecommerce/cart.html">Cart</a></li>
                                        <li><a href="../ecommerce/checkout.html">Checkout</a></li>
                                        <li><a href="../ecommerce/wishlist.html">Wishlist</a></li>
                                    </ul>
                                </li>
                                        

                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6">
                            <div class="headerarea__right">

                                <div class="header__cart">
                                    <a href="#"> <i class="icofont-cart-alt"></i></a>
                                    <div class="header__right__dropdown__wrapper">
                                        <div class="header__right__dropdown__inner">
                                            <div class="single__header__right__dropdown">

                                                <div class="header__right__dropdown__img">
                                                    <a href="#">
                                                        <img loading="lazy"  src="../img/grid/cart1.jpg" alt="photo">
                                                    </a>
                                                </div>
                                                <div class="header__right__dropdown__content">

                                                    <a href="shop-product.html">Web Directory</a>
                                                    <p>1 x <span class="price">$ 80.00</span></p>

                                                </div>
                                                <div class="header__right__dropdown__close">
                                                    <a href="#"><i class="icofont-close-line"></i></a>
                                                </div>
                                            </div>

                                            <div class="single__header__right__dropdown">

                                                <div class="header__right__dropdown__img">
                                                    <a href="#">
                                                        <img loading="lazy"  src="../img/grid/cart2.jpg" alt="photo">
                                                    </a>
                                                </div>
                                                <div class="header__right__dropdown__content">

                                                    <a href="shop-product.html">Design Minois</a>
                                                    <p>1 x <span class="price">$ 60.00</span></p>

                                                </div>
                                                <div class="header__right__dropdown__close">
                                                    <a href="#"><i class="icofont-close-line"></i></a>
                                                </div>
                                            </div>

                                            <div class="single__header__right__dropdown">

                                                <div class="header__right__dropdown__img">
                                                    <a href="#">
                                                        <img loading="lazy"  src="../img/grid/cart3.jpg" alt="photo">
                                                    </a>
                                                </div>
                                                <div class="header__right__dropdown__content">

                                                    <a href="shop-product.html">Crash Course</a>
                                                    <p>1 x <span class="price">$ 70.00</span></p>

                                                </div>
                                                <div class="header__right__dropdown__close">
                                                    <a href="#"><i class="icofont-close-line"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <p class="dropdown__price">Total: <span>$1,100.00</span>
                                        </p>
                                        <div class="header__right__dropdown__button">
                                            <a href="cart.html" class="white__color">View Cart</a>
                                            <a href="checkout.html" class="blue__color">Checkout</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="headerarea__login">
                                    <a href="../login.html"><i class="icofont-user-alt-5"></i></a>
                                </div>
                                <div class="headerarea__button">
                                    <a href="#">Get Start</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


                <div class="container-fluid mob_menu_wrapper">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="mobile-logo">
                                <a class="logo__dark" href="#"><img loading="lazy"  src="../img/logo/logo_1.png" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="header-right-wrap">
    
                                <div class="headerarea__right">
    
                                    <div class="header__cart">
                                        <a href="#"> <i class="icofont-cart-alt"></i></a>
                                        <div class="header__right__dropdown__wrapper">
                                            <div class="header__right__dropdown__inner">
                                                <div class="single__header__right__dropdown">
    
                                                    <div class="header__right__dropdown__img">
                                                        <a href="#">
                                                            <img loading="lazy"  src="../img/grid/cart1.jpg" alt="photo">
                                                        </a>
                                                    </div>
                                                    <div class="header__right__dropdown__content">
    
                                                        <a href="shop-product.html">Web Directory</a>
                                                        <p>1 x <span class="price">$ 80.00</span></p>
    
                                                    </div>
                                                    <div class="header__right__dropdown__close">
                                                        <a href="#"><i class="icofont-close-line"></i></a>
                                                    </div>
                                                </div>
    
                                                <div class="single__header__right__dropdown">
    
                                                    <div class="header__right__dropdown__img">
                                                        <a href="#">
                                                            <img loading="lazy"  src="../img/grid/cart2.jpg" alt="photo">
                                                        </a>
                                                    </div>
                                                    <div class="header__right__dropdown__content">
    
                                                        <a href="shop-product.html">Design Minois</a>
                                                        <p>1 x <span class="price">$ 60.00</span></p>
    
                                                    </div>
                                                    <div class="header__right__dropdown__close">
                                                        <a href="#"><i class="icofont-close-line"></i></a>
                                                    </div>
                                                </div>
    
                                                <div class="single__header__right__dropdown">
    
                                                    <div class="header__right__dropdown__img">
                                                        <a href="#">
                                                            <img loading="lazy"  src="../img/grid/cart3.jpg" alt="photo">
                                                        </a>
                                                    </div>
                                                    <div class="header__right__dropdown__content">
    
                                                        <a href="shop-product.html">Crash Course</a>
                                                        <p>1 x <span class="price">$ 70.00</span></p>
    
                                                    </div>
                                                    <div class="header__right__dropdown__close">
                                                        <a href="#"><i class="icofont-close-line"></i></a>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <p class="dropdown__price">Total: <span>$1,100.00</span>
                                            </p>
                                            <div class="header__right__dropdown__button">
                                                <a href="#" class="white__color">VIEW
                                            CART</a>
                                                <a href="#" class="blue__color">CHECKOUT</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="mobile-off-canvas">
                                    <a class="mobile-aside-button" href="#"><i class="icofont-navigation-menu"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header section end -->

        <!-- Mobile Menu Start Here -->
        <div class="mobile-off-canvas-active">
            <a class="mobile-aside-close"><i class="icofont  icofont-close-line"></i></a>
            <div class="header-mobile-aside-wrap">
                <div class="mobile-search">
                    <form class="search-form" action="#">
                        <input type="text" placeholder="Search entire store…">
                        <button class="button-search"><i class="icofont icofont-search-2"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap headerarea">
        
                    <div class="mobile-navigation">
        
                        <nav>
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children"><a href="../index.html">Home</a>
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children"><a href="../index.html">Homes Light</a>
                                            <ul class="dropdown">
                                                <li><a href="../index.html">Home (Default)</a></li>
                                                <li><a href="../home-2.html">Elegant</a></li>
                                                <li><a href="../home-3.html">Classic</a></li>
                                                <li><a href="../home-4.html">Classic LMS</a></li>
                                                <li><a href="../home-5.html">Online Course </a></li>
                                                <li><a href="../home-6.html">Marketplace </a></li>
                                                <li><a href="../home-7.html">University</a></li>
                                                <li><a href="../home-8.html">eCommerce</a></li>
                                                <li><a href="../home-9.html">Kindergarten</a></li>
                                                <li><a href="../home-10.html">Machine Learning</a></li>
                                                <li><a href="../home-11.html">Single Course</a></li>
                                            </ul>
                                        </li>
        
                                        <li class="menu-item-has-children">
                                            <a href="../index.html">Homes Dark</a>
                                            <ul class="dropdown">
                                                <li><a href="../index-dark.html">Home Default (Dark)</a></li>
                                                <li><a href="../home-2-dark.html">Elegant (Dark)</a></li>
                                                <li><a href="../home-3-dark.html">Classic (Dark)</a></li>
                                                <li><a href="../home-4-dark.html">Classic LMS (Dark)</a></li>
                                                <li><a href="../home-5-dark.html">Online Course (Dark)</a></li>
                                                <li><a href="../home-6-dark.html">Marketplace (Dark)</a></li>
                                                <li><a href="../home-7-dark.html">University (Dark)</a></li>
                                                <li><a href="../home-8-dark.html">eCommerce (Dark)</a></li>
                                                <li><a href="../home-9-dark.html">Kindergarten (Dark)</a></li>
                                                <li><a href="../home-10-dark.html">Kindergarten (Dark)</a></li>
                                                <li><a href="../home-11-dark.html">Single Course (Dark)</a></li>
                                            </ul>
                                        </li>
        
                                    </ul>
                                </li>
        
        
                                <li class="menu-item-has-children "><a href="#">Pages</a>
        
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children">
                                            <a href="#">Get Started 1</a>
        
                                            <ul class="dropdown">
                                                <li><a href="../about.html">About</a></li>
                                                <li><a href="../about-dark.html">About (Dark)<span class="mega__menu__label new">New</span></a></li>
                                                <li><a href="../blog.html">Blog</a></li>
                                                <li><a href="../blog-dark.html">Blog (Dark)</a></li>
                                                <li><a href="../blog-details.html">Blog Details</a></li>
                                                <li><a href="../blog-details-dark.html">Blog Details (Dark)</a></li>
                                            </ul>
                                        </li>
        
                                        <li class="menu-item-has-children">
                                            <a href="#">Get Started 2</a>
                                            <ul class="dropdown">
                                                <li><a href="../error.html">Error 404</a></li>
                                                <li><a href="../error-dark.html">Error (Dark)</a></li>
                                                <li><a href="../event-details.html">Event Details</a></li>
                                                <li><a href="../zoom/zoom-meetings.html">Zoom<span class="mega__menu__label">Online Call</span></a></li>
                                                <li><a href="../zoom/zoom-meetings-dark.html">Zoom Meeting (Dark)</a></li>
                                                <li><a href="../zoom/zoom-meeting-details.html">Zoom Meeting Details</a></li>
                                            </ul>
                                        </li>
        
                                        <li class="menu-item-has-children">
                                            <a href="#">Get Started 3</a>
                                            <ul class="dropdown">
                                                <li><a href="../zoom/zoom-meeting-details-dark.html">Meeting Details (Dark)</a>
                                                </li>
                                                <li><a href="../login.html">Login</a></li>
                                                <li><a href="../login-dark.html">Login (Dark)</a></li>
                                                <li><a href="#">Maintenance</a></li>
                                                <li><a href="#">Maintenance (Dark)</a></li>
                                                <li><a href="#">Terms & Condition</a></li>
                                            </ul>
                                        </li>
        
                                        <li class="menu-item-has-children">
                                            <a href="#">Get Started 4</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Terms & Condition (Dark)</a></li>
                                                <li><a href="#">Privacy Policy</a></li>
                                                <li><a href="#">Privacy Policy (Dark)</a></li>
                                                <li><a href="#">Success Stories</a></li>
                                                <li><a href="#">Success Stories (Dark)</a></li>
                                                <li><a href="#">Work Policy</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                                <div class="mega__menu__img">
                                                <a href="#"><img loading="lazy"  src="../img/mega/mega_menu_2.png" alt="Mega Menu"></a>
                                                </div>
                                        </li>
                                    </ul>
                                </li>



                                <li class="menu-item-has-children "><a href="../course.html">Courses</a>
        
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children">
                                            <a href="#">Get Started 1</a>
        
                                            <ul class="dropdown">
                                                <li><a href="../course.html">Grid <span class="mega__menu__label">All Courses</span></a></li>
                                                <li><a href="../course-dark.html">Course Grid (Dark)</a></li>
                                                <li><a href="../course-grid.html">Course Grid</a></li>
                                                <li><a href="../course-grid-dark.html">Course Grid (Dark)</a></li>
                                                <li><a href="../course-list.html">Course List</a></li>
                                                <li><a href="../course-list-dark.html">Course List (Dark)</a></li>
                                            </ul>
                                        </li>
        
                                        <li class="menu-item-has-children">
                                            <a href="#">Get Started 2</a>
                                            <ul class="dropdown">
                                                <li><a href="../course-details.html">Course Details</a></li>
                                                <li><a href="../course-details-dark.html">Course Details (Dark)</a></li>
                                                <li><a href="../course-details-2.html">Course Details 2</a></li>
                                                <li><a href="../course-details-2-dark.html">Details 2 (Dark)</a></li>
                                                <li><a href="../course-details-3.html">Course Details 3</a></li>
                                                <li><a href="../course-details-3.html">Details 3 (Dark)</a></li>
                                            </ul>
                                        </li>
        
                                        <li class="menu-item-has-children">
                                            <a href="#">Get Started 3</a>
                                            <ul class="dropdown">
                                                    <li><a href="../dashboard/become-an-instructor.html">Become An Instructor</a>
                                                    <li><a href="../dashboard/create-course.html">Create Course <span class="mega__menu__label">Career</span></a></li>
                                                    <li><a href="../instructor.html">Instructor</a></li>
                                                    <li><a href="../instructor-dark.html">Instructor (Dark)</a></li>
                                                    <li><a href="../instructor-details.html">Instructor Details</a></li>
                                                    <li><a href="../lesson.html">Course Lesson<span class="mega__menu__label new">New</span></a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                                <div class="mega__menu__img">
                                                <a href="#"><img loading="lazy"  src="../img/mega/mega_menu_1.png" alt="Mega Menu"></a>
                                                </div>
                                        </li>
                                    </ul>
                                </li>

                                
                                <li class="menu-item-has-children "><a href="../dashboard/admin-dashboard.html">Dashboard</a>
        
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children">
                                            <a href="#">Admin</a>
        
                                            <ul class="dropdown">
                                                <li><a href="../dashboard/admin-dashboard.html">Admin Dashboard</a></li>
                                                <li><a href="../dashboard/admin-profile.html">Admin Profile</a></li>
                                                <li><a href="../dashboard/admin-message.html">Message</a></li>
                                                <li><a href="../dashboard/admin-course.html">Courses</a></li>
                                                <li><a href="../dashboard/admin-reviews.html">Review</a></li>
                                                <li><a href="../dashboard/admin-quiz-attempts.html">Admin Quiz</a></li>
                                                
                                                <li><a href="../dashboard/admin-settings.html">Settings</a></li>
                                            </ul>
                                        </li>
        
                                        <li class="menu-item-has-children">
                                            <a href="#">Instructor</a>
                                            <ul class="dropdown">
                                                <li><a href="../dashboard/instructor-dashboard.html">Inst. Dashboard</a></li>
                                                <li><a href="../dashboard/instructor-profile.html">Inst. Profile</a></li>
                                                <li><a href="../dashboard/instructor-message.html">Message</a></li>
                                                <li><a href="../dashboard/instructor-wishlist.html">Wishlist</a></li>
                                                <li><a href="../dashboard/instructor-reviews.html">Review</a></li>
                                                <li><a href="../dashboard/instructor-my-quiz-attempts.html">My Quiz</a></li>
                                                <li><a href="../dashboard/instructor-order-history.html">Order History</a></li>
                                                <li><a href="../dashboard/instructor-course.html">My Courses</a></li>
                                                <li><a href="../dashboard/instructor-announcments.html">Announcements</a></li>
                                                <li><a href="../dashboard/instructor-quiz-attempts.html">Quiz Attempts</a></li>
                                                <li><a href="../dashboard/instructor-assignments.html">Assignment</a></li>
                                                <li><a href="../dashboard/instructor-settings.html">Settings</a></li>
                                            </ul>
                                        </li>
        
                                        <li class="menu-item-has-children">
                                            <a href="#">Student</a>
                                            <ul class="dropdown">
                                                <li><a href="../dashboard/student-dashboard.html">Dashboard</a></li>
                                                <li><a href="../dashboard/student-profile.html">Profile</a></li>
<li><a href="../dashboard/student-message.html">Message</a></li>
                                                <li><a href="../dashboard/student-enrolled-courses.html">Enrolled Courses</a></li>
                                                <li><a href="../dashboard/student-wishlist.html">Wishlist</a></li>
                                                <li><a href="../dashboard/student-reviews.html">Review</a></li>
                                                <li><a href="../dashboard/student-my-quiz-attempts.html">My Quiz</a></li>
                                                <li><a href="../dashboard/student-assignments.html">Assignment</a></li>
                                                <li><a href="../dashboard/student-settings.html">Settings</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children"><a href="ecommerce/shop.html">eCommerce</a>
                                    <ul class="dropdown">
                                        <li><a href="../ecommerce/shop.html">Shop<span class="mega__menu__label">Online Store</span></a></li>
                                        <li><a href="../ecommerce/product-details.html">Product Details</a></li>
                                        <li><a href="../ecommerce/cart.html">Cart</a></li>
                                        <li><a href="../ecommerce/checkout.html">Checkout</a></li>
                                        <li><a href="../ecommerce/wishlist.html">Wishlist</a></li>
        
                                    </ul>
                                </li>

                            </ul>
                        </nav>
        
                    </div>
        
                </div>
                <div class="mobile-curr-lang-wrap">
                    <div class="single-mobile-curr-lang">
                        <a class="mobile-language-active" href="#">Language <i class="icofont-thin-down"></i></a>
                        <div class="lang-curr-dropdown lang-dropdown-active">
                            <ul>
                                <li><a href="#">English (US)</a></li>
                                <li><a href="#">English (UK)</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </div>
                    </div>
        
                    <!-- <div class="single-mobile-curr-lang">
                                <a class="mobile-currency-active" href="#">Currency <i class="icofont-thin-down"></i></a>
                                <div class="lang-curr-dropdown curr-dropdown-active">
                                    <ul>
                                        <li><a href="#">USD</a></li>
                                        <li><a href="#">EUR</a></li>
                                        <li><a href="#">Real</a></li>
                                        <li><a href="#">BDT</a></li>
                                    </ul>
                                </div>
                            </div> -->
        
                    <div class="single-mobile-curr-lang">
                        <a class="mobile-account-active" href="#">My Account <i class="icofont-thin-down"></i></a>
                        <div class="lang-curr-dropdown account-dropdown-active">
                            <ul>
                                <li><a href="../login.html">Login</a></li>
                                <li><a href="../login.html">/ Create Account</a></li>
                                <li><a href="../login.html">My Account</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mobile-social-wrap">
                    <a class="facebook" href="#"><i class="icofont icofont-facebook"></i></a>
                    <a class="twitter" href="#"><i class="icofont icofont-twitter"></i></a>
                    <a class="pinterest" href="#"><i class="icofont icofont-pinterest"></i></a>
                    <a class="instagram" href="#"><i class="icofont icofont-instagram"></i></a>
                    <a class="google" href="#"><i class="icofont icofont-youtube-play"></i></a>
                </div>
            </div>
        </div>
        <!-- Mobile Menu end Here -->


        <!-- theme fixed shadow -->
        <div>
            <div class="theme__shadow__circle"></div>
            <div class="theme__shadow__circle shadow__right"></div>
        </div>
        <!-- theme fixed shadow -->
        <!-- breadcrumbarea__section__start -->

        <div class="breadcrumbarea">

            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb__content__wraper" data-aos="fade-up">
                            <div class="breadcrumb__title">
                                <h2 class="heading">Become An Instructor</h2>
                            </div>
                            <div class="breadcrumb__inner">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li>Become An Instructor</li>
                                </ul>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

            <div class="shape__icon__2">
                <img loading="lazy"  class=" shape__icon__img shape__icon__img__1" src="../img/herobanner/herobanner__1.png" alt="photo">
                <img loading="lazy"  class=" shape__icon__img shape__icon__img__2" src="../img/herobanner/herobanner__2.png" alt="photo">
                <img loading="lazy"  class=" shape__icon__img shape__icon__img__3" src="../img/herobanner/herobanner__3.png" alt="photo">
                <img loading="lazy"  class=" shape__icon__img shape__icon__img__4" src="../img/herobanner/herobanner__5.png" alt="photo">
            </div>

        </div>
        <!-- breadcrumbarea__section__end-->


        <!-- become__instructor__start -->
            <div class="become__instructor sp_100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="become__instructor__heading">
                                <h2>Apply As Instructor</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                            <div class="become__instructor__text">
                                <h3 class="become__instructor__small__heading">Become an Instructor</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus blanditiis officiis vero fugiat inventore voluptates sint magnam, accusantium cupiditate odio dolore ipsam ut, corrupti quisquam veritatis pariatur harum labore voluptatibus consectetur dolorem aliquid soluta.</p>
                                    <h3 class="become__instructor__small__heading">Instructor Rules</h3>
                                    <p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose
                                        (injected humour and the like).</p>
                                       <div class="become__instructor__list">
                                        <ul>
                                            <li>
                                                <div class="become__instructor__img">
                                                    <img loading="lazy"  src="../img/dashbord/check__1.png" alt="">
                                                </div>
                                               
                                                Basic knowledge and detailed understanding of CSS3 to create.
                                            </li>
                                            <li>
                                                <div class="become__instructor__img">
                                                    <img loading="lazy"  src="../img/dashbord/check__1.png" alt="">
                                                </div>
                                               
                                                Details Idea about HTMLS, Creating Basic Web Pages using HTMLS
                                            </li>
                                            <li>
                                                <div class="become__instructor__img">
                                                    <img loading="lazy"  src="../img/dashbord/check__1.png" alt="">
                                                </div>
                                               
                                                Web Page Layout Design and Slider Creation
                                            </li>
                                            <li>
                                                <div class="become__instructor__img">
                                                    <img loading="lazy"  src="../img/dashbord/check__1.png" alt="">
                                                </div>
                                               
                                                Image Insert method af web site
                                            </li>
                                            <li>
                                                <div class="become__instructor__img">
                                                    <img loading="lazy"  src="../img/dashbord/check__1.png" alt="">
                                                </div>
                                               
                                                Creating Styling Web Pages Using CSS3
                                            </li>
                                        </ul>
                                       </div>

                                       <h3 class="become__instructor__small__heading">Start With courses</h3>
                                       <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam facilis inventore tempora maxime quibusdam cumque aperiam? Ducimus totam repellendus fugiat vel dolorum. Commodi, vel. Aliquid quia voluptas esse accusantium? Libero impedit, odit dolorum sint fugit error.</p>
                                        <div class="become__instructor__list">
                                            <ul>
                                                <li>
                                                    <div class="become__instructor__img">
                                                        <img loading="lazy"  src="../img/dashbord/check__1.png" alt="">
                                                    </div>
                                                   
                                                    Basic knowledge and detailed understanding of CSS3 to create.
                                                </li>
                                                <li>
                                                    <div class="become__instructor__img">
                                                        <img loading="lazy"  src="../img/dashbord/check__1.png" alt="">
                                                    </div>
                                                   
                                                    Details Idea about HTMLS, Creating Basic Web Pages using HTMLS
                                                </li>
                                                <li>
                                                    <div class="become__instructor__img">
                                                        <img loading="lazy"  src="../img/dashbord/check__1.png" alt="">
                                                    </div>
                                                   
                                                    Web Page Layout Design and Slider Creation
                                                </li>
                                              
                                            </ul>
                                           </div>
                                           <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, voluptas.</p>

                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-12">

                            <div class="become__instructor__form">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="dashboard__form__wraper">
                                        <div class="dashboard__form__input">
                                            <label for="#">First Name</label>
                                            <input type="text" placeholder="John">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="dashboard__form__wraper">
                                        <div class="dashboard__form__input">
                                            <label for="#">Last Name</label>
                                            <input type="text" placeholder="Due">
                                        </div>
                                    </div>
                                </div>

                             
                                <div class="col-xl-12">
                                    <div class="dashboard__form__wraper">
                                        <div class="dashboard__form__input">
                                            <label for="#">Email</label>
                                            <input type="text" placeholder="Email">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="dashboard__form__wraper">
                                        <div class="dashboard__form__input">
                                            <label for="#">Phone Number</label>
                                            <input type="text" placeholder="+8-333-555-6666">
                                        </div>
                                    </div>
                                </div>


                              
                                <div class="col-xl-12">
                                    <div class="dashboard__form__wraper">
                                        <div class="dashboard__form__input">
                                            <label for="#">Bio</label>
                                            <textarea name="" id="" cols="30"
                                                rows="10">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="become__instructor__check">
                                    <input class="become__instructor__check__input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="become__instructor__check__label" for="flexCheckDefault">
                                        You agree to our friendly <a href="#">Privacy policy</a>.
                                    </label>
                                </div>


                                <div class="col-xl-12">
                                    <div class="dashboard__form__button">
                                        <a class="default__button" href="#">Update Info</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

        
    
     <!-- become__instructor__end -->
        <!-- footer__section__start -->
        <div class="footerarea">
            <div class="container">
                <div class="footerarea__newsletter__wraper">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" data-aos="fade-up">
                            <div class="footerarea__logo">
                                <a href="#"><img loading="lazy"  src="../img/logo/logo_2.png" alt="logophoto"></a>
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
                </div>

                <div class="footerarea__wrapper">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 " data-aos="fade-up">
                            <div class="footerarea__inner footerarea__about__us">
                                <div class="footerarea__heading">
                                    <h3>About us</h3>
                                </div>
                                <div class="footerarea__content">
                                    <p>orporate clients and leisure travelers has been relying on Groundlink for dependable safe, and professional chauffeured car end service in major cities across World.</p>
                                </div>
                                <div class="footerarea__icon">
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
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 " data-aos="fade-up">
                            <div class="footerarea__inner">
                                <div class="footerarea__heading">
                                    <h3>Usefull Links</h3>
                                </div>
                                <div class="footerarea__list">
                                    <ul>
                                        <li>
                                            <a href="#">About Us</a>
                                        </li>
                                        <li>
                                            <a href="#">Teachers</a>
                                        </li>
                                        <li>
                                            <a href="#">Partner</a>
                                        </li>
                                        <li>
                                            <a href="#">Room-Details</a>
                                        </li>
                                        <li>
                                            <a href="#">Gallery</a>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 " data-aos="fade-up">
                            <div class="footerarea__inner footerarea__padding__left">
                                <div class="footerarea__heading">
                                    <h3>Course</h3>
                                </div>
                                <div class="footerarea__list">
                                    <ul>
                                        <li>
                                            <a href="#">Ui Ux Design</a>
                                        </li>
                                        <li>
                                            <a href="#">Web Development</a>
                                        </li>
                                        <li>
                                            <a href="#">Business Strategy</a>
                                        </li>
                                        <li>
                                            <a href="#">Softwere Development</a>
                                        </li>
                                        <li>
                                            <a href="#">Business English</a>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12" data-aos="fade-up">
                            <div class="footerarea__right__wraper footerarea__inner">
                                <div class="footerarea__heading">
                                    <h3>Recent Post</h3>
                                </div>
                                <div class="footerarea__right__list">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <div class="footerarea__right__img">
                                                    <img loading="lazy"  src="../img/footer/footer__1.png" alt="footerphoto">
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
                                                    <img loading="lazy"  src="../img/footer/footer__2.png" alt="footerphoto">
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
                                                    <img loading="lazy"  src="../img/footer/footer__3.png" alt="footerphoto">
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
                        </div>
                    </div>
                </div>
                <div class="footerarea__copyright__wrapper">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" data-aos="fade-up">
                            <div class="footerarea__copyright__content">
                                <p>© 2023 Powered by <a href="#">Edurock</a>. All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" data-aos="fade-up">
                            <div class="footerarea__copyright__list">
                                <ul>
                                    <li><a href="#">Terms of Use</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- footer__section__end -->



    </main>


    <!-- JS here -->
    <script src="{{ asset('assetPages/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{ asset('assetPages/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('assetPages/js/popper.min.js')}}"></script>
    <script src="{{ asset('assetPages/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assetPages/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('assetPages/js/slick.min.js')}}"></script>
    <script src="{{ asset('assetPages/js/jquery.meanmenu.min.js')}}"></script>
    <script src="{{ asset('assetPages/js/ajax-form.js')}}"></script>
    <script src="{{ asset('assetPages/js/wow.min.js')}}"></script>
    <script src="{{ asset('assetPages/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{ asset('assetPages/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('assetPages/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('assetPages/js/waypoints.min.js')}}"></script>
    <script src="{{ asset('assetPages/js/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('assetPages/js/plugins.js')}}"></script>
    <script src="{{ asset('assetPages/js/swiper-bundle.min.js')}}"></script>
    <script src="{{ asset('assetPages/js/main.js')}}"></script>

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
          document.getElementById("light--to-dark-button")?.classList.add("dark--mode");
        } 
        if (localStorage.getItem("theme-color") === "light") {
          document.getElementById("light--to-dark-button")?.classList.remove("dark--mode");
        } 
      </script>


</body>

</html>