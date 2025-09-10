<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::with('category');

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

                ->addColumn('status', function($row){
                    return $row->is_published 
                        ? '<span class="badge rounded-pill text-bg-success">Published</span>' 
                        : '<span class="badge rounded-pill text-bg-secondary">Unpublished</span>';
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('blogs.edit', $row->id).'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                    $btn .= ' <a href="javascript:void(0)" data-id="'.$row->id.'" class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>';
                    $btn .= ' <a href="javascript:void(0)" data-id="'.$row->id.'" class="btn btn-'.($row->is_published ? 'warning' : 'success').' btn-sm toggle-publish">';
                    $btn .= $row->is_published ? '<i class="fas fa-eye-slash"></i>' : '<i class="fas fa-eye"></i>';
                    $btn .= '</a>';
                    return $btn;
                })
                ->rawColumns(['thumbnail', 'status', 'action'])
                ->make(true);
        }

        return view('admin-panel.blogs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin-panel.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
       public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|string',
            'publish_date' => 'nullable|date',
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/blog-thumbnails'), $filename);
            $thumbnailPath = 'uploads/blog-thumbnails/'.$filename;
        }

        Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'thumbnail' => $thumbnailPath,
            'tags' => $request->tags,
            'publish_date' => $request->publish_date,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('admin-panel.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|string',
            'publish_date' => 'nullable|date',
        ]);

        $thumbnailPath = $blog->thumbnail;
        if ($request->hasFile('thumbnail')) {
            if ($blog->thumbnail && file_exists(public_path($blog->thumbnail))) {
                unlink(public_path($blog->thumbnail));
            }
            $file = $request->file('thumbnail');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/blog-thumbnails'), $filename);
            $thumbnailPath = 'uploads/blog-thumbnails/'.$filename;
        }

        $blog->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'thumbnail' => $thumbnailPath,
            'tags' => $request->tags,
            'publish_date' => $request->publish_date,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
public function destroy(Blog $blog)
{
    // Delete thumbnail if exists
    if ($blog->thumbnail && file_exists(public_path($blog->thumbnail))) {
        unlink(public_path($blog->thumbnail));
    }
    
    $blog->delete();

    return response()->json(['success' => 'Blog deleted successfully.']);
}

    /**
     * Toggle publish status of the blog.
     */
    public function togglePublish(Blog $blog)
    {
        $blog->update([
            'is_published' => !$blog->is_published,
            'publish_date' => $blog->is_published ? null : now(),
        ]);

        return response()->json([
            'success' => 'Blog status updated successfully.',
            'is_published' => $blog->is_published
        ]);
    }
}