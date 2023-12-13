<!-- Mobile Menu Start Here -->
<div class="mobile-off-canvas-active">
    <a class="mobile-aside-close"><i class="icofont  icofont-close-line"></i></a>
    <div class="header-mobile-aside-wrap">
        <div class="headerarea__login" style="display: flex; align-items: center;">
            @if(auth('students')->check())
            <a style="white-space: nowrap; margin-right: 10px;">{{__('header.hi')}},
                {{ auth('students')->user()->name }}</a>
            @else
            @endif
            <a href="{{ route('website.accounts',['site_name'=>$site_name]) }}"><i class="icofont-user-alt-5"></i>
            </a>
        </div>

        <div class="mobile-search" style="margin-top: 20px;">
            <form method="GET" action="{{ route('website.search',['site_name' => $site_name]) }}" id="mobileSearchForm">
                <div class="headerarea__2__input">
                    <input type="text" placeholder="{{__('header.search-course')}}" name="search">
                    <i class="icofont-search-1" onclick="submitMobileSearchForm()"
                        ontouchstart="submitMobileSearchForm()"></i>
                </div>
            </form>
            <script>
            function submitMobileSearchForm() {
                document.getElementById('mobileSearchForm').submit();
            }
            </script>
            <div class="headerarea__2__inner" style="margin-top: 20px;">
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

        <div class="mobile-menu-wrap headerarea">
            <div class="mobile-navigation">
                <nav class="mobile-menu">
                    <ul>
                        @foreach( $site_menus as $site_menu )
                        <li style="display: block; margin-bottom: 10px;">
                            <a href="{{ route('website.grades.show',['id'=> $site_menu->id,'site_name'=> $site_name]) }}"
                                style="display: block; font-weight: bold;">{{ $site_menu->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="headerarea__right">
                <div class="headerarea__button">
                    <a href="{{ route('website.courses.index',['site_name'=>$site_name]) }}">{{__('account.plan')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu end Here -->