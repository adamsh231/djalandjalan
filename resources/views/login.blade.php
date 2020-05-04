<!DOCTYPE html>
<html lang="en">

<head>
    <title>Masuk | djalandjalan.com</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('template/images/icons/favicon.ico')}}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('template/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('template/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('template/css/login.css')}}">
    <!--===============================================================================================-->
</head>

<body>
    <div class="container">

        <div class="signup clearfix">
            <button class="btn btn-daftar" onclick="window.location.href = '{{ url('/register') }}';">Daftar</button>
        </div>

        <div class="row" style="margin-top:50px;">
            <div class="col-lg-4">
                <div class="form-login">
                    <div class="card card-signin">
                        <div class="card-body">
                            <div class="header text-center">
                                <a href="{{ url('/') }}" class="logo"><img src="{{asset('template/assets/img/LogoH-1.svg')}}"></a>
                            </div>
                            <form class="form-signin" id="form_login">
                                <div class="form-label-group">
                                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                                    <label for="inputEmail">Email</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                                    <label for="inputPassword">Password</label>
                                </div>

                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Ingat saya</label>
                                </div>
                            </form>
                            <button class="btn btn-lg btn-block text-uppercase btn-login" type="submit" onclick="submit()">Masuk</button>
                            <div class="text-center" style="padding: 10px 0 10px 0">
                                <span class="txt1">
                                    Atau masuk dengan
                                </span>
                            </div>
                            <a href="{{ url('/login/google') }}" class="btn btn-lg btn-google btn-block" type="submit">
                                <i class="fa fa-google mr-2"></i>
                                Google
                            </a>
                            <div class="text-center w-full p-t-25">
                                <span class="txt1">
                                    Belum punya akun?
                                </span>
                                <a class="txt1 bo1 hov1" href="{{url('/register')}}">
                                    Daftar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="bg-login">
                    <img src="{{asset('template/assets/img/journey.png')}}">
                </div>
            </div>
        </div>

        <div class="features">
            <div class="row">
                <div class="col">
                    <div class="feature text-center">
                        <div class="feature-icon">
                            <img src="{{asset('template/assets/img/no-money.png')}}">
                        </div>
                        <p class="feature-text ">Tanpa biaya sepersen pun! </p>
                    </div>
                </div>

                <div class="col">
                    <div class="feature text-center">
                        <div class="feature-icon">
                            <img src="{{asset('template/assets/img/calendar.png')}}">
                        </div>
                        <p class="feature-text ">Atur tripmu sesuai seleramu! </p>
                    </div>
                </div>
                <div class="col">
                    <div class="feature text-center">
                        <div class="feature-icon">
                            <img src="{{asset('template/assets/img/safe.png')}}">
                        </div>
                        <p class="feature-text ">Aman dan dapat dipercaya! </p>
                    </div>
                </div>
                <div class="col">
                    <div class="feature text-center">
                        <div class="feature-icon">
                            <img src="{{asset('template/assets/img/trust.png')}}">
                        </div>
                        <p class="feature-text ">Bertemu teman baru! </p>
                    </div>
                </div>
            </div>
        </div>

        <footer id="footer" style="background-color: white; margin-top: 50px;">
            <div class="container pt-3 border-bottom">
                <div class="row">
                    <div class="col-md-3 col-sm-12 mb-3 text-center">
                        <img id="home-logo" src="{{asset('template/assets/img/logoV-1.svg')}}" width="100%" height="auto" alt="" style="position: relative">
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <div class="col-md-3 col-sm-6 col-6 p-0 float-left">
                            <h5 class="mb-4 font-weight-bold text-uppercase">Tentang</h5>
                            <ul class="list-group">
                                <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#">djalandjalan.com</a></li>
                                <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="href=" #">Partners</a></li>
                                <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#">Aksesbilitas</a></li>
                            </ul>
                        </div>

                        <div class="col-md-3 col-sm-6 col-6 mb-3 p-0 float-left">
                            <h5 class="mb-4 font-weight-bold text-uppercase">Keamanan</h5>
                            <ul class="list-group">
                                <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#"></i>Keamanan</a></li>
                                <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#"></i>Tips & Trik</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6 mb-3 p-0 float-left">
                            <h5 class="mb-4 font-weight-bold text-uppercase">Dukungan</h5>
                            <ul class="list-group">
                                <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#"></i>Bantuan</a></li>
                                <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#"></i>Syarat & Ketentuan</a></li>
                                <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#"></i>Kebijakan Privasi</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6 mb-3 p-0 float-left">
                            <h5 class="mb-4 font-weight-bold text-uppercase">Temukan Kami</h5>
                            <ul class="list-group">
                                <li class="list-group-item bg-transparent border-0 p-0 mb-2">
                                    <a href="#"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>
                                    <a href="#" style="margin-left: 10px;"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a>
                                    <a href="#" style="margin-left: 10px;"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class=" d-flex justify-content-center align-items-center">
                            <div class="container">
                                <p class="m-0 text-center">Copyright &copy; djalandjalan.com 2020</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <!--===============================================================================================-->
    <script src="{{asset('template/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('template/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('template/vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('template/js/main.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('assets/js/login.js')}}"></script>
</body>

</html>
