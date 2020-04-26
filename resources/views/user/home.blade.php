<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Djalandjalan.com</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" media="all" href="{{ url('template/css/animate.css') }}">
    <link href="{{asset('template/css/home.css')}}" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand navbar-light justify-content-center fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"> <img id="home-logo" src="{{asset('template/assets/img/djalandjalanlogo.png')}}" width="150" height="auto" alt="" style="position: relative"></a>
            <div class="search">
                <input type="search" class="form-control" placeholder="Cari Destinasi Keinginanmu. Contoh: Bromo">
                <i class="fa fa-search"></i>
            </div>
            <ul class="navbar-nav nav-justified text-center">
                <li class="nav-item">
                    <a href="#makePost" id="tambahTrip" class="nav-link d-flex flex-column">
                        <i class="fa fa-plus-circle fa-lg"></i>
                        <span class="d-none d-sm-inline">Tambah</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link d-flex flex-column">
                        <i class="fa fa-commenting-o fa-lg"><span class="notif">new</span></i>
                        <span class="d-none d-sm-inline">Pesan</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Pesan</a></li>
                        <li><a href="#">Pesan</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link d-flex flex-column">
                        <i class="fa fa-bell fa-lg"></i>
                        <span class="d-none d-sm-inline">Notifikasi</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Notif</a></li>
                        <li><a href="#">Notif</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img src="{{asset('template/assets/img/profil.jpg')}}" class="avatar" alt="Avatar"><span> {{Auth::user()->name}}</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/profile') }}" class="dropdown-item"><i class="fa fa-user-o"></i> Profil</a></li>
                        <li><a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Pengaturan</a></li>
                        <li class="divider dropdown-divider"></li>
                        <li><a href="{{ url('/logout') }}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">

        <div class="top-wrap" style="height: 400px; margin-top:100px;">
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
                    Yuk cari teman travelling yang cocok dengan kamu dengan disini !
                </div>
            </div>
        </div>

        <div class="make-post" id="makePost">
            <div class="card" style="width: 80%;margin: 0 auto">
                <h5 class="card-header">Buat Trip</h5>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Upload Gambar</label>
                                    <input type="file" class="btn form-control-file" id="gambarTrip" style="height: 50px">
                                </div>
                            </div>
                            <div class="col-8">
                                <div>
                                    <label>Distinasi:</label>
                                    <input class="form-control" type="text" placeholder="Destinasi Tujuan">
                                </div>
                                <div>
                                    <label>Deskripsi:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Tulis Deskripsi Untuk Meningkatkan Minat Partners" required></textarea>
                                </div>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col">
                                        <div>
                                            <!-- <label>From:</label> -->
                                            <input class="form-control" type="date" placeholder="From">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <!-- <label>Titik Temu:</label> -->
                                            <input class="form-control" type="text" placeholder="Titik Temu">
                                        </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col">
                                        <div>
                                            <!-- <label>To:</label> -->
                                            <input class="form-control" type="date" placeholder="To">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <!-- <label>Jumlah Rombongan:</label> -->
                                            <input class="form-control" type="number" placeholder="Jumlah Rombongan">

                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success" style="float: right">Post</button>
                            </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="suggest" style="margin-top: 50px">
            <h3>Mungkin Kamu Cari</h3>
            <div class="row as">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="strat">
                        <a href="#">
                            <img src="{{asset('template/assets/img/gunung.png')}}" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="strat">
                        <a href="#">
                            <img src="{{asset('template/assets/img/pantai.png')}}" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="strat">
                        <a href="#">
                            <img src="{{asset('template/assets/img/airterjun.png')}}" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="strat">
                        <a href="#">
                            <img src="{{asset('template/assets/img/roadtrip.png')}}" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="strat">
                        <a href="#">
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
                        <button class="btn" type="button" onclick="window.location.href = 'partner.html';">
                            Tampilkan Semua
                        </button>

                    </div>
                </div>
            </div>

            <div class="row as2 partners-thread">

                @php
                $x = 0;
                @endphp
                @while ($x++ < 4)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="strat">
                        <a href="#">
                            <div class="card card-partners">
                                <div class="img-hover-zoom">
                                    <img src="{{asset('template/assets/img/bromo.jpg')}}" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <img src="{{asset('template/assets/img/profil.jpg')}}" class="display-profil" alt="Avatar">
                                    <h5 class="card-title">Gunung Bromo</h5>
                                    <h6 class="card-title">Ryan / Malang</h6>
                                    <p class="card-text">Tgl: <span>25 Agustus 2020 - 26 Agustus 2020</span></p>
                                    <p class="card-text">Titik Kumpul: <span>Stasiun Malang</span></p>
                                    <p class="card-text" style="float: right;">Butuh: <span style="font-weight: bold">4 orang lagi</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endwhile

            </div>
        </div>

        <div class="Adver">
            <h1 class="btn-block text-center">#ExploreMalang</h1>
            <h4 class="btn-block text-center">Nikmati keindahan alam Bumi Malang Raya</h4>
            <div class="row text-center">
                <div class="col-md-4 grid-explore">
                    <a href="#">
                        <div class="img-hover-zoom">
                            <img src="{{asset('template/assets/img/grid1.png')}}" style="width:100%">
                        </div>
                        <div class="overlay-bg">
                            <p>Gunung Bromo</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 grid-explore">
                    <a href="#">
                        <div class="img-hover-zoom">
                            <img src="{{asset('template/assets/img/grid2.png')}}" style="width:100%">
                        </div>
                        <div class="overlay-bg">
                            <p>Ranu Kumbolo<p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 grid-explore">
                    <a href="#">
                        <div class="img-hover-zoom">
                            <img src="{{asset('template/assets/img/grid3.png')}}" style="width:100%">
                        </div>
                        <div class="overlay-bg">
                            <p>Pantai Tiga Warna</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 grid-explore">
                    <a href="#">
                        <div class="img-hover-zoom">
                            <img src="{{asset('template/assets/img/grid4.png')}}" style="width:100%">
                        </div>
                        <div class="overlay-bg">
                            <p>Air Terjun Sumber Pitu</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 grid-explore">
                    <a href="#">
                        <div class="img-hover-zoom">
                            <img src="{{asset('template/assets/img/grid5.png')}}" style="width:100%">
                        </div>
                        <div class="overlay-bg">
                            <p>Gunung Semeru</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 grid-explore">
                    <a href="#">
                        <div class="img-hover-zoom">
                            <img src="{{asset('template/assets/img/grid6.png')}}" style="width:100%">
                        </div>
                        <div class="overlay-bg">
                            <p>Sumber Air Jenong</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="about">
            <h3 class="btn-block text-center">djalandjalan.com</h3>
            <div class="row" style="margin-top: 4%">
                <div class="col-md-6 text-right">
                    <h5>Tidak dipungut biaya!</h5><br>
                    <p>Cari teman yang cocok untuk kamu ajak djalandjalan ke destinasi keinginanmu. Kamu juga bisa cari
                        trip yang sesuai dengan apa yang kamu inginkan. Destinasi, tanggal keberangkatan, titik kumpul, jumlah
                        anggota? semua bisa diatur!. Iya, semudah itu kamu bisa djalandjalan sesukamu dengan Djalandjalan.com </p>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('template/assets/img/no-money.png')}}" style="height: 200px; object-fit: cover">
                </div>
            </div>
            <div class="row" style="margin-top: 4%">
                <div class="col-md-6 text-right">
                    <img src="{{asset('template/assets/img/calendar.png')}}" style="height: 200px; object-fit: cover">
                </div>
                <div class="col-md-6">
                    <h5>Atur jadwalmu sendiri sesuai keinginanmu!</h5><br>
                    <p>Cari teman yang cocok untuk kamu ajak djalandjalan ke destinasi keinginanmu. Kamu juga bisa cari
                        trip yang sesuai dengan apa yang kamu inginkan. Destinasi, tanggal keberangkatan, titik kumpul, jumlah
                        anggota? semua bisa diatur!. Iya, semudah itu kamu bisa djalandjalan sesukamu dengan Djalandjalan.com </p>
                </div>
            </div>
            <div class="row" style="margin-top: 4%">
                <div class="col-md-6 text-right">
                    <h5>Aman, handal dan terpecaya!</h5><br>
                    <p>Cari teman yang cocok untuk kamu ajak djalandjalan ke destinasi keinginanmu. Kamu juga bisa cari
                        trip yang sesuai dengan apa yang kamu inginkan. Destinasi, tanggal keberangkatan, titik kumpul, jumlah
                        anggota? semua bisa diatur!. Iya, semudah itu kamu bisa djalandjalan sesukamu dengan Djalandjalan.com </p>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('template/assets/img/safe.png')}}" style="height: 200px; object-fit: cover">
                </div>
            </div>
            <div class="row" style="margin-top: 4%">
                <div class="col-md-6 text-right">
                    <img src="{{asset('template/assets/img/trust.png')}}" style="height: 200px; object-fit: cover">
                </div>
                <div class="col-md-6">
                    <h5>Temukan relasi baru dari teman barumu!</h5><br>
                    <p>Cari teman yang cocok untuk kamu ajak djalandjalan ke destinasi keinginanmu. Kamu juga bisa cari
                        trip yang sesuai dengan apa yang kamu inginkan. Destinasi, tanggal keberangkatan, titik kumpul, jumlah
                        anggota? semua bisa diatur!. Iya, semudah itu kamu bisa djalandjalan sesukamu dengan Djalandjalan.com </p>
                </div>
            </div>
        </div>

    </div>

    <footer id="footer" style="background-color: white">
        <div class="container pt-5 border-bottom">
            <div class="row">
                <div class="col-md-3 col-sm-12 mb-3 text-center">
                    <img id="home-logo" src="{{asset('template/assets/img/djalandjalanlogo.png')}}" width="100%" height="auto" alt="" style="position: relative">
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="col-md-3 col-sm-6 col-6 p-0 float-left">
                        <h5 class="mb-4 font-weight-bold text-uppercase">Produk</h5>
                        <ul class="list-group">
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#">Partners</a></li>
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#">Persewaan Alat</a></li>
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#">Agen Travel</a></li>
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#">Tour Guide</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-6 col-6 p-0 mb-3 float-left">
                        <h5 class="mb-4 font-weight-bold text-uppercase">Agen</h5>
                        <ul class="list-group">
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#">Cara Gabung</a></li>
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#">Keuntungan</a></li>
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#">Beriklan di djalandjalan.com</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-6 col-6 mb-3 p-0 float-left">
                        <h5 class="mb-4 font-weight-bold text-uppercase">Dukungan</h5>
                        <ul class="list-group">
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#"></i>Tentang Kami</a></li>
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#"></i>Bantuan</a></li>
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#"></i>Syarat & Ketentuan</a></li>
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#"></i>Kebijakan Privasi</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 col-6 mb-3 p-0 float-left">
                        <h5 class="mb-4 font-weight-bold text-uppercase">Temukan Kami</h5>
                        <ul class="list-group">
                            <li class="list-group-item bg-transparent border-0 p-0 mb-2">
                                <a href="#"><img src="{{asset('template/assets/img/twitter1.png')}}"></a>
                                <a href="#"><img src="{{asset('template/assets/img/path1.png')}}"></a>
                                <a href="#"><img src="{{asset('template/assets/img/ig1.png')}}"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="py-4 d-flex justify-content-center align-items-center">
                        <div class="container">
                            <p class="m-0 text-center">Copyright &copy; djalandjalan.com 2020</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
    <script src="{{asset('template/js/slick.js')}}"></script>

    <script type="text/javascript">
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("landing-slide");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 4000); // Change image every 2 seconds
        }

        $("#tambahTrip").click(function() {
            $('html,body').animate({
                scrollTop: $("#makePost").offset().top
            },
            'slow');
        });


        $(function() {
            $('.landing-text').addClass('animated fadeInUp');
        });
        $(function() { // animate logo tagline
            $('.sub-landing-text').addClass('animated fadeInUp');
        }, 500);
    </script>

</body>

</html>
