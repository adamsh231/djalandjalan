@extends('layout/main')

@section('lang', 'id')
@section('title', 'About Us | djalandjalan.com')

@section('add_style')
<link href="{{asset('template/css/about-us.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="mt-65"></div>
<div class=" wrapper ">
    <div class="bg banner-top ">
        <div class="overlay-bg img-fluid ">
            <h4>Tentang Kami</h4>
        </div>
    </div>
    <div class="container aboutUs ">
        <h4>Selamat datang di djalandjalan</h4>
        <div class="row">
            <div class="col-4">
                <img src="{{asset('template/assets/img/aboutUs-bg.jpg')}}" style="width: 100%; border-radius: 5%;">
            </div>
            <div class="col-8">
                <p class="text-justify">
                    <strong>Djalandjalan.com</strong> adalah platform yang membantu dan mempermudah kamu dalam mendapatkan teman traveling baru secara gratis! Selain itu kamu dapat melakukan epen trip yang sesuai dengan keinginan dan rencana perjalanan
                    kamu dengan menyediakan informasi yang lengkap dan tepat sehingga kamu tinggal bertraveling dengan pengalaman dan kesan baru. Karena dengan Djalandjalan kamu tidak perlu takut untuk bertraveling dengan orang baru!
                    <br><br>Perjalanan Djalandjalan dimulai pada tahun 2019 berawal dari keinginan untuk membantu traveler dalam bertraveling, menjadi pusat pertukaran informasi tentang wisata alam di Indonesia dan memberdayakan pihak-pihak yang berkaitan.
                    Untuk menggapai impian dan cita-cita tersebut kami meluncurkan produk pertama kami, yakni <strong>Partners (Membantu traveler mencari teman)</strong> dan <strong> Marketplace Open Trip Indonesia (Memberdayakan traveler yang ingin membuka opentrip untuk mendapatkan pelanggan)</strong>.
                    <br><br> Jalan-jalan dengan orang baru? siapa takut!
                </p>
            </div>
        </div>
    </div>
    <div id="keamanan" class="text-center">
        <div class="overlay-bg text-center">
            <h4>Keamanan</h4>
            <p style="padding: 0 5% 0 5%">
                Tidak perlu khawatir untuk memutuskan bergabung dan travelling melalui <strong>Djalandjalan</strong>! Karena <strong>djalandjalan</strong> selalu berusaha memberikan informasi selengkap dan seakurat mungkin yang dibutuhkan, agar kamu
                merasa aman ketika bertravelling dengan orang baru.
            </p>
        </div>
    </div>
    <div class="container">
        <h4 class="text-center" style="margin-top: 5%;">Mengapa harus djalandjalan dalam mencari teman travelling dan jasa open trip?</h4>
        <div class="row " style="margin-top: 4%;">
            <div class="col-md-10 mx-auto">

                <div class="join-djalandjalan">
                    <div class="join-djalandjalan-num text-center">
                        <span>01</span>
                    </div>
                    <div class="join-djalandjalan-tip">
                        <h5 class="join-djalandjalan-header">Rating & Review</h5>
                        <p class="join-djalandjalan-body">
                            Kami menyediakan sistem feedback agar kamu tau bagaimana performa calon teman baru traveling kamu dan penyedia jasa opener trip!
                        </p>
                    </div>
                </div>
                <div class="join-djalandjalan">
                    <div class="join-djalandjalan-num text-center">
                        <span>02</span>
                    </div>
                    <div class="join-djalandjalan-tip">
                        <h5 class="join-djalandjalan-header">Asuransi</h5>
                        <p class="join-djalandjalan-body">
                            Kamu takut terjadi hal-hal yang tidak diinginkan? Jangan takut! Kami bekerja sama dengan institusi penyedia asuransi travelling yang produk asuransinya bisa kamu pilih sesuai dengan keinginan dan kebutuhan kamu!
                        </p>
                    </div>
                </div>
                <div class="join-djalandjalan">
                    <div class="join-djalandjalan-num text-center">
                        <span>03</span>
                    </div>
                    <div class="join-djalandjalan-tip">
                        <h5 class="join-djalandjalan-header">About traveler & Opener trip</h5>
                        <p class="join-djalandjalan-body">
                            Butuh informasi mendetail tentang calon teman baru kamu dan/atau penyedia jasa open trip? Tidak sulit mencari informasinya karena tersedia informasi tersebut dari fitur ini!
                        </p>
                    </div>
                </div>
                <div class="join-djalandjalan">
                    <div class="join-djalandjalan-num text-center">
                        <span>04</span>
                    </div>
                    <div class="join-djalandjalan-tip">
                        <h5 class="join-djalandjalan-header">Rencana Perjalanan</h5>
                        <p class="join-djalandjalan-body">
                            Tidak usah bertanya lagi kepada calon teman baru/penyedia jasa open trip kapan perjalanan travelingnya akan dilaksanakan! Karena kamu bisa melihatnya sendiri di fitur rencana perjalanan!
                        </p>
                    </div>
                </div>
                <div class="join-djalandjalan">
                    <div class="join-djalandjalan-num text-center">
                        <span>05</span>
                    </div>
                    <div class="join-djalandjalan-tip">
                        <h5 class="join-djalandjalan-header">Suspension</h5>
                        <p class="join-djalandjalan-body">
                            Kami sangat melindungi kamu dan menjunjung tinggi hukum di Indonesia! Apabila terdapat pihak yang melakukan hal-hal melanggar hukum, akan kami bantu menyediakan informasi yang dibutuhkan agar proses hukum dapat berjalan dan menghentikan akunnya! Sehingga
                            kamu tidak perlu takut ada pihak jahat yang menggunakan jasa kami, karena kami ingin komunitas yang ada di Djalandjalan terlindungi dengan baik!
                        </p>
                    </div>
                </div>
                <div class="join-djalandjalan">
                    <div class="join-djalandjalan-num text-center">
                        <span>06</span>
                    </div>
                    <div class="join-djalandjalan-tip">
                        <h5 class="join-djalandjalan-header">Verifikasi profil</h5>
                        <p class="join-djalandjalan-body">
                            Deskripsi diri bisa dipalsukan? Jangan khawatir! Karena Djalandjalan mencegah hal tersebut dengan mencocokan data diri member kami dengan KTP yang mereka! Sehingga mereka tidak bisa memalsukan identitasnya! Dan pihak yang telah sesuai data dirinya akan
                            kami beri tanda verified!
                        </p>
                    </div>
                </div>
                <div class="join-djalandjalan">
                    <div class="join-djalandjalan-num text-center">
                        <span>07</span>
                    </div>
                    <div class="join-djalandjalan-tip">
                        <h5 class="join-djalandjalan-header">Deskripsi tempat tujuan</h5>
                        <p class="join-djalandjalan-body">
                            Tidak tahu tentang tempat travelling yang hendak dituju oleh calon teman baru dan/atau penyedia jasa open trip? Tidak perlu takut, karena kamu bisa mendapatkan informasi tentang tempat tujuan dengan fitur deskripsi tempat tujuan!
                        </p>
                    </div>
                </div>
                <div class="join-djalandjalan">
                    <div class="join-djalandjalan-num text-center">
                        <span>08</span>
                    </div>
                    <div class="join-djalandjalan-tip">
                        <h5 class="join-djalandjalan-header">GRATIS</h5>
                        <p class="join-djalandjalan-body">
                            <strong>GRATIS</strong>, tidak dipungut biaya sedikitpun kecuali biaya traveling itu sendiri! Untuk kamu yang mencari teman dan penyedia jasa opentrip, karena kami ingin membantu kamu!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
