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

        // Load About content
        $about = $user->about ?? About::firstOrCreate(
            ['user_id' => $user->id],
            [
                'about_greeting'       => "Hi, I'm {$user->full_name}!",
                'about_description'    => $user->description ?? 'Driven and innovative developer.',
                'profile_name'         => $user->full_name,
                'profile_gpa_badge'    => 'GPA 3.79',
                'profile_degree_badge' => 'BSc(Hons)SE',
                'cta_button_text'      => "Let's Work Together",
            ]
        );

        $aboutContent = $about->toArray();
        $aboutContent['user'] = $user;
        $aboutContent['profile_image'] = $user->profile_image;

        // Hero content from DB (same system as header/footer)
        $heroContent = PageContent::getSection('hero', $user->id);

        // Tech stack count from hero section (fallback to 4)
        $techStackCount = $heroContent['tech_stack_count'] ?? 4;

        // Random tech stack skills
        $techStackSkills = Skill::where('url', '!=', '')
            ->whereNotNull('url')
            ->inRandomOrder()
            ->limit($techStackCount)
            ->get();

        return view('welcome', [
            // Projects
            'projects' => Project::with('overview')->latest()->get(),

            // Skills
            'skills' => Skill::orderBy('category', 'asc')
                ->orderBy('name', 'asc')
                ->get(),

            // Experiences & Education
            'experiences' => Experience::orderBy('created_at', 'desc')->get(),
            'educations'  => Education::orderBy('year', 'desc')->get(),

            // Sections
            'aboutContent'   => $aboutContent,
            'heroContent'    => $heroContent,
            'headerContent'  => PageContent::getSection('header', $user->id),
            'footerContent'  => PageContent::getSection('footer', $user->id),
            'contactContent' => PageContent::getSection('contact', $user->id),

            // Bonus: Pass tech stack to blade if needed
            'techStackSkills' => $techStackSkills,
        ]);
    }

    public function showProjectOverview($id)
    {
        $user = Auth::user() ?? \App\Models\User::first();

        $project = Project::with('overview')->findOrFail($id);

        if (!$project->overview) {
            abort(404, 'Project overview not found');
        }

        $overview = $project->overview;
        $techStackSkills = $overview->getTechStackSkills();

        return view('project-overview', [
            'project'         => $project,
            'overview'        => $overview,
            'techStackSkills' => $techStackSkills,
            'headerContent'   => PageContent::getSection('header', $user->id),
            'footerContent'   => PageContent::getSection('footer', $user->id),
        ]);
    }
}