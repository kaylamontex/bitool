@extends('layouts.app')

@section('app-head')
<title>BI Tool - Reports</title>
@endsection

@section('app-content')
<div class="breadcrumb-default">
    <div class="title"><h3>Reports</h3></div>
    <div class="items">
        <span><a href="{{ url('/dashboard') }}">Home</a></span>
        <span><i class="fas fa-chevron-right"></i></span>
        <span>Reports</span>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
            </div>
        </div>
    </div>
</div>
@endsection
