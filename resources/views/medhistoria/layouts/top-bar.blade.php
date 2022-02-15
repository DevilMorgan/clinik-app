<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>
            <!-- Logo principal -->
            <a class="navbar-brand" href="index.html">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="{{ asset('img/medhistoria/logo-icon.png') }}" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="{{ asset('img/medhistoria/logos/logo-icono-medhistoria.png') }}" class="light-logo" />
                </b>
                <!--End Logo icon -->

                <!-- Logo text -->
                <span class="logo-text">
                        <!-- dark Logo text -->
                        <img src="{{ asset('img/medhistoria/logo-text.png') }}" class="dark-logo"/>
                    <!-- Light Logo text -->
                        <img src="{{ asset('img/medhistoria/logos/logo-texto-medhistoria.png') }}" class="light-logo" style="padding-top: 10px"/>
                    </span>
                <!-- End logo text -->
            </a>
            <!-- End Logo principal -->
            <!-- Toggle which is visible on mobile only User and menssage modules hidden-->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-bs-toggle="collapse"
               data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti-more"></i>
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
                    <a class="nav-link dropdown-toggle waves-effect waves-dark content_user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('img/medhistoria') }}/users/1.jpg" alt="user" class="profile-pic rounded-circle mb-2"/>
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
                        <form method="POST" action="{{ route('medhistoria.logout') }}">
                            @csrf
                            <a class="dropdown-item" href="#" onclick="event.preventDefault();this.closest('form').submit();">
                                <i data-feather="log-out" class="feather-sm text-danger me-1 ms-1"></i>
                                {{ __('trans.log-out') }}
                            </a>
                        </form>
                        <div class="dropdown-divider"></div>
                        <div class="pl-4 p-2">
                            <a href="#" class="btn d-block w-100 btn-info rounded-pill">View Profile</a>
                        </div>
                    </div>
                </li>
                <!-- Menssage module -->
                <li class="nav-item dropdown" style="margin-right: 35px">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark content_mss" href="#"  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
