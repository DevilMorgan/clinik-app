<!-- Sidebar lateral-->
<div class="sidebar">
    <!-- Sección del logo -->
    <div class="sidebar_logo">
        <img src="{{ asset('img/logo/logo.png') }}" style="height: 55px; width: auto;" alt="user">
    </div>

    <!--Secciones del menu-->
    <div class="sidebar_menu">
        <div class="sidebar_user">
            <img src="{{ asset('img/logo/user.jpg') }}" alt="user">
            <span>Dra. Juliana Rodriguez</span>
        </div>

        <ul>
            <li>
                <a href="#" class="active">
                    <i class="fas fa-home"></i> <span>{{ __('trans.home') }}</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-calendar-alt"></i> <span>{{ __('trans.calendar') }}</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-file-signature"></i> <span>{{ __('trans.medical-history') }}</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-stethoscope"></i><span>{{ __('trans.doctors') }}</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-user"></i><span>{{ __('trans.users') }}</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-user-injured"></i><span>{{ __('trans.patients') }}</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-book-medical"></i><span>{{ __('trans.reports') }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
