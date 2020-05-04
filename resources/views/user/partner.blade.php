@extends('layout/main')

@section('lang', 'id')
@section('title', 'Partner | djalandjalan.com')

@section('add_style')
<link rel="stylesheet" type="text/css" href="{{asset('template/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="{{asset('template/css/partners.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container page-content">
    <div class="row">
        <div class="col-2">
            <div class="filter">
                <div class="kategori-filter">
                    <b>Urutkan Berdasarkan</b>
                    <select class="form-control" id="inputGender">
                        <option>Terbaru</option>
                        <option>Jumlah Anggota</option>
                    </select>
                </div>
            </div>
            <div class="filter">
                <div class="kategori-filter">
                    <b>Tanggal</b>
                    <input type="text" name="datefilter " class="form-control" placeholder="Pilih Tanggal" value="">
                </div>
            </div>
            <div class="filter">
                <div class="kategori-filter">
                    <b>Anggota</b>
                    <select class="form-control" id="inputGender">
                        <option>Kurang dari 3</option>
                        <option>3 hingga 6</option>
                        <option>Lebih dari 6</option>
                    </select>
                </div>
            </div>
            <div class="filter">
                <div class="kategori-filter">
                    <b>Kategori</b>
                    <div class="form-check">
                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                        <label class="form-check-label" for="inlineRadio1">Gunug</label>
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
                </div>
            </div>
            <div class="filter">
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
            </div>

            <div class="text-center reset">
                <button type="button" id="resetChecklist" class="btn btn-outline-success btn-sm">Reset</button>
            </div>
        </div>

        <div class="col-10">
            <div class="row partners-thread">

                @foreach ($partner as $p)
                <div class="col-6 col-md-3 partners-thread-card">
                    <a href="{{ url('/thread/'.$p->id) }}">
                        <div class="card card-partners">
                            <div class="img-hover-zoom">
                                <img src="{{ $p->dest_picture }}" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <img src="{{ $p->user->picture }}" class="display-profil" alt="Avatar">
                                <h5 class="card-title">{{ (explode(' ', $p->dest_name)[0]) }}</h5>
                                <h6 class="card-title">{{ (explode(' ', $p->user->name)[0]) }} / {{ $p->user->city }}</h6>
                                <p class="card-text">Tgl: <span>{{ date('d M Y', strtotime($p->start_date)) }} - {{ date('d M Y', strtotime($p->end_date)) }}</span></p>
                                <p class="card-text">Titik Kumpul: <span>{{ substr($p->gather_point,0,20) }}</span></p>
                                <p class="card-text" style="float: right;">Butuh: <span style="font-weight: bold">X orang lagi</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection

@section('add_script')
<script type="text/javascript " src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js "></script>
<script type="text/javascript " src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js "></script>
<script>
    function uncheckAll() {
        $("input[type='checkbox']:checked").prop("checked", false)
    }
    $('#resetChecklist').on('click', uncheckAll)
</script>
@endsection
