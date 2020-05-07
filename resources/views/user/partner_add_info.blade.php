@extends('layout/main')

@section('lang', 'id')
@section('title', 'Opening Add Partner | djalandjalan.com')

@section('add_style')
<link href="{{asset('template/css/openingBuatTrip.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container text-center">
    <div class="wrapper1">
        <h1>Tambah pengalamanmu</h1>
        <h5>Travelling dengan orang baru? siapa takut!</h5>
        <h5>Karena semua teman lama berasal dari teman baru</h5>
        {{-- <button class="btn btn-core" type="button" onclick="window.location.href = '{{ url('/partner/add') }}';">Mulai</button> --}}
    </div>
    <div class="wrapper2">
        <img src="{{asset('template/assets/img/partners.jpg')}}">
    </div>
    <div class="wrapper3">
        <h1>Cari Teman Travellingmu</h1>
        <div class="row justify-content-start">
            <div class="col">
                <i class="fa fa-check-circle-o fa-2x pull-left" aria-hidden="true"></i>
                <h5>Tentukan tujuan destinasimu</h5>
                <p>Pilih tujuan destinasi travellingmu yang ingin kamu kunjungi dengan teman baru</p>
            </div>
            <div class="col">
                <i class="fa fa-check-circle-o fa-2x pull-left" aria-hidden="true"></i>
                <h5>Tuliskan deskripsi tripmu</h5>
                <p>Deskripsi mengenai informasi tripmu mulai dari jadwal, tujuan, lokasi bertemu hingga rencana selama traveling untuk memikat Partners agar mau bertravelling dengan kamu.</p>
            </div>
            <div class="col">
                <i class="fa fa-check-circle-o fa-2x pull-left" aria-hidden="true"></i>
                <h5>Pilih teman</h5>
                <p>Pilih temanmu sesuai preferensi kamu, karena yang tahu keinginanmu hanya dirimu sendiri
                </p>
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col-4">
                <i class="fa fa-check-circle-o fa-2x pull-left" aria-hidden="true"></i>
                <h5>Jalin komunikasi</h5>
                <p>Mulailah berdiskusi dan menjalin komunikasi dengan partnersmu untuk dapat saling mengenal satu dengan yang lain.
                </p>
            </div>
            <div class="col-4">
                <i class="fa fa-check-circle-o fa-2x pull-left" aria-hidden="true"></i>
                <h5>Bertemu di titik temu</h5>
                <p>Bertemu ditempat yang sudah kamu setujui dengan partnersmu sebelum bertravelling bareng.
                </p>
            </div>
        </div>
    </div>
    <div class="wrapper4">
        <img src="{{asset('template/assets/img/profilBackground.jpg')}}">
        <div class="wrapper4-text">
            <h2>Temukan pengalaman baru</h2>
            <h2>Bersama teman baru</h2>
            <button class="btn btn-core" type="button" onclick="window.location.href = '{{ url('/partner/add') }}';">Buat Trip</button>
        </div>
    </div>
</div>
@endsection
