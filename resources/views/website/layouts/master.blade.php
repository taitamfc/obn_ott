<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home-5 Online Course | Edurock - Education LMS Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('website/img/favicon.ico')}}">
    <!-- Place favicon.ico in the root directory -->
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('website/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('website/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('website/css/aos.min.css')}}">
    <link rel="stylesheet" href="{{ asset('website/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icofont@1.0.0/dist/icofont.min.css">
    <link rel="stylesheet" href="{{ asset('website/css/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('website/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{ asset('website/css/style.css')}}">
</head>


<body class="body__wrapper">
    @include('website.includes.header.dark-light')
    <main class="main_wrapper overflow-hidden">
        @include('website.includes.header')
        @yield('content')
        @include('website.includes.footer')
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
    $(document).ready(function() {
        $('#searchIcon').click(function() {
            $('.headerarea__2__input input').toggle();
            $('.headerarea__2__input input').focus(); // Tự động focus vào ô tìm kiếm khi hiển thị
        });
    });
    </script>

</body>

</html>