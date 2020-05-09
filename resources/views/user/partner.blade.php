@extends('layout/main')

@section('lang', 'id')
@section('title', 'Partner | djalandjalan.com')

@section('add_style')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="{{asset('template/css/home.css')}}" rel="stylesheet">
<link href="{{asset('template/css/partners.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container page-content">

    <form id="form_search">
        <div class="search mb-2">
            <div class="row align-items-center">
                <div class="col">
                    <input autocomplete="off" name="filter_tempat" value="{{ $old_key['filter_tempat'] ?? "" }}" type="search" class="form-control pull-left" placeholder="Cari Destinasi Keinginanmu">
                </div>
                <div class="col-auto text-right">
                    <button class="btn btn-core" type="submit"><i class="fa fa-search"></i> Cari</button>
                </div>
            </div>
        </div>
    </form>

    <div class="row">

        <div class="col-2">

            <form id="form_filter">
                <input type="hidden" name="filter_tempat">
                <input type="hidden" name="start_date">
                <input type="hidden" name="end_date">

                <div class="filter mt-4">
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
                        <b>Kategori</b>
                        <select class="form-control" name="filter_kategori">
                            <option></option>
                            <option value="gunung">Gunung</option>
                            <option value="pantai">Pantai</option>
                            <option value="air terjun">Air Terjun</option>
                            <option value="road trip">Road Trip</option>
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
                            <option value="ASC">Menaik</option>
                            <option value="DESC">Menurun</option>
                        </select>
                    </div>
                </div>

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

            <div class="row partners-thread">

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
                                <p class="card-text" style="float: right;">Anggota: <span style="font-weight: bold">{{ $p->join->where('status',1)->count() }} / {{ $p->required_person }}</span></p>
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
        $("#form_filter input[type='checkbox' ]:checked ").prop("checked ", false)
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
            $('#form_filter input[name="start_date"]').val(picker.startDate.format('YYYY-MM-DD'));
            $('#form_filter input[name="end_date"]').val(picker.endDate.format('YYYY-MM-DD'));
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        });

        $('#filter_tanggal').on('cancel.daterangepicker', function(ev, picker) {
            $('#form_filter input[name="start_date"]').val('');
            $('#form_filter input[name="end_date"]').val('');
            $(this).val('');
        });

    });
</script>
<script>
    $('#form_filter input[name=filter_tempat]').val($('#form_search input[name=filter_tempat]').val());
    $('#form_search').on('change', function(){
        $('#form_filter input[name=filter_tempat]').val($('#form_search input[name=filter_tempat]').val());
    });
</script>
@endsection
