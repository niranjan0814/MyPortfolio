<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
            'portfolio_user_id' => 'nullable|exists:users,id', // ✅ NEW: Hidden field for user
        ]);

        // ✅ FIX: Use provided user_id or fallback to first user
        $portfolioOwnerId = $validated['portfolio_user_id'] ?? User::first()->id;
        
        Enquiry::create([
            'user_id' => $portfolioOwnerId,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'],
        ]);

        return redirect()->back()->with('success', 'Thank you for your message! I will get back to you soon.');
    }
}