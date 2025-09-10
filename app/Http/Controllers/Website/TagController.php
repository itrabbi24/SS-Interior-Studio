<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $blogs = $tag->blogs()->where('is_published', 1)->latest('publish_date')->get();

        return view('website.blog.tag', compact('tag', 'blogs'));
    }
}
