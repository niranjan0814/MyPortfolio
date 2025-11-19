<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ThemeController extends Controller
{
    /**
     * Show theme preview
     */
    public function preview($theme)
    {
        $validThemes = ['theme1', 'theme2', 'theme3'];
        
        if (!in_array($theme, $validThemes)) {
            abort(404, 'Theme not found');
        }

        // Get demo user or first user for preview
        $user = User::first();
        
        if (!$user) {
            // Create demo data for preview if no users exist
            return view('theme-preview', [
                'theme' => $theme,
                'previewMode' => true,
                'demoMode' => true
            ]);
        }

        // Redirect to user's portfolio with theme preview
        return redirect()->route('portfolio.show', [
            'user' => $user->username ?? $user->id,
            'preview' => true,
            'theme' => $theme
        ]);
    }

    /**
     * Update user's theme
     */
    public function update(Request $request)
    {
        $request->validate([
            'theme' => 'required|in:theme1,theme2,theme3'
        ]);

        $user = auth()->user();
        
        if ($user) {
            $user->update([
                'active_theme' => $request->theme
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Theme updated successfully',
                'theme' => $request->theme
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'User not authenticated'
        ], 401);
    }
}