@php
$user = Auth::user();
@endphp
<!-- Botón de despliegue -->
<h2 class="dropdown_menu_side">
    <label for="nav_toggle">
        <span class="fas fa-bars"></span>
    </label>
</h2>
<!-- Usuario  -->
<div class="dropdown dropdwon_user_header">
    <button type="button" class="btn" data-toggle="dropdown">
        <div class="user-wrapper">
            <img src="{{ isset($user->photo) ? asset('tenancy/' . $user->photo):asset('img/img-temp/user-avatar.png') }}"
                 width="25px" height="25px" alt="">

            <div>
                <h4>¡{{ __('trans.welcome') }}!</h4><h4>{{ "$user->name $user->last_name" }}</h4>
            </div>
        </div>
    </button>

    <div class="dropdown-menu dropdown">
        <a class="dropdown-item" href="#"></a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#"></a>
        <div class="dropdown-divider"></div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="dropdown-item" href="#" onclick="event.preventDefault();this.closest('form').submit();">
                {{ __('trans.log-out') }}
            </a>
        </form>
    </div>
</div>
