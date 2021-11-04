@php
$user = Auth::user();
@endphp
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
                <a href="{{ route('tenant.home') }}" class="{{ request()->routeIs('tenant.home') ? 'active' : '' }}">
                    <i class="fas fa-home"></i> <span>{{ __('trans.home') }}</span>
                </a>
            </li>
            <!-- Manager -->
            @if($user->is_access('users'))
                <li>
                    <a href="{{ route('tenant.manager.users.index') }}"
                       class="{{ request()->routeIs('tenant.manager.users.*') ? 'active' : '' }}">
                        <i class="fas fa-user"></i> <span>{{ __('trans.users') }}</span>
                    </a>
                </li>
            @endif
            @if($user->is_access('manager-medical-history'))
                <li>
                    <a href="{{ route('tenant.manager.models-medical-history.index') }}"
                       class="{{ request()->routeIs('tenant.manager.models-medical-history.*') ? 'active' : '' }}">
                        <i class="fas fa-file-signature"></i> <span>{{ __('trans.manager-medical-history') }}</span>
                    </a>
                </li>
            @endif

            <!-- Operative -->
            @if($user->is_access('medical-history'))
                <li>
                    <a href="{{ route('tenant.operative.medical-history.index') }}"
                       class="{{ request()->routeIs('tenant.operative.medical-history.*') ? 'active' : '' }}">
                        <i class="fas fa-file-signature"></i> <span>{{ __('trans.medical-history') }}</span>
                    </a>
                </li>
            @endif
            @if($user->is_access('calendar-operative'))
                <li>
                    <a href="{{ route('tenant.operative.calendar.index') }}"
                       class="{{ request()->routeIs('tenant.operative.calendar.*') ? 'active' : '' }}">
                        <i class="fas fa-calendar-alt"></i> <span>{{ __('trans.calendar-operative') }}</span>
                    </a>
                </li>
            @endif
            @if($user->is_access('date-types'))
                <li>
                    <a href="{{ route('tenant.operative.date-type.index') }}"
                       class="{{ request()->routeIs('tenant.operative.date-type.*') ? 'active' : '' }}">
                        <i class="fas fa-receipt"></i> <span>{{ __('trans.date-types') }}</span>
                    </a>
                </li>
            @endif
            @if($user->is_access('calendar-operative'))
                <li>
                    <a href="{{ route('tenant.operative.agreement.index') }}"
                       class="{{ request()->routeIs('tenant.operative.agreement.*') ? 'active' : '' }}">
                        <i class="fas fa-money-bill-wave"></i> <span>{{ __('trans.agreements') }}</span>
                    </a>
                </li>
            @endif
            @if($user->is_access('consent'))
                <li>
                    <a href="{{ route('tenant.operative.consent.index') }}"
                       class="{{ request()->routeIs('tenant.operative.consent.*') ? 'active' : '' }}">
                        <i class="fas fa-handshake"></i> <span>{{ __('trans.consent') }}</span>
                    </a>
                </li>
            @endif
            @if($user->is_access('patients-operative'))
                <li>
                    <a href="{{ route('tenant.patients.index') }}"
                       class="{{ request()->routeIs('tenant.patients.*') ? 'active' : '' }}">
                        <i class="fas fa-user-injured"></i> <span>{{ __('trans.patients-operative') }}</span>
                    </a>
                </li>
            @endif

            <!-- Administrative -->
            @if($user->is_access('patients-administrative'))
                <li>
                    <a href="{{ route('tenant.patients.index') }}"
                       class="{{ request()->routeIs('tenant.patients.*') ? 'active' : '' }}">
                        <i class="fas fa-user-injured"></i> <span>{{ __('trans.patients-administrative') }}</span>
                    </a>
                </li>
            @endif
            @if($user->is_access('calendar-administrative'))
                <li>
                    <a href="{{ route('tenant.administrative.calendar.index') }}"
                       class="{{ request()->routeIs('tenant.administrative.calendar.*') ? 'active' : '' }}">
                        <i class="fas fa-calendar-alt"></i> <span>{{ __('trans.calendar-administrative') }}</span>
                    </a>
                </li>
            @endif
{{--            <li>--}}
{{--                <a href="#">--}}
{{--                    <i class="fas fa-book-medical"></i><span>{{ __('trans.reports') }}</span>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </div>
</div>
