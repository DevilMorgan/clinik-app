<!DOCTYPE html>
<html dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, material pro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, material design, material dashboard bootstrap 5 dashboard template"/>
    <meta name="description" content="Material Pro is powerful and clean admin dashboard template"/>
    <meta name="robots" content="noindex,nofollow" />
    <title>Material Pro Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro/"/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/medhistoria/favicon.png') }}"/>
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
<div class="main-wrapper">
    <!-- -------------------------------------------------------------- -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- -------------------------------------------------------------- -->
    <div class="preloader">
        <img src="{{ asset('img/medhistoria/coup.svg') }}" alt="">
    </div>
    <!-- -------------------------------------------------------------- -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- -------------------------------------------------------------- -->
    <!-- -------------------------------------------------------------- -->
    <!-- Login box.scss -->
    <!-- -------------------------------------------------------------- -->
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center"
         style="background: url('{{ asset('img/medhistoria/background/login-register.jpg') }}') no-repeat center center; background-size: cover;">
        <div class="auth-box p-4 bg-white rounded">
            <div id="loginform">
                <div class="logo">
                    <h3 class="box-title mb-3">Sign In</h3>
                </div>
                <!-- Form -->
                <div class="row">
                    <div class="col-12">
                        <form class="form-horizontal mt-3 form-material" id="loginform" action="{{ route('medhistoria.login') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="">
                                    <input class="form-control" type="text" required id="email" name="email"
                                           placeholder="{{ __('trans.email') }}" value="{{ old('email') }}"/>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="">
                                    <input class="form-control" type="password" required id="password" name="password"
                                           placeholder="{{ __('trans.password') }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-flex">
                                    <div class="checkbox checkbox-info pt-0">
                                        <input
                                            id="checkbox-signup"
                                            type="checkbox"
                                            class="material-inputs chk-col-indigo"
                                        />
                                        <label for="checkbox-signup"> Remember me </label>
                                    </div>
                                    <div class="ms-auto">
                                        @if(Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" id="to-recover" class="link font-weight-medium">
                                                <i class="fa fa-lock me-1"></i> {{ __('trans.recovery-password') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center mt-4 mb-3">
                                <div class="col-xs-12">
                                    <button class="btn btn-info d-block w-100 waves-effect waves-light" type="submit">
                                        Log In
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
                                    <div class="social mb-3">
                                        <a href="javascript:void(0)" class="btn btn-facebook" data-bs-toggle="tooltip" title="Login with Facebook">
                                            <i aria-hidden="true" class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-googleplus" data-bs-toggle="tooltip" title="Login with Google">
                                            <i aria-hidden="true" class="fab fa-google"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0 mt-4">
                                <div class="col-sm-12 justify-content-center d-flex">
                                    <p>
                                        Don't have an account?
                                        <a href="authentication-register1.html" class="text-info font-weight-medium ms-1">
                                            Sign Up
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="recoverform">
                <div class="logo">
                    <h3 class="font-weight-medium mb-3">Recover Password</h3>
                    <span class="text-muted">Enter your Email and instructions will be sent to you!</span>
                </div>
                <div class="row mt-3 form-material">
                    <!-- Form -->
                    <form class="col-12" action="index.html">
                        <!-- email -->
                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" type="email" required="" placeholder="Username"/>
                            </div>
                        </div>
                        <!-- pwd -->
                        <div class="row mt-3">
                            <div class="col-12">
                                <button class="btn d-block w-100 btn-primary text-uppercase" type="submit" name="action">
                                    Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- All Required js -->
<script src="{{ mix('js/med-historia.js') }}"></script>
<!-- This page plugin js -->
<script>
    $(".preloader").fadeOut();
    // Login and Recover Password
    $("#to-recover").on("click", function () {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
</script>


</body>
</html>
