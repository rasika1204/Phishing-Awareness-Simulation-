<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(): View{
        return view('dashboard',data : [
            'logs'=> PhishingLogs::latest().get()
        ]);
    } 
   
   
}
