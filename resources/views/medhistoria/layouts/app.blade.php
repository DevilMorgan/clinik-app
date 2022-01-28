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

    <title>Material Pro Template by WrapPixel</title>

{{--    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro/"/>--}}
    <!-- Favicon icon -->
{{--    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/medhistoria') }}/favicon.png"/>--}}

{{--    <link rel="stylesheet" href="../../plugin/apexcharts/dist/apexcharts.css"/>--}}

    <!-- Custom CSS -->
    <link href="{{ mix('css/med-historia.css') }}" rel="stylesheet" />

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
<!-- -------------------------------------------------------------- -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- -------------------------------------------------------------- -->
<div id="main-wrapper">
    <!-- -------------------------------------------------------------- -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- -------------------------------------------------------------- -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-lg navbar-dark">
            <div class="navbar-header">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                    <i class="fas fa-bars"></i>
                </a>
                <!-- Logo principal -->
                <a class="navbar-brand" href="index.html">
                    <!-- Logo icon -->
                    <b class="logo-icon">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="{{ asset('img/medhistoria') }}/logo-icon.png" alt="homepage" class="dark-logo" />
                        <!-- Light Logo icon -->
                        <img src="{{ asset('img/medhistoria/logos') }}/withe-icon-logo-34x33px.png" alt="homepage" class="light-logo" />
                    </b>
                    <!--End Logo icon -->

                    <!-- Logo text -->
                    <span class="logo-text">
                        <!-- dark Logo text -->
                        <img src="{{ asset('img/medhistoria') }}/logo-text.png" alt="homepage" class="dark-logo"/>
                        <!-- Light Logo text -->
                        <img src="{{ asset('img/medhistoria/logos') }}/white-text-logo-148x19px.png" class="light-logo" alt="homepage"/>
                    </span>
                    <!-- End logo text -->
                </a>
                <!-- End Logo principal -->

                <!-- Toggle which is visible on mobile only User and menssage modules hidden-->
                <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-ellipsis-h"></i>
                </a>
            </div>
            <!-- End Logo -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <!-- This is Hamburguer menu and search large header. Descktop -->
                <ul class="navbar-nav me-auto">
                    <!-- Hamburguer menu module -->
                    <li class="nav-item"> 
                        <a class="nav-link sidebartoggler d-none d-md-block waves-effect waves-dark" href="javascript:void(0)">
                            <i class="ti-menu"></i>
                        </a> 
                    </li>
                    <!-- Search module  -->
                    <li class="nav-item d-none d-md-block search-box">
                        <a class="nav-link d-none d-md-block waves-effect waves-dark" href="javascript:void(0)">
                            <i class="ti-search"></i>
                        </a>

                        <form class="app-search">
                            <input type="text" class="form-control" placeholder="Search & enter"/>
                            <a class="srh-btn">
                                <i class="ti-close"></i>
                            </a>
                        </form>
                    </li>
                </ul>

                <!-- Right side toggle and nav items Menssage and user image -->
                <ul class="navbar-nav justify-content-end">
                    <!-- User module -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('img/medhistoria') }}/users/1.jpg" alt="user" width="30" class="profile-pic rounded-circle"/>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end user-dd animated flipInY">
                            <div class="d-flex no-block align-items-center p-3 bg-info text-white mb-2">
                                <div class="">
                                    <img src="{{ asset('img/medhistoria') }}/users/1.jpg" alt="user" class="rounded-circle" width="60"/>
                                </div>
                                <div class="ms-2">
                                    <h4 class="mb-0 text-white">Steave Jobs</h4>
                                    <p class="mb-0">varun@gmail.com</p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="#">
                                <i data-feather="user" class="feather-sm text-info me-1 ms-1"></i>My Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i data-feather="credit-card" class="feather-sm text-info me-1 ms-1"></i>My Balance
                            </a>
                            <a class="dropdown-item" href="#">
                                <i data-feather="mail" class="feather-sm text-success me-1 ms-1"></i>Inbox
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <i data-feather="settings" class="feather-sm text-warning me-1 ms-1"></i>Account Setting
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"> 
                                <i data-feather="log-out" class="feather-sm text-danger me-1 ms-1"></i>Logout
                            </a>
                            <div class="dropdown-divider"></div>
                            <div class="pl-4 p-2">
                                <a href="#" class="btn d-block w-100 btn-info rounded-pill">View Profile</a>
                            </div>
                        </div>
                    </li>

                    <!-- Menssage module -->
                    <li class="nav-item dropdown" style="margin-right: 35px">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#"  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-email"></i>
                            <div class="notify">
                                <span class="heartbit"></span> <span class="point"></span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end mailbox dropdown-menu-animate-up">
                            <ul class="list-style-none">
                                <li>
                                    <div class="border-bottom rounded-top py-3 px-4">
                                        <div class="mb-0 font-weight-medium fs-5">Notifications</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="message-center notifications position-relative" style="height: 230px">
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                            <span class="btn btn-light-danger text-danger btn-circle">
                                                <i data-feather="link" class="feather-sm fill-white"></i>
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h5 class="message-title mb-0 mt-1 fs-3 fw-bold">Luanch Admin</h5>
                                                <span class="fs-2 text-nowrap d-block time text-truncate fw-normal text-muted mt-1">Just see the my new admin!</span>
                                                <span class="fs-2 text-nowrap d-block subtext text-muted">9:30 AM</span>        
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                            <span class="btn btn-light-success text-success btn-circle">
                                                <i data-feather="calendar" class="feather-sm fill-white"></i>  
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h5 class="message-title mb-0 mt-1 fs-3 fw-bold">Event today</h5>
                                                <span class="fs-2 text-nowrap d-block time text-truncate fw-normal text-muted mt-1">Just a reminder that you have event</span>
                                                <span class="fs-2 text-nowrap d-block subtext text-muted">9:10 AM</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                            <span class="btn btn-light-info text-info btn-circle">
                                                <i data-feather="settings" class="feather-sm fill-white"></i>
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h5 class="message-title mb-0 mt-1 fs-3 fw-bold">Settings</h5>
                                                <span class="fs-2 text-nowrap d-block time text-truncate fw-normal text-muted mt-1">
                                                    You can customize this template as you want
                                                </span>
                                                <span class="fs-2 text-nowrap d-block subtext text-muted">9:08 AM</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                            <span class="btn btn-light-primary text-primary btn-circle">
                                                <i data-feather="users" class="feather-sm fill-white"></i>
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h5 class="message-title mb-0 mt-1 fs-3 fw-bold">Pavan kumar</h5>
                                                <span class="fs-2 text-nowrap d-block time text-truncate fw-normal text-muted mt-1">Just see the my admin!</span>
                                                <span class="fs-2 text-nowrap d-block subtext text-muted">9:02 AM</span>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link border-top text-center text-dark pt-3" href="javascript:void(0);">
                                        <strong>Check all notifications</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- User profile -->
            <div class="user-profile position-relative">
                <!-- User profile image -->
                <div class="profile-img m-auto">
                    <img src="{{ asset('img/medhistoria') }}/users/1.jpg" alt="user" class="rounded-circle" width="50"/>
                </div>
          
                <!-- User profile text-->
                <div class="profile-text pt-1 dropdown">
                    <a href="#" class="u-dropdown w-100 text-white d-block position-relative" id="dropdownMenuLink" data-bs-toggle="dropdown"
                        aria-expanded="false">Jhonathan de la Torre <br> jhonathanyy145@gmail.com
                    </a>
                    <!-- Se elimina la clase dropdown-toggle de la etiqueta "a" para eliminar la flecha de la derecha de la interacción del dropdwon -->
                    <!-- <div class="dropdown-menu animated flipInY" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">
                            <i data-feather="user" class="feather-sm text-info me-1 ms-1"></i>My Profile 
                        </a>
                        <a class="dropdown-item" href="#">
                            <i data-feather="credit-card" class="feather-sm text-info me-1 ms-1"></i>My Balance
                        </a>
                        <a class="dropdown-item" href="#">
                            <i data-feather="mail" class="feather-sm text-success me-1 ms-1"></i>Inbox
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <i data-feather="settings" class="feather-sm text-warning me-1 ms-1"></i>Account Setting
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="authentication-login3.html">
                            <i data-feather="log-out" class="feather-sm text-danger me-1 ms-1"></i>Logout
                        </a>
                        <div class="dropdown-divider"></div>
                        <div class="ps-4 p-2">
                            <a href="#" class="btn d-block w-100 btn-info rounded-pill">View Profile</a>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- End User profile text-->
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item"> <!-- Inicio -->
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-calendar.html" aria-expanded="false">
                        <i data-feather="home"></i>
                            <span class="hide-menu fs-5 ms-3">Inicio</span>
                        </a>
                    </li>
                    
                    <li class="sidebar-item"> <!-- Perfil -->
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i data-feather="user"></i>
                            <span class="hide-menu fs-5 ms-3">Perfil</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="index.html" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu">Consultorios</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="index2.html" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu">Sedes</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="index3.html" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu">Documentos / Formatos</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="index4.html" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu">Firma Digital</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item"> <!-- Pacientes -->
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-calendar.html" aria-expanded="false">
                            <i data-feather="users"></i>
                            <span class="hide-menu fs-5 ms-3">Pacientes</span>
                        </a>
                    </li>

                    <li class="sidebar-item"> <!-- Historia Clínica -->
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i data-feather="folder"></i>
                            <span class="hide-menu fs-5 ms-3">Historia Clínica</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="index.html" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu">Consultorios</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="index2.html" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu">Sedes</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="index3.html" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu">Documentos / Formatos</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="index4.html" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu">Firma Digital</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item"> <!-- Prescripciones -->
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-calendar.html" aria-expanded="false">
                            <i data-feather="file"></i>
                            <span class="hide-menu fs-5 ms-3">Prescripciones</span>
                        </a>
                    </li>
                    <li class="sidebar-item"> <!-- Autorizaciones -->
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-calendar.html" aria-expanded="false">
                            <i data-feather="check-circle"></i>
                            <span class="hide-menu fs-5 ms-3">Autorizaciones</span>
                        </a>
                    </li>
                    <li class="sidebar-item"> <!-- Incapacidades -->
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-calendar.html" aria-expanded="false">
                            <i data-feather="activity"></i>
                            <span class="hide-menu fs-5 ms-3">Incapacidades</span>
                        </a>
                    </li>
                    <li class="sidebar-item"> <!-- RIPS -->
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-calendar.html" aria-expanded="false">
                            <i data-feather="plus-circle"></i>
                            <span class="hide-menu fs-5 ms-3">RIPS</span>
                        </a>
                    </li>
                    <li class="sidebar-item"> <!-- Vacunación -->
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-calendar.html" aria-expanded="false">
                            <i data-feather="shield"></i>
                            <span class="hide-menu fs-5 ms-3">Vacunación</span>
                        </a>
                    </li>
                    <li class="sidebar-item"> <!-- Convenios -->
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-calendar.html" aria-expanded="false">
                            <i data-feather="paperclip"></i>
                            <span class="hide-menu fs-5 ms-3">Convenios</span>
                        </a>
                    </li>
                    <li class="sidebar-item"> <!-- Contactos -->
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-calendar.html" aria-expanded="false">
                            <i data-feather="book-open"></i>
                            <span class="hide-menu fs-5 ms-3">Contactos</span>
                        </a>
                    </li>
                    <li class="sidebar-item"> <!-- Usuarios -->
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-calendar.html" aria-expanded="false">
                            <i data-feather="user-check"></i>
                            <span class="hide-menu fs-5 ms-3">Usuarios</span>
                        </a>
                    </li>
                    <li class="sidebar-item"> <!-- Agenda Médica -->
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-calendar.html" aria-expanded="false">
                            <i data-feather="clipboard"></i>
                            <span class="hide-menu fs-5 ms-3">Agenda Médica</span>
                        </a>
                    </li>
                    <li class="sidebar-item"> <!-- Citas -->
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-calendar.html" aria-expanded="false">
                            <i data-feather="bell"></i>
                            <span class="hide-menu fs-5 ms-3">Citas</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
        <!-- Bottom points-->
        <div class="sidebar-footer">
            <!-- item-->
            <a href="" class="link" data-bs-toggle="tooltip" data-bs-placement="top" title="Settings">
                <i class="ti-settings"></i>
            </a>
            <!-- item-->
            <a href="" class="link" data-bs-toggle="tooltip" data-bs-placement="top" title="Email">
                <i class="mdi mdi-gmail"></i>
            </a>
            <!-- item-->
            <a href="" class="link" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout">
                <i class="mdi mdi-power"></i>
            </a>
        </div>
        <!-- End Bottom points-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- -------------------------------------------------------------- -->
    <!-- Page wrapper  -->
    <!-- -------------------------------------------------------------- -->
    <div class="page-wrapper">
        <!-- -------------------------------------------------------------- -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- -------------------------------------------------------------- -->
        <div class="row page-titles">
            <div class="col-md-5 col-12 align-self-center">
                <h3 class="text-themecolor mb-0" style="font-weight: bold">Pacientes</h3>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0)">Home</a>
                    </li>
                    <li class="breadcrumb-item ">Pacientes</li>
                </ol>
            </div>
            <div class="col-md-7 col-12 align-self-center d-none d-md-block">

            </div>
        </div>
        <!-- End Bread crumb and right sidebar toggle -->

        <!-- Container fluid  -->
        <div class="container-fluid">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-4 col-xl-6">
                        <form>
                            <input type="text" class="form-control product-search" id="input-search" placeholder="Busqueda de Pacientes">
                        </form>
                    </div>
                    <div class="col-md-8 col-xl-6 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                        <div class="action-btn show-btn" style="display: none">
                        <a href="javascript:void(0)" class="delete-multiple btn-light-danger btn me-2 text-danger d-flex align-items-center font-weight-medium"></a>
                    </div>
                        <a href="javascript:void(0)" id="btn-add-contact" class="btn btn-info">Agregar Pacientes</a>
                    </div>
                </div>
            </div>

            <div class="card card-body">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>Column 1</th>
                            <th>Column 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Row 1 Data 1</td>
                            <td>Row 1 Data 2</td>
                        </tr>
                        <tr>
                            <td>Row 2 Data 1</td>
                            <td>Row 2 Data 2</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End Container fluid  -->

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
</body>
</html>
