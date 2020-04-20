<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $userRepository;

    public function __construct(\App\Repositories\UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
    }

    public function home()
    {
        return view('dashboard');
    }

    public function reports()
    {
        $userId = Auth::id();
        $user = $this->userRepository->getUserByUserId($userId);
        $data['user_email'] = $user['email'];
        $data['user_id_token'] = $user['id_token'];
        return view('reports', $data);
    }
}
