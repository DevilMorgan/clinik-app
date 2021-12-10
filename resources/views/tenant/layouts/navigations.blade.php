@php
$user = Auth::user();
@endphp
<!-- Sidebar lateral-->
<div class="sidebar containt_sidebar">
    <div style="background: white" class="logo py-2">  <!-- Sección del logo -->
        <img src="{{ asset('img/logo/clinikapp-logo.png') }}" alt="logo">
    </div>

    <div style="background: white" class="mini_logo py-2">  <!-- Sección del logo -->
        <img src="{{ asset('img/logo/clinikapp-logo_short.png') }}" alt="logo">
    </div>

    <!-- Menú-->
    <div class="sidebar_menu">
        <div class="section_img p-2">
            <img class="img_sidebar" src="{{ isset($user->photo) ? asset('tenancy/' . $user->photo):asset('img/img-temp/user-avatar.png') }}" alt="user">
            <span class="text_sidebar pl-2">{{ "$user->name $user->last_name" }}</span>
        </div>

        <ul class="m-0 py-4">            
            <li class="tool_tip right">
                <a href="{{ route('tenant.home') }}" class="{{ request()->routeIs('tenant.home') ? 'active' : '' }}">
                    <i class="fas fa-home"></i> <span>{{ __('trans.home') }}</span>
                </a>
                <span class="tiptext">{{ __('trans.home') }}</span>
            </li>
            <!-- Manager -->
            @if($user->is_access('users'))
                <li class="tool_tip right">
                    <a href="{{ route('tenant.manager.users.index') }}" class="{{ request()->routeIs('tenant.manager.users.*') ? 'active' : '' }}">
                        <i class="fas fa-user"></i> <span>{{ __('trans.users') }}</span>
                    </a>
                    <span class="tiptext">{{ __('trans.users') }}</span>
                </li>
            @endif

            @if($user->is_access('manager-medical-history'))
                <li class="tool_tip right">
                    <a href="{{ route('tenant.manager.models-medical-history.index') }}" class="{{ request()->routeIs('tenant.manager.models-medical-history.*') ? 'active' : '' }}">
                        <i class="fas fa-file-signature"></i> <span>{{ __('trans.models-medical-history') }}</span>
                    </a>
                    <span class="tiptext">{{ __('trans.models-medical-history') }}</span>
                </li>

                <li class="tool_tip right">
                    <a href="{{ route('tenant.manager.history-medical-categories.index') }}" class="{{ request()->routeIs('tenant.manager.history-medical-categories.*') ? 'active' : '' }}">
                        <i class="fas fa-file-signature"></i> <span>{{ __('trans.history-medical-categories') }}</span>
                    </a>
                    <span class="tiptext">{{ __('trans.history-medical-categories') }}</span>
                </li>

                <li class="tool_tip right">
                    <a href="{{ route('tenant.manager.history-medical-variables.index') }}" class="{{ request()->routeIs('tenant.manager.history-medical-variables.*') ? 'active' : '' }}">
                        <i class="fas fa-file-signature"></i> <span>{{ __('trans.history-medical-variables') }}</span>
                    </a>
                    <span class="tiptext">{{ __('trans.history-medical-variables') }}</span>
                </li>
            @endif

            @if($user->is_access('clinics'))
                <li class="tool_tip right">
                    <a href="{{ route('tenant.manager.clinics.index') }}" class="{{ request()->routeIs('tenant.manager.clinics.*') ? 'active' : '' }}">
                        <i class="fas fa-hospital"></i> <span>{{ __('trans.clinics') }}</span>
                    </a>
                    <span class="tiptext">{{ __('trans.clinics') }}</span>
                </li>
            @endif

            @if($user->is_access('provider-service'))
                <li class="tool_tip right">
                    <a href="{{ route('tenant.manager.provider-service.index') }}" class="{{ request()->routeIs('tenant.manager.provider-service.*') ? 'active' : '' }}">
                        <i class="fab fa-servicestack"></i> <span>{{ __('manager.provider-service') }}</span>
                    </a>
                    <span class="tiptext">{{ __('manager.provider-service') }}</span>
                </li>
            @endif

            <!-- Operative -->
            <!-- {{--@if($user->is_access('medical-history')) --}}
            {{--    <li class="tool_tip right"> --}}
            {{--        <a href="{{ route('tenant.operative.medical-history.index') }}" --}}
            {{--           class="{{ request()->routeIs('tenant.operative.medical-history.*') ? 'active' : '' }}"> --}}
            {{--            <i class="fas fa-file-signature"></i> <span>{{ __('trans.medical-history') }}</span> --}}
            {{--        </a> --}}
            {{--        <span class="tiptext">{{ __('trans.medical-history') }}</span> --}}
            {{--    </li> --}}
            {{--@endif --}}
            @if($user->is_access('calendar-operative')) -->

            <li class="tool_tip right">
                <a href="{{ route('tenant.operative.calendar.index') }}" class="{{ request()->routeIs('tenant.operative.calendar.*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-alt"></i> <span>{{ __('trans.calendar-operative') }}</span>
                </a>
                <span class="tiptext">{{ __('trans.calendar-operative') }}</span>
            </li>
            @endif

            @if($user->is_access('date-types'))
                <li class="tool_tip right">
                    <a href="{{ route('tenant.operative.date-type.index') }}" class="{{ request()->routeIs('tenant.operative.date-type.*') ? 'active' : '' }}">
                        <i class="fas fa-receipt"></i> <span>{{ __('trans.date-types') }}</span>
                    </a>
                    <span class="tiptext">{{ __('trans.date-types') }}</span>
                </li>
            @endif

            @if($user->is_access('calendar-operative'))
                <li class="tool_tip right">
                    <a href="{{ route('tenant.operative.agreement.index') }}" class="{{ request()->routeIs('tenant.operative.agreement.*') ? 'active' : '' }}">
                        <i class="fas fa-handshake"></i> <span>{{ __('trans.agreements') }}</span>
                    </a>
                    <span class="tiptext">{{ __('trans.agreements') }}</span>
                </li>
            @endif

            @if($user->is_access('consents'))
                <li class="tool_tip right">
                    <a href="{{ route('tenant.operative.consent.index') }}" class="{{ request()->routeIs('tenant.operative.consent.*') ? 'active' : '' }}">
                        <i class="fas fa-handshake"></i> <span>{{ __('trans.consent') }}</span>
                    </a>
                    <span class="tiptext">{{ __('trans.consent') }}</span>
                </li>
            @endif

            @if($user->is_access('patients-operative'))
                <li class="tool_tip right">
                    <a href="{{ route('tenant.patients.index') }}" class="{{ request()->routeIs('tenant.patients.*') ? 'active' : '' }}">
                        <i class="fas fa-user-injured"></i> <span>{{ __('trans.patients-operative') }}</span>
                    </a>
                    <span class="tiptext">{{ __('trans.patients-operative') }}</span>
                </li>
            @endif

            <!-- Administrative -->
            @if($user->is_access('patients-administrative'))
                <li class="tool_tip right">
                    <a href="{{ route('tenant.patients.index') }}" class="{{ request()->routeIs('tenant.patients.*') ? 'active' : '' }}">
                        <i class="fas fa-user-injured"></i> <span>{{ __('trans.patients-administrative') }}</span>
                    </a>
                    <span class="tiptext">{{ __('trans.patients-administrative') }}</span>
                </li>
            @endif
            
            @if($user->is_access('calendar-administrative'))
                <li class="tool_tip right">
                    <a href="{{ route('tenant.administrative.calendar.index') }}" class="{{ request()->routeIs('tenant.administrative.calendar.*') ? 'active' : '' }}">
                        <i class="fas fa-calendar-alt"></i> <span>{{ __('trans.calendar-administrative') }}</span>
                    </a>
                    <span class="tiptext">{{ __('trans.calendar-administrative') }}</span>
                </li>
            @endif

            <!-- {{--<li class="tool_tip right"> --}}
            {{--    <a href="#"> --}}
            {{--        <i class="fas fa-book-medical"></i><span>{{ __('trans.reports') }}</span> --}}
            {{--    </a> --}}
            {{--    <span class="tiptext">{{ __('trans.calendar-administrative') }}</span> --}}
            {{--</li> --}} -->
        </ul>
    </div>
</div>
