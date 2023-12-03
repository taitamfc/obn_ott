<header>
    <div class="headerarea headerarea__2 header__sticky header__area">
        <div class="container desktop__menu__wrapper">
            <div class="row headerarea__search__wrap align-items-center">
                <div class="col-xl-3 col-lg-3">
                    <div class="headerarea__2__inner">
                        <div class="headerarea__2__info__img">
                            <a href="#">
                                <img loading="lazy" src="img/icon/flag1.webp" alt="img">
                                <span class="text-uppercase">{{ $cr_lang }}</span>
                                <i class="icofont-rounded-down"></i>
                            </a>
                            <ul class="language__dropdown">
                            @foreach( $app_languages as $app_lang_key => $app_language )
                                <li>
                                    <a href="{{ route('changeLanguage',$app_lang_key) }}">
                                        <img loading="lazy" src="img/logo/logo__4.webp" class="img-fluid" alt="">
                                        {{$app_language}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="headerarea__2__input">
                        <input type="text" placeholder="Search Course">
                        <i class="icofont-search-1"></i>
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
                                                <img loading="lazy" src="img/grid/cart1.jpg" alt="photo">
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
                                                <img loading="lazy" src="img/grid/cart2.jpg" alt="photo">
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
                                                <img loading="lazy" src="img/grid/cart3.jpg" alt="photo">
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
                        <div class="headerarea__login">
                            <a href="login.html"><i class="icofont-user-alt-5"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-6">
                    <div class="headerarea__left">
                        <div class="headerarea__left__logo">
                            <a href="{{ route('cms',['site_name'=>$site_name]) }}">
                                <img loading="lazy" src="{{ asset($site_setting['logo']) }}" alt="logo">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 main_menu_wrap">
                    <div class="headerarea__main__menu">
                        <nav>
                            <ul>
                                <li>
                                    <a href="">Dashboard</a>
                                </li>
                                <li>
                                    <a href="">Dashboard</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="headerarea__right">
                        <div class="headerarea__button">
                            <a href="#">Get Start Here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mob_menu_wrapper">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="mobile-logo">
                        <a class="logo__dark" href="#"><img loading="lazy" src="img/logo/logo_1.png" alt="logo"></a>
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
                                                    <img loading="lazy" src="img/grid/cart1.jpg" alt="photo">
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
                                                    <img loading="lazy" src="img/grid/cart2.jpg" alt="photo">
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
                                                    <img loading="lazy" src="img/grid/cart3.jpg" alt="photo">
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