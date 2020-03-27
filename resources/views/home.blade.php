@extends('layouts.base')

@section('head')
<title>BI Tool</title>
@endsection

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            <a href="{{ url('/login/okta') }}">Log in with Okta</a>
        </div>
    @endif
    <div class="content">
        <div class="title m-b-md">
            BI Tool
        </div>
    </div>
</div>
@endsection
