<!-- Header Main Area -->
<header class="site-header header-style-2">
    <div class="pbmit-header-overlay">
        <div class="pbmit-pre-header-wrapper">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="pbmit-pre-header-left">
                        <ul class="pbmit-social-links">
                            <li class="pbmit-social-li pbmit-social-facebook">
                                <a title="Facebook" href="#" target="_blank">
                                    <span><i class="pbmit-base-icon-facebook-f"></i></span>
                                </a>
                            </li>
                            <li class="pbmit-social-li pbmit-social-twitter">
                                <a title="Twitter" href="#" target="_blank">
                                    <span><i class="pbmit-base-icon-twitter-2"></i></span>
                                </a>
                            </li>
                            <li class="pbmit-social-li pbmit-social-linkedin">
                                <a title="LinkedIn" href="#" target="_blank">
                                    <span><i class="pbmit-base-icon-linkedin-in"></i></span>
                                </a>
                            </li>
                            <li class="pbmit-social-li pbmit-social-instagram">
                                <a title="Instagram" href="#" target="_blank">
                                    <span><i class="pbmit-base-icon-instagram"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="pbmit-pre-header-right">
                        <ul class="pbmit-contact-info">
                           <li><i class="pbmit-base-icon-mail-alt"></i> ssinterior2233@gmail.com</li>
                           <li><i class=" pbmit-base-icon-location-dot-solid"></i>17/30, Shershahsuri Road, Mohammadpur, Dhaka-1207</li>
                           <li><i class=" pbmit-base-icon-phone-volume-solid-1"></i>01949405772</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="pbmit-main-header-area">
            <div class="container">
                <div class="pbmit-header-content d-flex justify-content-between align-items-center pbmit-bg-color-white">
                    <div class="site-branding">
                        <h1 class="site-title">
                            <a href="{{ url('/') }}">
                                <img class="logo-img" src="{{ asset('public/images/logo.png') }}" alt="SS Interior">
                            </a>
                        </h1>
                    </div>
                    <div class="pbmit-menu-area">
                        <div class="site-navigation">
                            <nav class="main-menu navbar-expand-xl navbar-light">
                                <div class="navbar-header">
                                    <!-- Toggle Button --> 
                                    <button class="navbar-toggler" type="button">
                                        <i class="pbmit-base-icon-menu-1"></i>
                                    </button>
                                </div>
                                <div class="pbmit-mobile-menu-bg"></div>
                                <div class="collapse navbar-collapse clearfix show" id="pbmit-menu">
                                    <div class="pbmit-menu-wrap">
                                        <span class="closepanel">
                                            <svg class="qodef-svg--close qodef-m" xmlns="http://www.w3.org/2000/svg" width="20.163" height="20.163" viewBox="0 0 26.163 26.163">
                                                <rect width="36" height="1" transform="translate(0.707) rotate(45)"></rect>
                                                <rect width="36" height="1" transform="translate(0 25.456) rotate(-45)"></rect>
                                            </svg>
                                        </span>
                                        <ul class="navigation clearfix">
                                            <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                                            <li class="dropdown {{ request()->is('services*') ? 'active' : '' }}">
                                                <a href="#">Services</a>
                                                <ul>
                                                    <!-- <li><a href="{{ url('services') }}">Our Services</a></li> -->
                                                    <li><a href="{{ url('service-details') }}">Service Detail</a></li>
                                                </ul>
                                            </li>
                                            <li class="{{ request()->is('team*') ? 'active' : '' }}"><a href="{{ url('team') }}">Our Team</a></li>
                                            <li class="{{ request()->is('portfolio*') ? 'active' : '' }}"><a href="{{ url('portfolio') }}">Portfolio</a></li>
                                            <li class="{{ request()->is('blog') ? 'active' : '' }}"><a href="{{ url('blog') }}">Blog</a></li>
                                            <li class="{{ request()->is('contact-us*') ? 'active' : '' }}"><a href="{{ url('contact-us') }}">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="pbmit-right-box d-flex align-items-center">
                        <div class="pbmit-button-box-second">
                            <a class="pbmit-btn pbmit-btn-outline" href="{{ url('contact-us') }}">
                                <span class="pbmit-button-content-wrapper">
                                    <span class="pbmit-button-text">Book Consult</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Main Area End Here -->