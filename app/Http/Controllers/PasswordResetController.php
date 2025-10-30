<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class PasswordResetController extends Controller
{
    /**
     * Default password that only authorized users know
     */
    const DEFAULT_PASSWORD = 'Tzniru#123'; // Change this to your secure default

    /**
     * Secret key to authorize reset (only you should know this)
     */
    const RESET_SECRET_KEY = 'silvandu'; // Change this to something secure

    /**
     * 🔥 NEW: Direct URL Reset - Visit /password/login/reset to auto-reset
     * This will reset the FIRST user's password to default
     */
    public function directReset()
    {
        try {
            // Get the first user (or specify email if you want)
            $user = User::first(); // You can change this to User::where('email', 'your@email.com')->first();

            if (!$user) {
                return redirect('/admin/login')->with('error', 'No user found in the system.');
            }

            // Reset password to default
            $user->password = Hash::make(self::DEFAULT_PASSWORD);
            $user->save();

            // Log the reset for security tracking
            Log::info('Direct URL password reset executed', [
                'user_id' => $user->id,
                'email' => $user->email,
                'ip' => request()->ip(),
                'timestamp' => now(),
            ]);

            // Redirect to login with success message
            return redirect('/admin/login')->with('success', 
                "Password reset successful! Login with:\nEmail: {$user->email}\nPassword: " . self::DEFAULT_PASSWORD
            );

        } catch (\Exception $e) {
            Log::error('Direct password reset failed', [
                'error' => $e->getMessage(),
                'ip' => request()->ip(),
            ]);

            return redirect('/admin/login')->with('error', 'Password reset failed. Check logs.');
        }
    }

    /**
     * Show the password reset form
     */
    public function showResetForm()
    {
        // Check if user is already logged in, redirect to admin
        if (auth()->check()) {
            return redirect('/admin');
        }
        
        return view('admin.reset-password');
    }

    /**
     * Reset user password to default
     */
    public function resetToDefault(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'secret_key' => 'required|string',
        ]);

        // Verify the secret key
        if ($request->secret_key !== self::RESET_SECRET_KEY) {
            return back()->withErrors([
                'secret_key' => 'Invalid secret key. Password reset failed.',
            ])->withInput();
        }

        // Find the user
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'User not found.',
            ])->withInput();
        }

        // Reset password to default
        $user->password = Hash::make(self::DEFAULT_PASSWORD);
        $user->save();

        // Log the reset for security tracking
        Log::info('Password reset to default', [
            'user_id' => $user->id,
            'email' => $user->email,
            'ip' => $request->ip(),
            'timestamp' => now(),
        ]);

        return redirect()->route('password.reset.form')->with('success', 
            'Password has been reset successfully to the default password.');
    }
}