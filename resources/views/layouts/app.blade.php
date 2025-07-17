<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ship Agency') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
        :root {
            --pastel-blue: #A8D8FF;
            --dark-blue: #0A3D62;
            --ocean-green: #3AB795;
            --light-blue: #E3F2FD;
            --wave-blue: #64B5F6;
        }

        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        /* Navbar Styles */
        .navbar {
            background-color: rgba(10, 61, 98, 0.9) !important;
            backdrop-filter: blur(10px);
            transition: all 0.4s ease;
            padding: 15px 0;
        }

        .navbar.scrolled {
            padding: 8px 0;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            height: 50px;
            transition: all 0.4s ease;
        }

        .navbar.scrolled .navbar-brand img {
            height: 40px;
        }

        .nav-link {
            color: white !important;
            font-weight: 500;
            position: relative;
            margin: 0 10px;
            transition: all 0.3s;
        }

        .nav-link:before {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--ocean-green);
            transition: all 0.3s ease;
        }

        .nav-link:hover:before {
            width: 100%;
        }

        .dropdown-menu {
            background-color: var(--dark-blue);
            border: none;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            padding: 15px 0;
            margin-top: 15px;
        }

        .dropdown-item {
            color: white;
            padding: 10px 25px;
            transition: all 0.3s;
        }

        .dropdown-item:hover {
            background-color: var(--ocean-green);
            color: white;
        }

        /* Hero Carousel */
        .carousel-item {
            height: 100vh;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .carousel-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(10, 61, 98, 0.7), rgba(10, 61, 98, 0.4));
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .carousel-content {
            max-width: 800px;
            text-align: center;
            color: white;
            padding: 0 20px;
        }

        .carousel-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .carousel-content p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }

        /* Section Styles */
        .section {
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 20px;
            text-align: center;
            position: relative;
        }

        .section-title:after {
            content: "";
            width: 80px;
            height: 3px;
            background-color: var(--ocean-green);
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        /* Director Section */
        .director-section {
            background-color: var(--light-blue);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .director-img {
            border-radius: 10px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            position: relative;
            z-index: 1;
        }

        .director-img:before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 15px;
            left: 15px;
            background-color: var(--ocean-green);
            border-radius: 10px;
            z-index: -1;
        }

        .quote-icon {
            font-size: 4rem;
            color: var(--pastel-blue);
            opacity: 0.5;
            position: absolute;
            top: -20px;
            left: -20px;
        }

        /* Service Section */
        .service-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(10, 61, 98, 0.2);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            background-color: var(--ocean-green);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: -40px auto 20px;
            position: relative;
            z-index: 2;
            box-shadow: 0 5px 15px rgba(58, 183, 149, 0.4);
        }

        /* Map Section */
        .map-container {
            height: 500px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        /* Footer */
        .footer {
            background-color: var(--dark-blue);
            color: white;
            padding: 70px 0 0;
            position: relative;
        }

        .footer-wave {
            position: absolute;
            top: -70px;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }

        .footer-wave svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 70px;
        }

        .footer-wave .shape-fill {
            fill: var(--dark-blue);
        }

        .footer h4 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer h4:after {
            content: "";
            position: absolute;
            width: 50px;
            height: 2px;
            background-color: var(--ocean-green);
            bottom: 0;
            left: 0;
        }

        .footer-links li {
            margin-bottom: 15px;
        }

        .footer-links a {
            color: #e0e0e0;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .footer-links a:hover {
            color: var(--ocean-green);
            transform: translateX(5px);
        }

        .footer-contact li {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
        }

        .footer-contact i {
            color: var(--ocean-green);
            margin-right: 15px;
            font-size: 1.2rem;
            margin-top: 5px;
        }

        .footer-bottom {
            background-color: rgba(0, 0, 0, 0.2);
            padding: 20px 0;
            margin-top: 50px;
            text-align: center;
        }

        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            margin: 0 5px;
            transition: all 0.3s;
        }

        .social-icons a:hover {
            background-color: var(--ocean-green);
            transform: translateY(-5px);
        }

        /* Wave Animation */
        .wave-animation {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            overflow: hidden;
        }

        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 200%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'%3E%3Cpath d='M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z' opacity='.25' class='shape-fill'%3E%3C/path%3E%3Cpath d='M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z' opacity='.5' class='shape-fill'%3E%3C/path%3E%3Cpath d='M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z' class='shape-fill'%3E%3C/path%3E%3C/svg%3E") repeat-x;
            animation: wave 15s linear infinite;
            transform-origin: center bottom;
        }

        .wave-1 {
            z-index: 15;
            opacity: 1;
            animation-delay: 0s;
            animation-duration: 20s;
        }

        .wave-2 {
            z-index: 10;
            opacity: 0.5;
            animation-delay: -5s;
            animation-duration: 15s;
            bottom: 10px;
        }

        .wave-3 {
            z-index: 5;
            opacity: 0.2;
            animation-delay: -2s;
            animation-duration: 10s;
            bottom: 15px;
        }

        .wave .shape-fill {
            fill: var(--wave-blue);
        }

        @keyframes wave {
            0% {
                transform: translateX(0) translateZ(0) scaleY(1);
            }
            50% {
                transform: translateX(-25%) translateZ(0) scaleY(0.8);
            }
            100% {
                transform: translateX(-50%) translateZ(0) scaleY(1);
            }
        }

        /* Ship Animation */
        .ship-container {
            position: absolute;
            bottom: 70px;
            left: -150px;
            width: 120px;
            animation: shipSailing 30s linear infinite;
            z-index: 20;
        }

        @keyframes shipSailing {
            0% {
                transform: translateX(0) rotate(0deg);
            }
            50% {
                transform: translateX(calc(100vw + 150px)) rotate(2deg);
            }
            50.1% {
                transform: translateX(calc(100vw + 150px)) rotate(2deg) scaleX(-1);
            }
            99.9% {
                transform: translateX(0) rotate(0deg) scaleX(-1);
            }
            100% {
                transform: translateX(0) rotate(0deg) scaleX(1);
            }
        }

        /* Floating Animation */
        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-15px);
            }
            100% {
                transform: translateY(0px);
            }
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .carousel-content h1 {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .navbar-collapse {
                background-color: var(--dark-blue);
                padding: 20px;
                border-radius: 10px;
                margin-top: 15px;
            }

            .director-img:before {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .carousel-content h1 {
                font-size: 2rem;
            }

            .carousel-content p {
                font-size: 1rem;
            }

            .section {
                padding: 70px 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ Vite::asset('resources/assets/images/obmlogo.png') }}" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Our Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                            <li><a class="dropdown-item" href="{{ route('services.ship-handling') }}">Ship Handling</a></li>
                            <li><a class="dropdown-item" href="{{ route('services.provision-supply') }}">Provision Supply</a></li>
                            <li><a class="dropdown-item" href="{{ route('services.medivac-operation') }}">Medivac Operation</a></li>
                            <li><a class="dropdown-item" href="{{ route('services.crew-handling') }}">Crew Handling</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('customers') ? 'active' : '' }}" href="{{ route('customers') }}">Our Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('branches') ? 'active' : '' }}" href="{{ route('branches') }}">Our Branches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('qhse') ? 'active' : '' }}" href="{{ route('qhse') }}">QHSE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('news') ? 'active' : '' }}" href="{{ route('news') }}">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-wave">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" class="shape-fill"></path>
            </svg>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-5">
                    <img src="{{ Vite::asset('resources/assets/images/obmlogo.png') }}" alt="Logo" class="mb-4" style="height: 60px;">
                    <p>Your trusted partner in maritime logistics and ship agency services. We deliver excellence in every aspect of maritime operations.</p>
                    <div class="social-icons mt-4">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-5">
                    <h4>Quick Links</h4>
                    <ul class="footer-links list-unstyled">
                        <li><a href="{{ route('home') }}"><i class="fas fa-chevron-right me-2"></i> Home</a></li>
                        <li><a href="{{ route('about') }}"><i class="fas fa-chevron-right me-2"></i> About Us</a></li>
                        <li><a href="{{ route('services.ship-handling') }}"><i class="fas fa-chevron-right me-2"></i> Services</a></li>
                        <li><a href="{{ route('customers') }}"><i class="fas fa-chevron-right me-2"></i> Customers</a></li>
                        <li><a href="{{ route('contact') }}"><i class="fas fa-chevron-right me-2"></i> Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4>Our Services</h4>
                    <ul class="footer-links list-unstyled">
                        <li><a href="{{ route('services.ship-handling') }}"><i class="fas fa-ship me-2"></i> Ship Handling</a></li>
                        <li><a href="{{ route('services.provision-supply') }}"><i class="fas fa-box me-2"></i> Provision Supply</a></li>
                        <li><a href="{{ route('services.medivac-operation') }}"><i class="fas fa-ambulance me-2"></i> Medivac Operation</a></li>
                        <li><a href="{{ route('services.crew-handling') }}"><i class="fas fa-users me-2"></i> Crew Handling</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4>Contact Us</h4>
                    <ul class="footer-contact list-unstyled">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>123 Maritime Street, Harbor City, 12345</span>
                        </li>
                        <li>
                            <i class="fas fa-phone-alt"></i>
                            <span>+1 234 567 8901</span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>info@shipagency.com</span>
                        </li>
                        <li>
                            <i class="fas fa-clock"></i>
                            <span>Mon-Fri: 8:00 AM - 6:00 PM</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p class="mb-0">&copy; {{ date('Y') }} Ship Agency. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Ship Animation -->
    <div class="ship-container">
        <svg width="120" height="60" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M416 320H96C43.06 320 0 363.06 0 416V480H512V416C512 363.06 468.94 320 416 320Z" fill="#0A3D62"/>
            <path d="M512 416V480H0V416C0 363.06 43.06 320 96 320H416C468.94 320 512 363.06 512 416Z" fill="#0A3D62"/>
            <path d="M400 192H240V96H400V192Z" fill="#3AB795"/>
            <path d="M400 96H240V64C240 46.33 254.33 32 272 32H368C385.67 32 400 46.33 400 64V96Z" fill="#A8D8FF"/>
            <path d="M400 192V416H240V192H400Z" fill="#0A3D62"/>
            <path d="M272 160C276.418 160 280 156.418 280 152C280 147.582 276.418 144 272 144C267.582 144 264 147.582 264 152C264 156.418 267.582 160 272 160Z" fill="white"/>
            <path d="M336 160C340.418 160 344 156.418 344 152C344 147.582 340.418 144 336 144C331.582 144 328 147.582 328 152C328 156.418 331.582 160 336 160Z" fill="white"/>
        </svg>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" defer></script>

    <!-- Custom JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true
            });

            // Navbar scroll effect
            const navbar = document.querySelector('.navbar');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        });

        // Google Maps
        function initMap() {
            // Default coordinates (Jakarta, Indonesia)
            const coordinates = { lat: -6.2088, lng: 106.8456 };

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 14,
                center: coordinates,
                styles: [
                    {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#A8D8FF"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#E3F2FD"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#3AB795"
                            }
                        ]
                    }
                ]
            });

            const marker = new google.maps.Marker({
                position: coordinates,
                map: map,
                animation: google.maps.Animation.DROP,
                title: "Ship Agency Headquarters"
            });

            const infoWindow = new google.maps.InfoWindow({
                content: "<strong>Ship Agency Headquarters</strong><br>123 Maritime Street<br>Harbor City, 12345"
            });

            marker.addListener("click", () => {
                infoWindow.open(map, marker);
            });
        }
    </script>

    @yield('scripts')
</body>
</html>