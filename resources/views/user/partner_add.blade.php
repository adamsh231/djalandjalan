@extends('layout/main')

@section('lang', 'id')
@section('title', 'Add Partner | djalandjalan.com')

@section('add_style')
<link rel="stylesheet" type="text/css" href="{{asset('template/css/daterangepicker.css')}}" />
<link type="text/css" href="{{asset('template/vendor/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('template/css/buatTrip.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">

    <form id="form_add_partner" action="{{ url('/partner/add') }}" class="formBuatTrip" method="POST" enctype="multipart/form-data">
        @csrf
        <h2 style="margin-bottom: 25px;">Buat Trip</h2>
        <div class="row">

            <div class="col">

                <h5>Upload Foto<sup class="text-danger">*</sup></h5>
                <div class="uploadFotoTrip shadowBox">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="file" class="form-control-file" name="dest_picture" id="fotoTrip">
                            </div>
                        </div>
                        <div class="col">
                            <div class="viewPic">
                                <img id="reviewPic">
                            </div>
                        </div>
                    </div>
                </div>
                @error('dest_picture')
                <small style="color: red">{{ $message }}</small>
                @enderror

                <h5 style="margin-top: 25px;">Kategori Trip<sup class="text-danger">*</sup></h5>
                <input type="hidden" name="categories">
                <select class="form-control inputHobi shadowBox" multiple="multiple">
                    <option>Gunung</option>
                    <option>Pantai</option>
                    <option>Road Trip</option>
                    <option>Air Terjun</option>
                </select>
                @error('categories')
                <small style="color: red">{{ $message }}</small>
                @enderror

            </div>

            <div class="col">
                <div class="inputTrip">

                    <div class="mb-2">
                        <h5>Tujuan Destinasi</h5>
                        <input type="text" value="{{ old('dest_name') }}" autocomplete="off" name="dest_name" class="form-control shadowBox mb-0" placeholder="Contoh: Gunung Semeru">
                        @error('dest_name')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <h5>Lokasi Destinasi</h5>
                        <input type="text" value="{{ old('dest_location') }}" autocomplete="off" name="dest_location" class="form-control shadowBox mb-0" placeholder="Contoh: Malang">
                        @error('dest_location')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <input type="hidden" name="start_date">
                        <input type="hidden" name="end_date">
                        <div class="row">
                            <div class="col">
                                <h5>Tanggal Trip<sup class="text-danger">*</sup></h5>
                                <input type="text" autocomplete="off" id="tanggal" class="form-control shadowBox mb-0" placeholder="Pilih Tanggal" value="">
                            </div>
                            <div class="col">
                                <h5>Durasi</h5>
                                <input type="text" autocomplete="off" class="form-control shadowBox mb-0" id="durasiTrip" disabled value="">
                            </div>
                        </div>
                        @error('start_date')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <h5>Titik Kumpul</h5>
                        <input type="text" value="{{ old('gather_point') }}" name="gather_point" autocomplete="off" class="form-control shadowBox mb-0" placeholder="Contoh: Depan loket stasiun balapan, surabaya.">
                        @error('gather_point')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <h5>Jumlah Anggota</h5>
                        <input type="number" value="{{ old('required_person') }}" name="required_person" autocomplete="off" class="form-control shadowBox mb-0" placeholder="Jumlah anggota yang dibutuhkan contoh: 7">
                        @error('required_person')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <h5>Deskripsi Trip</h5>
                        <textarea name="description" class="form-control shadowBox mb-0" autocomplete="off">{{ old('description') }}</textarea>
                        @error('description')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <div class="mb-2">
                    <div class="form-check">
                        <input class="form-check-input" name="agreement" type="checkbox" id="defaultCheck1" {{ (old('agreement') == 'true' ? 'checked' : '') }}>
                        <label class="form-check-label" for="defaultCheck1">
                            Saya Menyetujui Syarat & Ketentuan<sup class="text-danger">*</sup>
                        </label>
                    </div>
                    @error('agreement')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>

                <button class="btn btn-core" type="button" data-toggle="modal" data-target="#konfirmasiBuatTrip">Buat Trip</button>

            </div>

        </div>
    </form>
</div>

<div class="modal fade" id="konfirmasiBuatTrip" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h5>Apakah kamu sudah yakin dengan informasi tripmu?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="submit()">Yakin</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('add_script')
<script type="text/javascript " src="{{asset('template/js/moment.min.js')}}"></script>
<script type="text/javascript " src="{{asset('template/js/daterangepicker.min.js')}}"></script>
<script src="{{asset('template/vendor/select2/select2.min.js')}} "></script>
<script>
    $(function() {
        $('#tanggal').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#tanggal').on('apply.daterangepicker', function(ev, picker) {
            $('input[name="start_date"]').val(picker.startDate.format('YYYY-MM-DD'));
            $('input[name="end_date"]').val(picker.endDate.format('YYYY-MM-DD'));
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            hasil = parseInt((picker.endDate - picker.startDate) / (24 * 3600 * 1000));
            if(hasil==0){$('#durasiTrip').val('Sehari');}
            if(hasil==1){$('#durasiTrip').val('Semalam');}
            if(hasil > 1) { $('#durasiTrip').val(String(hasil) + ' Hari ' + String(hasil-1) + ' Malam'); }
        });

        $('#tanggal').on('cancel.daterangepicker', function(ev, picker) {
            $('input[name="start_date"]').val('');
            $('input[name="end_date"]').val('');
            $(this).val('');
        });

    });

    $(document).ready(function() {
        $(".inputHobi ").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })
    });

    function readURL(input) {
         if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                 $('#reviewPic').attr('src', e.target.result);
            }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
    }

    $("#fotoTrip ").change(function() {
        readURL(this);
    });
</script>
<script>
    function submit(){
        $('#form_add_partner input[name=agreement]').val(($('#form_add_partner input[name=agreement]').prop("checked") == true ? true : false));
        $('#form_add_partner input[name=categories]').val($(".inputHobi").select2('val'));
        $('#konfirmasiBuatTrip').modal('hide');
        $('#form_add_partner').submit();
    }
</script>
@endsection
