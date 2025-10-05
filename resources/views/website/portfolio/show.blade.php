@extends('website.shared.layout')

@section('title', $project->name . ' - SS Interior')

@section('content')

<!-- Title Bar -->
<div class="pbmit-title-bar-wrapper">
    <div class="container">
        <div class="pbmit-title-bar-content">
            <div class="pbmit-title-bar-content-inner">
                <div class="pbmit-tbar">
                    <div class="pbmit-tbar-inner container">
                        <h1 class="pbmit-tbar-title">{{ $project->name }}</h1>
                    </div>
                </div>
                <div class="pbmit-breadcrumb">
                    <div class="pbmit-breadcrumb-inner">
                        <span>
                            <a href="{{ route('home') }}" class="home"><span>SS Interior</span></a>
                        </span>
                        <span class="sep"><i class="pbmit-base-icon-angle-right"></i></span>
                        <span>
                            <a href="{{ route('portfolio') }}" class="home"><span>Portfolio</span></a>
                        </span>
                        <span class="sep"><i class="pbmit-base-icon-angle-right"></i></span>
                        <span>
                            <span>{{ $project->category->name }}</span>
                        </span>
                        <span class="sep"><i class="pbmit-base-icon-angle-right"></i></span>
                        <span><span class="post-root post post-post current-item">{{ $project->name }}</span></span>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
</div>
<!-- Title Bar End -->

<!-- Page Content -->
<div class="page-content">   

    <!-- Portfolio Detail -->
    <section class="site-content">
        <div class="container">
            <article class="portfolio-single">

                <!-- Project Info -->
                <div class="pbmit-single-project-details-list">
                    <h3>Project info</h3>
                    <div class="pbmit-portfolio-lines-wrapper">
                        <ul class="pbmit-portfolio-lines-ul">
                            @if($project->architect)
                            <li class="pbmit-portfolio-line-li"> 
                                <span class="pbmit-portfolio-line-title">Architect: </span> 
                                <span class="pbmit-portfolio-line-value">{{ $project->architect }}</span>
                            </li>
                            @endif
                            
                            @if($project->client)
                            <li class="pbmit-portfolio-line-li"> 
                                <span class="pbmit-portfolio-line-title">Client: </span> 
                                <span class="pbmit-portfolio-line-value">{{ $project->client }}</span>
                            </li>
                            @endif
                            
                            @if($project->terms)
                            <li class="pbmit-portfolio-line-li"> 
                                <span class="pbmit-portfolio-line-title">Terms: </span> 
                                <span class="pbmit-portfolio-line-value">{{ $project->terms }}</span>
                            </li>
                            @endif
                            
                            @if($project->project_type)
                            <li class="pbmit-portfolio-line-li"> 
                                <span class="pbmit-portfolio-line-title">Project Type: </span> 
                                <span class="pbmit-portfolio-line-value">{{ $project->project_type }}</span>
                            </li>
                            @endif
                            
                            @if($project->strategy)
                            <li class="pbmit-portfolio-line-li"> 
                                <span class="pbmit-portfolio-line-title">Strategy: </span> 
                                <span class="pbmit-portfolio-line-value">{{ $project->strategy }}</span>
                            </li>
                            @endif
                            
                            @if($project->project_date)
                            <li class="pbmit-portfolio-line-li"> 
                                <span class="pbmit-portfolio-line-title">Date: </span> 
                                <span class="pbmit-portfolio-line-value">{{ \Carbon\Carbon::parse($project->project_date)->format('F d, Y') }}</span>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>

                <!-- Featured Image -->
                @if($project->thumbnail)
                <div class="pbmit-featured-img-wrapper mt-4">
                    <img src="{{ asset('public/'.$project->thumbnail) }}" class="w-100 img-fluid" alt="{{ $project->name }}" style="max-height: 600px; object-fit: cover;">
                </div>
                @endif

                <!-- Overview -->
                <div class="pbmit-short-description mt-4">
                    <h3>Overview</h3>
                    <div class="project-content">
                        {!! $project->details !!}
                    </div>
                </div>

                <!-- Responsive Content Styling -->
                <style>
                    /* Base responsive styles */
                    .project-content {
                        width: 100%;
                        overflow: hidden;
                    }

                    /* Image responsiveness */
                    .project-content img {
                        max-width: 100%;
                        height: auto;
                        display: block;
                        margin: 1rem 0;
                    }

                    /* Text content responsiveness */
                    .project-content p {
                        word-wrap: break-word;
                        overflow-wrap: break-word;
                        line-height: 1.6;
                        margin-bottom: 1rem;
                    }

                    .project-content h1,
                    .project-content h2,
                    .project-content h3,
                    .project-content h4,
                    .project-content h5,
                    .project-content h6 {
                        word-wrap: break-word;
                        margin: 1.5rem 0 1rem 0;
                        line-height: 1.3;
                    }

                    .project-content ul,
                    .project-content ol {
                        padding-left: 1.5rem;
                        margin-bottom: 1rem;
                    }

                    .project-content li {
                        margin-bottom: 0.5rem;
                        word-wrap: break-word;
                    }

                    /* Table responsiveness */
                    .project-content table {
                        width: 100%;
                        border-collapse: collapse;
                        margin: 1rem 0;
                        overflow-x: auto;
                        display: block;
                    }

                    .project-content th,
                    .project-content td {
                        padding: 0.75rem;
                        border: 1px solid #dee2e6;
                        text-align: left;
                    }

                    /* Iframe and embedded content */
                    .project-content iframe,
                    .project-content video,
                    .project-content embed {
                        max-width: 100%;
                        height: auto;
                    }

                    /* Mobile-first responsive design */
                    @media (max-width: 768px) {
                        .pbmit-single-project-details-list {
                            margin-bottom: 1.5rem;
                        }
                        
                        .pbmit-portfolio-lines-ul {
                            padding-left: 0;
                        }
                        
                        .pbmit-portfolio-line-li {
                            display: flex;
                            flex-direction: column;
                            margin-bottom: 0.75rem;
                            padding: 0.5rem 0;
                            border-bottom: 1px solid #f0f0f0;
                        }
                        
                        .pbmit-portfolio-line-title {
                            font-weight: 600;
                            margin-bottom: 0.25rem;
                            color: #333;
                        }
                        
                        .pbmit-portfolio-line-value {
                            color: #666;
                        }
                        
                        .project-content h1 {
                            font-size: 1.75rem;
                        }
                        
                        .project-content h2 {
                            font-size: 1.5rem;
                        }
                        
                        .project-content h3 {
                            font-size: 1.25rem;
                        }
                        
                        .project-content h4 {
                            font-size: 1.1rem;
                        }
                        
                        .project-content p {
                            font-size: 1rem;
                        }
                        
                        .project-content table {
                            font-size: 0.9rem;
                        }
                        
                        .project-content th,
                        .project-content td {
                            padding: 0.5rem;
                        }
                    }

                    @media (max-width: 576px) {
                        .pbmit-tbar-title {
                            font-size: 1.5rem;
                            text-align: center;
                        }
                        
                        .pbmit-breadcrumb-inner {
                            justify-content: center;
                            flex-wrap: wrap;
                        }
                        
                        .project-content h1 {
                            font-size: 1.5rem;
                        }
                        
                        .project-content h2 {
                            font-size: 1.25rem;
                        }
                        
                        .project-content h3 {
                            font-size: 1.1rem;
                        }
                        
                        .project-content p {
                            font-size: 0.95rem;
                        }
                        
                        .project-content ul,
                        .project-content ol {
                            padding-left: 1rem;
                        }
                        
                        .nav-links {
                            flex-direction: column;
                            gap: 1rem;
                        }
                        
                        .nav-previous,
                        .nav-next {
                            width: 100%;
                            text-align: center;
                        }
                    }

                    /* Large screens */
                    @media (min-width: 1200px) {
                        .project-content {
                            max-width: 100%;
                        }
                        
                        .project-content img {
                            max-height: 500px;
                        }
                    }

                    /* Print styles */
                    @media print {
                        .project-content {
                            font-size: 12pt;
                            line-height: 1.4;
                        }
                        
                        .project-content img {
                            max-width: 100% !important;
                            height: auto !important;
                        }
                    }

                    /* High contrast mode support */
                    @media (prefers-contrast: high) {
                        .project-content {
                            background: white;
                            color: black;
                        }
                    }

                    /* Reduced motion support */
                    @media (prefers-reduced-motion: reduce) {
                        .project-content * {
                            animation-duration: 0.01ms !important;
                            animation-iteration-count: 1 !important;
                            transition-duration: 0.01ms !important;
                        }
                    }
                </style>

                <!-- Back to Portfolio -->
                <nav class="navigation post-navigation mt-5" aria-label="Posts">
                    <div class="nav-links">
                        <div class="nav-previous">
                            <a href="{{ route('portfolio') }}" class="btn btn-outline-primary">
                                <span class="pbmit-post-nav-icon">
                                    <i class="pbmit-base-icon-left-arrow-1"></i>
                                    <span class="pbmit-post-nav-head">Back to Portfolio</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </nav>

            </article>
        </div>
    </section>
    <!-- Portfolio Detail End -->

</div>
<!-- Page Content End -->

@endsection