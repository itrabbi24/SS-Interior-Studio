<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class HomeController extends Controller
{
    // Home Page
    public function index()
    {
        $blogs = Blog::where('is_published', 1)
                     ->latest('publish_date')
                     ->take(3)
                     ->get();

        return view('website.home.welcome', compact('blogs'));
    }

    // Blog Details Page
    public function show($id)
    {
        $blog = Blog::where('id', $id)
                    ->where('is_published', 1)
                    ->firstOrFail();

        return view('website.blog.details', compact('blog'));
    }
}