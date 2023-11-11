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
            <li class="dropdown d_none_sm">
                <div id="languageDropdown">
                    <span class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="flag-icon flag-icon-us "></i>
                    </span>
                    <div class="dropdown-menu navbar-dropdown">
                        <a class="dropdown-item font-weight-medium">
                            <i class="flag-icon flag-icon-it mr-2"></i>
                            Italy
                        </a>
                        <a class="dropdown-item font-weight-medium">
                            <i class="flag-icon flag-icon-de mr-2"></i>
                            German
                        </a>
                        <a class="dropdown-item font-weight-medium">
                            <i class="flag-icon flag-icon-es mr-2"></i>
                            Spanish
                        </a>
                        <a class="dropdown-item font-weight-medium">
                            <i class="flag-icon flag-icon-gb mr-2"></i>
                            United Kingdom
                        </a>
                        <a class="dropdown-item font-weight-medium">
                            <i class="flag-icon flag-icon-tr mr-2"></i>
                            Turkish
                        </a>
                    </div>
                </div>
            </li>   
            <li id="full-view" class="d_none_sm"><i class="feather ft-maximize"></i></li>
            <li id="full-view-exit" class="d_none_sm"><i class="feather ft-minimize"></i></li>
            <li class="dropdown">
                <i class="feather ft-bell dropdown-toggle" data-toggle="dropdown"><span class="badge bg-danger rounded-pill">7</span></i>
                <div class="dropdown-menu bell-notify-box notify-box">
                    <span class="notify-title">You have 3 new notifications </span>
                    <div class="nofity-list">
                        <a href="#" class="notify-item">
                            <div class="notify-thumb"><i class="ti-map-alt bg_blue"></i></div>
                            <div class="notify-text">
                                <h3>You added your Location</h3>
                                <span>Just Now</span>
                            </div>
                        </a>
                        <a href="#" class="notify-item">
                            <div class="notify-thumb"><i class="ti-bolt-alt bg_warning"></i></div>
                            <div class="notify-text">
                                <h3>Your Subscription Expired</h3>
                                <span>30 Seconds ago</span>
                            </div>
                        </a>
                        <a href="#" class="notify-item">
                            <div class="notify-thumb"><i class="ti-heart bg_danger"></i></div>
                            <div class="notify-text">
                                <h3>Some special like you</h3>
                                <span>Just Now</span>
                            </div>
                        </a>
                        <a href="#" class="notify-item">
                            <div class="notify-thumb"><i class="ti-comments bg_info"></i></div>
                            <div class="notify-text">
                                <h3>New Commetns On Post</h3>
                                <span>30 Seconds ago</span>
                            </div>
                        </a>
                        <a href="#" class="notify-item">
                            <div class="notify-thumb"><i class="ti-settings bg_secondary"></i></div>
                            <div class="notify-text">
                                <h3>You changed your Settings</h3>
                                <span>Just Now</span>
                            </div>
                        </a>
                        <a href="#" class="notify-item">
                            <div class="notify-thumb"><i class="ti-image bg_success"></i></div>
                            <div class="notify-text">
                                <h3>Image Uploaded Successfully</h3>
                                <span>Just Now</span>
                            </div>
                        </a>
                    </div>
                </div>
            </li>
            <li class="dropdown">
                <i class="feather ft-mail dropdown-toggle" data-toggle="dropdown"><span class="notification_dot"></span></i>
                <div class="dropdown-menu notify-box nt-enveloper-box">
                    <span class="notify-title">You have 3 new Messages</span>
                    <div class="nofity-list">
                        <a href="#" class="notify-item">
                            <div class="notify-thumb">
                                <img src="../assets/images/author/author-img1.jpg" alt="image">
                            </div>
                            <div class="notify-text">
                                <h3>Jhon Doe</h3>
                                <span class="msg">Hello are you there?</span>
                                <span>3:15 PM</span>
                            </div>
                        </a>
                        <a href="#" class="notify-item">
                            <div class="notify-thumb">
                                <img src="../assets/images/author/author-img2.jpg" alt="image">
                            </div>
                            <div class="notify-text">
                                <h3>David Boos</h3>
                                <span class="msg">Waiting for your Response...</span>
                                <span>3:15 PM</span>
                            </div>
                        </a>
                        <a href="#" class="notify-item">
                            <div class="notify-thumb">
                                <img src="../assets/images/user.jpg" alt="image">
                            </div>
                            <div class="notify-text">
                                <h3>Jason Roy</h3>
                                <span class="msg">Hi there, Hope you are well</span>
                                <span>3:15 PM</span>
                            </div>
                        </a>
                        <a href="#" class="notify-item">
                            <div class="notify-thumb">
                                <img src="../assets/images/author/author-img4.jpg" alt="image">
                            </div>
                            <div class="notify-text">
                                <h3>Malika Roy</h3>
                                <span class="msg">Your Product Dispatched form Warehouse...</span>
                                <span>3:15 PM</span>
                            </div>
                        </a>
                        <a href="#" class="notify-item">
                            <div class="notify-thumb">
                                <img src="../assets/images/author/author-img2.jpg" alt="image">
                            </div>
                            <div class="notify-text">
                                <h3>Raven Jhon</h3>
                                <span class="msg">Please recieve your parcel from our store</span>
                                <span>3:15 PM</span>
                            </div>
                        </a>
                        <a href="#" class="notify-item">
                            <div class="notify-thumb">
                                <img src="../assets/images/author/author-img1.jpg" alt="image">
                            </div>
                            <div class="notify-text">
                                <h3>Angela Yo</h3>
                                <span class="msg">You recieved a new message...</span>
                                <span>3:15 PM</span>
                            </div>
                        </a>
                        <a href="#" class="notify-item">
                            <div class="notify-thumb">
                                <img src="../assets/images/user.jpg" alt="image">
                            </div>
                            <div class="notify-text">
                                <h3>Rebecca Jhon</h3>
                                <span class="msg">Hey I am waiting for you...</span>
                                <span>3:15 PM</span>
                            </div>
                        </a>
                    </div>
                </div>
            </li>
            
            <li class="user-dropdown">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="../assets/images/user.jpg" alt="" class="img-fluid">
                    </button>
                    <div class="dropdown-menu dropdown_user" aria-labelledby="dropdownMenuButton" >
                        <div class="dropdown-header d-flex flex-column align-items-center">
                            <div class="user_img mb-3">
                                <img src="../assets/images/user.jpg" alt="User Image">
                            </div>
                            <div class="user_bio text-center">
                                <p class="name font-weight-bold mb-0">{{ Auth::user()->name }}</p>
                                <p class="email text-muted mb-3"><a class="pl-3 pr-3" href="{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="profile.html"><i class="ti-user"></i> Profile</a>
                        <span role="separator" class="divider"></span>
                        <a class="dropdown-item" href="/logout"><i class="ti-power-off"></i>Logout</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <!--==================================*
             End Notification Section
    *====================================-->
</div>

</div>