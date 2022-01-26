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
                <a class="nav-toggler waves-effect waves-light d-block d-lg-none"
                    href="javascript:void(0)">
                    <i class="ti-menu ti-close"></i>
                </a>
                <!-- Logo -->
                <a class="navbar-brand" href="index.html">
                    <!-- Logo icon -->
                    <b class="logo-icon">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img
                            src="{{ asset('img/medhistoria') }}/logo-icon.png"
                            alt="homepage"
                            class="dark-logo"
                        />
                        <!-- Light Logo icon -->
                        <img
                            src="{{ asset('img/medhistoria') }}/logo-light-icon.png"
                            alt="homepage"
                            class="light-logo"
                        />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                <!-- dark Logo text -->
                <img
                    src="{{ asset('img/medhistoria') }}/logo-text.png"
                    alt="homepage"
                    class="dark-logo"
                />
                        <!-- Light Logo text -->
                <img
                    src="{{ asset('img/medhistoria') }}/logo-light-text.png"
                    class="light-logo"
                    alt="homepage"
                />
              </span>
                </a>
                <!-- End Logo -->
                <!-- Toggle which is visible on mobile only -->
                <a class="topbartoggler d-block d-lg-none waves-effect waves-light"
                    href="javascript:void(0)"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="ti-more"></i>
                </a>
            </div>
            <!-- -------------------------------------------------------------- -->
            <!-- End Logo -->
            <!-- -------------------------------------------------------------- -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <!-- -------------------------------------------------------------- -->
                <!-- toggle and nav items -->
                <!-- -------------------------------------------------------------- -->
                <ul class="navbar-nav me-auto">
                    <!-- This is  -->
                    <!-- <li class="nav-item"> <a
                                class="nav-link sidebartoggler d-none d-md-block waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-menu"></i></a> </li> -->
                </ul>
                <!-- -------------------------------------------------------------- -->
                <!-- Right side toggle and nav items -->
                <!-- -------------------------------------------------------------- -->
                <ul class="navbar-nav justify-content-end">
                    <!-- -------------------------------------------------------------- -->
                    <!-- Search -->
                    <!-- -------------------------------------------------------------- -->
                    <li class="nav-item d-none d-md-block search-box">
                        <a
                            class="nav-link d-none d-md-block waves-effect waves-dark"
                            href="javascript:void(0)"
                        ><i class="ti-search"></i
                            ></a>
                        <form class="app-search">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Search & enter"
                            />
                            <a class="srh-btn"><i class="ti-close"></i></a>
                        </form>
                    </li>
                    <!-- -------------------------------------------------------------- -->
                    <!-- Comment -->
                    <!-- -------------------------------------------------------------- -->
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle waves-effect waves-dark"
                            href="#"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <i class="mdi mdi-message"></i>
                            <div class="notify">
                                <span class="heartbit"></span> <span class="point"></span>
                            </div>
                        </a>
                        <div
                            class="
                    dropdown-menu dropdown-menu-end
                    mailbox
                    dropdown-menu-animate-up
                  "
                        >
                            <ul class="list-style-none">
                                <li>
                                    <div class="border-bottom rounded-top py-3 px-4">
                                        <div class="mb-0 font-weight-medium fs-4">
                                            Notifications
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="message-center notifications position-relative"
                                        style="height: 230px"
                                    >
                                        <!-- Message -->
                                        <a
                                            href="javascript:void(0)"
                                            class="
                            message-item
                            d-flex
                            align-items-center
                            border-bottom
                            px-3
                            py-2
                          "
                                        >
                          <span
                              class="btn btn-light-danger text-danger btn-circle"
                          >
                            <i
                                data-feather="link"
                                class="feather-sm fill-white"
                            ></i>
                          </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h5 class="message-title mb-0 mt-1 fs-3 fw-bold">
                                                    Luanch Admin
                                                </h5>
                                                <span
                                                    class="
                                fs-2
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                text-muted
                                mt-1
                              "
                                                >Just see the my new admin!</span
                                                >
                                                <span
                                                    class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              "
                                                >9:30 AM</span
                                                >
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a
                                            href="javascript:void(0)"
                                            class="
                            message-item
                            d-flex
                            align-items-center
                            border-bottom
                            px-3
                            py-2
                          "
                                        >
                          <span
                              class="
                              btn btn-light-success
                              text-success
                              btn-circle
                            "
                          >
                            <i
                                data-feather="calendar"
                                class="feather-sm fill-white"
                            ></i>
                          </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h5 class="message-title mb-0 mt-1 fs-3 fw-bold">
                                                    Event today
                                                </h5>
                                                <span
                                                    class="
                                fs-2
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                text-muted
                                mt-1
                              "
                                                >Just a reminder that you have event</span
                                                >
                                                <span
                                                    class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              "
                                                >9:10 AM</span
                                                >
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a
                                            href="javascript:void(0)"
                                            class="
                            message-item
                            d-flex
                            align-items-center
                            border-bottom
                            px-3
                            py-2
                          "
                                        >
                          <span class="btn btn-light-info text-info btn-circle">
                            <i
                                data-feather="settings"
                                class="feather-sm fill-white"
                            ></i>
                          </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h5 class="message-title mb-0 mt-1 fs-3 fw-bold">
                                                    Settings
                                                </h5>
                                                <span
                                                    class="
                                fs-2
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                text-muted
                                mt-1
                              "
                                                >You can customize this template as you want</span
                                                >
                                                <span
                                                    class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              "
                                                >9:08 AM</span
                                                >
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a
                                            href="javascript:void(0)"
                                            class="
                            message-item
                            d-flex
                            align-items-center
                            border-bottom
                            px-3
                            py-2
                          "
                                        >
                          <span
                              class="
                              btn btn-light-primary
                              text-primary
                              btn-circle
                            "
                          >
                            <i
                                data-feather="users"
                                class="feather-sm fill-white"
                            ></i>
                          </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h5 class="message-title mb-0 mt-1 fs-3 fw-bold">
                                                    Pavan kumar
                                                </h5>
                                                <span
                                                    class="
                                fs-2
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                text-muted
                                mt-1
                              "
                                                >Just see the my admin!</span
                                                >
                                                <span
                                                    class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              "
                                                >9:02 AM</span
                                                >
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a
                                        class="nav-link border-top text-center text-dark pt-3"
                                        href="javascript:void(0);"
                                    >
                                        <strong>Check all notifications</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- -------------------------------------------------------------- -->
                    <!-- End Comment -->
                    <!-- -------------------------------------------------------------- -->
                    <!-- -------------------------------------------------------------- -->
                    <!-- Messages -->
                    <!-- -------------------------------------------------------------- -->
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle waves-effect waves-dark"
                            href="#"
                            id="2"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <i class="mdi mdi-email"></i>
                            <div class="notify">
                                <span class="heartbit"></span> <span class="point"></span>
                            </div>
                        </a>
                        <div
                            class="
                    dropdown-menu
                    mailbox
                    dropdown-menu-end dropdown-menu-animate-up
                  "
                            aria-labelledby="2"
                        >
                            <ul class="list-style-none">
                                <li>
                                    <div class="border-bottom rounded-top py-3 px-4">
                                        <div class="mb-0 font-weight-medium fs-4">
                                            You have 4 new messages
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="message-center message-body position-relative"
                                        style="height: 230px"
                                    >
                                        <!-- Message -->
                                        <a
                                            href="javascript:void(0)"
                                            class="
                            message-item
                            d-flex
                            align-items-center
                            border-bottom
                            px-3
                            py-2
                          "
                                        >
                          <span
                              class="user-img position-relative d-inline-block"
                          >
                            <img
                                src="{{ asset('img/medhistoria') }}/users/1.jpg"
                                alt="user"
                                class="rounded-circle w-100"
                            />
                            <span
                                class="profile-status rounded-circle online"
                            ></span>
                          </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h5 class="message-title mb-0 mt-1 fs-3 fw-bold">
                                                    Pavan kumar
                                                </h5>
                                                <span
                                                    class="
                                fs-2
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                              "
                                                >Just see the my admin!</span
                                                >
                                                <span
                                                    class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              "
                                                >9:30 AM</span
                                                >
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a
                                            href="javascript:void(0)"
                                            class="
                            message-item
                            d-flex
                            align-items-center
                            border-bottom
                            px-3
                            py-2
                          "
                                        >
                          <span
                              class="user-img position-relative d-inline-block"
                          >
                            <img
                                src="{{ asset('img/medhistoria') }}/users/2.jpg"
                                alt="user"
                                class="rounded-circle w-100"
                            />
                            <span
                                class="profile-status rounded-circle busy"
                            ></span>
                          </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h5 class="message-title mb-0 mt-1 fs-3 fw-bold">
                                                    Sonu Nigam
                                                </h5>
                                                <span
                                                    class="
                                fs-2
                                text-nowrap
                                d-block
                                time
                                text-truncate
                              "
                                                >I've sung a song! See you at</span
                                                >
                                                <span
                                                    class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              "
                                                >9:10 AM</span
                                                >
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a
                                            href="javascript:void(0)"
                                            class="
                            message-item
                            d-flex
                            align-items-center
                            border-bottom
                            px-3
                            py-2
                          "
                                        >
                          <span
                              class="user-img position-relative d-inline-block"
                          >
                            <img
                                src="{{ asset('img/medhistoria') }}/users/3.jpg"
                                alt="user"
                                class="rounded-circle w-100"
                            />
                            <span
                                class="profile-status rounded-circle away"
                            ></span>
                          </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h5 class="message-title mb-0 mt-1 fs-3 fw-bold">
                                                    Arijit Sinh
                                                </h5>
                                                <span
                                                    class="
                                fs-2
                                text-nowrap
                                d-block
                                time
                                text-truncate
                              "
                                                >I am a singer!</span
                                                >
                                                <span
                                                    class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              "
                                                >9:08 AM</span
                                                >
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a
                                            href="javascript:void(0)"
                                            class="
                            message-item
                            d-flex
                            align-items-center
                            border-bottom
                            px-3
                            py-2
                          "
                                        >
                          <span
                              class="user-img position-relative d-inline-block"
                          >
                            <img
                                src="{{ asset('img/medhistoria/users/4.jpg') }}"
                                alt="user"
                                class="rounded-circle w-100"
                            />
                            <span
                                class="profile-status rounded-circle offline"
                            ></span>
                          </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h5 class="message-title mb-0 mt-1 fs-3 fw-bold">
                                                    Pavan kumar
                                                </h5>
                                                <span
                                                    class="
                                fs-2
                                text-nowrap
                                d-block
                                time
                                text-truncate
                              "
                                                >Just see the my admin!</span
                                                >
                                                <span
                                                    class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              "
                                                >9:02 AM</span
                                                >
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a
                                        class="nav-link border-top text-center text-dark pt-3"
                                        href="javascript:void(0);"
                                    >
                                        <b>See all e-Mails</b> <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- -------------------------------------------------------------- -->
                    <!-- End Messages -->
                    <!-- -------------------------------------------------------------- -->
                    <!-- -------------------------------------------------------------- -->
                    <!-- Mega Menu -->
                    <!-- -------------------------------------------------------------- -->
                    <li class="nav-item dropdown mega-dropdown">
                        <a
                            class="nav-link dropdown-toggle waves-effect waves-dark"
                            href="#"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        ><i class="mdi mdi-view-grid"></i
                            ></a>
                        <div class="dropdown-menu dropdown-menu-animate-up">
                            <div class="mega-dropdown-menu row">
                                <div class="col-lg-3 col-xl-2 mb-4">
                                    <h4 class="mb-3">CAROUSEL</h4>
                                    <!-- CAROUSEL -->
                                    <div
                                        id="carouselExampleControls"
                                        class="carousel slide carousel-dark"
                                        data-bs-ride="carousel"
                                    >
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img
                                                    class="d-block img-fluid"
                                                    src="{{ asset('img/medhistoria') }}/big/img1.jpg"
                                                    alt="First slide"
                                                />
                                            </div>
                                            <div class="carousel-item">
                                                <img
                                                    class="d-block img-fluid"
                                                    src="{{ asset('img/medhistoria') }}/big/img2.jpg"
                                                    alt="Second slide"
                                                />
                                            </div>
                                            <div class="carousel-item">
                                                <img
                                                    class="d-block img-fluid"
                                                    src="{{ asset('img/medhistoria') }}/big/img3.jpg"
                                                    alt="Third slide"
                                                />
                                            </div>
                                        </div>
                                        <a
                                            class="carousel-control-prev"
                                            href="#carouselExampleControls"
                                            role="button"
                                            data-bs-slide="prev"
                                        >
                          <span
                              class="carousel-control-prev-icon"
                              aria-hidden="true"
                          ></span>
                                            <span class="visually-hidden">Previous</span>
                                        </a>
                                        <a
                                            class="carousel-control-next"
                                            href="#carouselExampleControls"
                                            role="button"
                                            data-bs-slide="next"
                                        >
                          <span
                              class="carousel-control-next-icon"
                              aria-hidden="true"
                          ></span>
                                            <span class="visually-hidden">Next</span>
                                        </a>
                                    </div>
                                    <!-- End CAROUSEL -->
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <h4 class="mb-3">ACCORDION</h4>
                                    <!-- Accordian -->
                                    <div
                                        class="accordion accordion-flush"
                                        id="accordionFlushExample"
                                    >
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingOne">
                                                <button
                                                    class="accordion-button collapsed"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapseOne"
                                                    aria-expanded="false"
                                                    aria-controls="flush-collapseOne"
                                                >
                                                    Accordion Item #1
                                                </button>
                                            </h2>
                                            <div
                                                id="flush-collapseOne"
                                                class="accordion-collapse collapse"
                                                aria-labelledby="flush-headingOne"
                                                data-bs-parent="#accordionFlushExample"
                                            >
                                                <div class="accordion-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod
                                                    high life accusamus terry richardson ad squid.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingTwo">
                                                <button
                                                    class="accordion-button collapsed"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapseTwo"
                                                    aria-expanded="false"
                                                    aria-controls="flush-collapseTwo"
                                                >
                                                    Accordion Item #2
                                                </button>
                                            </h2>
                                            <div
                                                id="flush-collapseTwo"
                                                class="accordion-collapse collapse"
                                                aria-labelledby="flush-headingTwo"
                                                data-bs-parent="#accordionFlushExample"
                                            >
                                                <div class="accordion-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod
                                                    high life accusamus terry richardson ad squid.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingThree">
                                                <button
                                                    class="accordion-button collapsed"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapseThree"
                                                    aria-expanded="false"
                                                    aria-controls="flush-collapseThree"
                                                >
                                                    Accordion Item #3
                                                </button>
                                            </h2>
                                            <div
                                                id="flush-collapseThree"
                                                class="accordion-collapse collapse"
                                                aria-labelledby="flush-headingThree"
                                                data-bs-parent="#accordionFlushExample"
                                            >
                                                <div class="accordion-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod
                                                    high life accusamus terry richardson ad squid.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <h4 class="mb-3">CONTACT US</h4>
                                    <!-- Contact -->
                                    <form>
                                        <div class="mb-3 form-floating">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="exampleInputname1"
                                                placeholder="Enter Name"
                                            />
                                            <label>Enter Name</label>
                                        </div>
                                        <div class="mb-3 form-floating">
                                            <input
                                                type="email"
                                                class="form-control"
                                                placeholder="Enter email"
                                            />
                                            <label>Enter Email address</label>
                                        </div>
                                        <div class="mb-3 form-floating">
                          <textarea
                              class="form-control"
                              id="exampleTextarea"
                              rows="3"
                              placeholder="Message"
                          ></textarea>
                                            <label>Enter Message</label>
                                        </div>
                                        <button
                                            type="submit"
                                            class="btn px-4 rounded-pill btn-info"
                                        >
                                            Submit
                                        </button>
                                    </form>
                                </div>
                                <div class="col-lg-3 col-xlg-4 mb-4">
                                    <h4 class="mb-3">List style</h4>
                                    <!-- List style -->
                                    <ul class="list-style-none">
                                        <li>
                                            <a href="#" class="font-weight-medium"
                                            ><i
                                                    data-feather="check-circle"
                                                    class="feather-sm text-success me-2"
                                                ></i>
                                                You can give link</a
                                            >
                                        </li>
                                        <li>
                                            <a href="#" class="font-weight-medium"
                                            ><i
                                                    data-feather="check-circle"
                                                    class="feather-sm text-success me-2"
                                                ></i>
                                                Give link</a
                                            >
                                        </li>
                                        <li>
                                            <a href="#" class="font-weight-medium"
                                            ><i
                                                    data-feather="check-circle"
                                                    class="feather-sm text-success me-2"
                                                ></i>
                                                Another Give link</a
                                            >
                                        </li>
                                        <li>
                                            <a href="#" class="font-weight-medium"
                                            ><i
                                                    data-feather="check-circle"
                                                    class="feather-sm text-success me-2"
                                                ></i>
                                                Forth link</a
                                            >
                                        </li>
                                        <li>
                                            <a href="#" class="font-weight-medium"
                                            ><i
                                                    data-feather="check-circle"
                                                    class="feather-sm text-success me-2"
                                                ></i>
                                                Another fifth link</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- -------------------------------------------------------------- -->
                    <!-- End Mega Menu -->
                    <!-- -------------------------------------------------------------- -->
                    <!-- -------------------------------------------------------------- -->
                    <!-- Language -->
                    <!-- -------------------------------------------------------------- -->
                    <li class="nav-item dropdown">
                        <a
                            class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                  "
                            href=""
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <i class="flag-icon flag-icon-us"></i
                            ></a>
                        <div
                            class="
                    dropdown-menu dropdown-menu-end dropdown-menu-animate-up
                  "
                        >
                            <a class="dropdown-item" href="#"
                            ><i class="flag-icon flag-icon-in"></i> India</a
                            >
                            <a class="dropdown-item" href="#"
                            ><i class="flag-icon flag-icon-fr"></i> French</a
                            >
                            <a class="dropdown-item" href="#"
                            ><i class="flag-icon flag-icon-cn"></i> China</a
                            >
                            <a class="dropdown-item" href="#"
                            ><i class="flag-icon flag-icon-de"></i> Dutch</a
                            >
                        </div>
                    </li>
                    <!-- -------------------------------------------------------------- -->
                    <!-- Profile -->
                    <!-- -------------------------------------------------------------- -->
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle waves-effect waves-dark"
                            href="#"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <img
                                src="{{ asset('img/medhistoria') }}/users/1.jpg"
                                alt="user"
                                width="30"
                                class="profile-pic rounded-circle"
                            />
                        </a>
                        <div
                            class="
                    dropdown-menu dropdown-menu-end
                    user-dd
                    animated
                    flipInY
                  "
                        >
                            <div
                                class="
                      d-flex
                      no-block
                      align-items-center
                      p-3
                      bg-info
                      text-white
                      mb-2
                    "
                            >
                                <div class="">
                                    <img
                                        src="{{ asset('img/medhistoria') }}/users/1.jpg"
                                        alt="user"
                                        class="rounded-circle"
                                        width="60"
                                    />
                                </div>
                                <div class="ms-2">
                                    <h4 class="mb-0 text-white">Steave Jobs</h4>
                                    <p class="mb-0">varun@gmail.com</p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="#"
                            ><i
                                    data-feather="user"
                                    class="feather-sm text-info me-1 ms-1"
                                ></i>
                                My Profile</a
                            >
                            <a class="dropdown-item" href="#"
                            ><i
                                    data-feather="credit-card"
                                    class="feather-sm text-info me-1 ms-1"
                                ></i>
                                My Balance</a
                            >
                            <a class="dropdown-item" href="#"
                            ><i
                                    data-feather="mail"
                                    class="feather-sm text-success me-1 ms-1"
                                ></i>
                                Inbox</a
                            >
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"
                            ><i
                                    data-feather="settings"
                                    class="feather-sm text-warning me-1 ms-1"
                                ></i>
                                Account Setting</a
                            >
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"
                            ><i
                                    data-feather="log-out"
                                    class="feather-sm text-danger me-1 ms-1"
                                ></i>
                                Logout</a
                            >
                            <div class="dropdown-divider"></div>
                            <div class="pl-4 p-2">
                                <a href="#" class="btn d-block w-100 btn-info rounded-pill"
                                >View Profile</a
                                >
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- -------------------------------------------------------------- -->
    <!-- End Topbar header -->
    <!-- -------------------------------------------------------------- -->
    <!-- -------------------------------------------------------------- -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- -------------------------------------------------------------- -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <!-- User Profile-->
                    <li class="nav-small-cap">
                        <i class="mdi mdi-dots-horizontal"></i>
                        <span class="hide-menu">Personal</span>
                    </li>
                    <li class="sidebar-item">
                        <a
                            class="sidebar-link has-arrow waves-effect waves-dark"
                            href="javascript:void(0)"
                            aria-expanded="false"
                        ><i class="mdi mdi-gauge"></i
                            ><span class="hide-menu">Dashboard </span></a
                        >
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="index.html" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu"> Dashboard 1 </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="index2.html" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu"> Dashboard 2 </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="index3.html" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu"> Dashboard 3 </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="index4.html" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu"> Dashboard 4 </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="index5.html" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu"> Dashboard 5 </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="index6.html" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu"> Dashboard 6 </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-small-cap">
                        <i class="mdi mdi-dots-horizontal"></i>
                        <span class="hide-menu">Apps</span>
                    </li>
                    <li class="sidebar-item">
                        <a
                            class="
                    sidebar-link
                    two-column
                    has-arrow
                    waves-effect waves-dark
                  "
                            href="javascript:void(0)"
                            aria-expanded="false"
                        ><i class="mdi mdi-bullseye"></i
                            ><span class="hide-menu">Apps </span></a
                        >
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="inbox-email.html" class="sidebar-link"
                                ><i class="mdi mdi-email"></i
                                    ><span class="hide-menu"> Email </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="inbox-email-detail.html" class="sidebar-link"
                                ><i class="mdi mdi-email-alert"></i
                                    ><span class="hide-menu"> Email Detail </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="inbox-email-compose.html" class="sidebar-link"
                                ><i class="mdi mdi-email-secure"></i
                                    ><span class="hide-menu"> Email Compose </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ticket-list.html" class="sidebar-link"
                                ><i class="mdi mdi-book-multiple"></i
                                    ><span class="hide-menu"> Ticket List </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ticket-detail.html" class="sidebar-link"
                                ><i class="mdi mdi-book-plus"></i
                                    ><span class="hide-menu"> Ticket Detail </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="app-chats.html" class="sidebar-link"
                                ><i class="mdi mdi-comment-processing-outline"></i
                                    ><span class="hide-menu"> Chats Apps </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="app-calendar.html" class="sidebar-link"
                                ><i class="mdi mdi-calendar"></i
                                    ><span class="hide-menu"> Calender </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="app-taskboard.html" class="sidebar-link"
                                ><i class="mdi mdi-bulletin-board"></i
                                    ><span class="hide-menu"> Taskboard </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="app-notes.html" class="sidebar-link"
                                ><i class="mdi mdi-arrange-bring-forward"></i
                                    ><span class="hide-menu"> Notes </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="app-todo.html" class="sidebar-link"
                                ><i class="mdi mdi-clipboard-text"></i
                                    ><span class="hide-menu"> Todo </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="app-invoice.html" class="sidebar-link"
                                ><i class="mdi mdi-book"></i
                                    ><span class="hide-menu"> Invoice </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="app-contacts.html" class="sidebar-link"
                                ><i class="mdi mdi-account-box"></i
                                    ><span class="hide-menu"> Contact </span></a
                                >
                            </li>
                        </ul>
                    </li>
                    <li class="nav-small-cap">
                        <i class="mdi mdi-dots-horizontal"></i>
                        <span class="hide-menu">UI</span>
                    </li>
                    <li class="sidebar-item mega-dropdown">
                        <a
                            class="sidebar-link has-arrow waves-effect waves-dark"
                            href="javascript:void(0)"
                            aria-expanded="false"
                        ><i class="mdi mdi-chart-bubble"></i
                            ><span class="hide-menu">Ui </span></a
                        >
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="ui-accordian.html" class="sidebar-link"
                                ><i class="mdi mdi-box-shadow"></i
                                    ><span class="hide-menu"> Accordian</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-badge.html" class="sidebar-link"
                                ><i class="mdi mdi-application"></i
                                    ><span class="hide-menu"> Badge</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-buttons.html" class="sidebar-link"
                                ><i class="mdi mdi-toggle-switch"></i
                                    ><span class="hide-menu"> Buttons</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-modals.html" class="sidebar-link"
                                ><i class="mdi mdi-tablet"></i
                                    ><span class="hide-menu"> Modals</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-tab.html" class="sidebar-link"
                                ><i class="mdi mdi-sort-variant"></i
                                    ><span class="hide-menu"> Tab</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-tooltip-popover.html" class="sidebar-link"
                                ><i class="mdi mdi-image-filter-vintage"></i
                                    ><span class="hide-menu"> Tooltip &amp; Popover</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-notification.html" class="sidebar-link"
                                ><i class="mdi mdi-message-bulleted"></i
                                    ><span class="hide-menu"> Notification</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-progressbar.html" class="sidebar-link"
                                ><i class="mdi mdi-poll"></i
                                    ><span class="hide-menu"> Progressbar</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-typography.html" class="sidebar-link"
                                ><i class="mdi mdi-format-line-spacing"></i
                                    ><span class="hide-menu"> Typography</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-bootstrap.html" class="sidebar-link"
                                ><i class="mdi mdi-bootstrap"></i
                                    ><span class="hide-menu"> Bootstrap Ui</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-breadcrumb.html" class="sidebar-link"
                                ><i class="mdi mdi-equal"></i
                                    ><span class="hide-menu"> Breadcrumb</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-lists.html" class="sidebar-link"
                                ><i class="mdi mdi-file-video"></i
                                    ><span class="hide-menu"> List Media</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-grid.html" class="sidebar-link"
                                ><i class="mdi mdi-view-module"></i
                                    ><span class="hide-menu"> Grid</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-carousel.html" class="sidebar-link"
                                ><i class="mdi mdi-view-carousel"></i
                                    ><span class="hide-menu"> Carousel</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-offcanvas.html" class="sidebar-link"
                                ><i class="mdi mdi-copy"></i
                                    ><span class="hide-menu"> Offcanvas</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-scrollspy.html" class="sidebar-link"
                                ><i class="mdi mdi-application"></i
                                    ><span class="hide-menu"> Scrollspy</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-toasts.html" class="sidebar-link"
                                ><i class="mdi-credit-card-scan"></i
                                    ><span class="hide-menu"> Toasts</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-spinner.html" class="sidebar-link"
                                ><i class="mdi mdi-apple-safari"></i
                                    ><span class="hide-menu"> Spinner</span></a
                                >
                            </li>

                            <li class="sidebar-item">
                                <a href="ui-cards.html" class="sidebar-link"
                                ><i class="mdi mdi-layers"></i
                                    ><span class="hide-menu"> Basic Cards</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-card-customs.html" class="sidebar-link"
                                ><i class="mdi mdi-credit-card-scan"></i
                                    ><span class="hide-menu">Custom Cards</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-card-weather.html" class="sidebar-link"
                                ><i class="mdi mdi-weather-fog"></i
                                    ><span class="hide-menu">Weather Cards</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-card-draggable.html" class="sidebar-link"
                                ><i class="mdi mdi-bandcamp"></i
                                    ><span class="hide-menu">Draggable Cards</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="component-sweetalert.html" class="sidebar-link"
                                ><i class="mdi mdi-layers"></i
                                    ><span class="hide-menu"> Sweet Alert</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="component-nestable.html" class="sidebar-link"
                                ><i class="mdi mdi-credit-card-scan"></i
                                    ><span class="hide-menu">Nestable</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="component-noui-slider.html" class="sidebar-link"
                                ><i class="mdi mdi-weather-fog"></i
                                    ><span class="hide-menu">Noui slider</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="component-rating.html" class="sidebar-link"
                                ><i class="mdi mdi-bandcamp"></i
                                    ><span class="hide-menu">Rating</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="component-toastr.html" class="sidebar-link"
                                ><i class="mdi mdi-poll"></i
                                    ><span class="hide-menu">Toastr</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="widgets-apps.html" class="sidebar-link"
                                ><i class="mdi mdi-comment-processing-outline"></i
                                    ><span class="hide-menu"> Apps Widgets </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="widgets-data.html" class="sidebar-link"
                                ><i class="mdi mdi-calendar"></i
                                    ><span class="hide-menu"> Data Widgets </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="widgets-charts.html" class="sidebar-link"
                                ><i class="mdi mdi-bulletin-board"></i
                                    ><span class="hide-menu"> Charts Widgets</span></a
                                >
                            </li>
                        </ul>
                    </li>
                    <li class="nav-small-cap">
                        <i class="mdi mdi-dots-horizontal"></i>
                        <span class="hide-menu">Forms</span>
                    </li>
                    <li class="sidebar-item">
                        <a
                            class="sidebar-link has-arrow waves-effect waves-dark"
                            href="javascript:void(0)"
                            aria-expanded="false"
                        ><i class="mdi mdi-file"></i
                            ><span class="hide-menu">Forms</span></a
                        >
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link has-arrow waves-effect waves-dark"
                                    href="javascript:void(0)"
                                    aria-expanded="false"
                                ><i class="mdi mdi-collage"></i
                                    ><span class="hide-menu">Form Elements</span></a
                                >
                                <ul aria-expanded="false" class="collapse second-level">
                                    <li class="sidebar-item">
                                        <a href="form-inputs.html" class="sidebar-link"
                                        ><i class="mdi mdi-priority-low"></i
                                            ><span class="hide-menu"> Forms Input</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-input-groups.html" class="sidebar-link"
                                        ><i class="mdi mdi-rounded-corner"></i
                                            ><span class="hide-menu"> Input Groups</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-input-grid.html" class="sidebar-link"
                                        ><i class="mdi mdi-select-all"></i
                                            ><span class="hide-menu"> Input Grid</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a
                                            href="form-custom-checkbox-radio.html"
                                            class="sidebar-link"
                                        ><i class="mdi mdi-shape-plus"></i
                                            ><span class="hide-menu">
                            Custom Checkboxes &amp; Radios</span
                                            ></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-checkbox-radio.html" class="sidebar-link"
                                        ><i class="mdi mdi-shape-plus"></i
                                            ><span class="hide-menu">
                            Checkboxes &amp; Radios</span
                                            ></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a
                                            href="form-bootstrap-touchspin.html"
                                            class="sidebar-link"
                                        ><i class="mdi mdi-switch"></i
                                            ><span class="hide-menu">
                            Bootstrap Touchspin</span
                                            ></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a
                                            href="form-bootstrap-switch.html"
                                            class="sidebar-link"
                                        ><i class="mdi mdi-toggle-switch-off"></i
                                            ><span class="hide-menu"> Bootstrap Switch</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-select2.html" class="sidebar-link"
                                        ><i class="mdi mdi-relative-scale"></i
                                            ><span class="hide-menu"> Select2</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-dual-listbox.html" class="sidebar-link"
                                        ><i class="mdi mdi-tab-unselected"></i
                                            ><span class="hide-menu"> Dual Listbox</span></a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link has-arrow waves-effect waves-dark"
                                    href="javascript:void(0)"
                                    aria-expanded="false"
                                ><i class="mdi mdi-receipt"></i
                                    ><span class="hide-menu">Form Layouts</span></a
                                >
                                <ul aria-expanded="false" class="collapse second-level">
                                    <li class="sidebar-item">
                                        <a href="form-basic.html" class="sidebar-link"
                                        ><i class="mdi mdi-vector-difference-ba"></i
                                            ><span class="hide-menu"> Basic Forms</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-material.html" class="sidebar-link"
                                        ><i class="mdi mdi-vector-difference-ba"></i
                                            ><span class="hide-menu"> Material Forms</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-horizontal.html" class="sidebar-link"
                                        ><i class="mdi mdi-file-document-box"></i
                                            ><span class="hide-menu"> Form Horizontal</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-actions.html" class="sidebar-link"
                                        ><i class="mdi mdi-code-greater-than"></i
                                            ><span class="hide-menu"> Form Actions</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-row-separator.html" class="sidebar-link"
                                        ><i class="mdi mdi-code-equal"></i
                                            ><span class="hide-menu"> Row Separator</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-bordered.html" class="sidebar-link"
                                        ><i class="mdi mdi-flip-to-front"></i
                                            ><span class="hide-menu"> Form Bordered</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-striped-row.html" class="sidebar-link"
                                        ><i class="mdi mdi-content-duplicate"></i
                                            ><span class="hide-menu"> Striped Rows</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-detail.html" class="sidebar-link"
                                        ><i class="mdi mdi-cards-outline"></i
                                            ><span class="hide-menu"> Form Detail</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-floating-input.html" class="sidebar-link"
                                        ><i class="mdi mdi-cards-outline"></i
                                            ><span class="hide-menu"> Form Float Input</span></a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link has-arrow waves-effect waves-dark"
                                    href="javascript:void(0)"
                                    aria-expanded="false"
                                ><i class="mdi mdi-code-equal"></i
                                    ><span class="hide-menu">Form Addons</span></a
                                >
                                <ul aria-expanded="false" class="collapse second-level">
                                    <li class="sidebar-item">
                                        <a href="form-paginator.html" class="sidebar-link"
                                        ><i class="mdi mdi-export"></i
                                            ><span class="hide-menu"> Paginator</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-img-cropper.html" class="sidebar-link"
                                        ><i class="mdi mdi-crop"></i
                                            ><span class="hide-menu"> Image Cropper</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-dropzone.html" class="sidebar-link"
                                        ><i class="mdi mdi-crosshairs-gps"></i
                                            ><span class="hide-menu"> Dropzone</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-mask.html" class="sidebar-link"
                                        ><i class="mdi mdi-box-shadow"></i
                                            ><span class="hide-menu"> Form Mask</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-typeahead.html" class="sidebar-link"
                                        ><i class="mdi mdi-cards-variant"></i
                                            ><span class="hide-menu"> Form Typehead</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="ui-custom-switch.html" class="sidebar-link"
                                        ><i class="mdi mdi-toggle-switch-off"></i
                                            ><span class="hide-menu"> Custom Switch</span></a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link has-arrow waves-effect waves-dark"
                                    href="javascript:void(0)"
                                    aria-expanded="false"
                                ><i class="mdi mdi-alert-box"></i
                                    ><span class="hide-menu">Form Validation</span></a
                                >
                                <ul aria-expanded="false" class="collapse second-level">
                                    <li class="sidebar-item">
                                        <a
                                            href="form-bootstrap-validation.html"
                                            class="sidebar-link"
                                        ><i class="mdi mdi-credit-card-scan"></i
                                            ><span class="hide-menu">
                            Bootstrap Validation</span
                                            ></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a
                                            href="form-custom-validation.html"
                                            class="sidebar-link"
                                        ><i class="mdi mdi-credit-card-plus"></i
                                            ><span class="hide-menu"> Custom Validation</span></a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link has-arrow waves-effect waves-dark"
                                    href="javascript:void(0)"
                                    aria-expanded="false"
                                ><i class="mdi mdi-pencil-box-outline"></i
                                    ><span class="hide-menu">Form Pickers</span></a
                                >
                                <ul aria-expanded="false" class="collapse second-level">
                                    <li class="sidebar-item">
                                        <a
                                            href="form-picker-colorpicker.html"
                                            class="sidebar-link"
                                        ><i class="mdi mdi-calendar-plus"></i
                                            ><span class="hide-menu"> Colorpicker</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a
                                            href="form-picker-datetimepicker.html"
                                            class="sidebar-link"
                                        ><i class="mdi mdi-calendar-clock"></i
                                            ><span class="hide-menu"> Datetimepicker</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a
                                            href="form-picker-bootstrap-rangepicker.html"
                                            class="sidebar-link"
                                        ><i class="mdi mdi-calendar-range"></i
                                            ><span class="hide-menu"> BT Rangepicker</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a
                                            href="form-picker-bootstrap-datepicker.html"
                                            class="sidebar-link"
                                        ><i class="mdi mdi-calendar-check"></i
                                            ><span class="hide-menu"> BT Datepicker</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a
                                            href="form-picker-material-datepicker.html"
                                            class="sidebar-link"
                                        ><i class="mdi mdi-calendar-text"></i
                                            ><span class="hide-menu">
                            Material Datepicker</span
                                            ></a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link has-arrow waves-effect waves-dark"
                                    href="javascript:void(0)"
                                    aria-expanded="false"
                                ><i class="mdi mdi-dns"></i
                                    ><span class="hide-menu">Form Editor</span></a
                                >
                                <ul aria-expanded="false" class="collapse second-level">
                                    <li class="sidebar-item">
                                        <a href="form-editor-ckeditor.html" class="sidebar-link"
                                        ><i class="mdi mdi-drawing"></i
                                            ><span class="hide-menu">Ck Editor</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-editor-quill.html" class="sidebar-link"
                                        ><i class="mdi mdi-drupal"></i
                                            ><span class="hide-menu">Quill Editor</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a
                                            href="form-editor-summernote.html"
                                            class="sidebar-link"
                                        ><i class="mdi mdi-brightness-6"></i
                                            ><span class="hide-menu">Summernote Editor</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="form-editor-tinymce.html" class="sidebar-link"
                                        ><i class="mdi mdi-bowling"></i
                                            ><span class="hide-menu">Tinymce Edtor</span></a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="form-wizard.html"
                                    aria-expanded="false"
                                ><i class="mdi mdi-cube-send"></i
                                    ><span class="hide-menu">Form Wizard</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="form-repeater.html"
                                    aria-expanded="false"
                                ><i class="mdi mdi-creation"></i
                                    ><span class="hide-menu">Form Repeater</span></a
                                >
                            </li>
                        </ul>
                    </li>
                    <li class="nav-small-cap">
                        <i class="mdi mdi-dots-horizontal"></i>
                        <span class="hide-menu">Tables</span>
                    </li>
                    <li class="sidebar-item">
                        <a
                            class="sidebar-link has-arrow waves-effect waves-dark"
                            href="javascript:void(0)"
                            aria-expanded="false"
                        ><i class="mdi mdi-table"></i
                            ><span class="hide-menu">Tables</span></a
                        >
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link has-arrow waves-effect waves-dark"
                                    href="javascript:void(0)"
                                    aria-expanded="false"
                                ><i class="mdi mdi-border-none"></i
                                    ><span class="hide-menu">Bootstrap Tables</span></a
                                >
                                <ul aria-expanded="false" class="collapse second-level">
                                    <li class="sidebar-item">
                                        <a href="table-basic.html" class="sidebar-link"
                                        ><i class="mdi mdi-border-all"></i
                                            ><span class="hide-menu">Basic Table </span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="table-dark-basic.html" class="sidebar-link"
                                        ><i class="mdi mdi-border-left"></i
                                            ><span class="hide-menu">Dark Basic Table </span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="table-sizing.html" class="sidebar-link"
                                        ><i class="mdi mdi-border-outside"></i
                                            ><span class="hide-menu">Sizing Table </span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a
                                            href="table-layout-coloured.html"
                                            class="sidebar-link"
                                        ><i class="mdi mdi-border-bottom"></i
                                            ><span class="hide-menu"
                                            >Coloured Table Layout</span
                                            ></a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link has-arrow waves-effect waves-dark"
                                    href="javascript:void(0)"
                                    aria-expanded="false"
                                ><i class="mdi mdi-border-inside"></i
                                    ><span class="hide-menu">Datatables</span></a
                                >
                                <ul aria-expanded="false" class="collapse second-level">
                                    <li class="sidebar-item">
                                        <a
                                            href="table-datatable-basic.html"
                                            class="sidebar-link"
                                        ><i class="mdi mdi-border-vertical"></i
                                            ><span class="hide-menu">
                            Basic Initialisation</span
                                            ></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="table-datatable-api.html" class="sidebar-link"
                                        ><i class="mdi mdi-blur-linear"></i
                                            ><span class="hide-menu"> API</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a
                                            href="table-datatable-advanced.html"
                                            class="sidebar-link"
                                        ><i class="mdi mdi-border-style"></i
                                            ><span class="hide-menu">
                            Advanced Initialisation</span
                                            ></a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="table-jsgrid.html"
                                    aria-expanded="false"
                                ><i class="mdi mdi-border-top"></i
                                    ><span class="hide-menu">Table Jsgrid</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="table-responsive.html"
                                    aria-expanded="false"
                                ><i class="mdi mdi-border-style"></i
                                    ><span class="hide-menu">Table Responsive</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="table-footable.html"
                                    aria-expanded="false"
                                ><i class="mdi mdi-tab-unselected"></i
                                    ><span class="hide-menu">Table Footable</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="table-bootstrap.html"
                                    aria-expanded="false"
                                ><i class="mdi mdi-border-outside"></i
                                    ><span class="hide-menu">Table Bootstrap</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="table-editable.html"
                                    aria-expanded="false"
                                ><i class="mdi mdi-table-edit"></i
                                    ><span class="hide-menu">Table Editable</span></a
                                >
                            </li>
                        </ul>
                    </li>
                    <li class="nav-small-cap">
                        <i class="mdi mdi-dots-horizontal"></i>
                        <span class="hide-menu">Charts</span>
                    </li>
                    <li class="sidebar-item">
                        <a
                            class="
                    sidebar-link
                    has-arrow
                    waves-effect waves-dark
                    sidebar-link
                  "
                            href="javascript:void(0)"
                            aria-expanded="false"
                        ><i class="mdi mdi-image-filter-tilt-shift"></i
                            ><span class="hide-menu"> Charts</span></a
                        >
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link has-arrow waves-effect waves-dark"
                                    href="javascript:void(0)"
                                    aria-expanded="false"
                                ><i class="mdi mdi-chart-bubble"></i
                                    ><span class="hide-menu">Apex Charts</span></a
                                >
                                <ul aria-expanded="false" class="collapse second-level">
                                    <li class="sidebar-item">
                                        <a href="chart-apex-line.html" class="sidebar-link"
                                        ><i class="mdi mdi-chart-line"></i>
                                            <span class="hide-menu">Apex Line Chart</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="chart-apex-area.html" class="sidebar-link"
                                        ><i class="mdi mdi-chart-areaspline"></i>
                                            <span class="hide-menu">Apex Area Chart</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="chart-apex-bar.html" class="sidebar-link"
                                        ><i class="mdi mdi-chart-gantt"></i>
                                            <span class="hide-menu">Apex Bar Chart</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="chart-apex-pie.html" class="sidebar-link"
                                        ><i class="mdi mdi-chart-pie"></i>
                                            <span class="hide-menu">Apex Pie Chart</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="chart-apex-radial.html" class="sidebar-link"
                                        ><i class="mdi mdi-chart-arc"></i>
                                            <span class="hide-menu">Apex Radial Chart</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="chart-apex-radar.html" class="sidebar-link"
                                        ><i class="mdi mdi-hexagon-outline"></i>
                                            <span class="hide-menu">Apex Radar Chart</span></a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="chart-morris.html"
                                    aria-expanded="false"
                                ><i class="mdi mdi-image-filter-tilt-shift"></i
                                    ><span class="hide-menu"> Morris Chart</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="chart-flot.html"
                                    aria-expanded="false"
                                ><i class="mdi mdi-image-filter-tilt-shift"></i
                                    ><span class="hide-menu"> Flot Chart</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="chart-chart-js.html"
                                    aria-expanded="false"
                                ><i class="mdi mdi-svg"></i
                                    ><span class="hide-menu">Chartjs</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="chart-sparkline.html"
                                    aria-expanded="false"
                                ><i class="mdi mdi-chart-histogram"></i
                                    ><span class="hide-menu">Sparkline Chart</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="chart-chartist.html"
                                    aria-expanded="false"
                                ><i class="mdi mdi-blur"></i
                                    ><span class="hide-menu">Chartis Chart</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link has-arrow waves-effect waves-dark"
                                    href="javascript:void(0)"
                                    aria-expanded="false"
                                ><i class="mdi mdi-chemical-weapon"></i
                                    ><span class="hide-menu">C3 Charts</span></a
                                >
                                <ul aria-expanded="false" class="collapse second-level">
                                    <li class="sidebar-item">
                                        <a href="chart-c3-axis.html" class="sidebar-link"
                                        ><i class="mdi mdi-arrange-bring-to-front"></i>
                                            <span class="hide-menu">Axis Chart</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="chart-c3-bar.html" class="sidebar-link"
                                        ><i class="mdi mdi-arrange-send-to-back"></i>
                                            <span class="hide-menu">Bar Chart</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="chart-c3-data.html" class="sidebar-link"
                                        ><i class="mdi mdi-backup-restore"></i>
                                            <span class="hide-menu">Data Chart</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="chart-c3-line.html" class="sidebar-link"
                                        ><i class="mdi mdi-backburger"></i>
                                            <span class="hide-menu">Line Chart</span></a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a
                                    class="sidebar-link has-arrow waves-effect waves-dark"
                                    href="javascript:void(0)"
                                    aria-expanded="false"
                                ><i class="mdi mdi-chart-areaspline"></i
                                    ><span class="hide-menu">Echarts</span></a
                                >
                                <ul aria-expanded="false" class="collapse second-level">
                                    <li class="sidebar-item">
                                        <a href="chart-echart-basic.html" class="sidebar-link"
                                        ><i class="mdi mdi-chart-line"></i>
                                            <span class="hide-menu">Basic Charts</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="chart-echart-bar.html" class="sidebar-link"
                                        ><i class="mdi mdi-chart-scatterplot-hexbin"></i>
                                            <span class="hide-menu">Bar Chart</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a
                                            href="chart-echart-pie-doughnut.html"
                                            class="sidebar-link"
                                        ><i class="mdi mdi-chart-pie"></i>
                                            <span class="hide-menu"
                                            >Pie &amp; Doughnut Chart</span
                                            ></a
                                        >
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-small-cap">
                        <i class="mdi mdi-dots-horizontal"></i>
                        <span class="hide-menu">Sample Pages</span>
                    </li>
                    <li class="sidebar-item mega-dropdown">
                        <a
                            class="sidebar-link has-arrow waves-effect waves-dark"
                            href="javascript:void(0)"
                            aria-expanded="false"
                        ><i class="mdi mdi-book-open-variant"></i
                            ><span class="hide-menu">Pages </span></a
                        >
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="authentication-login1.html" class="sidebar-link"
                                ><i class="mdi mdi-account-key"></i
                                    ><span class="hide-menu"> Login </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="starter-kit.html" class="sidebar-link"
                                ><i class="mdi mdi-crop-free"></i>
                                    <span class="hide-menu">Starter Kit</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="pages-animation.html" class="sidebar-link"
                                ><i class="mdi mdi-debug-step-over"></i>
                                    <span class="hide-menu">Animation</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="pages-search-result.html" class="sidebar-link"
                                ><i class="mdi mdi-search-web"></i>
                                    <span class="hide-menu">Search Result</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="authentication-login2.html" class="sidebar-link"
                                ><i class="mdi mdi-account-key"></i
                                    ><span class="hide-menu"> Login 2 </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="pages-gallery.html" class="sidebar-link"
                                ><i class="mdi mdi-camera-iris"></i>
                                    <span class="hide-menu">Gallery</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="pages-treeview.html" class="sidebar-link"
                                ><i class="mdi mdi-file-tree"></i>
                                    <span class="hide-menu">Treeview</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="pages-block-ui.html" class="sidebar-link"
                                ><i class="mdi mdi-codepen"></i>
                                    <span class="hide-menu">Block UI</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="authentication-login3.html" class="sidebar-link"
                                ><i class="mdi mdi-account-key"></i
                                    ><span class="hide-menu"> Login 3 </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="pages-session-timeout.html" class="sidebar-link"
                                ><i class="mdi mdi-timer-off"></i>
                                    <span class="hide-menu">Session Timeout</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a
                                    href="pages-session-idle-timeout.html"
                                    class="sidebar-link"
                                ><i class="mdi mdi-timer-sand-empty"></i>
                                    <span class="hide-menu">Session Idle Timeout</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="pages-utility-classes.html" class="sidebar-link"
                                ><i class="mdi mdi-tune"></i>
                                    <span class="hide-menu">Helper Classes</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="authentication-register1.html" class="sidebar-link"
                                ><i class="mdi mdi-account-plus"></i
                                    ><span class="hide-menu"> Register</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="pages-maintenance.html" class="sidebar-link"
                                ><i class="mdi mdi-camera-iris"></i>
                                    <span class="hide-menu">Maintenance Page</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-user-card.html" class="sidebar-link"
                                ><i class="mdi mdi-account-box"></i>
                                    <span class="hide-menu"> User Card </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="pages-profile.html" class="sidebar-link"
                                ><i class="mdi mdi-account-network"></i
                                    ><span class="hide-menu"> User Profile</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="authentication-register2.html" class="sidebar-link"
                                ><i class="mdi mdi-account-plus"></i
                                    ><span class="hide-menu"> Register 2</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="ui-user-contacts.html" class="sidebar-link"
                                ><i class="mdi mdi-account-star-variant"></i
                                    ><span class="hide-menu"> User Contact</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="pages-invoice.html" class="sidebar-link"
                                ><i class="mdi mdi-vector-triangle"></i
                                    ><span class="hide-menu"> Invoice Layout </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="pages-invoice-list.html" class="sidebar-link"
                                ><i class="mdi mdi-vector-rectangle"></i
                                    ><span class="hide-menu"> Invoice List</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a
                                    href="authentication-lockscreen.html"
                                    class="sidebar-link"
                                ><i class="mdi mdi-account-off"></i
                                    ><span class="hide-menu"> Lockscreen</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="map-google.html" class="sidebar-link"
                                ><i class="mdi mdi-google-maps"></i
                                    ><span class="hide-menu"> Google Map </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="map-vector.html" class="sidebar-link"
                                ><i class="mdi mdi-map-marker-radius"></i
                                    ><span class="hide-menu"> Vector Map</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="icon-material.html" class="sidebar-link"
                                ><i class="mdi mdi-emoticon"></i>
                                    <span class="hide-menu"> Material Icons </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a
                                    href="authentication-recover-password.html"
                                    class="sidebar-link"
                                ><i class="mdi mdi-account-convert"></i
                                    ><span class="hide-menu"> Recover password</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="eco-products.html" class="sidebar-link"
                                ><i class="mdi mdi-cards-variant"></i>
                                    <span class="hide-menu">Eco - Products</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="icon-fontawesome.html" class="sidebar-link"
                                ><i class="mdi mdi-emoticon-cool"></i
                                    ><span class="hide-menu"> Fontawesome Icons</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="icon-themify.html" class="sidebar-link"
                                ><i class="mdi mdi-chart-bubble"></i
                                    ><span class="hide-menu"> Themify Icons</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="icon-weather.html" class="sidebar-link"
                                ><i class="mdi mdi-weather-cloudy"></i
                                    ><span class="hide-menu"> Weather Icons</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="eco-products-cart.html" class="sidebar-link"
                                ><i class="mdi mdi-cart"></i>
                                    <span class="hide-menu">Eco- Products Cart</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="icon-simple-lineicon.html" class="sidebar-link"
                                ><i class="mdi mdi mdi-image-broken-variant"></i>
                                    <span class="hide-menu"> Simple Line icons</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="icon-flag.html" class="sidebar-link"
                                ><i class="mdi mdi-flag-triangle"></i
                                    ><span class="hide-menu"> Flag Icons</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="timeline-center.html" class="sidebar-link"
                                ><i class="mdi mdi-clock-fast"></i>
                                    <span class="hide-menu"> Center Timeline </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="eco-products-edit.html" class="sidebar-link"
                                ><i class="mdi mdi-cart-plus"></i>
                                    <span class="hide-menu">Eco- Products Edit</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="timeline-horizontal.html" class="sidebar-link"
                                ><i class="mdi mdi-clock-end"></i
                                    ><span class="hide-menu"> Horizontal Timeline</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="timeline-left.html" class="sidebar-link"
                                ><i class="mdi mdi-clock-in"></i
                                    ><span class="hide-menu"> Left Timeline</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="timeline-right.html" class="sidebar-link"
                                ><i class="mdi mdi-clock-start"></i
                                    ><span class="hide-menu"> Right Timeline</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="eco-products-detail.html" class="sidebar-link"
                                ><i class="mdi mdi-camera-burst"></i>
                                    <span class="hide-menu">Eco- Product Details</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="error-400.html" class="sidebar-link"
                                ><i class="mdi mdi-alert-outline"></i>
                                    <span class="hide-menu"> Error 400 </span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="error-403.html" class="sidebar-link"
                                ><i class="mdi mdi-alert-outline"></i
                                    ><span class="hide-menu"> Error 403</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="error-404.html" class="sidebar-link"
                                ><i class="mdi mdi-alert-outline"></i
                                    ><span class="hide-menu"> Error 404</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="eco-products-orders.html" class="sidebar-link"
                                ><i class="mdi mdi-chart-pie"></i>
                                    <span class="hide-menu">Eco- Product Orders</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="error-500.html" class="sidebar-link"
                                ><i class="mdi mdi-alert-outline"></i
                                    ><span class="hide-menu"> Error 500</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="error-503.html" class="sidebar-link"
                                ><i class="mdi mdi-alert-outline"></i
                                    ><span class="hide-menu"> Error 503</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="eco-products-checkout.html" class="sidebar-link"
                                ><i class="mdi mdi-clipboard-check"></i>
                                    <span class="hide-menu">Eco- Products Checkout</span></a
                                >
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a
                            class="sidebar-link has-arrow waves-effect waves-dark"
                            href="javascript:void(0)"
                            aria-expanded="false"
                        ><i class="mdi mdi-arrange-send-backward"></i
                            ><span class="hide-menu">DD</span></a
                        >
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="javascript:void(0)" class="sidebar-link"
                                ><i class="mdi mdi-octagram"></i
                                    ><span class="hide-menu"> item 1.1</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a href="javascript:void(0)" class="sidebar-link"
                                ><i class="mdi mdi-octagram"></i
                                    ><span class="hide-menu"> item 1.2</span></a
                                >
                            </li>
                            <li class="sidebar-item">
                                <a
                                    class="has-arrow sidebar-link"
                                    href="javascript:void(0)"
                                    aria-expanded="false"
                                ><i class="mdi mdi-playlist-plus"></i>
                                    <span class="hide-menu">Menu 1.3</span></a
                                >
                                <ul aria-expanded="false" class="collapse second-level">
                                    <li class="sidebar-item">
                                        <a href="javascript:void(0)" class="sidebar-link"
                                        ><i class="mdi mdi-octagram"></i
                                            ><span class="hide-menu"> item 1.3.1</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="javascript:void(0)" class="sidebar-link"
                                        ><i class="mdi mdi-octagram"></i
                                            ><span class="hide-menu"> item 1.3.2</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="javascript:void(0)" class="sidebar-link"
                                        ><i class="mdi mdi-octagram"></i
                                            ><span class="hide-menu"> item 1.3.3</span></a
                                        >
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="javascript:void(0)" class="sidebar-link"
                                        ><i class="mdi mdi-octagram"></i
                                            ><span class="hide-menu"> item 1.3.4</span></a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a href="javascript:void(0)" class="sidebar-link"
                                ><i class="mdi mdi-playlist-check"></i
                                    ><span class="hide-menu"> item 1.4</span></a
                                >
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- -------------------------------------------------------------- -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- -------------------------------------------------------------- -->
    <!-- -------------------------------------------------------------- -->
    <!-- Page wrapper  -->
    <!-- -------------------------------------------------------------- -->
    <div class="page-wrapper">
        <!-- -------------------------------------------------------------- -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- -------------------------------------------------------------- -->
        <div class="row page-titles">
            <div class="col-md-5 col-12 align-self-center">
                <h3 class="text-themecolor mb-0">Dashboard</h3>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0)">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <div class="col-md-7 col-12 align-self-center d-none d-md-block">

            </div>
        </div>
        <!-- End Bread crumb and right sidebar toggle -->

        <!-- Container fluid  -->
        <div class="container-fluid">

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
<script src="{{ asset('js/medhistoria/app.init.horizontal.js') }}"></script>
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
