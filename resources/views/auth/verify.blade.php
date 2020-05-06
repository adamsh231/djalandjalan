@extends('layout/main')

@section('lang', 'id')
@section('title', 'Home | djalandjalan.com')

@section('add_style')
<link href="{{asset('template/css/home.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container" style="margin-top: 200px; margin-bottom: 200px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been proceed by system.') }}
                    </div>
                    <p class="text-right">{{ __('Please wait, verification will be send to your email (5 - 15 minutes).') }}</p>
                    @else
                    {{ __('Before proceeding, please request verification link for your email address.') }}
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request verification link') }}</button>.
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
