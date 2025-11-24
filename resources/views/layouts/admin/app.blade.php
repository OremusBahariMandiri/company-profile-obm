<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Maritime Dashboard')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="{{Storage::url('/images/logo.png')}}">

    <link rel="shortcut icon" href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f7ff;
            overflow-x: hidden;
        }

        #sidebar {
            width: 250px;
            background-color: #1a4b78;
            color: #fff;
            transition: all 0.3s ease;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            overflow-y: auto;
        }

        #sidebar.active {
            width: 80px;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background-color: #0c325a;
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 80px;
        }

        #sidebar .sidebar-header h3 {
            margin: 0;
            color: #8ecae6;
            font-weight: 600;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        #sidebar.active .sidebar-header h3 {
            display: none;
        }

        #sidebar .sidebar-header button {
            background-color: transparent;
            border: 1px solid #8ecae6;
            color: #8ecae6;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        #sidebar .sidebar-header button:hover {
            background-color: #8ecae6;
            color: #1a4b78;
        }

        #sidebar ul.components {
            padding: 20px 0;
            border-bottom: 1px solid #2c6ca5;
            list-style: none;
        }

        #sidebar ul li {
            margin: 0;
        }

        #sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 15px 20px;
            transition: all 0.3s ease;
            border: none;
        }

        #sidebar ul li a:hover {
            color: #8ecae6;
            background-color: #12406c;
            text-decoration: none;
        }

        #sidebar ul li i {
            margin-right: 15px;
            width: 20px;
            text-align: center;
            color: #8ecae6;
            font-size: 1.1rem;
        }

        #sidebar.active ul li a {
            text-align: center;
            padding: 15px 0;
            justify-content: center;
        }

        #sidebar.active ul li a span {
            display: none;
        }

        #sidebar.active ul li i {
            margin-right: 0;
            font-size: 1.3rem;
        }

        #content {
            margin-left: 250px;
            min-height: 100vh;
            transition: all 0.3s ease;
            width: calc(100% - 250px);
        }

        #content.active {
            margin-left: 80px;
            width: calc(100% - 80px);
        }

        .top-navbar {
            background: #ffffff;
            padding: 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-bottom: 3px solid #1a4b78;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .navbar-brand {
            font-weight: 600;
            color: #1a4b78 !important;
        }

        .navbar-user {
            display: flex;
            align-items: center;
            padding: 10px 0;
            margin-right: 15px;
            position: relative;
        }

        .navbar-user .user-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #1a4b78 0%, #2c6ca5 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            color: white;
            font-size: 1.2rem;
            border: 2px solid #e3f2fd;
        }

        .navbar-user .user-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-right: 8px;
        }

        .navbar-user .user-name {
            color: #1a4b78;
            font-weight: 600;
            font-size: 0.95rem;
            line-height: 1.2;
            margin: 0;
        }

        .navbar-user .user-role {
            color: #6c757d;
            font-size: 0.8rem;
            line-height: 1.2;
            margin: 0;
        }

        .nav-link.dropdown-toggle {
            display: flex;
            align-items: center;
            padding: 0 !important;
            border: none !important;
            background: none !important;
        }

        .nav-link.dropdown-toggle::after {
            content: '\f078';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            border: none !important;
            vertical-align: 0;
            margin-left: 8px;
            color: #1a4b78;
            font-size: 0.8rem;
            transition: transform 0.3s ease;
        }

        .nav-link.dropdown-toggle[aria-expanded="true"]::after {
            transform: rotate(180deg);
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            border-top: 3px solid #1a4b78;
            border-radius: 8px;
            margin-top: 8px;
        }

        .dropdown-item {
            padding: 12px 20px;
            color: #333;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: #e6f2ff;
            color: #1a4b78;
        }

        .main-content {
            padding: 30px;
        }

        .dashboard-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(26, 75, 120, 0.1);
            border: none;
            overflow: hidden;
        }

        .dashboard-card .card-header {
            background: linear-gradient(135deg, #1a4b78 0%, #2c6ca5 100%);
            color: white;
            border: none;
            padding: 20px 25px;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .dashboard-card .card-body {
            padding: 25px;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            border-radius: 8px;
            border-left: 4px solid #28a745;
        }

        .welcome-message {
            font-size: 1.1rem;
            color: #333;
            line-height: 1.6;
            margin: 0;
        }

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }

            #sidebar.active {
                margin-left: 0;
                width: 250px;
            }

            #content {
                margin-left: 0;
                width: 100%;
            }

            #content.active {
                margin-left: 0;
                width: 100%;
            }

            .main-content {
                padding: 15px;
            }

            .navbar-user .user-info {
                display: none;
            }

            .navbar-user {
                margin-right: 10px;
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
    @stack('styles')
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Dashboard</h3>
                <button type="button" id="sidebarCollapse">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <ul class="components">
                <li>
                    <a href="{{route('home')}}">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('main-content.index')}}">
                        <i class="fas fa-images"></i>
                        <span>Main Content</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('director-welcome.index')}}">
                        <i class="fas fa-user-tie"></i>
                        <span>Director Welcome</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('services.index')}}">
                        <i class="fas fa-concierge-bell"></i>
                        <span>Our Services</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('achievements.index')}}">
                        <i class="fas fa-trophy"></i>
                        <span>Achievements</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('certification.index')}}">
                        <i class="fas fa-certificate"></i>
                        <span>Certification</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('news.index')}}">
                        <i class="fas fa-newspaper"></i>
                        <span>News</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('our-team.index')}}">
                        <i class="fas fa-users"></i>
                        <span>Our Team</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('organization-structure.index')}}">
                        <i class="fas fa-sitemap"></i>
                        <span>Organization Structure</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('career.index')}}">
                        <i class="fas fa-briefcase"></i>
                        <span>Career</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('activities.index')}}">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Activities</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('trusted-clients.index')}}">
                        <i class="fas fa-handshake"></i>
                        <span>Our Clients</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('branches.index')}}">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Branch</span>
                    </a>
                </li>
                @yield('sidebar-menu')
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg top-navbar">
                <div class="container-fluid">
                    <a class="navbar-brand d-lg-none" href="#">Orindo Dashboard</a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="navbar-user">
                                        <div class="user-icon">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="user-info">
                                            <div class="user-name">{{ Auth::user()->name ?? 'Guest' }}</div>
                                            <div class="user-role">{{ Auth::user()->name ?? 'User' }}</div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt me-2"></i> {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="main-content">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('active');
            });

            $('a[href^="#"]').on('click', function(event) {
                event.preventDefault();
                console.log('Navigating to:', $(this).attr('href'));
            });

            $('.components a').on('click', function() {
                $('.components a').removeClass('active');
                $(this).addClass('active');
            });
        });

        $(window).resize(function() {
            if ($(window).width() <= 768) {
                $('#sidebar').addClass('active');
                $('#content').addClass('active');
            } else {
                $('#sidebar').removeClass('active');
                $('#content').removeClass('active');
            }
        });

        $(window).trigger('resize');
    </script>
    @stack('scripts')
</body>

</html>