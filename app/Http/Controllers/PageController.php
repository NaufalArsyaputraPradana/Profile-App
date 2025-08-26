<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\AboutSection;
use App\Models\Project;
use App\Models\Skill;
use App\Models\ContactSection;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'hero' => HeroSection::where('is_active', true)->first(),
            'about' => AboutSection::where('is_active', true)->first(),
            'projects' => Project::latest()->take(3)->get(),
            'skills' => Skill::orderBy('category')->get(),
            'contact' => ContactSection::where('is_active', true)->first()
        ]);
    }

    public function about(): View
    {
        return view('pages.about', [
            'about' => AboutSection::where('is_active', true)->first(),
            'skills' => Skill::orderBy('category')->get()
        ]);
    }

    public function projects(): View
    {
        return view('pages.projects', [
            'projects' => Project::latest()->paginate(9)
        ]);
    }

    public function projectDetail(Project $project): View
    {
        return view('pages.project-detail', [
            'project' => $project
        ]);
    }

    public function skills(): View
    {
        return view('pages.skills', [
            'frontendSkills' => Skill::where('category', 'frontend')->get(),
            'backendSkills' => Skill::where('category', 'backend')->get(),
            'designSkills' => Skill::where('category', 'design')->get()
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact', [
            'contact' => ContactSection::where('is_active', true)->first()
        ]);
    }
}