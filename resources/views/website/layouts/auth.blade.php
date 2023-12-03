<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('website/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('website/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('website/css/aos.min.css')}}">
    <link rel="stylesheet" href="{{ asset('website/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('website/css/icofont.min.css')}}">
    <link rel="stylesheet" href="{{ asset('website/css/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('website/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{ asset('website/css/style.css')}}">
</head>

<body class="body__wrapper">

    <main class="main_wrapper overflow-hidden">

        @yield('breadcrumb')

        <!-- login__section__start -->
        <div class="loginarea sp_top_100 sp_bottom_100">
            <div class="container">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
        </div>
    </main>
    <!-- JS here -->
    <script src="{{ asset('website/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{ asset('website/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('website/js/popper.min.js')}}"></script>
    <script src="{{ asset('website/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('website/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('website/js/slick.min.js')}}"></script>
    <script src="{{ asset('website/js/jquery.meanmenu.min.js')}}"></script>
    <script src="{{ asset('website/js/ajax-form.js')}}"></script>
    <script src="{{ asset('website/js/wow.min.js')}}"></script>
    <script src="{{ asset('website/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{ asset('website/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('website/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('website/js/waypoints.min.js')}}"></script>
    <script src="{{ asset('website/js/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('website/js/plugins.js')}}"></script>
    <script src="{{ asset('website/js/swiper-bundle.min.js')}}"></script>
    <script src="{{ asset('website/js/main.js')}}"></script>

    <script>
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia(
            "(prefers-color-scheme: dark)").matches)) {
        document.getElementById("light--to-dark-button")?.classList.add("dark--mode");
    }
    if (localStorage.getItem("theme-color") === "light") {
        document.getElementById("light--to-dark-button")?.classList.remove("dark--mode");
    }
    </script>


</body>

</html>