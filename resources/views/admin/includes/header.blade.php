<div class="header-area">
    <div class="header-area-left">
        <a href="{{ route('admin.home') }}" class="logo">
            <span>
                {{__('login.ott-platform')}}
            </span>
            <i>
                <img src="{{ asset('assets/images/logo-collapsed.svg')}}" alt="" height="22">
            </i>
        </a>
    </div>
    <div class="row align-items-center header_right">
        <div class="col-md-6 d_none_sm d-flex align-items-center">
            <div class="nav-btn button-menu-mobile pull-left">
                <button class="open-left waves-effect">
                    <i class="ion-android-menu"></i>
                </button>
            </div>
            <div class="search-box pull-left">
                <form action="#">
                    <i class="ti-search"></i>
                    <input type="text" name="search" placeholder="Search..." required="">
                </form>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <ul class="notification-area pull-right">
                <li class="mobile_menu_btn">
                    <span class="nav-btn pull-left d_none_lg">
                        <button class="open-left waves-effect">
                            <i class="ion-android-menu"></i>
                        </button>
                    </span>
                </li>
                @if (auth()->guard('students')->check())
                @include('admin.includes.sites')
                @endif
                @if (auth()->guard('admins')->check())
                    @include('adminsystems.admins.siteAdminHeader')
                @endif
                @include('admin.includes.languages')
                @include('admin.includes.notifications')
                <!--@include('admin.includes.email')-->
                @include('admin.includes.user')
            </ul>
        </div>
    </div>
</div>