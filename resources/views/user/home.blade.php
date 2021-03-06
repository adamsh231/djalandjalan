@extends('layout/main')

@section('lang', 'id')
@section('title', 'Home | djalandjalan.com')

@section('add_style')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" rel="stylesheet" />
<link href="{{asset('template/css/home.css')}}" rel="stylesheet">
<style>
    /* *{
        border: 1px solid red
    } */
</style>
@endsection

@section('content')
<div class="container">

    <form id="form_filter" action="{{ url('/partner') }}" method="GET">
        <div class="search">
            <div class="pencarian ">
                <input type="hidden" name="start_date">
                <input type="hidden" name="end_date">
                <div class="row">
                    <div class="col-6">
                        <input autocomplete="off" style="width: 100%" type="search" name="search" class="form-control pull-left" placeholder="Cari Destinasi Keinginanmu">
                    </div>
                    <div class="col-4">
                        <input autocomplete="off" style="width: 100%" type="text" id="datefilter" class="form-control pull-left" placeholder="Pilih Tanggal" value="">
                    </div>
                    <div class="col-2 text-right">
                        <button class="btn btn-core" type="submit"><i class="fa fa-search"></i> Cari</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="top-wrap" style="height: 400px; margin-top:10px;">
        <div class="landing">
            <img class="landing-slide" src="{{asset('template/assets/img/journey.png')}}">
            <img class="landing-slide" width="500" src="{{asset('template/assets/img/traveling1.png')}}">
            <img class="landing-slide" src="{{asset('template/assets/img/traveling2.png')}}">
        </div>
        <div class="openingText">
            <div class="landing-text">
                Pengen liburan<br>
                bingung dengan<span style="color: #2ED1A2"> siapa?</span><br>
            </div>
            <div class="sub-landing-text">
                Yuk cari teman travelling yang cocok dengan kamu dengan disini!
            </div>
        </div>
    </div>

    <div class="suggest" style="margin-top: 50px">
        <h3>Mungkin Kamu Cari</h3>
        <div class="row as">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="strat">
                    <a href="{{ url('/partner?category=gunung') }}">
                        <img src="{{asset('template/assets/img/gunung.png')}}" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="strat">
                    <a href="{{ url('/partner?category=pantai') }}">
                        <img src="{{asset('template/assets/img/pantai.png')}}" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="strat">
                    <a href="{{ url('/partner?category=air terjun') }}">
                        <img src="{{asset('template/assets/img/airterjun.png')}}" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="strat">
                    <a href="{{ url('/partner?category=road trip') }}">
                        <img src="{{asset('template/assets/img/roadtrip.png')}}" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="strat">
                    <a href="{{ url('/partner?category=air terjun') }}">
                        <img src="{{asset('template/assets/img/airterjun.png')}}" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="partners-home">
        <div class="heading-partners">
            <div class="row">
                <div class="col-md-6">
                    <div style="margin-bottom: 2%; line-height: 10px">
                        <h3>Partners</h3>
                        <p> Cari teman travelling yang cocok dengan kamu</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-sm btn-core" type="button" onclick="window.location.href = '{{ url('/partner') }}';">
                        Tampilkan Semua
                    </button>
                </div>
            </div>
        </div>

        <div class="row as2">

            @foreach ($partner as $p)
            <div class="strat thread-partner">
                <a href="{{ url('/partner/'.$p->id) }}">
                    <div class="card card-partners">
                        <div class="img-hover-zoom">
                            <img src="{{ $p->dest_picture }}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <a href="{{ url('/profile/'.$p->user->id) }}">
                                <img src="{{ $p->user->picture }}" class="display-profil" alt="Avatar">
                            </a>
                            <h5 class="card-title">{{ $p->dest_name }}</h5>
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

    <div class="Adver">
        <h1 class="btn-block text-center">#ExploreMalang</h1>
        <h4 class="btn-block text-center">Nikmati keindahan alam Bumi Malang Raya</h4>
        <div class="row text-center">
            <div class="col-md-4 grid-explore">
                <a href="#">
                    <div class="img-hover-zoom img-adver">
                        <img src="{{asset('template/assets/img/grid1.png')}}" style="width:100%">
                    </div>
                    <div class="overlay-bg">
                        <p>Gunung Bromo</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 grid-explore">
                <a href="#">
                    <div class="img-hover-zoom img-adver">
                        <img src="{{asset('template/assets/img/grid2.png')}}" style="width:100%">
                    </div>
                    <div class="overlay-bg">
                        <p>Ranu Kumbolo<p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 grid-explore">
                <a href="#">
                    <div class="img-hover-zoom img-adver">
                        <img src="{{asset('template/assets/img/grid3.png')}}" style="width:100%">
                    </div>
                    <div class="overlay-bg">
                        <p>Pantai Tiga Warna</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 grid-explore">
                <a href="#">
                    <div class="img-hover-zoom img-adver">
                        <img src="{{asset('template/assets/img/grid4.png')}}" style="width:100%">
                    </div>
                    <div class="overlay-bg">
                        <p>Air Terjun Sumber Pitu</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 grid-explore">
                <a href="#">
                    <div class="img-hover-zoom img-adver">
                        <img src="{{asset('template/assets/img/grid5.png')}}" style="width:100%">
                    </div>
                    <div class="overlay-bg">
                        <p>Gunung Semeru</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 grid-explore">
                <a href="#">
                    <div class="img-hover-zoom img-adver">
                        <img src="{{asset('template/assets/img/grid6.png')}}" style="width:100%">
                    </div>
                    <div class="overlay-bg">
                        <p>Sumber Air Jenong</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="about scroll-animations">
        <h3 class="btn-block text-center landing-text">djalandjalan.com</h3>
        <div class="row " style="margin-top: 4%;">
            <div class="col-md-6 text-right elemenKiri">
                <h5>Tidak dipungut biaya!</h5><br>
                <p>Cari teman yang cocok untuk kamu ajak djalandjalan ke destinasi keinginanmu. Kamu juga bisa cari trip yang sesuai dengan apa yang kamu inginkan. Destinasi, tanggal keberangkatan, titik kumpul, jumlah anggota? semua bisa diatur!. Iya,
                    semudah itu kamu bisa djalandjalan sesukamu dengan Djalandjalan.com </p>
            </div>
            <div class="col-md-6 elemenKanan">
                <img src="{{asset('template/assets/img/no-money.png')}}" style="height: 200px; object-fit: cover">
            </div>
        </div>
        <div class="row" style="margin-top: 4%">
            <div class="col-md-6 text-right elemenKiri">
                <img src="{{asset('template/assets/img/calendar.png')}}" style="height: 200px; object-fit: cover">
            </div>
            <div class="col-md-6 elemenKanan">
                <h5>Atur jadwalmu sendiri sesuai keinginanmu!</h5><br>
                <p>Cari teman yang cocok untuk kamu ajak djalandjalan ke destinasi keinginanmu. Kamu juga bisa cari trip yang sesuai dengan apa yang kamu inginkan. Destinasi, tanggal keberangkatan, titik kumpul, jumlah anggota? semua bisa diatur!. Iya,
                    semudah itu kamu bisa djalandjalan sesukamu dengan Djalandjalan.com </p>
            </div>
        </div>
        <div class="row" style="margin-top: 4%">
            <div class="col-md-6 text-right elemenKiri">
                <h5>Aman, handal dan terpecaya!</h5><br>
                <p>Cari teman yang cocok untuk kamu ajak djalandjalan ke destinasi keinginanmu. Kamu juga bisa cari trip yang sesuai dengan apa yang kamu inginkan. Destinasi, tanggal keberangkatan, titik kumpul, jumlah anggota? semua bisa diatur!. Iya,
                    semudah itu kamu bisa djalandjalan sesukamu dengan Djalandjalan.com </p>
            </div>
            <div class="col-md-6 elemenKanan">
                <img src="{{asset('template/assets/img/safe.png')}}" style="height: 200px; object-fit: cover">
            </div>
        </div>
        <div class="row" style="margin-top: 4%">
            <div class="col-md-6 text-right elemenKiri">
                <img src="{{asset('template/assets/img/trust.png')}}" style="height: 200px; object-fit: cover">
            </div>
            <div class="col-md-6 elemenKanan">
                <h5>Temukan relasi baru dari teman barumu!</h5><br>
                <p>Cari teman yang cocok untuk kamu ajak djalandjalan ke destinasi keinginanmu. Kamu juga bisa cari trip yang sesuai dengan apa yang kamu inginkan. Destinasi, tanggal keberangkatan, titik kumpul, jumlah anggota? semua bisa diatur!. Iya,
                    semudah itu kamu bisa djalandjalan sesukamu dengan Djalandjalan.com </p>
            </div>
        </div>
    </div>

</div>
@endsection

@section('add_script')
<script type="text/javascript " src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js "></script>
<script type="text/javascript " src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
<script src="{{asset('template/js/slick.js')}}"></script>

<script type="text/javascript ">
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("landing-slide ");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none ";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block ";
        setTimeout(carousel, 4000); // Change image every 2 seconds
    }

    $(document).ready(function() {
    // Check if element is scrolled into view
    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();

        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }
    // If element is scrolled into view, fade it in
    $(window).scroll(function() {
        $('.scroll-animations .elemenKiri ').each(function() {
            if (isScrolledIntoView(this) === true) {
                $(this).addClass('animated');
                $(this).addClass('slideInLeft');
            }
            });
            $('.scroll-animations .elemenKanan ').each(function() {
            if (isScrolledIntoView(this) === true) {
                $(this).addClass('animated');
                $(this).addClass('slideInRight');
            }
            });
        });
    });

    $(function() {
        $('#datefilter').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#datefilter').on('apply.daterangepicker', function(ev, picker) {
            $('#form_filter input[name=start_date]').val(picker.startDate.format('YYYY-MM-DD'));
            $('#form_filter input[name=end_date]').val(picker.endDate.format('YYYY-MM-DD'));
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        });

        $('#datefilter').on('cancel.daterangepicker', function(ev, picker) {
            $('#form_filter input[name=start_date]').val('');
            $('#form_filter input[name=end_date]').val('');
            $(this).val('');
        });

    });

</script>
@endsection
