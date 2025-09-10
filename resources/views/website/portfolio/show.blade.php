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
                    <img src="{{ asset('public/'.$project->thumbnail) }}" class="w-100" alt="{{ $project->name }}">
                </div>
                @endif

                <!-- Related Projects -->
                <!-- @if($relatedProjects->count() > 0)
                <div class="related-projects mt-5">
                    <div class="pbmit-heading animation-style2">
                        <h2 class="pbmit-title">Related Projects</h2>
                    </div>
                    <div class="row">
                        @foreach($relatedProjects as $relatedProject)
                        <div class="col-md-4 mb-4">
                            <div class="related-project-item">
                                <a href="{{ route('portfolio.detail', $relatedProject->id) }}">
                                    @if($relatedProject->thumbnail)
                                    <img src="{{ asset($relatedProject->thumbnail) }}" class="img-fluid" alt="{{ $relatedProject->name }}">
                                    @else
                                    <img src="{{ asset('images/default-thumbnail.jpg') }}" class="img-fluid" alt="{{ $relatedProject->name }}">
                                    @endif
                                    <h4 class="mt-3">{{ $relatedProject->name }}</h4>
                                    <p>{{ $relatedProject->category->name }}</p>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif -->

                <!-- Overview -->
                <div class="pbmit-short-description">
                    <h3>Overview</h3>
                    {!! $project->details !!}
                </div>

              

                <!-- Back to Portfolio -->
                <nav class="navigation post-navigation mt-5" aria-label="Posts">
                    <div class="nav-links">
                        <div class="nav-previous">
                            <a href="{{ route('portfolio') }}">
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
