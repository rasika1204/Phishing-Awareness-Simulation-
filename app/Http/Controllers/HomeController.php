<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Remove auth middleware to help debug
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // Debug information
        $isLoggedIn = Auth::check();
        $user = Auth::user();
        $url = $request->url();
        $path = $request->path();
        $intendedUrl = session('url.intended');
        
        return view('home', compact('isLoggedIn', 'user', 'url', 'path', 'intendedUrl'));
    }
}
