<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcat icon" href="{{asset('/img/logos/zaabrasalud-favicon.png')}}">
        <link rel="icon" href="{{asset('/img/logos/zaabrasalud-favicon.png')}}">
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

        <!--    Css plugins    -->
        <link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugin/sweetalert2/sweetalert2.min.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

        <!--    Css    -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <title> Login </title>
    </head>

    <body>
        <div class="container">
            <div class="row justify-content-center mt-5 pt-md-5">
                <div class="col-10 d-flex justify-content-center p-0">
                    <img src="{{ asset('img/logo/clinikapp-logo.png') }}" alt="logo">
                </div>

                <div class="col-10 col-md-6 col-lg-5 content_login">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        {{--@if(!isset($fqdn) and $fqdn == false)--}}
                        {{--    <div class="form-group">--}}
                        {{--        <label for="sharepoint">{{__('trans.sharepoint')}}</label>--}}
                        {{--        <input type="text" class="form-control" id="sharepoint" name="sharepoint" value="{{ old('sharepoint') }}">--}}
                        {{--    </div>--}}
                        {{--@endif--}}

                        <label for="email">{{ __('trans.email') }}</label>
                        <input type="email" class="input_dataGroup_form" id="email" name="email" value="{{ old('email') }}">

                        <label for="password">{{ __('trans.password') }}</label>
                        <input type="password" class="input_dataGroup_form" id="password" name="password" autocomplete="current-password">

                        @if(Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="underline">{{ __('trans.recovery-password') }}</a>
                        @endif

                        <div class="container_button justify-content-center mt-3">
                            <button type="submit" class="button_primary px-4">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Plugins -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="{{ asset('plugin/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('plugin/sweetalert2/sweetalert2.min.js') }}"></script>

        <!-- Alerts -->
        @include('sweetalert::alert')
    </body>
</html>
