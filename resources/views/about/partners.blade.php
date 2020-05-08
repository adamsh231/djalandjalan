@extends('layout/main')

@section('lang', 'id')
@section('title', 'About Partners | djalandjalan.com')

@section('add_style')
<link href="{{asset('template/css/about-us.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="mt-65"></div>
<div class="bg-layanan-partners banner-top ">
    <div class="overlay-bg img-fluid ">
        <h4>Layanan</h4>
    </div>
</div>
<div class="container text-center">
    <h1>Partners</h1>
    <p>Partners adalah fitur yang membantu memudahkan kamu yang ingin travelling dengan teman baru sesuai keinginan kamu tanpa harus ribet mencari informasi tentang teman baru, kecocokan kamu dengan orang baru tersebut dan gaya travelingnya, karena dengan
        Djalandjalan kamu dapat mendapatkan informasi tersebut secara langsung!</p><br><br>
    <h1>Marketplace Open Trip</h1>
    <p>Jika kamu seorang opener trip/seseorang yang memberikan jasa open trip, maka dengan bergabung bersama kami, kamu telah bersedia untuk bergabung dengan pusat Marketplace Open trip Indonesia, sehingga kamu tidak perlu mengeluarkan uang untuk memasarkan
        jasa kamu, karena kami yang akan memasarkan jasa Anda dan mendatangkan pelanggan yang akan memakai jasa Anda!
        <br><br>Jika kamu seseorang pengguna jasa open trip, maka dengan bergabung bersama kami, kamu akan mudah mendapatkan informasi tentang opener trip yang sesuai dengan rencana perjalanan dan kantong kamu! Karena kami adalah pusat marketplace
        open trip Indonesia yang terus menggaet penyedia jasa open trip!
    </p>
</div>
@endsection
