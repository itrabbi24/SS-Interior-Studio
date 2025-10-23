@extends('website.shared.layout')

@section('title', 'Our Team - SS Interior')

@section('content')
<!-- Page Banner -->
<div class="pbmit-title-bar-wrapper">
    <div class="container">
        <div class="pbmit-title-bar-content">
            <div class="pbmit-title-bar-content-inner">
                <div class="pbmit-tbar">
                    <div class="pbmit-tbar-inner container">
                        <h1 class="pbmit-tbar-title">Our Team</h1>
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
                        <span><span class="post-root post post-post current-item">Our Team</span></span>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
</div>

<!-- Team Structure -->
<section class="section-md">
    <div class="container">
        <div class="pbmit-heading-subheading text-center mb-5">
            <h4 class="pbmit-subtitle">Organizational Structure</h4>
            <h2 class="pbmit-title">Our Professional Team</h2>
        </div>

        <div class="team-hierarchy">
            @foreach($positionLevels as $levelKey => $levelTitle)
                @if(isset($teams[$levelKey]) && $teams[$levelKey]->count() > 0)
                    <div class="team-level text-center mb-5">
                        <h3 class="level-title">{{ $levelTitle }}</h3>

                        <div class="d-flex flex-wrap justify-content-center gap-4">
                            @foreach($teams[$levelKey] as $member)
                                <div class="team-member text-center">
                                    {{-- Image or initials --}}
                                    @if($member->image)
                                        <div class="rounded-avatar">
                                            <img src="{{ asset('public/images/' . $member->image) }}" alt="{{ $member->name }}" 
                                                 onerror="this.onerror=null; this.src='https://via.placeholder.com/150x150/bb9a65/ffffff?text={{ substr($member->name,0,2) }}'">
                                        </div>
                                    @else
                                        <div class="square-avatar">{{ $member->name }}</div>
                                    @endif

                                    {{-- Name and designation --}}
                                    <h5 class="member-name">{{ $member->name }}</h5>
                                    <p>{{ $member->designation }}</p>


                                        
                                  @if($member->qualifications)
                                        @php
                                            $qualifications = is_array($member->qualifications) ? $member->qualifications : json_decode($member->qualifications, true);
                                        @endphp 
                                        <p>
                                            @foreach($qualifications as $qualification)
                                                {{ $qualification }}<br>
                                            @endforeach
                                        </p>

                        

                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

<style>
.team-hierarchy { margin: 40px 0; }
.level-title { 
    color: #bb9a65; 
    font-weight: 600; 
    margin-bottom: 30px; 
    position: relative; 
    text-transform: uppercase;
}
.level-title:after { 
    content: ''; 
    position: absolute; 
    bottom: -5px; 
    left: 50%; 
    transform: translateX(-50%); 
    width: 80px; 
    height: 3px; 
    background: #bb9a65; 
}

.team-member { 
    text-align: center; 
    width: 180px; 
    margin-bottom: 20px; 
    transition: transform 0.3s ease;
}
.team-member:hover {
    transform: translateY(-5px);
}
.member-name { 
    margin-top: 15px; 
    font-size: 16px; 
    font-weight: 600; 
    color: #333;
    padding-bottom: 5px;
    position: relative;
}
.member-name:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 40px;
    height: 2px;
    background: #bb9a65;
}
.team-member p { 
    font-size: 14px; 
    color: #6c757d; 
    margin: 2px 0; 
}

.rounded-avatar {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: #f8f9fa;
    border: 3px solid #bb9a65;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.square-avatar {
    width: 182px;
    height: 78px;
    border-radius: 35px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: #f8f9fa;
    border: 3px solid #bb9a65;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    font-weight: bold;
    font-size: 15px;
    color: #bb9a65;
    text-align: center;
    padding: 3px;
}

.rounded-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.team-member:hover .rounded-avatar,
.team-member:hover .square-avatar {
    border-color: #8e704e;
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
}
.team-member:hover .square-avatar {
    background: #bb9a65;
    color: white;
}


@media (max-width: 768px) {
    .rounded-avatar,
    .square-avatar { 
        width: 120px; 
        height: 120px; 
    }
    .square-avatar { 
        font-size: 18px; 
    }
    .team-member { 
        width: 140px; 
    }
}
</style>
@endsection