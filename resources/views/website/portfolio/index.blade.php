@extends('website.shared.layout')

@section('title', 'Portfolio - SS Interior')

@section('content')

<div class="pbmit-title-bar-wrapper">
    <div class="container">
        <div class="pbmit-title-bar-content">
            <div class="pbmit-title-bar-content-inner">
                <div class="pbmit-tbar">
                    <div class="pbmit-tbar-inner container">
                        <h1 class="pbmit-tbar-title"> Portfolio</h1>
                    </div>
                </div>
                <div class="pbmit-breadcrumb">
                    <div class="pbmit-breadcrumb-inner">
                        <span>
                            <a title="" href="{{ route('home') }}" class="home"><span>SS Interior</span></a>
                        </span>
                        <span class="sep">
                            <i class="pbmit-base-icon-angle-right"></i>
                        </span>
                        <span><span class="post-root post post-post current-item"> Portfolio</span></span>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
</div>

<!-- Page Content -->
<div class="page-content">   
    
    <!-- Portfolio Sortable Col 2 Start -->
    <section class="section-md pbmit-sortable-yes">
        <div class="container">
            <div class="pbmit-sortable-list">
                <ul class="pbmit-sortable-list-ul">
                    <li><a href="#" class="pbmit-sortable-link pbmit-selected" data-sortby="*">All</a></li>
                    @foreach($categories as $category)
                        <li>
                            <a href="#" class="pbmit-sortable-link" data-sortby="{{ Str::slug($category->name) }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="pbmit-element-posts-wrapper row multi-columns-row">
                @forelse($projects as $project)
                    <article class="pbmit-ele-portfolio pbmit-portfolio-style-2 {{ Str::slug($project->category->name) }} col-md-6">
                        <div class="pbminfotech-post-content">
                            <div class="pbmit-featured-img-wrapper">
                                <div class="pbmit-featured-wrapper">
                                    <img src="{{ asset('public/' . $project->thumbnail) }}" class="img-fluid" alt="{{ $project->name }}">
                                </div>
                            </div>
                            <div class="pbminfotech-box-content">
                                <div class="pbminfotech-titlebox">
                                    <div class="pbmit-port-cat">
                                        <a href="#" rel="tag">{{ $project->category->name }}</a>
                                    </div>
                                    <h3 class="pbmit-portfolio-title">
                                        <a href="{{ route('portfolio.detail', $project->id) }}">{{ $project->name }}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-12 text-center py-5">
                        <h4>No projects found</h4>
                        <p>Please check back later for our portfolio updates.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Portfolio Sortable Col 2 End -->

</div>
<!-- Page Content End -->

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Portfolio filtering functionality
    $('.pbmit-sortable-link').on('click', function(e) {
        e.preventDefault();
        
        // Remove active class from all links
        $('.pbmit-sortable-link').removeClass('pbmit-selected');
        // Add active class to clicked link
        $(this).addClass('pbmit-selected');
        
        var filterValue = $(this).data('sortby');
        
        if (filterValue === '*') {
            $('.pbmit-ele-portfolio').show();
        } else {
            $('.pbmit-ele-portfolio').hide();
            $('.pbmit-ele-portfolio.' + filterValue).show();
        }
    });
});
</script>
@endpush