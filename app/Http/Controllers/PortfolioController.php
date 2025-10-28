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
            'skills'      => Skill::all(),
            'experiences' => Experience::latest()->get(),
            'educations'  => Education::latest()->get(),
        ]);
    }
}
