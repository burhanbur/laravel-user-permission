<!DOCTYPE html>
<html lang="en">
<head>
    <title>Biondi Indonesia</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="{{ asset('assets/logo-only.png') }}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/vendor/animate/animate.css') }}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/css/main.css') }}">
<!--===============================================================================================-->

    <style>
        .login100-form {
            padding-top: 80px;
        }
    </style>
</head>
<body style="background-color: #666666;">
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        <img class="img" style="width: 250px; height: auto;" src="{{ asset('assets/logo-min.png') }}"><br>
                    </span>

                    @if (Session::get('error'))
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      {{ Session::get('error') }}
                    </div>
                    @endif
                    
                    <div class="wrap-input100" data-validate="Email or Username is required">
                        <input class="input100" type="text" name="email" value="{{ old('email') }}" required>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Username or Email</span>
                    </div>                  
                    
                    <!-- validate-input -->
                    <div class="wrap-input100" data-validate="Password is required">
                        <input class="input100" type="password" name="password" required>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            {{-- <!-- <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label> --> --}}
                            <a href="{{ route('register') }}" target="" class="txt1">
                                Register now
                            </a>
                        </div>

                        <div>
                            <a href="{{ route('password.request') }}" target="_blank" class="txt1">
                                Forgot your Password?
                            </a>
                        </div>
                    </div>
            

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>

                <div class="login100-more" style="background-image: url('{{ asset('assets/login/images/bg-01.jpg') }}">
                </div>
            </div>
        </div>
    </div>
    
<!--===============================================================================================-->
    <script src="{{ asset('assets/login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('assets/login/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('assets/login/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('assets/login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('assets/login/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('assets/login/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/login/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('assets/login/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('assets/login/js/main.js') }}"></script>
</body>
</html>