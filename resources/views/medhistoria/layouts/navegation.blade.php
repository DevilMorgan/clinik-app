<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile position-relative" style="background: url('/img/medhistoria/background/Background-azul-usuario-13.jpg') no-repeat;
            background-position: center;">
            <!-- User profile image -->
            <div class="profile-img">
                <img src="{{ asset('img/medhistoria') }}/users/1.jpg" alt="user" class="rounded-circle" width="50"/>
            </div>

            <!-- User profile text-->
            <div class="profile-text dropdown">
                <a href="#" class="u-dropdown w-100 text-white d-block position-relative" id="dropdownMenuLink" data-bs-toggle="dropdown"
                   aria-expanded="false"> <b style="font-size: 20px">Jonathan Buenaventura</b> <p class="hide-menu fs-4 m-0">nombre@mail</p>
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
                        <span class="hide-menu fs-7" style="margin-left: 13px">Inicio</span>
                    </a>
                </li>

                <li class="sidebar-item"> <!-- Perfil -->
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="user"></i>
                        <span class="hide-menu fs-7" style="margin-left: 13px">Perfil</span>
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
                        <span class="hide-menu fs-7" style="margin-left: 13px">Pacientes</span>
                    </a>
                </li>

                <li class="sidebar-item"> <!-- Historia Clínica -->
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="folder"></i>
                        <span class="hide-menu fs-7" style="margin-left: 13px">Historia Clínica</span>
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
                        <span class="hide-menu fs-7" style="margin-left: 13px">Prescripciones</span>
                    </a>
                </li>
                <li class="sidebar-item"> <!-- Autorizaciones -->
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-calendar.html" aria-expanded="false">
                        <i data-feather="check-circle"></i>
                        <span class="hide-menu fs-7" style="margin-left: 13px">Autorizaciones</span>
                    </a>
                </li>
                <li class="sidebar-item"> <!-- Incapacidades -->
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-calendar.html" aria-expanded="false">
                        <i data-feather="activity"></i>
                        <span class="hide-menu fs-7" style="margin-left: 13px">Incapacidades</span>
                    </a>
                </li>
                <li class="sidebar-item"> <!-- RIPS -->
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-calendar.html" aria-expanded="false">
                        <i data-feather="plus-circle"></i>
                        <span class="hide-menu fs-7" style="margin-left: 13px">RIPS</span>
                    </a>
                </li>
                <li class="sidebar-item"> <!-- Vacunación -->
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-calendar.html" aria-expanded="false">
                        <i data-feather="shield"></i>
                        <span class="hide-menu fs-7" style="margin-left: 13px">Vacunación</span>
                    </a>
                </li>
                <li class="sidebar-item"> <!-- Convenios -->
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-calendar.html" aria-expanded="false">
                        <i data-feather="paperclip"></i>
                        <span class="hide-menu fs-7" style="margin-left: 13px">Convenios</span>
                    </a>
                </li>
                <li class="sidebar-item"> <!-- Contactos -->
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-calendar.html" aria-expanded="false">
                        <i data-feather="book-open"></i>
                        <span class="hide-menu fs-7" style="margin-left: 13px">Contactos</span>
                    </a>
                </li>
                <li class="sidebar-item"> <!-- Usuarios -->
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-calendar.html" aria-expanded="false">
                        <i data-feather="user-check"></i>
                        <span class="hide-menu fs-7" style="margin-left: 13px">Usuarios</span>
                    </a>
                </li>
                <li class="sidebar-item"> <!-- Agenda Médica -->
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-calendar.html" aria-expanded="false">
                        <i data-feather="clipboard"></i>
                        <span class="hide-menu fs-7" style="margin-left: 13px">Agenda Médica</span>
                    </a>
                </li>
                <li class="sidebar-item"> <!-- Citas -->
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-calendar.html" aria-expanded="false">
                        <i data-feather="bell"></i>
                        <span class="hide-menu fs-7" style="margin-left: 13px">Citas</span>
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
