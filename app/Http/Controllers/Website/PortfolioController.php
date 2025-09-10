<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $categories = PortfolioCategory::withCount(['projects' => function($query) {
            $query->whereNotNull('thumbnail');
        }])->get();
        
        $projects = Project::with('category')
            ->whereNotNull('thumbnail')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('website.portfolio.index', compact('categories', 'projects'));
    }
    
    public function show($id)
    {
        $project = Project::with('category')->findOrFail($id);
        
        // Get related projects (same category, exclude current project)
        $relatedProjects = Project::where('category_id', $project->category_id)
            ->where('id', '!=', $id)
            ->whereNotNull('thumbnail')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
            
        return view('website.portfolio.show', compact('project', 'relatedProjects'));
    }
}