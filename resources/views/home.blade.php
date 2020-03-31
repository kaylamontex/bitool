@extends('layouts.base')

@section('head')
<title>BI Tool</title>
@endsection

@section('content')
<div class="container-fluid login">
    <div class="m-card">
        <div class="image-cover">
            <img class="bi-logo" src="{{ asset('img/primary-logo-business-intelligence-web-1.png') }}">
        </div>
        <div class="login-widget">
            <h3>Login</h3>
            <p>Welcome to BI Tool, please login to your account.</p>
            @if (Route::has('login'))
                <a class="btn btn-primary btn-lg" href="{{ url('/login/okta') }}">Log in</a>
            @endif
        </div>
    </div>
</div>
@endsection
