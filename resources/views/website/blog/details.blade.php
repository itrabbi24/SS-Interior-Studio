@extends('website.shared.layout')

@section('title', $blog->title . ' - SS Interior')

@section('content')

<div class="pbmit-title-bar-wrapper">
    <div class="container">
        <div class="pbmit-title-bar-content">
            <div class="pbmit-title-bar-content-inner">
                <div class="pbmit-tbar">
                    <div class="pbmit-tbar-inner container">
                        <h1 class="pbmit-tbar-title">{{ $blog->title }}</h1>
                    </div>
                </div>
                <div class="pbmit-breadcrumb">
                    <div class="pbmit-breadcrumb-inner">
                        <span><a href="{{ route('home') }}" class="home">SS Interior</a></span>
                        <span class="sep"><i class="pbmit-base-icon-angle-right"></i></span>
                        <span>Blog</span>
                        <span class="sep"><i class="pbmit-base-icon-angle-right"></i></span>
                        <span>{{ $blog->title }}</span>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
</div>

<div class="page-content"> 
    <section class="site-content blog-details">
        <div class="container">
            <div class="row">
                <!-- Blog Content -->
                <div class="col-lg-12">
                    <article class="post blog-classic">
                        <div class="pbmit-featured-img-wrapper">
                            <div class="pbmit-featured-wrapper">
                                <img src="{{ asset('public/' . ($blog->thumbnail ?? 'images/default-thumbnail.jpg')) }}" class="img-fluid" alt="{{ $blog->title }}">
                            </div>
                        </div>  
                        <div class="pbmit-blog-classic-inner">
                            <div class="pbmit-blog-meta pbmit-blog-meta-top">
                                <span class="pbmit-meta pbmit-meta-date">
                                    <i class="pbmit-base-icon-calendar-3"></i>
                                    {{ $blog->publish_date?->format('M d, Y') }}
                                </span>
                                <span class="pbmit-meta pbmit-meta-author">
                                    <i class="pbmit-base-icon-user-3"></i> by admin
                                </span>
                            </div>
                            <div class="pbmit-entry-content">
                                {!! $blog->description !!}
                            </div>
                        </div>   
                    </article>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection