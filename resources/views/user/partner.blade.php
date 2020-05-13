@extends('layout/main')

@section('lang', 'id')
@section('title', 'Partner | djalandjalan.com')

@section('add_style')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="{{asset('template/css/home.css')}}" rel="stylesheet">
<link href="{{asset('template/css/partners.css')}}" rel="stylesheet">

{{-- ------------------------Vue Core-------------------------- --}}
<script src="{{ asset('js/app.js') }}" defer></script>
{{-- ---------------------------------------------------------- --}}

@endsection


@section('content')
<div id="beforeCreate" style="margin-top: 50%"></div>
<div id="app">
    <partner-component></partner-component>
</div>
@endsection

@section('add_script')
<script>
    var search = '{{ $search }}';
    window.onbeforeunload = function () {
        search = '';
    }
</script>
@endsection
