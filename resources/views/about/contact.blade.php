@extends('layout/main')

@section('lang', 'id')
@section('title', 'Contact Us | djalandjalan.com')

@section('add_style')
<link href="{{asset('template/css/about-us.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="mt-65"></div>
<div class="container text-center" style="margin-bottom: 20%;">
    <h3 style="margin: 20% 0 10% 0;">Ada Pertanyaan? Hubungi Kami!</h3>
    <div class="row">
        <div class="col">
            <h5>Kontak Langsung</h5>
            <p>
                djalandjalanid@gmail.com
                <br>(+62) 877-7086-6199
            </p>
        </div>
        <div class="col">
            <h5>Customer Service</h5>
            <p>
                djalandjalanid@gmail.com
                <br>(+62) 877-7086-6199
            </p>
        </div>
        <div class="col">
            <h5>Bekerja Dengan Kami</h5>
            <p>
                Kirim CV Anda ke email kami:
                <br>djalandjalanid@gmail.com
            </p>
        </div>
    </div>
</div>
@endsection
