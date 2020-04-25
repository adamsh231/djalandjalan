<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register | djalandjalan.com</title>
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
            <button class="btn btn-daftar" onclick="window.location.href = '{{ url('/') }}';">Masuk</button>
        </div>

        <div class="row" style="margin-top:50px;">

            <div class="form-login" style="margin:0 auto;">
                <div class="card card-signin">
                    <div class="card-body">
                        <div class="header text-center">
                            <a href="index.html" class="logo"><img src="{{asset('template/assets/img/djalandjalanlogo.png')}}"></a>
                            <br /><span>Gabung dengan kami untuk menemukan</span>
                            <br /><span>teman travelingmu yang cocok!</span>
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
                        <button class="btn btn-lg btn-block text-uppercase btn-login" type="submit" onclick="submit('{{url('/')}}')">Daftar</button>
                        <div class="text-center" style="padding: 10px 0 10px 0">
                            <span class="txt1">
                                Atau daftar dengan
                            </span>
                        </div>
                        <button class="btn btn-lg btn-google btn-block" type="submit"><i class="fa fa-google mr-2"></i>Google</button>
                        <div class="text-center w-full p-t-25">
                            <span class="txt1">
                                Sudah punya akun?
                            </span>
                            <a class="txt1 bo1 hov1" href="{{url('/')}}">
                                Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer container">
            <div class="row">
                <div class="col-8">
                    <div class="row">
                        <div class="col"><a href="#">Tentang Kami</a></div>
                        <div class="col"><a href="#">Bantuan</a></div>
                        <div class="col"><a href="#">Syarat & Ketentuan</a></div>
                        <div class="col"><a href="#">Kebijakan Privasi</a></div>
                    </div>
                </div>
                <div class="col-4" style="text-align: right">
                    <a href="#">Temukan Kami di :</a>
                    <a href="#"><img src="{{asset('template/assets/img/twitter1.png')}}"></a>
                    <a href="#"><img src="{{asset('template/assets/img/path1.png')}}"></a>
                    <a href="#"><img src="{{asset('template/assets/img/ig1.png')}}"></a>
                </div>
            </div>
        </div>
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