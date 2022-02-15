@php
$user = Auth::user();
@endphp
<!-- Botón de despliegue -->
<div class="btn_menu_burguer">
    <label for="nav_toggle">
        <span class="fas fa-bars"></span>
    </label>
</div>
<!-- Usuario  -->
<div class="dropdown dropdwon_user_header d-flex">
    <button class="btn_dropdwon" type="button" data-toggle="dropdown">
        <div class="d-flex align-items-center">
            <img class="img_user_header" src="{{ isset($user->photo) ? asset('tenancy/' . $user->photo):asset('img/img-temp/user-avatar.png') }}" alt="">
            <div>
                <h5 class="text_h5">¡{{ __('trans.welcome') }}!</h5><h5 class="text_h5">{{ "$user->name $user->last_name" }}</h5>
            </div>
        </div>
    </button>

    <div class="dropdown-menu dropdown content_dropdown">
        <a class="dropdown-item" href="#"></a>
        <div class="dropdown-divider"></div> <!-- linea inferior  -->
        <a class="dropdown-item" href="#"></a>
        <div class="dropdown-divider"></div><!-- linea inferior  -->
        <form method="POST" action="{{ route('medhistoria.logout') }}">
            @csrf
            <button class="dropdown-item" onclick="event.preventDefault();this.closest('form').submit();">
                {{ __('trans.log-out') }}
            </button>
        </form>
    </div>
</div>
