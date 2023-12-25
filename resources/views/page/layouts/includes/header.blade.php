<header>
    <div class="headerarea headerarea__2 header__sticky header__area">
        <div class="container desktop__menu__wrapper">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-6">
                    <div class="headerarea__left">
                        <div class="headerarea__left__logo">
                            <a href="#" style="text-align: center;">
                                <img loading="lazy" src="{{asset('assets/images/logo-collapsed.svg')}}" alt="logo"
                                style="width: 169px;max-height: 100px;object-fit: contain;">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-7 col-lg-7 main_menu_wrap">
                    @include('page.layouts.includes.header.main-menu')
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="headerarea__right">
                        <div class="headerarea__button">
                            <a href="{{route('login')}}">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('page.layouts.includes.header.mob_menu')
    </div>
</header>
@include('page.layouts.includes.header.mobile-menu')
<script>
    function submitSearchForm() {
        document.getElementById('searchForm').submit();
    }
</script>