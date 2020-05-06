@extends('layout/main')

@section('lang', 'id')
@section('title', 'Partner | djalandjalan.com')

@section('add_style')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="{{asset('template/css/partners.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container page-content">
    <div class="row">

        <div class="col-2">

            <form>
                <input type="hidden" name="start_date">
                <input type="hidden" name="end_date">

                <div class="filter">
                    <div class="kategori-filter">
                        <b>Destinasi</b>
                        <input autocomplete="off" name="filter_tempat" type="text" class="form-control" placeholder="Nama Tempat">
                    </div>
                </div>

                <div class="filter">
                    <div class="kategori-filter">
                        <b>Tanggal</b>
                        <input autocomplete="off" id="filter_tanggal" type="text" class="form-control" placeholder="Pilih Tanggal">
                    </div>
                </div>

                <div class="filter">
                    <div class="kategori-filter">
                        <b>Anggota</b>
                        <select class="form-control" name="filter_jumlah">
                            <option></option>
                            <option value="1">Kurang dari 3</option>
                            <option value="2">3 sampai 6</option>
                            <option value="3">Lebih dari 6</option>
                        </select>
                    </div>
                </div>

                <div class="filter">
                    <div class="kategori-filter">
                        <b>Urutkan Berdasarkan</b>
                        <select class="form-control" name="filter_urutan">
                            <option></option>
                            <option value="start_date">Tanggal</option>
                            <option value="required_person">Jumlah Anggota</option>
                        </select>
                        <select class="form-control" name="filter_urutan_jenis">
                            <option></option>
                            <option value="ASC">A - Z</option>
                            <option value="DESC">Z - A</option>
                        </select>
                    </div>
                </div>

                {{-- <div class="filter">
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
                    </div>
                </div> --}}

                {{-- <div class="filter">
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
                </div> --}}

                <div class="text-center reset">
                    <button type="submit" class="btn btn-outline-success btn-sm">Filter</button>
                </div>
            </form>

        </div>

        <div class="col-10">

            <div class="mb-4">
                @foreach ($old_key as $key => $value)
                <span class="badge badge-info">{{ $value }}</span>
                @endforeach
            </div>

            <div class="row partners-thread" style="overflow: auto; height: 650px">

                @foreach ($partner as $p)
                <div class="col-6 col-md-3 partners-thread-card">
                    <a href="{{ url('/partner/'.$p->id) }}">
                        <div class="card card-partners">
                            <div class="img-hover-zoom">
                                <img src="{{ $p->dest_picture }}" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <a href="{{ url('/profile/'.$p->user->id) }}">
                                    <img src="{{ $p->user->picture }}" class="display-profil" alt="Avatar">
                                </a>
                                <h5 class="card-title">{{ (explode(' ', $p->dest_name)[0]) }}</h5>
                                <h6 class="card-title">{{ (explode(' ', $p->user->name)[0]) }} / {{ $p->user->city }}</h6>
                                <p class="card-text">Tgl: <span>{{ date('d M Y', strtotime($p->start_date)) }} - {{ date('d M Y', strtotime($p->end_date)) }}</span></p>
                                <p class="card-text">Titik Kumpul: <span>{{ substr($p->gather_point,0,20) }}</span></p>
                                <p class="card-text" style="float: right;">Anggota: <span style="font-weight: bold">{{ $p->join->count() }} / {{ $p->required_person }}</span></p>
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
        $("input[type='checkbox' ]:checked ").prop("checked ", false)
    };
    $('#resetChecklist').on('click', uncheckAll);

    $(function() {
        $('#filter_tanggal').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#filter_tanggal').on('apply.daterangepicker', function(ev, picker) {
            $('input[name="start_date"]').val(picker.startDate.format('YYYY-MM-DD'));
            $('input[name="end_date"]').val(picker.endDate.format('YYYY-MM-DD'));
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        });

        $('#filter_tanggal').on('cancel.daterangepicker', function(ev, picker) {
            $('input[name="start_date"]').val('');
            $('input[name="end_date"]').val('');
            $(this).val('');
        });

    });
</script>
@endsection
