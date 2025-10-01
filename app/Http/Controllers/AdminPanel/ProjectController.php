<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
   public function index(Request $request)
{
    if ($request->ajax()) {
        $data = Project::with('category')->orderBy('id', 'desc');

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('category_name', function($row){
                return $row->category ? $row->category->name : '-';
            })
            ->addColumn('thumbnail', function($row) {
                if ($row->thumbnail && file_exists(public_path($row->thumbnail))) {
                    return '<img src="'.asset('public/'.$row->thumbnail).'" width="50" height="50" style="object-fit: cover;">';
                }
                return '<img src="'.asset('images/default-thumbnail.jpg').'" width="50" height="50" style="object-fit: cover;">';
            })
            ->addColumn('action', function($row){
                $btn = '<a href="'.route('projects.edit', $row->id).'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                $btn .= ' <a href="javascript:void(0)" data-id="'.$row->id.'" class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['thumbnail', 'action'])
            ->make(true);
    }

    return view('admin-panel.projects.index');
}

    public function create()
    {
        $categories = PortfolioCategory::all();
        return view('admin-panel.projects.create', compact('categories'));
    }

  public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:portfolio_categories,id',
        'architect' => 'nullable|string|max:255',
        'client' => 'nullable|string|max:255',
        'terms' => 'nullable|string|max:255',
        'project_type' => 'nullable|string|max:255',
        'strategy' => 'nullable|string',
        'project_date' => 'nullable|date',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'details' => 'required|string',
    ]);

    try {
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time().'_'.preg_replace('/[^A-Za-z0-9\._]/', '', $file->getClientOriginalName());
            $file->move(public_path('uploads/projects'), $filename);
            $thumbnailPath = 'uploads/projects/'.$filename;
        }

        Project::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'architect' => $request->architect,
            'client' => $request->client,
            'terms' => $request->terms,
            'project_type' => $request->project_type,
            'strategy' => $request->strategy,
            'project_date' => $request->project_date,
            'thumbnail' => $thumbnailPath,
            'details' => $request->details,
        ]);

        // For AJAX requests, return JSON response
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Project created successfully.',
                'redirect' => route('projects.index')
            ]);
        }

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');

    } catch (\Exception $e) {
        \Log::error('Project creation error: ' . $e->getMessage());

        if ($request->ajax()) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create project: ' . $e->getMessage(),
                'errors' => ['general' => $e->getMessage()]
            ], 500);
        }

        return back()->with('error', 'Failed to create project.')->withInput();
    }
}

    public function edit(Project $project)
    {
        $categories = PortfolioCategory::all();
        return view('admin-panel.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:portfolio_categories,id',
        'architect' => 'nullable|string|max:255',
        'client' => 'nullable|string|max:255',
        'terms' => 'nullable|string|max:255',
        'project_type' => 'nullable|string|max:255',
        'strategy' => 'nullable|string',
        'project_date' => 'nullable|date',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'details' => 'required|string',
    ]);

    try {
        $thumbnailPath = $project->thumbnail;
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail
            if ($project->thumbnail && file_exists(public_path($project->thumbnail))) {
                unlink(public_path($project->thumbnail));
            }
            
            $file = $request->file('thumbnail');
            $filename = time().'_'.preg_replace('/[^A-Za-z0-9\._]/', '', $file->getClientOriginalName());
            $file->move(public_path('uploads/projects'), $filename);
            $thumbnailPath = 'uploads/projects/'.$filename;
        }

        $project->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'architect' => $request->architect,
            'client' => $request->client,
            'terms' => $request->terms,
            'project_type' => $request->project_type,
            'strategy' => $request->strategy,
            'project_date' => $request->project_date,
            'thumbnail' => $thumbnailPath,
            'details' => $request->details,
        ]);

        // For AJAX requests, return JSON response
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Project updated successfully.',
                'redirect' => route('projects.index')
            ]);
        }

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');

    } catch (\Exception $e) {
        \Log::error('Project update error: ' . $e->getMessage());

        if ($request->ajax()) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update project: ' . $e->getMessage()
            ], 500);
        }

        return back()->with('error', 'Failed to update project.')->withInput();
    }
}


    public function destroy($id)
    {
        try {
            $project = Project::findOrFail($id);
            
            // Delete thumbnail if exists
            if ($project->thumbnail && file_exists(public_path($project->thumbnail))) {
                unlink(public_path($project->thumbnail));
            }
            
            $project->delete();

            return response()->json([
                'success' => true,
                'message' => 'Project deleted successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete project: ' . $e->getMessage()
            ], 500);
        }
    }

    
}