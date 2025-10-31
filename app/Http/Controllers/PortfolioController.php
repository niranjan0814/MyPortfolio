<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Education;
use App\Models\PageContent;
use App\Models\About;
use App\Models\HeroContent;
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

        // ── ABOUT ─────────────────────────────────────────────────────
        $about = $user->about ?? About::firstOrCreate(
            ['user_id' => $user->id],
            [
                'about_greeting'      => "Hi, I'm {$user->full_name}!",
                'about_description'   => $user->description ?? 'Driven and innovative developer.',
                'profile_name'        => $user->full_name,
                'profile_gpa_badge'   => 'GPA 3.79',
                'profile_degree_badge'=> 'BSc(Hons)SE',
                'cta_button_text'     => "Let's Work Together",
            ]
        );

        $aboutContent                 = $about->toArray();
        $aboutContent['user']         = $user;
        $aboutContent['profile_image']= $user->profile_image;

        // ── HERO: DIRECT FROM DB ─────────────────────────────────────
        $hero = HeroContent::where('user_id', $user->id)->first();

        $heroContent = $hero ? [
            'greeting'             => $hero->greeting,
            'description'          => $hero->description,
            'user_name'            => $user->full_name ?? $user->name,
            'typing_texts'         => $hero->typing_texts ?? [],
            'btn_contact_enabled'  => $hero->btn_contact_enabled,
            'btn_contact_text'     => $hero->btn_contact_text,
            'btn_projects_enabled' => $hero->btn_projects_enabled,
            'btn_projects_text'    => $hero->btn_projects_text,
            'social_links'         => $hero->social_links ?? [],
            'tech_stack_enabled'   => $hero->tech_stack_enabled,
            'tech_stack_count'     => $hero->tech_stack_count,
            'hero_image_url'       => $hero->hero_image_url,
        ] : [
            'greeting'             => "Hi, I'm",
            'description'          => 'Transforming ideas into elegant, scalable digital solutions...',
            'user_name'            => $user->full_name ?? $user->name,
            'typing_texts'         => ['Full-Stack Developer', 'Problem Solver'],
            'btn_contact_enabled'  => true,
            'btn_contact_text'     => 'Get In Touch',
            'btn_projects_enabled' => true,
            'btn_projects_text'    => 'View My Work',
            'social_links'         => [],
            'tech_stack_enabled'   => true,
            'tech_stack_count'     => 4,
            'hero_image_url'       => null,
        ];

        // ── TECH STACK SKILLS (FIXED: Now calculated BEFORE view) ───
        $techStackCount = $heroContent['tech_stack_count'] ?? 4;
        $techStackSkills = Skill::where('url', '!=', '')
            ->whereNotNull('url')
            ->inRandomOrder()
            ->limit($techStackCount)
            ->get();

        // ── RETURN VIEW WITH ALL DATA ───────────────────────────────
        return view('welcome', [
            // Projects
            'projects'        => Project::with('overview')->latest()->get(),

            // Skills
            'skills'          => Skill::orderBy('category', 'asc')
                                      ->orderBy('name', 'asc')
                                      ->get(),

            // Experiences & Education
            'experiences'     => Experience::orderBy('created_at', 'desc')->get(),
            'educations'      => Education::orderBy('year', 'desc')->get(),

            // Sections
            'aboutContent'    => $aboutContent,
            'heroContent'     => $heroContent,
            'headerContent'   => PageContent::getSection('header', $user->id),
            'footerContent'   => PageContent::getSection('footer', $user->id),
            'contactContent'  => PageContent::getSection('contact', $user->id),

            // CRITICAL: Pass techStackSkills to hero component
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