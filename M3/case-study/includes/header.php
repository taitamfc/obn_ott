
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Quản Lý Cửa Hàng</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="public/css/style.css" rel="stylesheet">
    <style>
    .nav-header {
        padding: 1;
        
    }
    .center-content {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}

</style>

</head>

<body>
    <div id="main-wrapper">
        <!-- @include('includes.nav') -->
        <div class="nav-header">
    <div class="brand-logo">
        <a href="index.html">
            <b class="logo-abbr"><img src="public/uploads/aa.png" alt="" width="200" height="111"></b>
            <span class="logo-compact"><img src="public/uploads/aa.png" alt="" width="200" height="111"></span>
            <span class="brand-title">
                <img src="public/uploads/aa.png" alt="" width="200" height="111">
            </span>
        </a>
    </div>
</div>

<div class="header">
    <div class="">
        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left"></div>
        <div class="header-center">
            <div class="center-content">
                <h2>Chào Mừng Mọi Người Đến Với Cửa Hàng Của Mình</h2>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="public/uploads/aa.png" height="40" width="40" alt="">
                    </div>
                    <div class="drop-down dropdown-profile dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="app-profile.html"><i class="icon-user"></i>
                                        <span>Profile</span></a>
                                </li>
                                <li>
                                    <a href="page-login.html"><i class="icon-key"></i>
                                        <span>Logout</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>