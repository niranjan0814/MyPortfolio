<?php

namespace App\Http\Controllers;

use App\Models\LandingPageContent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Theme;

class LandingPageController extends Controller
{
    /**
     * Display the landing page with dynamic content from database
     */
    public function index()
    {
        // ✅ Fetch all landing page contents from database
        $contents = LandingPageContent::orderBy('order')->get();

        // Organize content by key for easy access in view
        $data = [];
        foreach ($contents as $content) {
            $data[$content->key] = $content->value;
        }

        // ========================================
        // ✅ NEW LOGIC: Use SAVED values from landing_page_contents
        // Only fetch from user table if preview_user_id is set AND we need fallback data
        // ========================================
        
        if (isset($data['preview_user_id']) && !empty($data['preview_user_id'])) {
            $previewUser = User::with(['projects', 'about'])->find($data['preview_user_id']);
            
            if ($previewUser) {
                // ========================================
                // IMPORTANT: Only use DB values if they DON'T exist in landing_page_contents
                // This allows admin edits to take priority
                // ========================================
                
                // Name - Use saved value OR fallback to user
                if (empty($data['preview_name'])) {
                    $data['preview_name'] = $previewUser->full_name ?? $previewUser->name;
                }
                
                // Title - Use saved value OR fallback to user description
                if (empty($data['preview_title'])) {
                    $description = $previewUser->description ?? 'Professional Developer';
                    $cleanDescription = strip_tags($description);
                    $cleanDescription = preg_replace('/\s+/', ' ', trim($cleanDescription));
                    if (strlen($cleanDescription) > 100) {
                        $cleanDescription = substr($cleanDescription, 0, 97) . '...';
                    }
                    $data['preview_title'] = $cleanDescription;
                }
                
                // Bio - Use saved value OR fallback to user about
                if (empty($data['preview_bio'])) {
                    $about = $previewUser->about;
                    $bio = $about ? $about->about_description : 'Creating amazing digital experiences';
                    $cleanBio = strip_tags($bio);
                    $cleanBio = preg_replace('/\s+/', ' ', trim($cleanBio));
                    $cleanBio = preg_replace('/&nbsp;/', ' ', $cleanBio);
                    if (strlen($cleanBio) > 200) {
                        $cleanBio = substr($cleanBio, 0, 197) . '...';
                    }
                    $data['preview_bio'] = $cleanBio;
                }
                
                // Projects Count - Use saved value OR fallback to real count
                if (empty($data['preview_projects_count'])) {
                    $data['preview_projects_count'] = $previewUser->projects()->count();
                }
                
                // Clients & Awards - Use saved values (these are always custom)
                $data['preview_clients_count'] = $data['preview_clients_count'] ?? '10+';
                $data['preview_awards_count'] = $data['preview_awards_count'] ?? '5';
                
                // ========================================
                // Profile Image - ALWAYS fetch fresh from user table
                // (Images should always be current)
                // ========================================
                if ($previewUser->profile_image) {
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
                
                // Portfolio Link - ALWAYS use current slug
                $data['preview_user_slug'] = $previewUser->slug;
            }
        }

        // Set defaults if no preview user selected and no saved data
        if (!isset($data['preview_name']) || empty($data['preview_name'])) {
            $data['preview_name'] = 'John Doe';
            $data['preview_title'] = 'Senior Product Designer';
            $data['preview_bio'] = 'Crafting beautiful digital experiences for over 5 years';
            $data['preview_projects_count'] = '24';
            $data['preview_clients_count'] = '50+';
            $data['preview_awards_count'] = '12';
            $data['preview_initial'] = 'J';
            $data['preview_has_image'] = false;
        }
        
        $admin = User::find(1); 
        $availableThemes = Theme::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
            
        return view('landing', compact('data', 'availableThemes', 'admin'));
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