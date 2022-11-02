<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
        <title>Login - AGENS </title>
        <link href="{{url('css/style.css')}}" rel="stylesheet">
        <!-- This page CSS -->
        <link href="{{url('css/pages/authentication.css')}}" rel="stylesheet">
        <!-- This page CSS -->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="main-wrapper">
            <!-- ============================================================== -->
            <!-- Preloader - style you can find in spinners.css -->
            <!-- ============================================================== -->
            <div class="preloader">
                <div class="loader">
                    <div class="loader__figure"></div>
                    <p class="loader__label">AGENS</p>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Preloader - style you can find in spinners.css -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Login box.scss -->
            <!-- ============================================================== -->
            <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{url('assets/images/big/auth-bg.png')}}) no-repeat center center;">
                <div class="auth-box">
                    <div id="loginform">
                        <div class="logo">
                            <span class="db"><img src="{{('assets/images/logo-light-icon.png')}}" alt="logo" /></span>
                            <h5 class="font-medium m-b-20">Login untuk Monitoring</h5>
                        </div>
                        <!-- Form -->
                        <div class="row">
                            <form class="col s12" method="POST" action="{{ route('login') }}">
                               @csrf
                               <!-- email -->
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="email" type="email" class="validate" value="{{ old('email') }}" required autocomplete="email" required name="email">
                                         @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <!-- pwd -->
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password" type="password" class="validate" required@error('password') is-invalid name="password" required autocomplete="current-password">
                                         @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <!-- pwd -->
                                <div class="row m-t-5">
                                    <div class="col s7">
                                        <label>
                                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                                            <span>Remember Me?</span>
                                        </label>
                                    </div>
                                    <div class="col s5 right-align">
                                         @if (Route::has('password.request'))
                                            <a class="link" id="to-recover" href="{{ route('password.request') }}">
                                                {{ __('Forgot Password?') }}
                                            </a></div>
                                </div>
                                <!-- pwd -->
                                <div class="row m-t-40">
                                    <div class="col s12">
                                        <button class="btn-large w100 blue accent-4" type="submit">Login</button>
                                         @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                </div>
            </div>
           
        </div>
       
        <script src="{{url('assets/libs/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{url('js/materialize.min.js')}}"></script>
        <!-- ============================================================== -->
        <script>
        $('.tooltipped').tooltip();
        // ==============================================================
        $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
        });
        $(function() {
        $(".preloader").fadeOut();
        });
        </script>
    </body>
</html>