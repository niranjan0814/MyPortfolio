<?php
// app/Http/Controllers/LandingController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Show the landing page with theme selection
     */
    public function index()
    {
        return view('landing');
    }

    /**
     * Store selected theme and redirect to registration
     */
    public function selectTheme(Request $request)
    {
        $request->validate([
            'theme' => 'required|in:theme1,theme2,theme3'
        ]);

        // Store selected theme in session
        session(['selected_theme' => $request->theme]);

        // Redirect to Filament registration
        return redirect('/admin/register');
    }

    /**
     * Optional: Check if email exists (AJAX)
     */
    public function checkEmail(Request $request)
    {
        $exists = \App\Models\User::where('email', $request->email)->exists();
        
        return response()->json([
            'exists' => $exists,
            'redirect' => $exists ? '/admin/login' : '/admin/register'
        ]);
    }
}