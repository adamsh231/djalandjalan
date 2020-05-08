@extends('layout/main')

@section('lang', 'id')
@section('title', 'Manage Partner | djalandjalan.com')

@section('add_style')
<link href="{{asset('template/css/tripmu.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container wrapper">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="asHost-tab" data-toggle="tab" href="#asHost" role="tab" aria-controls="nav-home" aria-selected="true">Sebagai Host</a>
            <a class="nav-item nav-link" id="asMember-tab" data-toggle="tab" href="#asMember" role="tab" aria-controls="nav-profile" aria-selected="false">Sebagai Anggota</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade show active text-center" id="asHost" role="tabpanel" aria-labelledby="asHost-tab">

            @foreach ($join as $j)
            @if ($j->partner->user_id == $j->user_id)
            <div class="trip">
                <div>
                    <a href="{{ url('/partner/'.$j->partner->id.'/confirmation') }}">
                        <div class="row row-cols-4 align-items-center" style="margin: 0 auto;height: auto; padding: 10px;">
                            <div class="col">
                                <img src="{{ $j->partner->dest_picture }}">
                            </div>
                            <div class="col">
                                <h5>{{ $j->partner->dest_name }}</h5>
                                <p>{{ date('d M Y', strtotime($j->partner->start_date)) }} - {{ date('d M Y', strtotime($j->partner->end_date)) }}</p>
                            </div>

                            @php
                            $s = $j->partner->status;
                            $status = ($s == -1 ? "Dibatalkan" : ($s == 0 ? "Persiapan" : ($s == 1 ? "Perjalanan" : "Selesai")));
                            @endphp
                            <div class="col-md-auto">
                                <button class="btn btn-primary btn-sm ">{{ $status }}</button>
                            </div>

                            <div class="col">
                                <p>Dibuat tanggal : {{ date('d M Y', strtotime($j->partner->created_at)) }}</p>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
            @endif
            @endforeach

        </div>

        <div class="tab-pane fade" id="asMember" role="tabpanel" aria-labelledby="asMember-tab">

            @foreach ($join as $j)
            @if ($j->partner->user_id != $j->user_id)
            <div class="trip">
                <div>
                    <a href="{{ url('/partner/'.$j->partner->id) }}">
                        <div class="row row-cols-4 align-items-center" style="margin: 0 auto;height: auto; padding: 10px;">
                            <div class="col">
                                <img src="{{ $j->partner->dest_picture }}">
                            </div>
                            <div class="col">
                                <h5>{{ $j->partner->dest_name }}</h5>
                                <p>{{ date('d M Y', strtotime($j->partner->start_date)) }} - {{ date('d M Y', strtotime($j->partner->end_date)) }}</p>
                            </div>

                            @php
                            $s = $j->partner->status;
                            $status = ($s == -1 ? "Dibatalkan" : ($s == 0 ? "Persiapan" : ($s == 1 ? "Perjalanan" : "Selesai")));
                            @endphp
                            <div class="col-md-auto">
                                <button class="btn btn-primary btn-sm ">{{ $status }}</button>
                            </div>

                            @php
                            $status_join = ($j->status == 0 ? "Menunggu Konfirmasi" : "Tergabung");
                            @endphp
                            <div class="col">
                                <p>Status : {{ $status_join }}</p>
                            </div>

                        </div>
                    </a>
                </div>
            </div>
            @endif
            @endforeach

        </div>

    </div>
</div>
@endsection
