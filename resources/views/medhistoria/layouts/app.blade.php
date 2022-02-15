<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, material pro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, material design, material dashboard bootstrap 5 dashboard template" />
    <meta name="description" content="Material Pro is powerful and clean admin dashboard template" />
    <meta name="robots" content="noindex,nofollow" />

    <title>@yield('title', 'Inicio')</title>

{{--    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro/"/>--}}
    <!-- Favicon icon -->
{{--    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/medhistoria') }}/favicon.png"/>--}}

{{--    <link rel="stylesheet" href="../../plugin/apexcharts/dist/apexcharts.css"/>--}}

    <!-- Custom CSS -->
    <link href="{{ mix('css/med-historia.css') }}" rel="stylesheet" />

    @yield('styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!-- -------------------------------------------------------------- -->
<!-- Preloader - style you can find in spinners.css -->
<!-- -------------------------------------------------------------- -->
<div class="preloader">
    <svg
        class="tea lds-ripple"
        width="37"
        height="48"
        viewbox="0 0 37 48"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
    >
        <path
            d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z"
            stroke="#1e88e5"
            stroke-width="2"
        ></path>
        <path
            d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34"
            stroke="#1e88e5"
            stroke-width="2"
        ></path>
        <path
            id="teabag"
            fill="#1e88e5"
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z"
        ></path>
        <path
            id="steamL"
            d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke="#1e88e5"
        ></path>
        <path
            id="steamR"
            d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13"
            stroke="#1e88e5"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        ></path>
    </svg>
</div>

<!-- Main wrapper - style you can find in pages.scss -->
<div id="main-wrapper">

    <!-- Top bar header - style you can find in pages.scss -->
    @include('medhistoria.layouts.top-bar')
    <!-- End top-bar header - style you can find in pages.scss -->

    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    @include('medhistoria.layouts.navigation')
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->

    <!-- Page wrapper  -->
    <div class="page-wrapper">

        <!-- Content -->
        @yield('content')
        <!-- End Content -->

        <!-- footer -->
        <footer class="footer text-center">
            All Rights Reserved by Materialpro admin.
        </footer>
        <!-- End footer -->
    </div>
    <!-- End Page wrapper  -->
</div>
<!-- End Wrapper -->


<!--  -->
<script src="{{ asset('js/med-historia.js') }}"></script>

<!-- apps -->
<script src="{{ asset('js/medhistoria/app.min.js') }}"></script>
<script src="{{ asset('js/medhistoria/app.init.js') }}"></script>
<script src="{{ asset('js/medhistoria/app-style-switcher.js') }}"></script>
{{--<!-- slimscrollbar scrollbar JavaScript -->--}}
<script src="{{ asset('plugin/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
{{--<script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>--}}
<!--Wave Effects -->
<script src="{{ asset('js/medhistoria/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('js/medhistoria/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('js/medhistoria/feather.min.js') }}"></script>
<script src="{{ asset('js/medhistoria/custom.min.js') }}"></script>
{{--<!--This page JavaScript -->--}}
{{--<script src="{{ asset('plugin/libs/apexcharts/dist/apexcharts.min.js') }}"></script>--}}
{{--<!-- Chart JS -->--}}
{{--<script src="{{ asset('js/dashboard/pages/dashboards/dashboard1.js') }}"></script>--}}

@yield('scripts')

@include('sweetalert::alert')


</body>
</html>
