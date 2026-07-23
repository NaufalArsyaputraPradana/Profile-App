<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\AboutSection;
use App\Models\Project;
use App\Models\Skill;
use App\Models\ContactSection;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Organization;
use App\Models\Certification;
use App\Models\Training;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    private function getContactData()
    {
        return ContactSection::where('is_active', true)->first();
    }

    public function home(): View
    {
        return view('pages.home', [
            'hero' => HeroSection::where('is_active', true)->first(),
            'about' => AboutSection::where('is_active', true)->first(),
            'projects' => Project::where('featured', true)->orderBy('sort_order')->take(4)->get(),
            'skills' => Skill::orderBy('category')->get(),
            'contact' => $this->getContactData(),
            'experiences' => Experience::active()->get(),
            'educations' => Education::active()->get(),
            'organizations' => Organization::active()->get(),
            'certifications' => Certification::active()->take(4)->get(),
            'trainings' => Training::active()->where('featured', true)->take(3)->get(),
            'certificates' => Certificate::active()->take(8)->get(),
        ]);
    }

    public function about(): View
    {
        return view('pages.about', [
            'about' => AboutSection::where('is_active', true)->first(),
            'skills' => Skill::orderBy('category')->get(),
            'contact' => $this->getContactData(),
            'experiences' => Experience::active()->get(),
            'educations' => Education::active()->get(),
            'organizations' => Organization::active()->get(),
        ]);
    }

    public function projects(): View
    {
        return view('pages.projects', [
            'projects' => Project::orderBy('sort_order')->orderByDesc('featured')->paginate(9),
            'contact' => $this->getContactData(),
        ]);
    }

    public function projectDetail(Project $project): View
    {
        $relatedProjects = Project::where('id', '!=', $project->id)
            ->where('status', 'active')
            ->take(3)
            ->get();

        return view('pages.project-detail', [
            'project' => $project,
            'relatedProjects' => $relatedProjects,
            'contact' => $this->getContactData(),
        ]);
    }

    public function skills(): View
    {
        return view('pages.skills', [
            'frontendSkills' => Skill::where('category', 'frontend')->get(),
            'backendSkills' => Skill::where('category', 'backend')->get(),
            'designSkills' => Skill::where('category', 'design')->get(),
            'toolsSkills' => Skill::where('category', 'tools')->get(),
            'softSkills' => Skill::where('category', 'soft')->get(),
            'contact' => $this->getContactData(),
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact', [
            'contact' => $this->getContactData(),
        ]);
    }

    public function experience(): View
    {
        return view('pages.experience', [
            'experiences' => Experience::active()->get(),
            'contact' => $this->getContactData(),
        ]);
    }

    public function education(): View
    {
        return view('pages.education', [
            'educations' => Education::active()->get(),
            'organizations' => Organization::active()->get(),
            'contact' => $this->getContactData(),
        ]);
    }

    public function certifications(): View
    {
        return view('pages.certifications', [
            'certifications' => Certification::active()->get(),
            'contact' => $this->getContactData(),
        ]);
    }

    public function trainings(): View
    {
        return view('pages.trainings', [
            'trainings' => Training::active()->get(),
            'contact' => $this->getContactData(),
        ]);
    }

    public function certificates(Request $request): View
    {
        $category = $request->get('category', 'all');
        $query = Certificate::active();

        if ($category !== 'all') {
            $query->where('category', $category);
        }

        return view('pages.certificates', [
            'certificates' => $query->get(),
            'activeCategory' => $category,
            'contact' => $this->getContactData(),
        ]);
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        // TODO: Send email or store to DB
        return back()->with('success', 'Pesan Anda berhasil dikirim! Saya akan segera menghubungi Anda.');
    }
}