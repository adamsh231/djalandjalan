<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Djalandjalan.com</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link href="{{asset('template/css/partners.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand navbar-light justify-content-center fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"> <img id="home-logo" src="{{asset('template/assets/img/djalandjalanlogo.png')}}" width="150" height="auto" alt="" style="position: relative"></a>
            <div class="search">
                <input type="search" class="form-control" placeholder="Cari Destinasi Keinginanmu. Contoh: Bromo">
                <i class="fa fa-search"></i>
            </div>
            <ul class="navbar-nav nav-justified text-center">
                <li class="nav-item">
                    <a href="#makePost" id="tambahTrip" class="nav-link d-flex flex-column">
                        <i class="fa fa-plus-circle fa-lg"></i>
                        <span class="d-none d-sm-inline">Tambah</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link d-flex flex-column">
                        <i class="fa fa-commenting-o fa-lg"><span class="notif">new</span></i>
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
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img src="{{ Auth::user()->picture }}" class="avatar" alt="Avatar"><span> {{Auth::user()->name}}</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/profile') }}" class="dropdown-item"><i class="fa fa-user-o"></i> Profil</a></li>
                        <li><a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Pengaturan</a></li>
                        <li class="divider dropdown-divider"></li>
                        <li><a href="{{ url('/logout') }}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container page-content">
        <div class="row">
            <div class="col-4">
                <div class="filter">
                    <div class="kategori-filter">
                        <b>Kategori</b>
                        <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                            <label class="form-check-label" for="inlineRadio1">Gunung</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                            <label class="form-check-label" for="inlineRadio1">Pantai</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                            <label class="form-check-label" for="inlineRadio1">Air Terjun</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                            <label class="form-check-label" for="inlineRadio1">Road Trip</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                            <label class="form-check-label" for="inlineRadio1">Lainnya</label>
                        </div>
                    </div>

                    <div class="kategori-filter">
                        <b>Lokasi</b>
                        <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                            <label class="form-check-label" for="inlineRadio1">Jawa Timur</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                            <label class="form-check-label" for="inlineRadio1">Jawa Tengah</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                            <label class="form-check-label" for="inlineRadio1">Jawa Barat</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                            <label class="form-check-label" for="inlineRadio1">DKI Jakarta</label>
                        </div>
                    </div>

                    <div class="kategori-filter">
                        <b>Jumlah Anggota</b>
                        <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                            <label class="form-check-label" for="inlineRadio1">
                                < 3</label> </div> <div class="form-check">
                                    <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                    <label class="form-check-label" for="inlineRadio1">5-10</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                            <label class="form-check-label" for="inlineRadio1">10<</label> </div> </div> <div class="text-center reset">
                                    <button type="button" id="resetChecklist" class="btn btn-outline-success btn-sm">Reset</button>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row partners-thread">

                        @foreach ($collection = array_fill(0, 6, array_fill(0, 10, 0)) as $item)
                        <div class="col-6 col-md-4 partners-thread-card">
                            <a href="{{ url('/thread') }}">
                                <div class="card card-partners">
                                    <div class="img-hover-zoom">
                                        <img src="{{asset('template/assets/img/bromo.jpg')}}" class="card-img-top" alt="...">
                                    </div>
                                    <div class="card-body">
                                        <img src="{{asset('template/assets/img/profil.jpg')}}" class="display-profil" alt="Avatar">
                                        <h5 class="card-title">Gunung Bromo</h5>
                                        <h6 class="card-title">Ryan / Malang</h6>
                                        <p class="card-text">Tgl: <span>25/08/2020 - 26/08/2020</span></p>
                                        <p class="card-text">Titik Kumpul: <span>Stasiun Malang</span></p>
                                        <p class="card-text" style="float: right;">Butuh: <span style="font-weight: bold">4 orang lagi</span></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer id="footer" style="background-color: white">
        <div class="container pt-5 border-bottom">
            <div class="row">
                <div class="col-md-3 col-sm-12 mb-3 text-center">
                    <img id="home-logo" src="{{asset('template/assets/img/djalandjalanlogo.png')}}" width="100%" height="auto" alt="" style="position: relative">
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="col-md-3 col-sm-6 col-6 p-0 float-left">
                        <h5 class="mb-4 font-weight-bold text-uppercase">Produk</h5>
                        <ul class="list-group">
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#">Partners</a></li>
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="href=" #">Persewaan Alat</a></li>
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#">Agen Travel</a></li>
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#">Tour Guide</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-6 col-6 p-0 mb-3 float-left">
                        <h5 class="mb-4 font-weight-bold text-uppercase">Agen</h5>
                        <ul class="list-group">
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#">Cara Gabung</a></li>
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#">Keuntungan</a></li>
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#">Beriklan di djalandjalan.com</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-6 col-6 mb-3 p-0 float-left">
                        <h5 class="mb-4 font-weight-bold text-uppercase">Dukungan</h5>
                        <ul class="list-group">
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#"></i>Tentang Kami</a></li>
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#"></i>Bantuan</a></li>
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#"></i>Syarat & Ketentuan</a></li>
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#"></i>Kebijakan Privasi</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 col-6 mb-3 p-0 float-left">
                        <h5 class="mb-4 font-weight-bold text-uppercase">Temukan Kami</h5>
                        <ul class="list-group">
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2">
                                <a href="#"><img src="{{asset('template/assets/img/twitter1.png')}}"></a>
                                <a href="#"><img src="{{asset('template/assets/img/path1.png')}}"></a>
                                <a href="#"><img src="{{asset('template/assets/img/ig1.png')}}"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="py-4 d-flex justify-content-center align-items-center">
                        <div class="container">
                            <p class="m-0 text-center">Copyright &copy; djalandjalan.com 2020</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script> --}}
    <script src="{{asset('template/js/slick.js')}}"></script>

    <script>
        function uncheckAll() {
                $("input[type='checkbox']:checked").prop("checked", false)
            }
            $('#resetChecklist').on('click', uncheckAll)
    </script>
</body>

</html>
