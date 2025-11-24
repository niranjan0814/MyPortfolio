<?php
// app/Http/Controllers/PortfolioController.php - UPDATED WITH THEME SAFETY

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Education;
use App\Models\PageContent;
use App\Models\About;
use App\Models\HeroContent;
use App\Helpers\ThemeHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    /**
     * Public portfolio page: /portfolio/niru
     * Automatically resolves the correct user via slug
     */
    public function show(User $user)
    {
        // ========================================
        // THEME RESOLUTION WITH SAFETY
        // ========================================
        $previewTheme = request('preview') ? request('theme') : null;
        $activeTheme = ThemeHelper::getActiveTheme($user, $previewTheme);

        // ========================================
        // LOAD USER DATA
        // ========================================
        $hero = $user->heroContents()->first();
        $about = $user->abouts()->first() ?? $user->about;
        $techStackCount = $hero?->tech_stack_count ?? 4;

        // Prepare Hero Content (with fallbacks)
        $heroContent = $hero ? [
            'greeting'           => $hero->greeting,
            'description'        => $hero->description,
            'user_name'          => $user->full_name ?? $user->name,
            'typing_texts'       => $hero->typing_texts ?? [],
            'btn_contact_enabled'=> $hero->btn_contact_enabled,
            'btn_contact_text'   => $hero->btn_contact_text,
            'btn_projects_enabled'=> $hero->btn_projects_enabled,
            'btn_projects_text'  => $hero->btn_projects_text,
            'social_links'       => $hero->social_links ?? [],
            'tech_stack_enabled' => $hero->tech_stack_enabled,
            'tech_stack_count'   => $hero->tech_stack_count,
            'hero_image_url'     => $hero->hero_image_url,
        ] : [
            'greeting'           => "Hi, I'm",
            'description'        => 'Transforming ideas into elegant, scalable digital solutions...',
            'user_name'          => $user->full_name ?? $user->name,
            'typing_texts'       => ['Full-Stack Developer', 'Problem Solver'],
            'btn_contact_enabled'=> true,
            'btn_contact_text'   => 'Get In Touch',
            'btn_projects_enabled'=> true,
            'btn_projects_text'  => 'View My Work',
            'social_links'       => [],
            'tech_stack_enabled' => true,
            'tech_stack_count'   => 4,
            'hero_image_url'     => null,
        ];

        // Prepare About Content
        $aboutContent = $about ? array_merge($about->toArray(), [
            'user'           => $user,
            'profile_image'  => $user->profile_image,
        ]) : [
            'about_greeting'     => "Hi, I'm {$user->full_name}!",
            'about_description'  => $user->description ?? 'Passionate developer building amazing things.',
            'profile_name'       => $user->full_name,
            'profile_image'      => $user->profile_image,
            'user'               => $user,
            'profile_gpa_badge'  => 'GPA 3.79',
            'profile_degree_badge'=> 'BSc(Hons)SE',
            'cta_button_text'    => "Let's Work Together",
        ];

        // Tech stack icons for hero section
        $techStackSkills = Skill::where('user_id', $user->id)
            ->whereNotNull('url')
            ->where('url', '!=', '')
            ->inRandomOrder()
            ->limit($techStackCount)
            ->get();

        // ========================================
        // RENDER WITH SELECTED THEME
        // ========================================
        return view('welcome', [
            'user'            => $user,
            'theme'           => $activeTheme, // ✅ Pass theme to view
            'heroContent'     => $heroContent,
            'aboutContent'    => $aboutContent,
            'techStackSkills' => $techStackSkills,
            'projects'        => $user->projects()->with('overview')->latest()->get(),
            'skills'          => $user->skills()->orderBy('category', 'asc')->orderBy('name', 'asc')->get(),
            'experiences'     => $user->experiences()->orderByDesc('created_at')->get(),
            'educations'      => $user->educations()->orderByDesc('year')->get(),
            'headerContent'   => PageContent::getSection('header', $user->id),
            'footerContent'   => PageContent::getSection('footer', $user->id),
            'contactContent'  => PageContent::getSection('contact', $user->id),
            'portfolioOwnerId'=> $user->id, // For contact form hidden field
        ]);
    }

    /**
     * Project detail page: /project/5/overview
     * Must belong to the current portfolio owner (security check)
     */
    public function showProjectOverview(Project $project)
    {
        // Security: Ensure project belongs to the intended portfolio owner
        $currentUser = request()->route('user'); // from /portfolio/{user}
        if (!$currentUser instanceof User) {
            $currentUser = Auth::user() ?? User::first();
        }

        if ($project->user_id !== $currentUser->id) {
            abort(404);
        }

        $overview = $project->overview;

        if (!$overview) {
            abort(404, 'Project overview not found');
        }

        $techStackSkills = $overview->getTechStackSkills();

        // ✅ THEME RESOLUTION
        $previewTheme = request('preview') ? request('theme') : null;
        $activeTheme = ThemeHelper::getActiveTheme($currentUser, $previewTheme);

        return view('project-overview-master', [
            'user'            => $currentUser,
            'project'         => $project,
            'overview'        => $overview,
            'techStackSkills' => $techStackSkills,
            'theme'           => $activeTheme, // ✅ Pass theme to view
            'headerContent'   => PageContent::getSection('header', $currentUser->id),
            'footerContent'   => PageContent::getSection('footer', $currentUser->id),
        ]);
    }

    /**
     * Optional: Keep old index() for admin preview or fallback
     */
    public function index()
    {
        $user = Auth::user() ?? User::whereNotNull('slug')->first();

        if (!$user) {
            abort(404, 'No portfolio found.');
        }

        return $this->show($user);
    }
}