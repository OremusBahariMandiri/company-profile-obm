<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Oremus Bahari Mandiri - News</title>
    <link rel="icon" href="/favicon3.png" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Favicon - dengan parameter versi untuk mengatasi cache -->
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="manifest" href="/site.webmanifest" />


    <!-- Tambahkan meta tag untuk tema browser mobile -->
    <meta name="theme-color" content="#0A3D62">
    <meta name="msapplication-TileColor" content="#0A3D62">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png?v=3">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <!-- Custom Styles -->
    <style>
        :root {
            --pastel-blue: #A8D8FF;
            --dark-blue: #0A3D62;
            --ocean-green: #3AB795;
            --light-blue: #E3F2FD;
            --wave-blue: #64B5F6;
            --ocean-blue: #0084ff;
        }

        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #ffffff !important;
            backdrop-filter: blur(10px);
            transition: all 0.4s ease;
            padding: 15px 0;
        }

        .navbar.scrolled {
            padding: 8px 0;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            height: 70px;
            transition: all 0.4s ease;
        }

        .navbar.scrolled .navbar-brand img {
            height: 40px;
        }

        .nav-link {
            color: rgb(0, 0, 0) !important;
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

        /* News Hero Section */
        .news-hero {
            height: 50vh;
            min-height: 400px;
            background-image: url('{{ asset('/images/carousel/kedua.jpg') }}');
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-top: 75px;
        }

        .news-hero-overlay {
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

        .news-hero-content {
            max-width: 800px;
            text-align: center;
            color: white;
            padding: 0 20px;
            z-index: 10;
        }

        .news-hero-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .news-hero-content p {
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

        /* News Section Styles */
        .news-section {
            background-color: var(--light-blue);
            padding: 100px 0 70px;
            position: relative;
        }

        .news-container {
            margin-top: 50px;
        }

        .news-card {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(10, 75, 120, 0.08);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            margin-bottom: 30px;
        }

        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(10, 75, 120, 0.15);
        }

        .news-image {
            position: relative;
            height: 220px;
            overflow: hidden;
        }

        .news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .news-card:hover .news-image img {
            transform: scale(1.1);
        }

        .news-date {
            position: absolute;
            top: 15px;
            left: 15px;
            background: linear-gradient(135deg, var(--ocean-green) 0%, var(--dark-blue) 100%);
            color: white;
            border-radius: 8px;
            padding: 8px 12px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(58, 183, 149, 0.3);
        }

        .news-date .day {
            display: block;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
        }

        .news-date .month {
            display: block;
            font-size: 0.9rem;
            text-transform: uppercase;
            font-weight: 500;
        }

        .news-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .news-topic {
            display: inline-block;
            background-color: rgba(58, 183, 149, 0.1);
            color: var(--ocean-green);
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .news-title {
            font-size: 1.3rem;
            color: var(--dark-blue);
            margin-bottom: 12px;
            line-height: 1.4;
            transition: color 0.3s ease;
        }

        .news-card:hover .news-title {
            color: var(--ocean-green);
        }

        .news-excerpt {
            color: #666;
            margin-bottom: 20px;
            line-height: 1.6;
            flex-grow: 1;
        }

        .news-read-more {
            display: inline-flex;
            align-items: center;
            color: var(--ocean-green);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .news-read-more i {
            margin-left: 8px;
            transition: transform 0.3s ease;
        }

        .news-read-more:hover {
            color: var(--dark-blue);
        }

        .news-read-more:hover i {
            transform: translateX(5px);
        }

        .view-all-news {
            display: block;
            text-align: center;
            margin-top: 50px;
        }

        .view-all-btn {
            display: inline-flex;
            align-items: center;
            background: linear-gradient(135deg, var(--ocean-green) 0%, var(--dark-blue) 100%);
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(58, 183, 149, 0.3);
            transition: all 0.3s ease;
        }

        .view-all-btn i {
            margin-left: 10px;
            font-size: 0.9rem;
            transition: transform 0.3s ease;
        }

        .view-all-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(58, 183, 149, 0.5);
            color: white;
        }

        .view-all-btn:hover i {
            transform: translateX(5px);
        }

        /* No News Found */
        .no-news {
            grid-column: 1 / -1;
            padding: 80px 0;
            text-align: center;
        }

        .no-news-content {
            background: white;
            border-radius: 12px;
            padding: 50px;
            box-shadow: 0 10px 30px rgba(10, 75, 120, 0.08);
            display: inline-block;
        }

        .no-news i {
            font-size: 4rem;
            color: var(--ocean-green);
            margin-bottom: 20px;
            opacity: 0.7;
        }

        .no-news h3 {
            font-size: 1.8rem;
            color: var(--dark-blue);
            margin-bottom: 10px;
        }

        .no-news p {
            color: #666;
            font-size: 1.1rem;
        }

        /* Pagination */
        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }

        .pagination {
            display: flex;
            list-style: none;
            gap: 10px;
        }

        .page-item {
            display: inline-block;
        }

        .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 50%;
            color: var(--dark-blue);
            text-decoration: none;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(10, 75, 120, 0.1);
        }

        .page-item.active .page-link {
            background: var(--ocean-green);
            color: white;
        }

        .page-link:hover {
            background: var(--ocean-green);
            color: white;
        }

        .page-item.disabled .page-link {
            opacity: 0.5;
            cursor: not-allowed;
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
            .news-hero-content h1 {
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

            .navbar-collapse .nav-link {
                color: white !important;
                padding: 10px 15px;
            }

            .section {
                padding: 70px 0;
            }

            .news-section {
                padding: 70px 0;
            }
        }

        @media (max-width: 768px) {
            .news-hero-content h1 {
                font-size: 2rem;
            }

            .news-hero-content p {
                font-size: 1rem;
            }

            .section {
                padding: 50px 0;
            }

            .news-section {
                padding: 50px 0;
            }

            .news-card {
                height: auto;
            }

            .news-image {
                height: 200px;
            }
        }

        @media (max-width: 576px) {
            .news-hero-content h1 {
                font-size: 1.8rem;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .navbar-brand img {
                height: 50px;
            }

            .navbar.scrolled .navbar-brand img {
                height: 30px;
            }

            .news-hero {
                height: 90vh;
            }

            /* Adjust overlay gradient for better text readability */
            .news-hero-overlay {
                background: linear-gradient(rgba(10, 61, 98, 0.8), rgba(10, 61, 98, 0.5));
            }

            /* Fix wave animation to ensure it stays at bottom */
            .wave-animation {
                bottom: 0;
                height: 60px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    @include('layouts.navbar')

    {{-- <!-- News Hero Section -->
    <div class="news-hero">
        <div class="news-hero-overlay">
            <div class="news-hero-content" data-aos="fade-up" data-aos-delay="200">
                <h1>Latest News</h1>
                <p>Stay updated with PT. Oremus Bahari Mandiri's latest activities and maritime industry news</p>
            </div>
        </div>
        <!-- Animated Waves -->
        <div class="wave-animation">
            <div class="wave wave-1">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path
                        d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                        class="shape-fill"></path>
                </svg>
            </div>
            <div class="wave wave-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path
                        d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                        class="shape-fill"></path>
                </svg>
            </div>
        </div>
    </div> --}}

    <!-- News Section -->
    <section class="news-section mt-5" id="news">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Latest News</h2>
                <p class="lead">Stay updated with our recent activities and maritime industry insights</p>
            </div>

            <div class="row news-container">
                @forelse($news as $item)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="news-card">
                        <div class="news-image">
                            <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($item->image) }}" alt="{{ $item->title }}">
                            <div class="news-date">
                                <span class="day">{{ \Carbon\Carbon::parse($item->created_at)->format('d') }}</span>
                                <span class="month">{{ \Carbon\Carbon::parse($item->created_at)->format('M') }}</span>
                            </div>
                        </div>
                        <div class="news-content">
                            <div class="news-topic">{{ $item->topic }}</div>
                            <h3 class="news-title">{{ $item->title }}</h3>
                            <p class="news-excerpt">{{ Str::limit(strip_tags($item->news), 120) }}</p>
                            <a href="{{ route('publicnews.show', $item->id) }}" class="news-read-more">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="no-news">
                        <div class="no-news-content">
                            <i class="fas fa-newspaper"></i>
                            <h3>No News Found</h3>
                            <p>We couldn't find any news articles matching your criteria.</p>
                        </div>
                    </div>
                </div>
                @endforelse

                <div class="pagination-container">
                    {{ $news->links() }}
                </div>
            </div>
        </div>

        <!-- Ship Animation -->

    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- Company Logo & Description -->
                <div class="col-lg-4 col-md-6 mb-5">
                    <img src="{{ asset('/images/logo.png') }}" alt="Ship Agency Logo" class="mb-4"
                        style="height: 60px;">
                    <p>PT. Oremus Bahari Mandiri is your trusted partner in maritime logistics and ship agency services.
                        We deliver excellence in every aspect of maritime operations across Indonesian ports.</p>
                    <div class="social-icons mt-4">
                        <a href="https://www.facebook.com/p/PT-Oremus-Bahari-Mandiri-100047025746073/"
                            aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.linkedin.com/company/pt-oremus-bahari-mandiri/" aria-label="LinkedIn"><i
                                class="fab fa-linkedin-in"></i></a>
                        <a href="https://www.instagram.com/oremusbaharimandiri/" aria-label="Instagram"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <!-- Main Office -->
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4><i class="fas fa-building me-2"></i>Main Office</h4>
                    <ul class="footer-contact list-unstyled">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Harbour Nine Business Districy Block C-16. Jln. Gresik no 16, Surabaya 60177</span>
                        </li>
                        <li>
                            <i class="fas fa-user"></i>
                            <span>Mr. Alexander (PIC)</span>
                        </li>
                        <li>
                            <i class="fas fa-phone-alt"></i>
                            <span>0313557115 (Office)</span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>commercial@oremus.co.id</span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>agency@oremus.co.id</span>
                        </li>
                    </ul>
                </div>

                <!-- Our Services -->
                <div class="col-lg-2 col-md-6 mb-5">
                    <h4><i class="fas fa-cogs me-2"></i>Our Services</h4>
                    <ul class="footer-links list-unstyled">
                        <li><a href="#services"><i class="fas fa-ship me-2"></i>Ship Handling</a></li>
                        <li><a href="#services"><i class="fas fa-box me-2"></i>Provision Supply</a></li>
                        <li><a href="#services"><i class="fas fa-ambulance me-2"></i>Medivac Operation</a></li>
                        <li><a href="#services"><i class="fas fa-users me-2"></i>Crew Handling</a></li>
                        <li><a href="#activities"><i class="fas fa-anchor me-2"></i>Cable Laying</a></li>
                        <li><a href="#activities"><i class="fas fa-exchange-alt me-2"></i>Ship to Ship</a></li>
                    </ul>
                </div>

                <!-- Branch Offices -->
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4><i class="fas fa-map-marked-alt me-2"></i>Branch</h4>
                    <ul class="footer-links list-unstyled">
                        <li>
                            <a href="#location">
                                <i class="fas fa-anchor me-2"></i>
                                <strong>Surabaya</strong><br>
                            </a>
                        </li>
                        <li>
                            <a href="#location">
                                <i class="fas fa-anchor me-2"></i>
                                <strong>Gresik</strong><br>
                            </a>
                        </li>
                        <li>
                            <a href="#location">
                                <i class="fas fa-anchor me-2"></i>
                                <strong>Rembang</strong><br>
                            </a>
                        </li>
                        <li>
                            <a href="#location">
                                <i class="fas fa-anchor me-2"></i>
                                <strong>Lamongan</strong><br>
                            </a>
                        </li>
                        <li>
                            <a href="#location">
                                <i class="fas fa-anchor me-2"></i>
                                <strong>Balikpapan</strong><br>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="mb-0">&copy; {{ date('Y') }} PT. Oremus Bahari Mandiri. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="mb-0">
                            <a href="#" style="color: var(--ocean-green); text-decoration: none;">Privacy
                                Policy</a> |
                            <a href="#" style="color: var(--ocean-green); text-decoration: none;">Terms of
                                Service</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Navbar Scroll Effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });

                    // Close navbar collapse on mobile when clicking a link
                    const navbarCollapse = document.querySelector('.navbar-collapse');
                    if (navbarCollapse.classList.contains('show')) {
                        navbarCollapse.classList.remove('show');
                    }
                }
            });
        });
    </script>
</body>

</html>