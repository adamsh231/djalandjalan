<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register | djalandjalan.com</title>
    <meta charset="UTF-8">

    <link rel="icon" href="{{asset('template/assets/img/LogoK-1.svg')}}" type="image/gif" sizes="16x16">

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
            <button class="btn btn-daftar" onclick="window.location.href = '{{ url('/login') }}';">Masuk</button>
        </div>

        <div class="row" style="margin-top:50px;">

            <div class="form-login" style="margin:0 auto;">
                <div class="card card-signin">
                    <div class="card-body">
                        <div class="header text-center">
                            <a href="{{ url('/') }}" class="logo"><img src="{{asset('template/assets/img/LogoH-1.svg')}}"></a>
                        </div>
                        <form class="form-signin" id="form_register">
                            <div class="form-label-group">
                                <input type="text" id="inputName" name="name" class="form-control" placeholder="Nama Lengkap">
                                <label for="inputName">Nama Lengkap</label>
                                <small name="name" class="form-text text-danger d-none"></small>
                            </div>

                            <div class="form-label-group">
                                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address">
                                <label for="inputEmail">Email</label>
                                <small name="email" class="form-text text-danger d-none"></small>
                            </div>

                            <div class="form-label-group">
                                <input type="text" id="inputTTL" class="form-control" placeholder="Tanggal Lahir" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'">
                                <label for="inputTTL">Tanggal Lahir</label>
                            </div>

                            <div class="form-label-group">
                                <input type="text" id="inputPhone" name="phone" class="form-control" placeholder="No. Handphone">
                                <label for="inputPhone">No. Handphone</label>
                                <small name="phone" class="form-text text-danger d-none"></small>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
                                <label for="inputPassword">Password</label>
                                <small name="password" class="form-text text-danger d-none"></small>
                            </div>

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" name="agreement" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Saya menyetujui syarat & ketentuan yang berlaku</label>
                                <small name="agreement" class="form-text text-danger d-none"></small>
                            </div>
                        </form>
                        <button class="btn btn-lg btn-block text-uppercase btn-login" type="submit" onclick="submit('{{url('/email/verify')}}')">Daftar</button>
                        <div class="text-center" style="padding: 10px 0 10px 0">
                            <span class="txt1">
                                Atau masuk dengan
                            </span>
                        </div>
                        <a class="btn btn-lg btn-google btn-block" href="{{ url('/login/google') }}"><i class="fa fa-google mr-2"></i>Google</a>
                        <div class="text-center w-full p-t-25">
                            <span class="txt1">
                                Sudah punya akun?
                            </span>
                            <a class="txt1 bo1 hov1" href="{{url('/login')}}">
                                Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer id="footer" style="background-color: white">
            <div class="container pt-5 border-bottom">
                <div class="row">
                    <div class="col-md-3 col-sm-12 mb-3 text-center">
                        <img id="home-logo" src="{{ asset('template/assets/img/logoV-1.svg') }}" width="100%" height="auto" alt="" style="position: relative">
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <div class="col-md-3 col-sm-6 col-6 p-0 float-left">
                            <h6 class="mb-4 font-weight-bold">Tentang Djalandjalan</h6>
                            <ul class="list-group">
                                <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="{{ url('/about') }}">Tentang Kami</a></li>
                                <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="{{ url('/about') }}#keamanan">Keamanan</a></li>
                                <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="{{ url('/contact') }}">Hubungi Kami</a></li>
                            </ul>
                        </div>

                        <div class="col-md-3 col-sm-6 col-6 mb-3 p-0 float-left ">
                            <h6 class="mb-4 font-weight-bold ">Layanan</h6>
                            <ul class="list-group ">
                                <li class="list-group-item bg-transparent border-0 p-0 mb-2 ">
                                    <a href="{{ url('/partners') }}"></i>Partners</a>
                                </li>
                                <li class="list-group-item bg-transparent border-0 p-0 mb-2 ">
                                    <a href="{{ url('/partners') }}#OpenTrip"></i>Marketplace Open Trip</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6 mb-3 p-0 float-left ">
                            <h6 class="mb-4 font-weight-bold ">Ketentuan Pengguna</h6>
                            <ul class="list-group ">
                                <li class="list-group-item bg-transparent border-0 p-0 mb-2 ">
                                    <a href="{{ url('/help') }}"></i>Bantuan</a>
                                </li>
                                <li class="list-group-item bg-transparent border-0 p-0 mb-2 ">
                                    <a href="{{ url('/term') }}"></i>Syarat & Ketentuan</a>
                                </li>
                                <li class="list-group-item bg-transparent border-0 p-0 mb-2 ">
                                    <a href="{{ url('/term') }}#kebijakanPrivasi "></i>Kebijakan Privasi</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-6 col-6 mb-3 p-0 float-left ">
                            <h6 class="mb-4 font-weight-bold ">Temukan Kami</h6>
                            <ul class="list-group ">
                                <li class="list-group-item bg-transparent border-0 p-0 mb-2 ">
                                    <a href="# "><i class="fa fa-twitter fa-2x " aria-hidden="true "></i></a>
                                    <a href="# " style="margin-left: 10px; "><i class="fa fa-facebook-official fa-2x " aria-hidden="true "></i></a>
                                    <a href="# " style="margin-left: 10px; "><i class="fa fa-instagram fa-2x " aria-hidden="true "></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <div class="py-4 d-flex justify-content-center align-items-center ">
                            <div class="container ">
                                <p class="m-0 text-center ">Copyright &copy; djalandjalan.com 2020</p>
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
    <script src="{{asset('assets/js/register.js')}}"></script>

</body>

</html>
