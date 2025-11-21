<?php

namespace App\Http\Controllers;

use App\Models\LandingPageContent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LandingPageController extends Controller
{
    /**
     * Display the landing page with dynamic content from database
     */
    public function index()
    {
        // ✅ CRITICAL: Clear cache to ensure fresh data
        Cache::forget('landing_section_hero');
        
        // Fetch all landing page contents WITHOUT caching
        $contents = LandingPageContent::orderBy('order')->get();

        // Organize content by key for easy access in view
        $data = [];
        foreach ($contents as $content) {
            $data[$content->key] = $content->value;
        }

        // ✅ CRITICAL FIX: ALWAYS fetch FRESH data from the selected user
        if (isset($data['preview_user_id']) && !empty($data['preview_user_id'])) {
            $previewUser = User::with(['projects', 'about'])->find($data['preview_user_id']);
            
            if ($previewUser) {
                // ========================================
                // FORCE OVERRIDE: Name (from user table)
                // ========================================
                $data['preview_name'] = $previewUser->full_name ?? $previewUser->name;
                
                // ========================================
                // FORCE OVERRIDE: Title (from user.description)
                // ========================================
                $description = $previewUser->description ?? 'Professional Developer';
                $cleanDescription = strip_tags($description);
                $cleanDescription = preg_replace('/\s+/', ' ', $cleanDescription);
                $cleanDescription = trim($cleanDescription);
                if (strlen($cleanDescription) > 100) {
                    $cleanDescription = substr($cleanDescription, 0, 97) . '...';
                }
                $data['preview_title'] = $cleanDescription;
                
                // ========================================
                // FORCE OVERRIDE: Bio (from about.about_description)
                // ========================================
                $about = $previewUser->about;
                $bio = $about ? $about->about_description : 'Creating amazing digital experiences';
                $cleanBio = strip_tags($bio);
                $cleanBio = preg_replace('/\s+/', ' ', $cleanBio);
                $cleanBio = preg_replace('/&nbsp;/', ' ', $cleanBio);
                $cleanBio = trim($cleanBio);
                if (strlen($cleanBio) > 200) {
                    $cleanBio = substr($cleanBio, 0, 197) . '...';
                }
                $data['preview_bio'] = $cleanBio;
                
                // ========================================
                // FORCE OVERRIDE: Projects Count (real count)
                // ========================================
                $data['preview_projects_count'] = $previewUser->projects()->count();
                
                // ========================================
                // USE SAVED VALUES: Clients & Awards (from DB)
                // ========================================
                $data['preview_clients_count'] = $data['preview_clients_count'] ?? '10+';
                $data['preview_awards_count'] = $data['preview_awards_count'] ?? '5';
                
                // ========================================
                // FORCE OVERRIDE: Profile Image or Initial
                // ========================================
                if ($previewUser->profile_image) {
                    // Check if external URL or local path
                    if (filter_var($previewUser->profile_image, FILTER_VALIDATE_URL)) {
                        $data['preview_image_url'] = $previewUser->profile_image;
                    } else {
                        $data['preview_image_url'] = asset('storage/' . $previewUser->profile_image);
                    }
                    $data['preview_has_image'] = true;
                } else {
                    $data['preview_initial'] = strtoupper(substr($data['preview_name'], 0, 1));
                    $data['preview_has_image'] = false;
                }
                
                // ========================================
                // Portfolio Link (from user.slug)
                // ========================================
                $data['preview_user_slug'] = $previewUser->slug;
            }
        }

        // Set defaults if no preview user selected
        if (!isset($data['preview_name'])) {
            $data['preview_name'] = 'John Doe';
            $data['preview_title'] = 'Senior Product Designer';
            $data['preview_bio'] = 'Crafting beautiful digital experiences for over 5 years';
            $data['preview_projects_count'] = '24';
            $data['preview_clients_count'] = '50+';
            $data['preview_awards_count'] = '12';
            $data['preview_initial'] = 'J';
            $data['preview_has_image'] = false;
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

        // Store selected theme in session
        session(['selected_theme' => $request->theme]);

        // Redirect to registration page
        return redirect()->route('filament.admin.auth.register')
            ->with('success', 'Please complete your registration to continue.');
    }
}