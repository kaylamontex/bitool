<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    public function home()
    {
        // The user is logged in, redirect to dashboard
        if (Auth::check()) {
            return redirect('dashboard');
        }

        return view('home');
    }
}
