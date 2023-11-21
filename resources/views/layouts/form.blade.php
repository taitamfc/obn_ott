
<!doctype html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Falr - Bootstrap 4 Admin Dashboard Template">
    <title>Sign In | Falr - Bootstrap 4 Admin Dashboard Template</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link href="{{ asset('assets/css/ionicons.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/et-line.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/feather.css') }}" rel="stylesheet"/>
    <script src="{{ asset('assets/js/modernizr-2.8.3.min.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}">
    <link href="{{ asset('assets/css/flag-icon.min.css') }}" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="login-bg">
                    <div class="login-overlay"></div>
                    <div class="login-left">
                        <h1 class="text-white">OTT Platform</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tellus elit.</p>
                        <!-- <a href="javascript:void(0);" class="btn btn-primary">Learn More</a> -->
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </div>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.fancybox.pack.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>