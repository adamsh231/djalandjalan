@extends('layout/main')

@section('lang', 'id')
@section('title', 'Home | djalandjalan.com')

@section('add_style')
<link href="{{asset('template/css/home.css')}}" rel="stylesheet">
@endsection

@section('content')
@if (session('verified'))
<div class="container" style="margin-top: 200px; margin-bottom: 200px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your Email Address Has Been Verified') }}</div>

                <div class="card-body">
                    'Now. You can sign in and enjoy our feature
                    <a href="{{ url('/login') }}">Click here to sign in</a>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<script>window.location.href = "{{ url('/') }}";</script>
@endif
@endsection
