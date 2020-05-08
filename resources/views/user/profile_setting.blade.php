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
                    <a class="nav-link disabled" id="varifikasiAkun-tab" data-toggle="pill" href="#verifikasiAkun" role="tab" aria-controls="verifikasiAkun" aria-selected="false">Verifikasi Akun</a>
                    <a class="nav-link disabled" id="ubahPassword-tab" data-toggle="pill" href="#ubahPassword" role="tab" aria-controls="ubahPassword" aria-selected="false">Ubah Password</a>
                    <a class="nav-link disabled" id="ubahEmail-tab" data-toggle="pill" href="#ubahEmail" role="tab" aria-controls="ubahEmail" aria-selected="false">Ubah Email</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">

                    <div class="tab-pane fade show active" id="ubahProfil" role="tabpanel" aria-labelledby="ubahProfil-tab">
                        <form action="{{ url('/profile/setting/edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row" style="padding: 25px;">

                                <div class="col-4 text-right mb-3">
                                    <img src="{{ Auth::user()->picture }}" class="avatar avatar-setting" alt="Avatar" id="preview-photo-profile">
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <h5 for="changePhotoProfile">Ganti Foto Profil</h5>
                                        <input type="file" name="picture" class="form-control-file" id="changePhotoProfile">
                                        @error('picture')
                                        <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-4 text-right mb-3">
                                    <h5>Nama</h5>
                                </div>
                                <div class="col-8">
                                    <input autocomplete="off" type="text" value="{{ Auth::user()->name }}" name="name" class="form-control" id="editNama">
                                    @error('name')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-4 text-right mb-3">
                                    <h5>Nama Panggilan</h5>
                                </div>
                                <div class="col-8">
                                    <input autocomplete="off" type="text" name="nick_name" value="{{ Auth::user()->nick_name }}" class="form-control" id="editNamaPanggilan">
                                    @error('nick_name')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-4 text-right mb-3">
                                    <h5>Domisili</h5>
                                </div>
                                <div class="col-8">
                                    <input autocomplete="off" type="text" value="{{ Auth::user()->city }}" name="city" class="form-control" id="domisili">
                                    @error('city')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-4 text-right mb-3">
                                    <h5>Tanggal Lahir</h5>
                                </div>
                                <div class="col-8">
                                    <input autocomplete="off" type="date" value="{{ Auth::user()->birth }}" name="birth" class="form-control" id="editTanggalLahir">
                                    @error('birth')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-4 text-right mb-3">
                                    <h5>Bio</h5>
                                </div>
                                <div class="col-8">
                                    <textarea autocomplete="off" name="description" rows="6" style="width: 100%;">{{ Auth::user()->description }}</textarea>
                                </div>

                                <div class="col-4 text-right mb-3">
                                    <h5>Minat & Hobi</h5>
                                </div>
                                <div class="col-8">
                                    <select class="form-control inputHobi" multiple="multiple" disabled>
                                        <option selected="selected">Sorry</option>
                                        <option selected="selected">Feature</option>
                                        <option>Musik</option>
                                        <option selected="selected">Not Available</option>
                                        <option selected="selected">Right Now</option>
                                    </select>
                                </div>

                                <div class="col-4 text-right mb-3">
                                    <h5>Jenis Kelamin</h5>
                                </div>
                                <div class="col-8">
                                    @php
                                    $gender = (is_null(Auth::user()->gender) ? '3' : Auth::user()->gender);
                                    @endphp
                                    <select class="form-control" id="inputGender" name="gender">
                                        <option></option>
                                        <option value="1" @if($gender==1) selected @endif>Laki-laki</option>
                                        <option value="0" @if($gender==0) selected @endif>Perempuan</option>
                                    </select>
                                    @error('gender')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </form>
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
        $('.editDomisili').select2();
    });
    function readURL(input, loc) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
                $(loc).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
    }
    $("#pilihKTP ").change(function() {
        readURL(this, '#previewKTP');
    });
    $("#changePhotoProfile ").change(function() {
        readURL(this, '#preview-photo-profile');
    });
</script>
@endsection
