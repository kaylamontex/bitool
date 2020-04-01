@extends('layouts.base')

@section('head')
<script src="{{ asset('js/app.js') }}" defer></script>
@yield('app-head')
@endsection

@section('content')
    <div id="app">
        <aside class="main-sidebar">
            <div class="main-navbar">
                <nav class="navbar">
                    <a href="{{ url('/') }}">
                        <img class="logo" src="{{ asset('img/M-Blue-Orange-Transparent-Digital.png') }}">
                        <span>BI Tool</span>
                    </a>
                    <a class="toggle-sidebar">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </nav>
            </div>
            <div class="nav-wrapper">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'dashboard-home' ? 'active':'' }}" href="{{ url('/dashboard') }}">
                            <i class="fas fa-home"></i><span>Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'dashboard-reports' ? 'active':'' }}" href="{{ url('/dashboard/reports') }}">
                            <i class="far fa-file-alt"></i><span>Reports</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="mobile-navbar">
            <a class="toggle-sidebar">
                <i class="fas fa-bars"></i>
            </a>
        </div>
        <main class="main-content">
            <div class="main-topbar">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="main-content-container">
                @yield('app-content')
            </div>
        </main>
    </div>
@endsection
