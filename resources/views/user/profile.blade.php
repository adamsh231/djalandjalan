@extends('layout/main')

@section('lang', 'id')
@section('title', 'Profile | djalandjalan.com')

@section('add_style')
<link rel="stylesheet" type="text/css" media="all" href="{{asset('template/css/animate.css')}}" />
<link href="{{asset('template/css/home.css')}}" rel="stylesheet">
<link href="{{asset('template/css/profil.css')}}" rel="stylesheet">
@endsection

@section('background')
<div class="bg-profil">
    <img src="{{asset('template/assets/img/profilBackground.jpg')}}" style="width: 100%;">
</div>
@endsection

@section('content')
<div class="box form-control" style="margin-bottom: 20px; margin-top:-300px">
    <div class="row" style="margin-top: 2%">
        <div class="col">
            <div class="row justify-content-md-center text-profil">
                <div class="col col-lg-2 ">
                    <span>X</span>
                    <p>Trip</p>
                </div>
                <div class="col-md-auto">
                    <span>Y</span>
                    <p>Partners</p>
                </div>
                <div class="col col-lg-2">
                    <span>XYZ</span>
                    <p>Rating</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="avatarProfil">
                <a href="#"><img src="{{ Auth::user()->picture }}"> </a>
            </div>
            <div style="margin-bottom: 25px"><img src="{{asset('template/assets/img/check.png')}}" width="15">Terverifikasi ??</div>
            <h3><b>{{ Auth::user()->name }}</b>, <span>{{ (date('Y') - date('Y', strtotime(Auth::user()->birth)) ) }}</span></h3>
            <h6>{{ Auth::user()->city }}</h6>
            <h5>{{ Auth::user()->occupation }}</h5>
        </div>
        <div class="col">
            <div class="col" style="text-align: right"><button class="btn btn-core btn-sm" type="button" data-toggle="modal" data-target="#modalRiwayat">Riwayat</button></div>
        </div>
    </div>
    <br>
    <hr class="mt-2 mb-5">
    <div class="deskripsi-profil">
        <p>{{ Auth::user()->description }}</p>
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
            <a class="nav-item nav-link" id="nav-profile-rekomendasi" data-toggle="tab" href="#nav-rekomendasi" role="tab" aria-controls="nav-rekomendasi" aria-selected="false">Rekomendasi</a>
            <a class="nav-item nav-link" id="nav-contact-teman" data-toggle="tab" href="#nav-teman" role="tab" aria-controls="nav-teman" aria-selected="false">Teman</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-galeri" role="tabpanel" aria-labelledby="nav-profil-galeri">
            <div class="row text-center text-lg-left">

                @foreach ($gallery as $g)
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="{{ $g->path }}" alt="">
                    </a>
                </div>
                @endforeach

            </div>
            <div class="">
                <button class="btn btn-sm btn-primary" type="file"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Foto</button>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-rekomendasi" role="tabpanel" aria-labelledby="nav-profil-rekomendasi">
            Feature not available
        </div>
        <div class="tab-pane fade" id="nav-teman" role="tabpanel" aria-labelledby="nav-profil-teman">
            Feature not available
        </div>
    </div>
</div>

<div class="modal fade" id="modalRiwayat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle " aria-hidden="true ">
    <div class="modal-dialog modal-dialog-centered modal-lg " role="document ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Riwayat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close ">
                    <span aria-hidden="true ">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="riwayatPerjalanan">
                    <h5>Perjalananmu Saat Ini</h5>
                    <div class="isi-riwayatPerjalanan text-center">
                        <a href="history.html">
                            <div class="row row-cols-4" style="margin: 0 auto;height: auto; padding: 10px;">
                                <div class="col">
                                    <img src="assets/img/bromo.jpg ">
                                </div>
                                <div class="col-md-auto">
                                    <h5>Gunung Bromo</h5>
                                    <p>25 April 2019 - 26 April 2019</p>
                                </div>
                                <div class="col-md-auto">
                                    <button class="btn btn-primary btn-sm ">Lagi Jalan</button>
                                </div>
                                <div class="col">
                                    <p>Bersama dengan 6 orang lainnya</p>
                                </div>
                                <div class="col">
                                    <h5> <span class="fa fa-star fa-lg checked "></span> 4.5</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="riwayatPerjalanan ">
                    <h5>Riwayat Perjalanan</h5>
                    <div class="isi-riwayatPerjalanan text-center">
                        <a href="history.html">
                            <div class="row row-cols-4" style="margin: 0 auto;height: auto; padding: 10px;">
                                <div class="col">
                                    <img src="assets/img/bromo.jpg ">
                                </div>
                                <div class="col-md-auto">
                                    <h5>Gunung Bromo</h5>
                                    <p>25 April 2019 - 26 April 2019</p>
                                </div>
                                <div class="col-md-auto">
                                    <button class="btn btn-warning btn-sm ">Aktif</button>
                                </div>
                                <div class="col">
                                    <p>Bersama dengan 6 orang lainnya</p>
                                </div>
                                <div class="col">
                                    <h5> <span class="fa fa-star fa-lg checked "></span> 4.5</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="isi-riwayatPerjalanan text-center">
                        <a href="history.html">
                            <div class="row row-cols-4" style="margin: 0 auto;height: auto; padding: 10px;">
                                <div class="col">
                                    <img src="assets/img/bromo.jpg ">
                                </div>
                                <div class="col-md-auto">
                                    <h5>Gunung Bromo</h5>
                                    <p>25 April 2019 - 26 April 2019</p>
                                </div>
                                <div class="col-md-auto">
                                    <button class="btn btn-success btn-sm ">Selesai</button>
                                </div>
                                <div class="col">
                                    <p>Bersama dengan 6 orang lainnya</p>
                                </div>
                                <div class="col">
                                    <h5> <span class="fa fa-star fa-lg checked "></span> 4.5</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="isi-riwayatPerjalanan text-center">
                        <a href="history.html">
                            <div class="row row-cols-4" style="margin: 0 auto;height: auto; padding: 10px;">
                                <div class="col">
                                    <img src="assets/img/bromo.jpg ">
                                </div>
                                <div class="col-md-auto">
                                    <h5>Gunung Bromo</h5>
                                    <p>25 April 2019 - 26 April 2019</p>
                                </div>
                                <div class="col-md-auto">
                                    <button class="btn btn-danger btn-sm ">Batal</button>
                                </div>
                                <div class="col">
                                    <p>Bersama dengan 6 orang lainnya</p>
                                </div>
                                <div class="col">
                                    <h5> <span class="fa fa-star fa-lg checked "></span> 4.5</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="isi-riwayatPerjalanan text-center">
                        <a href="history.html">
                            <div class="row row-cols-4" style="margin: 0 auto;height: auto; padding: 10px;">
                                <div class="col">
                                    <img src="assets/img/bromo.jpg ">
                                </div>
                                <div class="col-md-auto">
                                    <h5>Gunung Bromo</h5>
                                    <p>25 April 2019 - 26 April 2019</p>
                                </div>
                                <div class="col-md-auto">
                                    <button class="btn btn-success btn-sm ">Selesai</button>
                                </div>
                                <div class="col">
                                    <p>Bersama dengan 6 orang lainnya</p>
                                </div>
                                <div class="col">
                                    <h5> <span class="fa fa-star fa-lg checked "></span> 4.5</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('add_script')

@endsection
