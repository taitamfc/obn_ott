<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <!--=========================* Met Data
    *===========================-->
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,
    initial-scale=1">
    <meta name="description" content="Falr - Bootstrap 4 Admin Dashboard Template">

    <!--=========================*
Page Title
*===========================-->
    <title>Falr - Bootstrap 4 Admin Dashboard Template</title>

    <!--=========================*
                Favicon
    *===========================-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">
    <!--=========================* Bootstrap Css *===========================-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!--=========================*
Custom CSS
*===========================-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!--=========================*
               Owl CSS
    *===========================-->
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{
    asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">
    <!--=========================*
    Font Awesome *===========================-->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <!--=========================* Themify
    Icons *===========================-->
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">

    <!--=========================*
Ionicons
*===========================-->
    <link href="{{ asset('assets/css/ionicons.min.css') }}" rel="stylesheet" />

    <!--=========================*
              EtLine Icons
    *===========================-->
    <link href="{{ asset('assets/css/et-line.css') }}" rel="stylesheet" />
    <!--=========================* Feather Icons
    *===========================-->
    <link href="{{ asset('assets/css/feather.css') }}" rel="stylesheet" />

    <!--=========================*
Flag Icons
*===========================-->
    <link href="{{ asset('assets/css/flag-icon.min.css') }}" rel="stylesheet" />

    <!--=========================*
              Modernizer
    *===========================-->
    <script src="{{ asset('assets/js/modernizr-2.8.3.min.js') }}"></script>
    <!--=========================* Metis Menu
    *===========================-->
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">

    <!--=========================*
            Slick Menu
                *=========================== -->
    < link rel=" stylesheet " href=" {{ asset('assets / css / slicknav.min.css ') }}">

        <!--=========================*
                      Flag Icons
            *===========================-->
        <link href="{{ asset('assets/ css / flag - icon.min.css ') }}" rel="stylesheet" />

        < !--=========================* AM Chart *===========================-->
            <link rel="stylesheet" href="{{ asset('assets/vendors/am-charts/css/am-charts.css') }}" type="text/css"
                media="all" />

            < !--=========================* Morris Css *===========================-->
                <link rel="stylesheet" href="{{ asset('assets/vendors/charts/morris-bundle/morris.css') }}">

                <!--=========================*
            Google Fonts
    *===========================-->

                <!--=========================*
               Datatable
    *===========================-->
                <!-- Start datatable css -->
                <link rel="stylesheet" type="text/css"
                    href="{{ asset('assets/vendors/data-table/css/jquery.dataTables.css') }}">
                <link rel="stylesheet" type="text/css"
                    href="{{ asset('assets/vendors/data-table/css/dataTables.bootstrap4.min.css') }}">
                <link rel="stylesheet" type="text/css"
                    href="{{ asset('assets/vendors/data-table/css/responsive.bootstrap.min.css') }}">
                <link rel="stylesheet" type="text/css"
                    href="{{ asset('assets/vendors/data-table/css/responsive.jqueryui.min.css') }}">

                <!--=========================*
         Fullscreen Calendar
    *===========================-->
                <link rel="stylesheet" href="{{ asset('assets/vendors/fullcalendar/dist/fullcalendar.min.css') }}">
                <link rel="stylesheet" href="{{ asset('assets/vendors/fullcalendar/dist/fullcalendar.print.min.css') }}"
                    media="print">
                <!-- Font USE: 'Roboto', sans-serif;-->
                <link rel="preconnect" href="https://fonts.gstatic.com">
                <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
                    rel="stylesheet">

                <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
                <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="page-container" class="light-sidebar">
        @include('includes.header')
        @include('includes.sidebar')
        @yield('content')
        @include('includes.footer')

    </div>
    <script src="{{ asset('assets/vendors/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendors/fullcalendar/dist/fullcalendar.min.js') }}"></script>

    <!-- Calendar Init -->
    <script src="{{ asset('assets/js/init/full-calendar.js') }}"></script>

    <!-- Data Table js -->
    <script src="{{ asset('assets/vendors/data-table/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/data-table/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/data-table/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/data-table/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/data-table/js/responsive.bootstrap.min.js') }}"></script>

    <!-- Data table Init -->
    <script src="{{ asset('assets/js/init/data-table.js') }}"></script>

    <!--=========================*
        Main Script
*===========================-->

    <!--=========================*
            Scripts
*===========================-->

    <!-- Jquery Js -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Owl Carousel Js -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- Metis Menu Js -->
    <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
    <!-- SlimScroll Js -->
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    <!-- Slick Nav -->
    <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
    <!-- ========== This Page js ========== -->

    <!-- start amchart js -->
    <script src="{{ asset('assets/vendors/am-charts/js/ammap.js') }}"></script>
    <script src="{{ asset('assets/vendors/am-charts/js/worldLow.js') }}"></script>
    <script src="{{ asset('assets/vendors/am-charts/js/continentsLow.js') }}"></script>
    <script src="{{ asset('assets/vendors/am-charts/js/light.js') }}"></script>
    <!-- maps js -->
    <script src="{{ asset('assets/js/am-maps.js') }}"></script>

    <!--Float Js-->
    <script src="{{ asset('assets/vendors/charts/float-bundle/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/vendors/charts/float-bundle/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/vendors/charts/float-bundle/jquery.flot.resize.js') }}"></script>

    <!--Chart Js-->
    <script src="{{ asset('assets/vendors/charts/charts-bundle/Chart.bundle.js') }}"></script>

    <!--Easy pie chart Js-->
    <script src="{{ asset('assets/vendors/charts/sparkline/easy-pie-chart.js') }}"></script>

    <!--Sparkline Js-->
    <script src="{{ asset('assets/vendors/charts/sparkline/sparklines.js') }}"></script>

    <!--Apex Chart-->
    <script src="{{ asset('assets/vendors/apex/js/apexcharts.min.js') }}"></script>

    <!--Home Script-->
    <script src="{{ asset('assets/js/home.js') }}"></script>

    <!-- ========== This Page js ========== -->

    <!-- Main Js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>


</body>

</html>