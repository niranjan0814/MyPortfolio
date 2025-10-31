<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Education;
use App\Models\PageContent;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function index()
    {
        // Get the authenticated user (or first user as fallback)
        $user = Auth::user() ?? \App\Models\User::first();

        if (!$user) {
            abort(404, 'No user found.');
        }

        // Load About content from the new `abouts` table (linked to user)
        $about = $user->about ?? About::firstOrCreate(
            ['user_id' => $user->id],
            [
                'about_greeting' => "Hi, I'm {$user->full_name}!",
                'about_description' => $user->description ?? 'Driven and innovative developer.',
                'profile_name' => $user->full_name,
                'profile_gpa_badge' => 'GPA 3.79',
                'profile_degree_badge' => 'BSc(Hons)SE',
                'cta_button_text' => "Let's Work Together",
            ]
        );

        // Merge user profile image into about data
        $aboutContent = $about->toArray();
        $aboutContent['user'] = $user; // Attach user for profile_image
        $aboutContent['profile_image'] = $user->profile_image;

        return view('welcome', [
            // Projects
            'projects' => Project::latest()->get(),

            // Skills
            'skills' => Skill::orderBy('category', 'asc')
                            ->orderBy('name', 'asc')
                            ->get(),

            // Experiences - FIXED: Use created_at instead of start_date
            'experiences' => Experience::orderBy('created_at', 'desc')->get(),

            // Educations - FIXED: Use year instead of created_at
            'educations' => Education::orderBy('year', 'desc')->get(),

            // About Section – Dynamic from `About` model + User
            'aboutContent' => $aboutContent,

            // Other Sections – Still using PageContent
            'heroContent'    => PageContent::getSection('hero', $user->id),
            'headerContent'  => PageContent::getSection('header', $user->id),
            'footerContent'  => PageContent::getSection('footer', $user->id),
            'contactContent' => PageContent::getSection('contact', $user->id),
        ]);
    }
}