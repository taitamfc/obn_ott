<div class="header-area">

    <!--======================*
           Logo
*=========================-->
    <div class="header-area-left">
        <a href="index.html" class="logo">
            <span>
                <img src="{{ asset('assets/images/logo-dark.svg')}}" alt="" height="18">
            </span>
            <i>
                <img src="{{ asset('assets/images/logo-collapsed.svg')}}" alt="" height="22">
            </i>
        </a>
    </div>
    <!--======================*
          End Logo
*=========================-->

    <div class="row align-items-center header_right">
        <!--==================================*
             Navigation and Search
    *====================================-->
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
        <!--==================================*
             End Navigation and Search
    *====================================-->
        <!--==================================*
             Notification Section
    *====================================-->
        <div class="col-md-6 col-sm-12">
            <ul class="notification-area pull-right">
                <li class="mobile_menu_btn">
                    <span class="nav-btn pull-left d_none_lg">
                        <button class="open-left waves-effect">
                            <i class="ion-android-menu"></i>
                        </button>
                    </span>
                </li>

                <li class="user-dropdown">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('assets/images/user.jpg') }}" alt="" class="img-fluid">
                        </button>
                        <div class="dropdown-menu dropdown_user" aria-labelledby="dropdownMenuButton">
                            <div class="dropdown-header d-flex flex-column align-items-center">
                                <div class="user_img mb-3">
                                    <img src="{{ asset('assets/images/user.jpg') }}" alt="User Image">
                                </div>
                                <div class="user_bio text-center">
                                    <p class="name font-weight-bold mb-0">{{ Auth::user()->name }}</p>
                                    <p class="email text-muted mb-3"><a class="pl-3 pr-3"
                                            href="{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="{{ route('account.index') }}"><i class="ti-user"></i> Profile</a>
                            <span role="separator" class="divider"></span>
                            <a class="dropdown-item" href="/logout"><i class="ti-power-off"></i>Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>