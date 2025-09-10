<!DOCTYPE html>
<html lang="en" data-theme="light" data-sidebar-behaviour="fixed" data-navigation-color="inverted" data-is-fluid="true">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('/public/adminPanel/css/theme.bundle.css') }}" id="stylesheetLTR">
    <link rel="stylesheet" href="{{ asset('/public/adminPanel/css/theme.rtl.bundle.css') }}" id="stylesheetRTL">

    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="preload" as="style"
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap">
    <link rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');"
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap">

    <!-- no-JS fallback -->
    <noscript>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap">
    </noscript>
    <link rel="icon" href="{{ asset('/public/adminPanel/assets/favicon/favicon.ico') }}" sizes="any">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('styles')

    <!-- Theme Script -->
    <script>
        var themeConfig = {
            theme: JSON.parse('"light"'),
            isRTL: JSON.parse('false'),
            isFluid: JSON.parse('true'),
            sidebarBehaviour: JSON.parse('"fixed"'),
            navigationColor: JSON.parse('"inverted"')
        };

        var isRTL = localStorage.getItem('isRTL') === 'true',
            isFluid = localStorage.getItem('isFluid') === 'true',
            theme = localStorage.getItem('theme'),
            sidebarSizing = localStorage.getItem('sidebarSizing'),
            linkLTR = document.getElementById('stylesheetLTR'),
            linkRTL = document.getElementById('stylesheetRTL'),
            html = document.documentElement;

        if (isRTL) {
            linkLTR.setAttribute('disabled', '');
            linkRTL.removeAttribute('disabled');
            html.setAttribute('dir', 'rtl');
        } else {
            linkRTL.setAttribute('disabled', '');
            linkLTR.removeAttribute('disabled');
            html.removeAttribute('dir');
        }
    </script>

    <!-- Page Title -->
    <title>Dashboard</title>
</head>

<body>

    <!-- Sidebar -->
    <nav id="mainNavbar" class="navbar navbar-vertical navbar-expand-lg scrollbar bg-dark navbar-dark">
        <div class="container-fluid">

            <!-- Brand -->
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <b class="text-white text-center">SS Interior Panel</b>
            </a>

            <!-- Navbar toggler -->
            <a href="javascript:void(0);" class="navbar-toggler" data-bs-toggle="collapse"
                data-bs-target="#sidenavCollapse" aria-controls="sidenavCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </a>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenavCollapse">

                <!-- Navigation -->
                <!-- Navigation -->
<ul class="navbar-nav mb-lg-7">

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
            <i class="fa fa-home nav-link-icon"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Blog Management -->
    <li class="nav-item">
        <a href="{{ route('categories.index') }}" 
           class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
            <i class="fa fa-list nav-link-icon"></i>
            <span>Blog Categories</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('blogs.index') }}" 
           class="nav-link {{ request()->is('admin/blogs*') ? 'active' : '' }}">
            <i class="fa fa-newspaper nav-link-icon"></i>
            <span>Blog Lists</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('blogs.create') }}" 
           class="nav-link {{ request()->is('admin/blogs/create') ? 'active' : '' }}">
            <i class="fa fa-plus nav-link-icon"></i>
            <span>Create Blog</span>
        </a>
    </li>

    <!-- Portfolio Management -->
    <li class="nav-item">
        <a href="{{ route('portfolio-categories.index') }}" 
           class="nav-link {{ request()->is('admin/portfolio-categories*') ? 'active' : '' }}">
            <i class="fa fa-folder nav-link-icon"></i>
            <span>Portfolio Categories</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('projects.index') }}" 
           class="nav-link {{ request()->is('admin/projects*') ? 'active' : '' }}">
            <i class="fa fa-briefcase nav-link-icon"></i>
            <span>Projects</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('projects.create') }}" 
           class="nav-link {{ request()->is('admin/projects/create') ? 'active' : '' }}">
            <i class="fa fa-plus-circle nav-link-icon"></i>
            <span>Create Project</span>
        </a>
    </li>

    <!-- Contact Requests -->
    <li class="nav-item">
        <a href="{{ route('admin.contacts.index') }}" 
           class="nav-link {{ request()->is('admin.contacts.index') ? 'active' : '' }}">
            <i class="fa fa-user nav-link-icon"></i>
            <span>Contact Requests</span>
        </a>
    </li>

    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link" href="#"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out-alt nav-link-icon"></i>
            <span>Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>

</ul>
<!-- End of Navigation -->
                <!-- End of Navigation -->

            </div>
            <!-- End of Collapse -->
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main>

        <!-- HEADER -->
        <header class="container-fluid d-flex py-6 mb-4">
            <!-- Title -->
            <div class="d-none d-md-inline-block me-auto">
               <b> SS Interior Admin Panel</b>
            </div>

            <!-- Top Right Profile Dropdown -->
            <!-- <div class="d-flex align-items-center ms-auto me-n1 me-lg-n2">
                <div class="dropdown">
                    <a href="javascript:void(0);"
                        class="dropdown-toggle no-arrow d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mx-1 mx-lg-2 w-40px h-40px"
                        role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false" data-bs-offset="0,0">
                        <div class="avatar avatar-circle avatar-sm avatar-online">
                            <img src="{{ asset('/public/adminPanel/images/profiles/profile-06.jpg') }}"
                                alt="..." class="avatar-img" width="40" height="40">
                        </div>
                    </a>

                    <div class="dropdown-menu">
                        <div class="dropdown-item-text">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-sm avatar-circle">
                                    <img src="{{ asset('/public/adminPanel/images/profiles/profile-06.jpg') }}"
                                        alt="..." class="avatar-img" width="40" height="40">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="mb-0">{{ Auth::user()->name ?? 'Guest' }}</h4>
                                    <p class="card-text">{{ Auth::user()->email ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                        <hr class="dropdown-divider">

                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();">
                            Logout
                        </a>
                        <form id="logout-form-header" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div> -->
        </header>

        <div class="container-fluid">
            @yield('content')
        </div>

        <!-- Footer-->
        <footer class="mt-auto">
            <div class="container-fluid mt-4 mb-6 text-body-secondary">
                <div class="row justify-content-between">
                    <div class="col">
                        © <span id="currentYear"></span> Developed 
                        <a href="https://rotexit.com" target="_blank" rel="noopener noreferrer">Rotexit.com</a>
                    </div>
                    <div class="col-auto">
                        v1.6.0
                    </div>
                </div>
            </div>
        </footer>

<script>
    document.getElementById('currentYear').textContent = new Date().getFullYear();
</script>

    </main>

    <!-- JAVASCRIPT-->
    <script src="{{ asset('/public/adminPanel/js/theme.bundle.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Toastr -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>




    <script>
        // Toastr options
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "3000"
        };

        // Flash messages
        @if (session('success'))
            toastr.success('{{ session('success') }}');
        @endif
        @if (session('error'))
            toastr.error('{{ session('error') }}');
        @endif

        // Active menu highlight
        document.addEventListener("DOMContentLoaded", function() {
            const currentUrl = window.location.href;
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                if (currentUrl === link.href) {
                    link.classList.add('active');
                }
            });
        });
    </script>

    @stack('scripts')

</body>
</html>
