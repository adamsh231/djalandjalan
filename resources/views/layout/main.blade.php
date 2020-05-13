@php
//TODO: Search Engine Optimization
@endphp
<!DOCTYPE html>
<html lang="@yield('lang')">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <link rel="icon" href="{{asset('template/assets/img/LogoK-1.svg')}}" type="image/gif" sizes="16x16">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!-- Custom styles for this template -->
    <link href="{{asset('template/css/navbar.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="{{ url('template/css/animate.css') }}">
    @yield('add_style')

</head>

<body>

    @yield('background')

    @if (Auth::check())
    <nav class="navbar navbar-expand navbar-light justify-content-center fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"> <img id="home-logo" src="{{asset('template/assets/img/LogoH-1.svg')}}" width="160" height="auto" alt="" style="position: relative"></a>

            <ul class="navbar-nav nav-justified text-center">
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link d-flex flex-column">
                        <i class="fa fa-plus-circle fa-lg"></i>
                        <span class="d-none d-sm-inline">Tambah</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/partner/add/info') }}">Partners</a></li>
                        <li><a href="#">Open Trip</a></li>
                    </ul>

                </li>
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link d-flex flex-column">
                        <i class="fa fa-commenting-o fa-lg"><span class="notif animated rubberBand">new</span></i>
                        <span class="d-none d-sm-inline">Pesan</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Pesan</a></li>
                        <li><a href="#">Pesan</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link d-flex flex-column">
                        <i class="fa fa-bell fa-lg"></i>
                        <span class="d-none d-sm-inline">Notifikasi</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Notif</a></li>
                        <li><a href="#">Notif</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img src="{{ Auth::user()->picture }}" class="avatar" alt="Avatar"><span> {{ Auth::user()->name }}</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/partner/manage') }}" class="dropdown-item"><i class="fa fa-plane"></i> Tripmu</a></li>
                        <li class="divider dropdown-divider"></li>
                        <li><a href="{{ url('/profile') }}" class="dropdown-item"><i class="fa fa-user-o"></i> Profil</a></li>
                        <li><a href="{{ url('/profile/setting') }}" class="dropdown-item"><i class="fa fa-sliders"></i> Pengaturan Akun</a></li>
                        <li><a href="{{ url('/logout') }}" class="dropdown-item"><i class="fa fa-power-off"></i> Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    @else
    <nav class="navbar navbar-expand navbar-light justify-content-center fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"> <img id="home-logo" src="{{asset('template/assets/img/LogoH-1.svg')}}" width="160" height="auto" alt="" style="position: relative"></a>

            <ul class="navbar-nav nav-justified text-center">

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">Masuk</a>
                </li>
                <li class="nav-item">
                    <button class="btn btn-core" type="button" onclick="window.location.href = '{{ url('/register') }}';">
                        Daftar
                    </button>
                </li>

            </ul>
        </div>
    </nav>
    @endif

    @yield('content')

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

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Custom JavaScript -->
    @yield('add_script')

</body>
