<!-- Botón de despliegue -->
<h2>
    <label for="nav_toggle">
        <span class="fas fa-bars"></span>
    </label>
</h2>
<!-- Usuario  -->
<div class="user-wrapper">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-primary" onclick="event.preventDefault();this.closest('form').submit();">
            {{ __('trans.log-out') }}
        </button>
    </form>
    <img src="{{ asset('img/logo/user.jpg') }}" width="25px" height="25px" alt="">
    <div>
        <h4>¡{{ __('trans.welcome') }}!</h4><h4>Dra. Juliana Rodriguez</h4>
    </div>
</div>
