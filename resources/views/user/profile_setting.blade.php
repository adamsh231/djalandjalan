@extends('layout/main')

@section('lang', 'id')
@section('title', 'Partner | djalandjalan.com')

@section('add_style')
<link rel="stylesheet" type="text/css" href="{{asset('template/vendor/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('template/css/profil.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container" style="margin-top: 100px;margin-bottom: 100px;">
    <div class="wrapper-setting">
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="ubahProfil-tab" data-toggle="pill" href="#ubahProfil" role="tab" aria-controls="ubahProfil" aria-selected="true">Ubah Profil</a>
                    <a class="nav-link" id="varifikasiAkun-tab" data-toggle="pill" href="#verifikasiAkun" role="tab" aria-controls="verifikasiAkun" aria-selected="false">Verifikasi Akun</a>
                    <a class="nav-link" id="ubahPassword-tab" data-toggle="pill" href="#ubahPassword" role="tab" aria-controls="ubahPassword" aria-selected="false">Ubah Password</a>
                    <a class="nav-link" id="ubahEmail-tab" data-toggle="pill" href="#ubahEmail" role="tab" aria-controls="ubahEmail" aria-selected="false">Ubah Email</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="ubahProfil" role="tabpanel" aria-labelledby="ubahProfil-tab">
                        <div class="row" style="padding: 25px;">
                            <div class="col-4 text-right mb-3">
                                <img src="{{ Auth::user()->picture }}" class="avatar avatar-setting" alt="Avatar" id="preview-photo-profile">
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <h5 for="changePhotoProfile">Ganti Foto Profil</h5>
                                    <input type="file" class="form-control-file" id="changePhotoProfile">
                                </div>
                            </div>

                            <div class="col-4 text-right mb-3">
                                <h5>Nama</h5>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="editNama">
                            </div>

                            <div class="col-4 text-right mb-3">
                                <h5>Nama Panggilan</h5>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="editNamaPanggilan">
                            </div>

                            <div class="col-4 text-right mb-3">
                                <h5>Domisili</h5>
                            </div>
                            <div class="col-8">
                                <select class="form-control editDomisili" name="state">
                                    <option value=""></option>
                                    <option value="">Malang</option>
                                    <option value="">Jakarta</option>
                                    <option value="">Bogor</option>
                                    <option value="">Surabaya</option>
                                  </select>
                                <small id="smallDomisili" class="form-text text-muted" style="margin-top: 0; margin-bottom: 10px;">Masukan sesuai domisili anda sekarang</small>
                            </div>

                            <div class="col-4 text-right mb-3">
                                <h5>Tanggal Lahir</h5>
                            </div>
                            <div class="col-8">
                                <input type="date" class="form-control" id="editTanggalLahir">
                            </div>

                            <div class="col-4 text-right mb-3">
                                <h5>Bio</h5>
                            </div>
                            <div class="col-8">
                                <textarea style="width: 100%;"></textarea>
                            </div>

                            <div class="col-4 text-right mb-3">
                                <h5>Minat & Hobi</h5>
                            </div>
                            <div class="col-8">
                                <select class="form-control inputHobi" multiple="multiple">
                                    <option selected="selected">Travelling</option>
                                    <option>Musik</option>
                                    <option selected="selected">fotografi</option>
                                  </select>
                            </div>

                            <div class="col-4 text-right mb-3">
                                <h5>Jenis Kelamin</h5>
                            </div>
                            <div class="col-8">
                                <select class="form-control" id="inputGender">
                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>
                                  </select>
                            </div>

                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm">Kirim</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="verifikasiAkun" role="tabpanel" aria-labelledby="verifikasiAkun-tab">
                        <div class="uploadKTP text-center">
                            <form>
                                <div class="previewKTP ">
                                    <img id="previewKTP">
                                </div>
                                <div class="dropzone-wrapper">
                                    <div class="dropzone-desc">
                                        <i class="fa fa-upload fa-2x" aria-hidden="true"></i>
                                        <p>Pilih foto KTP</p>
                                    </div>
                                    <input type="file" id="pilihKTP" class="dropzone">
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-top: 25px;">Kirim</button>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="ubahPassword" role="tabpanel" aria-labelledby="ubahPassword-tab">
                        <div class="row" style="padding: 25px;">
                            <div class="col-4 text-right mb-3">
                                <h5>Pasword Lama</h5>
                            </div>
                            <div class="col-8">
                                <input type="password" class="form-control" id="oldPassword">
                            </div>

                            <div class="col-4 text-right mb-3">
                                <h5>Password Baru</h5>
                            </div>
                            <div class="col-8">
                                <input type="password" class="form-control" id="newPassword">
                            </div>

                            <div class="col-4 text-right mb-3">
                                <h5>Konfirmasi Password Baru</h5>
                            </div>
                            <div class="col-8">
                                <input type="password" class="form-control" id="confirmPassword">
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm">Ubah</button><br>
                            <a href="#">Lupa Password?</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="ubahEmail" role="tabpanel" aria-labelledby="ubahEmail-tab">
                        <div class="row" style="padding: 25px;">
                            <div class="col-4 text-right mb-3">
                                <h5>Email Baru</h5>
                            </div>
                            <div class="col-8">
                                <input type="email" class="form-control" id="newEmail">
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm">Verifikasi Email</button><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('add_script')
<script src="{{asset('template/vendor/select2/select2.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $(".inputHobi ").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })
    });
</script>
@endsection
