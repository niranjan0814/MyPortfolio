<?php
// app/Http/Controllers/ContactController.php
namespace App\Http\Controllers;

use App\Models\Enquiry;
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
        ]);

        // ✅ CRITICAL: Associate enquiry with the WEBSITE OWNER (first user)
        // This assumes portfolio visitors are submitting enquiries to the site owner
        $portfolioOwner = \App\Models\User::first();
        
        Enquiry::create([
            ...$validated,
            'user_id' => $portfolioOwner->id ?? null,
        ]);

        return redirect()->back()->with('success', 'Thank you for your message! I will get back to you soon.');
    }
}