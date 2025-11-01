<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CVController extends Controller
{
    /**
     * Download CV for a specific user
     */
    public function download(User $user)
    {
        if (!$user->hasCv()) {
            abort(404, 'CV not found');
        }

        $cvPath = $user->cv_path;
        $fileName = $user->full_name ? 
            str_replace(' ', '_', $user->full_name) . '_CV.pdf' : 
            'CV.pdf';

        return Storage::download($cvPath, $fileName);
    }

    /**
     * View CV in browser (opens in new tab)
     */
    public function view(User $user)
    {
        if (!$user->hasCv()) {
            abort(404, 'CV not found');
        }

        $cvPath = $user->cv_path;
        
        if (!Storage::exists($cvPath)) {
            abort(404, 'CV file not found');
        }

        return response()->file(Storage::path($cvPath), [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . ($user->full_name ?? 'CV') . '.pdf"'
        ]);
    }

    /**
     * Download current authenticated user's CV
     */
    public function downloadOwn()
    {
        $user = auth()->user();
        
        if (!$user || !$user->hasCv()) {
            return redirect()->back()->with('error', 'No CV uploaded yet');
        }

        return $this->download($user);
    }

    /**
     * Get public CV for portfolio display
     */
    public function publicView($userId)
    {
        $user = User::findOrFail($userId);
        
        if (!$user->hasCv()) {
            abort(404, 'CV not available');
        }

        return $this->view($user);
    }

    /**
     * Download public CV
     */
    public function publicDownload($userId)
    {
        $user = User::findOrFail($userId);
        
        if (!$user->hasCv()) {
            abort(404, 'CV not available');
        }

        return $this->download($user);
    }
}