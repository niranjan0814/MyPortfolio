<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Education;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'projects'    => Project::latest()->get(),
            'skills'      => Skill::orderBy('name')->get(),
            'experiences' => Experience::orderBy('created_at', 'desc')->get(),
            'educations'  => Education::orderBy('created_at', 'desc')->get(),
        ]);
    }
}