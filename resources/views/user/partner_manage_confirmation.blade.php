@extends('layout/main')

@section('lang', 'id')
@section('title', 'Partner Confirmation | djalandjalan.com')

@section('add_style')
<link href="{{asset('template/css/profil.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container" style="margin-top: 5%; margin-bottom: 5%">
    <h4 class="text-center" style="margin-top: 10%;">{{ $partner->dest_name }}</h4>
    <div class="row " style="margin-top: 4%;">
        <div class="col-md-10 mx-auto">

            @foreach ($join as $j)
            <div class="konfirmasiGabung ">
                <div class="isi-riwayatPerjalanan text-center">
                    <div class="row align-items-center" style="margin: 0 auto;height: auto; padding: 10px;">
                        <a href="profil.html">
                            <div class="col">
                                <img src="{{ $j->user->picture }}" width="50%">
                            </div>
                        </a>
                        <div class="col">
                            <h5>{{ $j->user->name }}</h5>
                        </div>
                        @if ($j->status == 0)
                        <div class="col">
                            <form action="{{ url('/partner/'.$partner->id.'/join/'.$j->id.'/accept') }}" class="d-inline" method="POST">
                                @csrf
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-check" aria-hidden="true"></i> Terima
                                </button>
                            </form>
                            <form action="{{ url('/partner/'.$partner->id.'/join/'.$j->id.'/reject') }}" class="d-inline" method="POST">
                                @csrf
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-times" aria-hidden="true"></i> Tolak
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
