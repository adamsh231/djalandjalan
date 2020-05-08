@extends('layout/main')

@section('lang', 'id')
@section('title', 'Help | djalandjalan.com')

@section('add_style')
<link href="{{asset('template/css/about-us.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="mt-65"></div>

<div class="container" style="padding-top: 50px;">
    <div class="row">
        <div class="col-lg-3 sidebar-wrapper">
            <div style="margin-bottom: 25px;">
                <h3>Alur Penggunaan</h3>
                <label>Informasi cara pemakaian aplikasi</label>
            </div>
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="asHost-tab" data-toggle="pill" href="#asHost" role="tab" aria-controls="v-pills-home" aria-selected="true">Sebagai Host</a>
                <a class="nav-link" id="asMember-tab" data-toggle="pill" href="#asMember" role="tab" aria-controls="v-pills-profile" aria-selected="false">Sebagai Anggota</a>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="tab-content" id="v-pills-tabContent">

                <div class="tab-pane fade show active" id="asHost" role="tabpanel" aria-labelledby="asHost-tab">
                    <div class="steps">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="step">
                                    <img src="{{asset('template/assets/img/stepHost1.png')}}" alt="">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="step">
                                    <img src="{{asset('template/assets/img/stepHost2.png')}}" alt="">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="step">
                                    <img src="{{asset('template/assets/img/stepHost3.png')}}" alt="">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="step">
                                    <img src="{{asset('template/assets/img/stepHost4.png')}}" alt="">
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="step">
                                    <img src="{{asset('template/assets/img/stepHost5.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="asMember" role="tabpanel" aria-labelledby="asMember-tab">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="asHost" role="tabpanel" aria-labelledby="asHost-tab">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="step">
                                        <img src="{{asset('template/assets/img/step1.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="step">
                                        <img src="{{asset('template/assets/img/step2.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="step">
                                        <img src="{{asset('template/assets/img/step3.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="step">
                                        <img src="{{asset('template/assets/img/step4.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="step">
                                        <img src="{{asset('template/assets/img/step5.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="step">
                                        <img src="{{asset('template/assets/img/step6.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
