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
    <!-- Custom styles for this template -->
    <link href="{{asset('template/css/home.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/profil.css')}}" rel="stylesheet">
</head>

<body>
    <div class="bg-profil">
        <img src="{{asset('template/assets/img/profilBackground.jpg')}}" style="width: 100%;">
    </div>

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
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img src="{{asset('template/assets/img/profil.jpg')}}" class="avatar" alt="Avatar"><span> {{Auth::user()->name}}</span></a>
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

    <div class="box form-control" style="margin-bottom: 20px; margin-top:-300px">
        <div class="row" style="margin-top: 2%">
            <div class="col">
                <div class="row justify-content-md-center text-profil">
                    <div class="col col-lg-2 ">
                        <span>12</span>
                        <p>Trip</p>
                    </div>
                    <div class="col-md-auto">
                        <span>12</span>
                        <p>Partners</p>
                    </div>
                    <div class="col col-lg-2">
                        <span>12</span>
                        <p>Rating</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="avatarProfil"><a href="#"><img src="{{asset('template/assets/img/profil.jpg')}}"> </a></div>
                <div style="margin-bottom: 25px"><img src="{{asset('template/assets/img/check.png')}}" width="15">Terverifikasi</div>
                <h3><b>{{ Auth::user()->name }}</b>, <span>22</span></h3>
                <h6>Malang, Jawa Timur</h6>
                <h5>Mahasiswa</h5>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col" style="text-align: right"><button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalRiwayat">Riwayat</button></div>
                    <div class="col" style="text-align: left"><button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#modalPenilaian">Penilaian</button></div>
                </div>
            </div>
        </div>
        <br>
        <hr class="mt-2 mb-5">
        <div class="deskripsi-profil">
            <p>Saya seorang yang hobi naik gunung, hampir seluruh gunung dijawa timur sudah saya daki, namun semua berubah sejak corona menyerang</p>
        </div>
        <div class="minat-profil">
            <h5>Minat & Hobi :</h5>
            <span class="badge badge-light">Fotografi</span>
            <span class="badge badge-light">Videografi</span>
            <span class="badge badge-light">Traveling Murah</span>
            <span class="badge badge-light">Backpacker</span>
            <span class="badge badge-light">Camping</span>
            <span class="badge badge-light">Gunung</span>
            <span class="badge badge-light">Pantai</span>
            <span class="badge badge-light">Diving</span>
            <span class="badge badge-light">Penikmat senja</span>
        </div>

    </div>

    <div class="box" style="margin-top: 10px;">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-profil-galeri" data-toggle="tab" href="#nav-galeri" role="tab" aria-controls="nav-galeri" aria-selected="true">Galeri <span class="badge badge-primary">8</span></a>
                <a class="nav-item nav-link" id="nav-profile-rekomendasi" data-toggle="tab" href="#nav-rekomendasi" role="tab" aria-controls="nav-rekomendasi" aria-selected="false">Rekomendasi <span class="badge badge-primary">4</span></a>
                <a class="nav-item nav-link" id="nav-contact-teman" data-toggle="tab" href="#nav-teman" role="tab" aria-controls="nav-teman" aria-selected="false">Teman <span class="badge badge-primary">4</span></a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-galeri" role="tabpanel" aria-labelledby="nav-profil-galeri">
                <div class="row text-center text-lg-left">

                    <div class="col-lg-3 col-md-4 col-6">
                        <a href="#" class="d-block mb-4 h-100">
                            <img class="img-fluid img-thumbnail" src="{{asset('template/assets/img/adam.png')}}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <a href="#" class="d-block mb-4 h-100">
                            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/aob0ukAYfuI/400x300" alt="">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <a href="#" class="d-block mb-4 h-100">
                            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/EUfxH-pze7s/400x300" alt="">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <a href="#" class="d-block mb-4 h-100">
                            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/M185_qYH8vg/400x300" alt="">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <a href="#" class="d-block mb-4 h-100">
                            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/sesveuG_rNo/400x300" alt="">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <a href="#" class="d-block mb-4 h-100">
                            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/AvhMzHwiE_0/400x300" alt="">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <a href="#" class="d-block mb-4 h-100">
                            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/2gYsZUmockw/400x300" alt="">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <a href="#" class="d-block mb-4 h-100">
                            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/EMSDtjVHdQ8/400x300" alt="">
                        </a>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="nav-rekomendasi" role="tabpanel" aria-labelledby="nav-profil-rekomendasi">No Entry2</div>
            <div class="tab-pane fade" id="nav-teman" role="tabpanel" aria-labelledby="nav-profil-teman">
                <div class="row text-center text-lg-left">
                    <img class="teman-profil" src="{{asset('template/assets/img/adam2.png')}}">
                    <img class="teman-profil" src="{{asset('template/assets/img/adam2.png')}}">
                    <img class="teman-profil" src="{{asset('template/assets/img/adam2.png')}}">
                    <img class="teman-profil" src="{{asset('template/assets/img/adam2.png')}}">
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


    <div class="modal fade" id="modalRiwayat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Riwayat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="riwayatPerjalanan">
                        <h5>Perjalananmu Saat Ini</h5>
                        <div class="isi-riwayatPerjalanan">
                            <div class="row align-items-center">
                                <div class="col">
                                    <img src="{{asset('template/assets/img/bromo.jpg')}}">
                                    <div style="float:right;">
                                        <h5>Gunung Bromo</h5>
                                        <p>25 April 2019 - 26 April 2019</p>
                                    </div>

                                </div>
                                <div class="col-md-3 text-center">
                                    <button class="btn btn-warning btn-sm">Aktif</button>
                                </div>
                                <div class="col">
                                    <h5>Bersama dengan 6 orang lainnya</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="riwayatPerjalanan">
                        <h5>Riwayat Perjalanan</h5>
                        <div class="isi-riwayatPerjalanan">
                            <div class="row align-items-center">
                                <div class="col">
                                    <img src="{{asset('template/assets/img/bromo.jpg')}}">
                                    <div style="float:right;">
                                        <h5>Gunung Bromo</h5>
                                        <p>25 April 2019 - 26 April 2019</p>
                                    </div>

                                </div>
                                <div class="col-md-3 text-center">
                                    <button class="btn btn-danger btn-sm">Batal</button>
                                </div>
                                <div class="col">
                                    <h5>Bersama dengan 6 orang lainnya</h5>
                                </div>
                            </div>
                        </div>

                        <div class="isi-riwayatPerjalanan">
                            <div class="row align-items-center">
                                <div class="col">
                                    <img src="{{asset('template/assets/img/bromo.jpg')}}">
                                    <div style="float:right;">
                                        <h5>Gunung Bromo</h5>
                                        <p>25 April 2019 - 26 April 2019</p>
                                    </div>

                                </div>
                                <div class="col-md-3 text-center">
                                    <button class="btn btn-warning btn-sm">Aktif</button>
                                </div>
                                <div class="col">
                                    <h5>Bersama dengan 6 orang lainnya</h5>
                                </div>
                            </div>
                        </div>

                        <div class="isi-riwayatPerjalanan">
                            <div class="row align-items-center">
                                <div class="col">
                                    <img src="{{asset('template/assets/img/bromo.jpg')}}">
                                    <div style="float:right;">
                                        <h5>Gunung Bromo</h5>
                                        <p>25 April 2019 - 26 April 2019</p>
                                    </div>

                                </div>
                                <div class="col-md-3 text-center">
                                    <button class="btn btn-success btn-sm">Selesai</button>
                                </div>
                                <div class="col">
                                    <h5>Bersama dengan 6 orang lainnya</h5>
                                </div>
                            </div>
                        </div>

                        <div class="isi-riwayatPerjalanan">
                            <div class="row align-items-center">
                                <div class="col">
                                    <img src="{{asset('template/assets/img/bromo.jpg')}}">
                                    <div style="float:right;">
                                        <h5>Gunung Bromo</h5>
                                        <p>25 April 2019 - 26 April 2019</p>
                                    </div>

                                </div>
                                <div class="col-md-3 text-center">
                                    <button class="btn btn-success btn-sm">Selesai</button>
                                </div>
                                <div class="col">
                                    <h5>Bersama dengan 6 orang lainnya</h5>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalPenilaian" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Penilaian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="penilaian">
                        <div class="isi-penilaian">
                            <div class="row">
                                <div class="col text-left">
                                    <img src="{{asset('template/assets/img/profil.jpg')}}" style="float:left;margin-right:10px">
                                    <div>
                                        <h5>Arini</h5>
                                        <p>Trip ke Gunung Bromo | 25 April 2019 - 26 April 2019</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="rating" style="margin: auto">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="penilaian">
                        <div class="isi-penilaian">
                            <div class="row">
                                <div class="col text-left">
                                    <img src="{{asset('template/assets/img/profil.jpg')}}" style="float:left;margin-right:10px">
                                    <div>
                                        <h5>Aldo</h5>
                                        <p>Trip ke Gunung Bromo | 25 April 2019 - 26 April 2019</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="rating" style="margin: auto">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="penilaian">
                        <div class="isi-penilaian">
                            <div class="row">
                                <div class="col text-left">
                                    <img src="{{asset('template/assets/img/profil.jpg')}}" style="float:left;margin-right:10px">
                                    <div>
                                        <h5>Nafi</h5>
                                        <p>Trip ke Gunung Bromo | 25 April 2019 - 26 April 2019</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="rating" style="margin: auto">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script> --}}
    <script src="{{asset('template/js/slick.js')}}"></script>




</body>

</html>
