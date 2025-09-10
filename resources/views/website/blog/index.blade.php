@extends('website.shared.layout')

@section('title', 'Blog - SS Interior')

@section('content')

<div class="pbmit-title-bar-wrapper">
    <div class="container">
        <div class="pbmit-title-bar-content">
            <div class="pbmit-title-bar-content-inner">
                <div class="pbmit-tbar">
                    <div class="pbmit-tbar-inner container">
                        <h1 class="pbmit-tbar-title">Blog</h1>
                    </div>
                </div>
                <div class="pbmit-breadcrumb">
                    <div class="pbmit-breadcrumb-inner">
                        <span><a href="{{ route('home') }}" class="home">SS Interior</a></span>
                        <span class="sep"><i class="pbmit-base-icon-angle-right"></i></span>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
</div>

<div class="page-content blog-classic-content">
    <!-- Blog Classic -->
    <section class="site-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-9 blog-right-col">
                    <div class="row pbmit-element-posts-wrapper">
                        @forelse($blogs as $blog)
                        <article class="post blog-classic">   
                            <div class="pbmit-featured-img-wrapper">
                                <div class="pbmit-featured-wrapper">
                                    <a href="{{ route('blog.show', $blog->id) }}">
                                        <img src="{{ asset('public/' . ($blog->thumbnail ?? 'images/default-thumbnail.jpg')) }}" class="img-fluid" alt="{{ $blog->title }}">
                                    </a>
                                </div>
                            </div>  
                            <div class="pbmit-blog-classic-inner">
                                <div class="pbmit-blog-meta pbmit-blog-meta-top">
                                    @if($blog->category)
                                    <span class="pbmit-meta pbmit-meta-cat">
                                        <a href="#" rel="category tag">{{ $blog->category->name }}</a>
                                    </span>
                                    @endif
                                    <span class="pbmit-meta pbmit-meta-date">
                                        <i class="pbmit-base-icon-calendar-3"></i>
                                        <a href="{{ route('blog.show', $blog->id) }}" rel="bookmark">
                                           <time class="entry-date published" 
      datetime="{{ $blog->publish_date ? $blog->publish_date->format('Y-m-d\TH:i:sP') : '' }}">
    {{ $blog->publish_date ? $blog->publish_date->format('M d, Y') : 'Unpublished' }}
</time>

                                        </a>
                                    </span>
                                    <span class="pbmit-meta pbmit-meta-author">
                                        <i class="pbmit-base-icon-user-3"></i>by admin
                                    </span>
                                </div>
                                <h3 class="pbmit-post-title">
                                    <a href="{{ route('blog.show', $blog->id) }}">{{ $blog->title }}</a>
                                </h3>
                                <div class="pbmit-entry-content">
                                    <p>{{ Str::limit(strip_tags($blog->description), 150) }}</p>
                                    <a class="pbmit-btn pbmit-btn-outline" href="{{ route('blog.show', $blog->id) }}">
                                        <span class="pbmit-button-content-wrapper">
                                            <span class="pbmit-button-text">Read More</span>
                                        </span>
                                    </a>
                                </div>
                            </div> 
                        </article>
                        @empty
                        <div class="col-12">
                            <p>No blog posts found.</p>
                        </div>
                        @endforelse
                    </div>
                    
                    <!-- Pagination -->
                    @if($blogs->hasPages())
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pbmit-pagination">
                                {{ $blogs->links() }}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                
                <!-- Sidebar -->
                <div class="col-md-12 col-lg-3 blog-left-col">
                    <aside class="sidebar">
                         
                        <aside class="widget widget-categories">
                            <h2 class="widget-title">Categories</h2>
                            <ul>
                                @foreach($categories as $category)
                                <li>
                                    <span class="pbmit-cat-li">
                                        <a href="#">{{ $category->name }}</a>
                                        <span class="pbmit-brackets">( {{ $category->blogs_count }} )</span>	
                                    </span>
                                </li>
                                @endforeach
                            </ul>
                        </aside>
                        
                        <aside class="widget widget-recent-post">
                            <h2 class="widget-title">Recent Posts</h2>
                            <ul class="recent-post-list">
                                @foreach($recentPosts as $recentPost)
                                <li class="recent-post-list-li"> 
                                    <a class="recent-post-thum" href="{{ route('blog.show', $recentPost->id) }}">
                                        <img src="{{ asset('public/' . ($recentPost->thumbnail ?? 'images/default-thumbnail.jpg')) }}" class="img-fluid" alt="{{ $recentPost->title }}">
                                    </a>
                                    <div class="pbmit-rpw-content">
                                        <span class="pbmit-rpw-date">
                                           <a href="{{ route('blog.show', $recentPost->id) }}">
    {{ $recentPost->publish_date ? $recentPost->publish_date->format('M d, Y') : '' }}
</a>

                                        </span>
                                        <span class="pbmit-rpw-title">
                                            <a href="{{ route('blog.show', $recentPost->id) }}">{{ Str::limit($recentPost->title, 40) }}</a>
                                        </span>
                                    </div> 
                                </li>
                                @endforeach
                            </ul>
                        </aside> 
                        
                        <aside class="widget widget-tag-cloud">
                            <h3 class="widget-title">Tag Cloud</h3>
                            <div class="tagcloud">
                                @php
                                    $tags = [];
                                    foreach($blogs as $blog) {
                                        if ($blog->tags) {
                                            $blogTags = explode(',', $blog->tags);
                                            foreach($blogTags as $tag) {
                                                $tag = trim($tag);
                                                if ($tag && !in_array($tag, $tags)) {
                                                    $tags[] = $tag;
                                                }
                                            }
                                        }
                                    }
                                @endphp
                                
                                @foreach(array_slice($tags, 0, 8) as $tag)
                                <a href="#" class="tag-cloud-link">{{ $tag }}</a>
                                @endforeach
                            </div>
                        </aside> 
                        
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Classic End -->
</div>

@endsection
