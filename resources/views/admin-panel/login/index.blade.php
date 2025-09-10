<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Dashly</title>
    
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('public/adminPanel/css/theme.bundle.css') }}" id="stylesheetLTR">
    <link rel="stylesheet" href="{{ asset('public/adminPanel/css/theme.rtl.bundle.css') }}" id="stylesheetRTL">

    <!-- FontAwesome for button icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Button CSS -->
    <style>
        .btn-website-visit {
            display: inline-block;
            padding: 12px 25px;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            color: #fff;
            background: linear-gradient(90deg, #ff416c, #ff4b2b);
            border: none;
            border-radius: 50px;
            transition: all 0.4s ease;
            box-shadow: 0 5px 15px rgba(255,75,43,0.4);
            text-decoration: none;
        }

        .btn-website-visit:hover {
            background: linear-gradient(90deg, #ff4b2b, #ff416c);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255,75,43,0.5);
        }
    </style>
</head>
<body class="d-flex align-items-center bg-light-green">

<main class="container-fluid">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-6 col-lg-4 px-lg-4">
            <!-- Logo -->
            <div class="text-center mb-4">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('/public/images/logo.png') }}" alt="Logo" width="125">
                </a>
            </div>

            <p class="text-center text-secondary mb-4">Enter your username and password to access admin panel</p>

            <!-- Display Errors -->
            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" value="{{ old('username') }}" required autofocus>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>

                <!-- Visit Website Button -->
                <div class="text-center mt-4">
                    <a href="{{ url('/') }}" class="btn btn-website-visit">
                        Visit Website
                        <i class="fas fa-external-link-alt ms-2"></i>
                    </a>
                </div>
            </form>
        </div>

        <div class="col-md-6 d-none d-md-block">
            <div class="bg-size-cover bg-position-center vh-100" 
                 style="background-image: url('{{ asset('public/adminPanel/images/covers/sign-in-cover.jpg') }}');"></div>
        </div>
    </div>
</main>

<script src="{{ asset('public/adminPanel/js/theme.bundle.js') }}"></script>
</body>
</html>
