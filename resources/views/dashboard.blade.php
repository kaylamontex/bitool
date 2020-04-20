@extends('layouts.app')

@section('app-head')
<title>BI Tool - Dashboard</title>
@endsection

@section('app-content')
<div class="row dashboard-home">
    <div class="col-lg-4">
        <div class="card text-center">
            <div class="card-body">
                <a href="{{ url('/dashboard/reports') }}">
                    <img class="feature-img mb-4" src="{{ asset('img/feature3.png') }}">
                    <h5>REPORTS</h5>
                    <small>Pudding oat cake carrot cake lemon drops gummies marshmallow.</small>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card text-center">
            <div class="card-body">
                <img class="feature-img mb-4" src="{{ asset('img/feature1.png') }}">
                <h5>COMING SOON</h5>
                <small>Muffin lemon drops chocolate carrot cake chocolate bar sweet roll.</small>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card text-center">
            <div class="card-body">
                <img class="feature-img mb-4" src="{{ asset('img/feature2.png') }}">
                <h5>COMING SOON</h5>
                <small>Gingerbread sesame snaps wafer soufflé. Macaroon brownie ice cream</small>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="card text-center">
            <div class="card-body">
                <img class="feature-img mb-4" src="{{ asset('img/feature4.png') }}">
                <h5>COMING SOON</h5>
                <small>cotton candy caramels danish chocolate cake pie candy. Lemon drops tart.</small>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card text-center">
            <div class="card-body">
                <img class="feature-img mb-4" src="{{ asset('img/feature5.png') }}">
                <h5>COMING SOON</h5>
                <small>Pudding oat cake carrot cake lemon drops gummies marshmallow.</small>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card text-center">
            <div class="card-body">
                <img class="feature-img mb-4" src="{{ asset('img/feature6.png') }}">
                <h5>COMING SOON</h5>
                <small>Dragée jelly beans candy canes pudding cake wafer. Muffin croissant.</small>
            </div>
        </div>
    </div>
</div>
@endsection
