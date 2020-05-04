@extends('layout/main')

@section('lang', 'id')
@section('title', 'Thread | djalandjalan.com')

@section('add_style')
<link href="{{asset('template/css/partners.css')}}" rel="stylesheet">
<link href="{{asset('template/css/profil.css')}}" rel="stylesheet">
<link href="{{asset('template/css/thread.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container" style="margin-top: 100px">
    <div class="heading-thread">
        <h2><span>Trip ke {{ $partner->dest_name }}</span></h2>
    </div>
    <div class="row">
        <div class="col-sm">
            <img class="img-fluid" src="{{ $partner->dest_picture }}" style="width:100%; border-radius:5px">
        </div>
        <div class="col-sm">
            <div class="informasi">
                <div class="heading-information">
                    <h5>Informasi Trip</h5>
                </div>

                <div class="information-trip">
                    <i class="fa fa-calendar fa-fw"></i>&nbsp;<label>Tanggal</label>
                    <span>{{ date('d M Y', strtotime($partner->start_date)) }} - {{ date('d M Y', strtotime($partner->end_date)) }}</span>
                </div>

                <div class="information-trip">
                    <i class="fa fa-clock-o fa-fw"></i>&nbsp;<label>Durasi</label>
                    <span>X Hari Y Malam</span>
                </div>
                <div class="information-trip">
                    <i class="fa fa-users fa-fw"></i>&nbsp;<label>Jumlah Anggota</label>
                    <span>{{ $partner->required_person }} Orang (<b>Butuh X lagi</b>)</span>
                </div>
                <div class="information-trip">
                    <i class="fa fa-map-marker fa-fw"></i>&nbsp;<label>Titik Kumpul</label>
                    <span>{{ $partner->gather_point }}</span>
                </div>
                <div class="text-center mt-4">
                    <button class="btn stylebutton btn-core" id="gabungBtn" disabled>Gabung</button>
                </div>
            </div>
            <div class="memberTrip">
                <div class="memberTrip-host">
                    <a href="{{ url('/profile/'.$partner->user->id) }}">
                        <img src="{{ $partner->user->picture }}" class="avatar">
                    </a>
                    <b>Host</b>
                </div>
                <div class="memberTrip-member">
                    <b>Anggota</b>
                    <ul>
                        @foreach ($partner->join as $pj)
                        <li>
                            <a href="{{ url('/profile/'.$pj->user->id) }}">
                                <img src="{{ $pj->user->picture }}" class="avatar picMember">
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="deskripsi">
        <div class="heading-deskripsi">
            <h4>Deskripsi Trip</h4>
        </div>
        <div class="deskripsi-thread">
            <p>{{ $partner->description }}</p>
        </div>
    </div>

    <div class="diskusi">
        <i class="fa fa-question-circle-o fa-3x icon-diskusi"></i>&nbsp;
        <label>Ada pertanyaan? Diskusikan saja dengan Partners</label>
        <button class="btn btn-core pull-right" onclick="window.location.href = '#tulisDiskusi';">Mulai Diskusi</button>
    </div>

    @foreach ($comment as $c)
    <div class="diskusi">
        <div class="isiDiskusi">
            <div class="isiDiskusi-profil">
                <img src="{{ $c->user->picture }}" class="avatar picMember">
                <b>{{ $c->user->name }}</b>&nbsp;
                <label>{{ date('d M Y H:i', strtotime($c->updated_at)) }}</label>
            </div>
            <div>
                <p>{{ $c->message }}</p>
            </div>
        </div>
        @foreach ($c->reply as $cr)
        <div class="isiDiskusi-jawab">
            <div class="isiDiskusi-profil">
                <img src="{{ $cr->user->picture }}" class="avatar picMember">
                <b>{{ $cr->user->name }}</b>&nbsp;
                <label>{{ date('d M Y H:i', strtotime($cr->updated_at)) }}</label>
            </div>
            <div>
                <p>{{ $cr->message }}</p>
            </div>
        </div>
        @endforeach
        <div class="isiDiskusi-jawab">
            <div class="row">
                <div class="col-md-auto">
                    <img src="{{ Auth::user()->picture }}" class="avatar picMember">
                </div>
                <div class="col" style="padding-left: 0;">
                    <input class="form-control" type="text" placeholder="Masukan Komentar">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-success">Kirim</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection

@section('add_script')
<script>
    document.querySelectorAll('.stylebutton').forEach(function(e) {
        e.addEventListener('click', function() {
            this.style.backgroundColor = "red ";
            document.getElementById("gabungBtn ").innerText = "Menunggu Konfirmasi ";
        })
    });
</script>
@endsection
