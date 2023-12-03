<header>
    <div class="headerarea headerarea__2  header__sticky header__area">
        <div class="container desktop__menu__wrapper">
           

            <div class="row">
                <div class="col-xl-1 col-lg-1 col-md-6">
                    <div class="headerarea__left">
                        <div class="headerarea__left__logo">

                            <a href="{{ route('website.homes',['site_name'=>$site_name]) }}"><img loading="lazy" src="{{ asset('website/img/logo/logo_1.png')}}"
                                    alt="logo"></a>
                        </div>

                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 main_menu_wrap">
                    <div class="headerarea__main__menu">
                        <nav>
                            <ul>
                                <li class="mega__menu position-static">
                                    <a class="headerarea__has__dropdown" href="index.html">Demos<i
                                            class="icofont-rounded-down"></i> </a>
                                </li>

                                <li class="mega__menu position-static">
                                    <a class="headerarea__has__dropdown" href="about.html">Pages<i
                                            class="icofont-rounded-down"></i> </a>
                                </li>
                                <li class="mega__menu position-static">
                                    <a class="headerarea__has__dropdown" href="course.html">Courses<i
                                            class="icofont-rounded-down"></i> </a>
                                </li>
                                <li class="mega__menu position-static">
                                    <a class="headerarea__has__dropdown" href="course.html">Courses<i
                                            class="icofont-rounded-down"></i> </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-1 col-lg-1">
                    <div class="headerarea__2__inner">
                        <div class="headerarea__2__info__img">
                            <a href="#"><img loading="lazy" src="{{ asset('website/img/icon/flag1.webp')}}" alt="img">
                                ENG
                                <i class="icofont-rounded-down"></i>
                            </a>
                            <ul class="language__dropdown">
                                <li><a href="#"><img loading="lazy" src="{{ asset('website/img/icon/th1.jpg')}}"
                                            class="img-fluid" alt="">
                                        KOREA</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-lg-2">
                    <div class="headerarea__2__input">
                        <input type="text" placeholder="Search Course">
                        <i class="icofont-search-1" id="searchIcon"></i>
                    </div>
                </div>

                <div class="col-xl-2 col-lg-2">
                    <li class="mega__menu position-static"> 
                        <a class="headerarea__has__dropdown" href="{{ route('website.courses',['site_name'=>$site_name]) }}">Plan
                        </a>
                    </li>
                </div>

                <div class="col-xl-1 col-lg-1 col-md-6">
                    <div class="headerarea__right">
                        <div class="headerarea__login">
                            <a href="{{ route('website.accounts',['site_name'=>$site_name]) }}"><i class="icofont-user-alt-5"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mob_menu_wrapper">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="mobile-logo">
                        <a class="logo__dark" href="#"><img loading="lazy"
                                src="{{ asset('website/img/logo/logo_1.png')}}" alt="logo"></a>
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
                                                    <img loading="lazy" src="{{ asset('website/img/grid/cart1.jpg')}}"
                                                        alt="photo">
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
                                                    <img loading="lazy" src="{{ asset('website/img/grid/cart2.jpg')}}"
                                                        alt="photo">
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
                                                    <img loading="lazy" src="{{ asset('website/img/grid/cart3.jpg')}}"
                                                        alt="photo">
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