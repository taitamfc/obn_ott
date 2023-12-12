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
                            @include('website.includes.header.languages')
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                <form method="GET"
                    action="{{ route('website.search',['site_name' => $site_name]) }}">
                    <div class="headerarea__2__input">
                        <input type="text" placeholder="{{__('header.search-course')}}" name="search">
                        <i class="icofont-search-1"></i>
                    </div>
                </form>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="headerarea__right">
                    @if(auth('students')->check())
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            {{__('header.hi')}}, {{ auth('students')->user()->name }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ route('website.accounts',['site_name'=>$site_name]) }}">{{__('header.profile')}}</a></li>
                                <li><a class="dropdown-item" href="{{ route('website.logout',['site_name'=>$site_name]) }}">{{__('header.logout')}}</a></li>
                            </ul>
                        </div>
                        @else
                        <div class="headerarea__login">
                            <a href="{{ route('website.accounts',['site_name'=>$site_name]) }}"><i
                                class="icofont-user-alt-5"></i>
                            </a>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="row">
                <!-- <div class="col-xl-2 col-lg-2 col-md-6">
                    <div class="headerarea__left">
                        <div class="headerarea__left__logo">
                            <a href="{{ route('cms',['site_name'=>$site_name]) }}">
                                <img loading="lazy" src="{{ asset($site_setting['logo']) }}" alt="logo">
                            </a>
                        </div>
                    </div>
                </div> -->

                <div class="col-xl-2 col-lg-2 col-md-6">
                    <div class="headerarea__left">
                        <div class="headerarea__left__logo">
                            <a href="{{ route('cms',['site_name'=>$site_name]) }}" style="text-align: center;">
                                <img loading="lazy" src="{{ asset($site_setting['logo']) }}" alt="logo"
                                style="width: 169px;max-height: 100px;object-fit: contain;">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-7 col-lg-7 main_menu_wrap">
                    @include('website.includes.header.main-menu')
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="headerarea__right">
                        <div class="headerarea__button">
                            <a
                                href="{{ route('website.courses.index',['site_name'=>$site_name]) }}">{{__('account.plan')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('website.includes.header.mob_menu')
    </div>
</header>
@include('website.includes.header.mobile-menu')