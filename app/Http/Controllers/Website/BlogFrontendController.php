<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;

class BlogFrontendController extends Controller
{
    // Show all blogs with pagination
public function index()
{
    $blogs = Blog::where('is_published', 1)
        ->whereNotNull('publish_date')
        ->latest('publish_date')
        ->paginate(9);

    $categories = Category::withCount(['blogs' => function($query) {
        $query->where('is_published', 1)
              ->whereNotNull('publish_date');
    }])->get();

    $recentPosts = Blog::where('is_published', 1)
        ->whereNotNull('publish_date')
        ->latest('publish_date')
        ->take(3)
        ->get();

    return view('website.blog.index', compact('blogs', 'categories', 'recentPosts'));
}


    // Show single blog details
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
            
        if (! $blog->is_published) {
            abort(404);
        }
        
        $categories = Category::withCount(['blogs' => function($query) {
            $query->published();
        }])->get();
        
        $recentPosts = Blog::published()
            ->latest('publish_date')
            ->take(3)
            ->get();

        return view('website.blog.details', compact('blog', 'categories', 'recentPosts'));
    }
}
