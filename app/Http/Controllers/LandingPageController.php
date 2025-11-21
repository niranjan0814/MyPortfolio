<?php

namespace App\Http\Controllers;

use App\Models\LandingPageContent;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display the landing page with dynamic content from database
     */
    public function index()
    {
        // Fetch all landing page contents
        $contents = LandingPageContent::orderBy('order')->get();
        
        // Organize content by key for easy access in view
        $data = [];
        foreach ($contents as $content) {
            $data[$content->key] = $content->value;
        }
        
        return view('landing', compact('data'));
    }

    /**
     * Handle theme selection from landing page
     */
    public function selectTheme(Request $request)
    {
        $request->validate([
            'theme' => 'required|string|in:theme1,theme2,theme3'
        ]);

        // Store selected theme in session or redirect to registration
        session(['selected_theme' => $request->theme]);

        // Redirect to registration page (update this route as needed)
        return redirect()->route('filament.admin.auth.register')
            ->with('success', 'Please complete your registration to continue.');
    }
}