<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'SS Interior')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/images/fevicon.png') }}">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/pbminfotech-base-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/shortcode.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/responsive.css') }}">

    @stack('styles')
</head>
<body>
    <!-- page wrapper -->
    <div class="page-wrapper" id="page">
        @include('website.shared.header')
        
        <!-- page content -->
        @yield('content')
        <!-- page content End -->
        
        @include('website.shared.footer')
    </div>
    <!-- page wrapper End -->

    <!-- Search Box Start Here -->
    <div class="pbmit-search-overlay">
        <div class="pbmit-icon-close">
            <svg class="qodef-svg--close qodef-m" xmlns="http://www.w3.org/2000/svg" width="28.163" height="28.163" viewBox="0 0 26.163 26.163">
                <rect width="36" height="1" transform="translate(0.707) rotate(45)"></rect>
                <rect width="36" height="1" transform="translate(0 25.456) rotate(-45)"></rect>
            </svg>
        </div>
        <div class="pbmit-search-outer"> 
            <form class="pbmit-site-searchform">
                <input type="search" class="form-control field searchform-s" name="s" placeholder="Search …">
                <button type="submit"></button>
            </form>
        </div>
    </div>
    <!-- Search Box End Here -->

    <!-- Scroll To Top -->
    <div class="pbmit-progress-wrap">
        <svg class="pbmit-progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
        </svg>	
    </div>
    <!-- Scroll To Top End -->
    
    <!-- JS Files -->
    <script data-cfasync="false" src="//cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('public/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('public/js/numinate.min.js') }}"></script>
    <script src="{{ asset('public/js/swiper.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('public/js/circle-progress.js') }}"></script>
    <script src="{{ asset('public/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('public/js/aos.js') }}"></script>
    <script src="{{ asset('public/js/masonry.min.js') }}"></script>
    <script src="{{ asset('public/js/gsap.js') }}"></script>
    <script src="{{ asset('public/js/ScrollTrigger.js') }}"></script>
    <script src="{{ asset('public/js/SplitText.js') }}"></script>
    <script src="{{ asset('public/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/js/magnetic.js') }}"></script>
    <script src="{{ asset('public/js/morphext.min.js') }}"></script>
    <script src="{{ asset('public/js/gsap-animation.js') }}"></script>
    <script src="{{ asset('public/js/scripts.js') }}"></script>

    @stack('scripts')
</body>
</html>