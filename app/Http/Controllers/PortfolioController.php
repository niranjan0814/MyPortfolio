<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Education;
use App\Models\PageContent;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'projects'    => Project::latest()->get(),
            'skills'      => Skill::orderBy('category', 'asc')->orderBy('name', 'asc')->get(),
            'experiences' => Experience::orderBy('created_at', 'desc')->get(),
            'educations'  => Education::orderBy('created_at', 'desc')->get(),
            'aboutContent' => PageContent::getSection('about'),
        ]);
    }
}