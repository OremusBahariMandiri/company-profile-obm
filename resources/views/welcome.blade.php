<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PT. Oremus Bahari Mandiri</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

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
            height: 600px;
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

        /* Achievements Section */
        .achievement-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .achievement-img {
            border-radius: 10px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        .achievement-content {
            padding: 30px;
        }

        .achievement-item {
            margin-bottom: 30px;
        }

        .achievement-icon {
            font-size: 2.5rem;
            color: var(--ocean-green);
            margin-bottom: 15px;
        }

        /* Clients Carousel */
        .clients-section {
            background-color: var(--light-blue);
        }

        .client-logo {
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .client-logo:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .slick-slide {
            margin: 0 10px;
        }

        .slick-list {
            margin: 0 -10px;
        }

        /* Team Section */
        .team-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .team-member {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .team-img {
            width: 100%;
            height: 500px;
            transition: all 0.5s ease;
            object-fit: cover;
            aspect-ratio: 16/9;
            /* Landscape format */
        }

        .team-member:hover .team-img {
            transform: scale(1.05);
        }

        .team-info {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 20px;
            background: linear-gradient(to top, rgba(10, 61, 98, 0.9), transparent);
            color: white;
            transform: translateY(100%);
            transition: all 0.3s ease;
        }

        .team-member:hover .team-info {
            transform: translateY(0);
        }

        .team-info h4 {
            margin-bottom: 5px;
            font-weight: 600;
        }

        .team-info p {
            margin-bottom: 0;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .team-social {
            margin-top: 10px;
        }

        .team-social a {
            display: inline-flex;
            width: 30px;
            height: 30px;
            background-color: white;
            color: var(--dark-blue);
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            margin-right: 5px;
            font-size: 0.8rem;
            transition: all 0.3s ease;
        }

        .team-social a:hover {
            background-color: var(--ocean-green);
            color: white;
        }

        /* Activities Section */
        .activities-section {
            background-color: #f8f9fa;
        }

        .activity-tabs .nav-link {
            color: var(--dark-blue) !important;
            font-weight: 600;
            padding: 15px 25px;
            border: none;
            border-radius: 30px;
            margin: 0 5px 15px;
            transition: all 0.3s ease;
        }

        .activity-tabs .nav-link.active {
            background-color: var(--ocean-green);
            color: white !important;
        }

        .activity-tabs .nav-link:hover:not(.active) {
            background-color: rgba(58, 183, 149, 0.1);
        }

        .activity-gallery {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 30px;
        }

        .gallery-item {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .gallery-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: all 0.5s ease;
        }

        .gallery-item:hover .gallery-img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(10, 61, 98, 0.8), transparent);
            opacity: 0;
            transition: all 0.3s ease;
            display: flex;
            align-items: flex-end;
            padding: 20px;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay h5 {
            color: white;
            margin-bottom: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay h5 {
            transform: translateY(0);
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

        /* Branch office card styles */
        .branch-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            transition: all 0.3s ease;
            height: 350px;
        }

        .branch-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .branch-card h5 {
            color: var(--dark-blue);
            margin-bottom: 15px;
            font-weight: 600;
        }

        .branch-card .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            color: #666;
        }

        .branch-card .contact-item i {
            color: var(--ocean-green);
            margin-right: 10px;
            width: 20px;
        }

        /* Custom Popup styles for the map */
        .custom-popup .leaflet-popup-content-wrapper {
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .custom-popup .leaflet-popup-content {
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .custom-popup .leaflet-popup-tip {
            background: white;
        }

        .leaflet-tooltip {
            background: var(--dark-blue);
            color: white;
            border: none;
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
        }

        .custom-div-icon {
            background: transparent;
            border: none;
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

            .activity-gallery {
                grid-template-columns: 1fr;
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
            <a class="navbar-brand" href="#home">
                <img src="{{ Storage::url('/images/obmlogo.png') }}" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#services" id="servicesDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Our Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                            <li><a class="dropdown-item" href="#services">Ship Handling</a></li>
                            <li><a class="dropdown-item" href="#services">Provision Supply</a></li>
                            <li><a class="dropdown-item" href="#services">Medivac Operation</a></li>
                            <li><a class="dropdown-item" href="#services">Crew Handling</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#achievements">Achievements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#activities">Activities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team">Our Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#clients">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#location">Branches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <!-- Hero Carousel -->
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" id="home">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active"
                    style="background-image: url('{{ Storage::url('/images/CarouselPertama/pertama.jpg') }}');">
                    <div class="carousel-overlay">
                        <div class="carousel-content" data-aos="fade-up" data-aos-delay="200">
                            <h1>We Are a Classy Shipping Agency Company at all Indonesian ports</h1>
                            <p>We can handle ship activities a general agents, local agents, and owner protecing agents
                                for all kinds and types of ships such as tankers, bulk cargo, cruise, yacht, tug &
                                barges, naval ships, offshore vessel AHTS, AWB, survey vessel, cable laying vessel, and
                                offshore activities supporting services. We can serve in all ports in Indonesia.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item"
                    style="background-image: url('{{ Storage::url('/images/CarouselPertama/kedua.JPG') }}');">
                    <div class="carousel-overlay">
                        <div class="carousel-content" data-aos="fade-up" data-aos-delay="200">
                            <h1>Provision Supply</h1>
                            <p>We are ready and experienced in carrying out supply activities such as provision supply,
                                bunker supply, fresh water supply and other needs on board. We can carry out activities
                                when the ship is anchored. We are also ready to help sending a gasoline and other supply
                                in emergency situation</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item"
                    style="background-image: url('{{ Storage::url('/images/CarouselPertama/ketiga.jpg') }}');">
                    <div class="carousel-overlay">
                        <div class="carousel-content" data-aos="fade-up" data-aos-delay="200">
                            <h1>Medivac Operation</h1>
                            <p>We also carry out activities that support the activities of the P&I club or ship owner in
                                emergency cases such as managing sick crew, dead crew on board and returning the dead
                                body. Of course we have a wide network of ambulance boats and the well
                                hospitals/doctors.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item"
                    style="background-image: url('{{ Storage::url('/images/CarouselPertama/keempat.JPG') }}');">
                    <div class="carousel-overlay">
                        <div class="carousel-content" data-aos="fade-up" data-aos-delay="200">
                            <h1>Crew Handling</h1>
                            <p>We are experienced in crew handling activities such as crew on sign & off sign for
                                domestic and foreign crew, visa processing, work permits, and crew repatriation.</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

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
                <div class="wave wave-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                        <path
                            d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                            class="shape-fill"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Director's Welcome Section -->
        <section class="director-section" id="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 mb-5 mb-lg-0" data-aos="fade-right" data-aos-delay="100"
                        data-aos-offset="300" data-aos-once="false">
                        <div class="position-relative" style="transform: scaleX(-1);">
                            <img src="{{ Storage::url('/images/direktur.png') }}" alt="Director"
                                class="img-fluid director-img">
                            <i class="fas fa-quote-left quote-icon"></i>
                        </div>
                    </div>
                    <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200" data-aos-offset="300"
                        data-aos-once="false">
                        <h2 class="section-title mb-4 text-start">Dear Valued Agents,</h2>
                        <p class="lead mb-4" style="color: var(--dark-blue); font-weight: 500;">It is with great pride
                            and appreciation that I welcome you to PT. Oremus Bahari Mandiri.

                        </p>
                        <p>Since our establishment, we have remained committed to delivering exceptional maritime
                            services built on trust, precision, and dedication. Over the years, we have proudly handled
                            more than 10,000 vessels, a milestone that reflects our strong operational capabilities and
                            the confidence placed in us by our clients.
                        </p>
                        <p>Our comprehensive services — including ship handling, provision supply, medivac operations,
                            and crew change — are tailored to meet the dynamic needs of the shipping industry. Backed by
                            an experienced and responsive team, we ensure seamless coordination, safety, and efficiency
                            in every port call.
                        </p>
                        <p>At PT. Oremus Bahari Mandiri, we believe in forging lasting partnerships and providing more
                            than just services — we deliver dependable solutions that move your operations forward.
                            Thank you for your continued trust. We look forward to navigating new horizons together.
                        </p>
                        <div class="mt-4">
                            <p class="mb-2" style="font-weight: 600; color: var(--dark-blue);">Niko Kristanto

                            </p>
                            <p class="mb-0" style="color: var(--ocean-green);">President Director
                            </p>
                            <p class="mb-0" style="color: var(--ocean-blue);">PT. Oremus Bahari Mandiri
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="section" style="background-color: #f8f9fa;" id="services">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Our Services</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-card text-center p-4">
                            <div class="service-icon" style="background-color: red; margin-top:5px">
                                <i class="fas fa-ship"></i>
                            </div>
                            <h4 class="mb-3" style="color: var(--dark-blue);">Ship Handling</h4>
                            <p>We are ready and experienced in carrying out supply activities such as provision supply,
                                bunker supply, fresh water supply and other needs on board. We can carry out activities
                                when the ship is anchored. We are also ready to help sending a gasoline and other supply
                                in emergency situation</p>
                            <a href="#contact" class="btn mt-3"
                                style="background-color: var(--dark-blue); color: white;">Learn More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-card text-center p-4">
                            <div class="service-icon" style="background-color: blue; margin-top:5px">
                                <i class="fas fa-box"></i>
                            </div>
                            <h4 class="mb-3" style="color: var(--dark-blue);">Provision Supply</h4>
                            <p>We are ready and experienced in carrying out supply activities such as provision supply,
                                bunker supply, fresh water supply and other needs on board. We can carry out activities
                                when the ship is anchored. We are also ready to help sending a gasoline and other supply
                                in emergency situation</p>
                            <a href="#contact" class="btn mt-3"
                                style="background-color: var(--dark-blue); color: white;">Learn More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-card text-center p-4">
                            <div class="service-icon" style="background-color: green; margin-top:5px">
                                <i class="fas fa-ambulance"></i>
                            </div>
                            <h4 class="mb-3" style="color: var(--dark-blue);">Medivac Operation</h4>
                            <p>We also carry out activities that support the activities of the P&I club or ship owner in
                                emergency cases such as managing sick crew, dead crew on board and returning the dead
                                body. Of course we have a wide network of ambulance boats and the well
                                hospitals/doctors.
                            </p>
                            <a href="#contact" class="btn mt-3"
                                style="background-color: var(--dark-blue); color: white;">Learn More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-card text-center p-4">
                            <div class="service-icon" style="background-color: orange; margin-top:5px">
                                <i class="fas fa-users"></i>
                            </div>
                            <h4 class="mb-3" style="color: var(--dark-blue);">Crew Handling</h4>
                            <p>We are experienced in crew handling activities such as crew on sign & off sign for
                                domestic and foreign crew, visa processing, work permits, and crew repatriation.
                            </p>
                            <a href="#contact" class="btn mt-3"
                                style="background-color: var(--dark-blue); color: white;">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Achievements Section -->
        <section class="section achievement-section" id="achievements">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Our Achievements</h2>
                    <p class="lead">Milestones that define our commitment to excellence</p>
                </div>

                <!-- First Achievement Row (Image Right) -->
                <div class="row align-items-center mb-5">
                    <div class="col-lg-6 order-lg-1 order-2" data-aos="fade-right" data-aos-delay="200">
                        <div class="achievement-content">
                            <div class="achievement-item">
                                <div class="achievement-icon">
                                    <i class="fas fa-award"></i>
                                </div>
                                <h3 style="color: var(--dark-blue);">Growth Trend in 2022</h3>
                                <p>There was a significant increase in tramper vessel calls during the latter half of
                                    2022, particularly in September (36), October (31), November (42), and December
                                    (38), showing a strong recovery and growth in your maritime traffic.</p>
                            </div>
                            <div class="achievement-item">
                                <div class="achievement-icon">
                                    <i class="fas fa-handshake"></i>
                                </div>
                                <h3 style="color: var(--dark-blue);">Pandemic Impact and Recovery</h3>
                                <p>The data reveals the industry challenges during 2020-2021, likely corresponding to
                                    global shipping disruptions during the pandemic, followed by your company's
                                    successful recovery strategy in 2022.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-2 order-1 mb-4 mb-lg-0" data-aos="fade-left" data-aos-delay="300">
                        <div class="achievement-img">
                            <img src="{{ Storage::url('/images/achievement/1.png') }}" alt="Achievement"
                                class="img-fluid">
                        </div>
                    </div>
                </div>

                <!-- Second Achievement Row (Image Left) -->
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right" data-aos-delay="200">
                        <div class="achievement-img">
                            <img src="{{ Storage::url('/images/achievement/2.png') }}" alt="Achievement"
                                class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                        <div class="achievement-content">
                            <div class="achievement-item">
                                <div class="achievement-icon">
                                    <i class="fas fa-globe-americas"></i>
                                </div>
                                <h3 style="color: var(--dark-blue);">Market Leadership</h3>
                                <p>By 2022, your agency consistently handled 600+ oil and gas support operations
                                    monthly, positioning you as a major player in this specialized sector.</p>
                            </div>
                            <div class="achievement-item">
                                <div class="achievement-icon">
                                    <i class="fas fa-leaf"></i>
                                </div>
                                <h3 style="color: var(--dark-blue);">Steady Growth</h3>
                                <p> The data shows year-over-year improvement in handling capacity, with 2022
                                    outperforming all previous years despite global energy market volatility.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="section team-section" id="team">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Our Team</h2>
                    <p class="lead">Meet the experts behind our exceptional services</p>
                </div>

                <div class="row">
                    <!-- Main Team Member -->
                    <div class="col-12 mb-5" data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member">
                            <img src="{{ Storage::url('/images/team/1.png') }}" alt="CEO"
                                class="img-fluid team-img">
                            <div class="team-info">
                                <h4>Full Team</h4>
                                <p>PT. Oremus Bahari Mandiri</p>
                            </div>
                        </div>
                    </div>

                    <!-- Supporting Team Members -->
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="team-member">
                            <img src="{{ Storage::url('/images/team/2.JPG') }}" alt="Operations Director"
                                class="img-fluid team-img">
                            <div class="team-info">
                                <h4>Kalimantan Team</h4>
                                <p>PT. Oremus Bahari Mandiri</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="team-member">
                            <img src="{{ Storage::url('/images/team/3.jpg') }}" alt="Technical Director"
                                class="img-fluid team-img">
                            <div class="team-info">
                                <h4>Full Team</h4>
                                <p>PT. Oremus Bahari Mandiri</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Activities Section -->
        <section class="section activities-section" id="activities">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Our Activities</h2>
                    {{-- <p class="lead">Explore our diverse range of maritime operations</p> --}}
                </div>

                <!-- Activity Categories Tabs -->
                <ul class="nav nav-pills justify-content-center activity-tabs mb-5" id="activitiesTabs"
                    role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="agency-tab" data-bs-toggle="pill"
                            data-bs-target="#agency" type="button" role="tab" aria-controls="agency"
                            aria-selected="true">Agency</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="cable-laying-tab" data-bs-toggle="pill"
                            data-bs-target="#cable-laying" type="button" role="tab"
                            aria-controls="cable-laying" aria-selected="false">Cable Laying</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="ship-to-ship-tab" data-bs-toggle="pill"
                            data-bs-target="#ship-to-ship" type="button" role="tab"
                            aria-controls="ship-to-ship" aria-selected="false">Ship to Ship</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="provision-supply-tab" data-bs-toggle="pill"
                            data-bs-target="#provision-supply" type="button" role="tab"
                            aria-controls="provision-supply" aria-selected="false">Provision Supply</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="medivac-tab" data-bs-toggle="pill" data-bs-target="#medivac"
                            type="button" role="tab" aria-controls="medivac" aria-selected="false">Medivac
                            Operation</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="crew-change-tab" data-bs-toggle="pill"
                            data-bs-target="#crew-change" type="button" role="tab" aria-controls="crew-change"
                            aria-selected="false">Crew Change</button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="activitiesTabContent">
                    <!-- Agency Tab -->
                    <div class="tab-pane fade show active" id="agency" role="tabpanel"
                        aria-labelledby="agency-tab">
                        <div class="activity-gallery">
                            <div class="gallery-item" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ Storage::url('/images/activities/agency1.png') }}" alt="Agency Activity"
                                    class="gallery-img">
                                <div class="gallery-overlay">
                                    <h5>Agency Activities</h5>
                                </div>
                            </div>
                            <div class="gallery-item" data-aos="fade-up" data-aos-delay="200">
                                <img src="{{ Storage::url('/images/activities/agency2.png') }}" alt="Agency Activity"
                                    class="gallery-img">
                                <div class="gallery-overlay">
                                    <h5>Agency Activities</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cable Laying Tab -->
                    <div class="tab-pane fade" id="cable-laying" role="tabpanel" aria-labelledby="cable-laying-tab">
                        <div class="activity-gallery">
                            <div class="gallery-item" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ Storage::url('/images/activities/cl1.png') }}" alt="Cable Laying"
                                    class="gallery-img">
                                <div class="gallery-overlay">
                                    <h5>Cable laying Activities</h5>
                                </div>
                            </div>
                            <div class="gallery-item" data-aos="fade-up" data-aos-delay="200">
                                <img src="{{ Storage::url('/images/activities/cl2.png') }}" alt="Cable Laying"
                                    class="gallery-img">
                                <div class="gallery-overlay">
                                    <h5>Cable laying Activities</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ship to Ship Tab -->
                    <div class="tab-pane fade" id="ship-to-ship" role="tabpanel" aria-labelledby="ship-to-ship-tab">
                        <div class="activity-gallery">
                            <div class="gallery-item" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ Storage::url('/images/activities/sts1.jpeg') }}" alt="Ship to Ship"
                                    class="gallery-img">
                                <div class="gallery-overlay">
                                    <h5>Ship To Ship Activities</h5>
                                </div>
                            </div>
                            <div class="gallery-item" data-aos="fade-up" data-aos-delay="200">
                                <img src="{{ Storage::url('/images/activities/sts2.jpeg') }}" alt="Ship to Ship"
                                    class="gallery-img">
                                <div class="gallery-overlay">
                                    <h5>Ship To Ship Activities</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Provision Supply Tab -->
                    <div class="tab-pane fade" id="provision-supply" role="tabpanel"
                        aria-labelledby="provision-supply-tab">
                        <div class="activity-gallery">
                            <div class="gallery-item" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ Storage::url('/images/activities/ps1.JPG') }}" alt="Provision Supply"
                                    class="gallery-img">
                                <div class="gallery-overlay">
                                    <h5>Provision Supply Activities</h5>
                                </div>
                            </div>
                            <div class="gallery-item" data-aos="fade-up" data-aos-delay="200">
                                <img src="{{ Storage::url('/images/activities/ps2.jpeg') }}" alt="Provision Supply"
                                    class="gallery-img">
                                <div class="gallery-overlay">
                                    <h5>Provision Supply Activities</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Medivac Operation Tab -->
                    <div class="tab-pane fade" id="medivac" role="tabpanel" aria-labelledby="medivac-tab">
                        <div class="activity-gallery">
                            <div class="gallery-item" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ Storage::url('/images/activities/mo1.jpg') }}" alt="Medivac Operation"
                                    class="gallery-img">
                                <div class="gallery-overlay">
                                    <h5>Medivac Operation Activities</h5>
                                </div>
                            </div>
                            <div class="gallery-item" data-aos="fade-up" data-aos-delay="200">
                                <img src="{{ Storage::url('/images/activities/mo2.png') }}" alt="Medivac Operation"
                                    class="gallery-img">
                                <div class="gallery-overlay">
                                    <h5>Medivac Operation Activities</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Crew Change Tab -->
                    <div class="tab-pane fade" id="crew-change" role="tabpanel" aria-labelledby="crew-change-tab">
                        <div class="activity-gallery">
                            <div class="gallery-item" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ Storage::url('/images/activities/cc1.JPG') }}" alt="Crew Change"
                                    class="gallery-img">
                                <div class="gallery-overlay">
                                    <h5>Crew Change Activities</h5>
                                </div>
                            </div>
                            <div class="gallery-item" data-aos="fade-up" data-aos-delay="200">
                                <img src="{{ Storage::url('/images/activities/cc2.JPG') }}" alt="Crew Change"
                                    class="gallery-img">
                                <div class="gallery-overlay">
                                    <h5>Crew Change Activities</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Clients Section with Carousel -->
        <section class="section clients-section" id="clients">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Our Trusted Clients</h2>
                    <p class="lead">Partnering with leading maritime companies globally</p>
                </div>

                <div class="clients-carousel" data-aos="fade-up" data-aos-delay="200">
                    <!-- Clients carousel will be initialized with JavaScript -->
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/1.png') }}" alt="Client 1" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/2.png') }}" alt="Client 2" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/3.png') }}" alt="Client 3" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A04.png') }}" alt="Client 4" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A05.png') }}" alt="Client 5" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A06.png') }}" alt="Client 6" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A07.png') }}" alt="Client 7" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A08.png') }}" alt="Client 8" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A09.png') }}" alt="Client 9" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A10.png') }}" alt="Client 10" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A11.png') }}" alt="Client 11" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A12.png') }}" alt="Client 12" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A13.png') }}" alt="Client 6" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A14.png') }}" alt="Client 7" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A15.png') }}" alt="Client 8" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A16.png') }}" alt="Client 9" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A17.png') }}" alt="Client 10" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A18.png') }}" alt="Client 11" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A19.png') }}" alt="Client 12" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A20.png') }}" alt="Client 12" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A21.png') }}" alt="Client 12" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A22.png') }}" alt="Client 6" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A23.png') }}" alt="Client 7" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A24.png') }}" alt="Client 8" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A25.png') }}" alt="Client 9" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A26.png') }}" alt="Client 10" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A27.png') }}" alt="Client 11" class="img-fluid">
                    </div>
                    <div class="client-logo">
                        <img src="{{ Storage::url('/images/clients/A28.png') }}" alt="Client 12" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>

        <!-- Map Section with Branch Offices -->
        <section class="section" id="location">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Our Branch Offices</h2>
                    <p class="lead">Find us at strategic maritime hubs around Indonesia</p>
                </div>

                <!-- Map Container -->
                <div class="row mb-5">
                    <div class="col-12" data-aos="fade-up" data-aos-delay="200" data-aos-offset="0">
                        <div class="map-container" id="map"></div>
                    </div>
                </div>

                <!-- Branch Offices Information -->
                <div class="row" data-aos="fade-up" data-aos-delay="300">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="branch-card">
                            <h5><i class="fas fa-building me-2" style="color: var(--ocean-green);"></i>Main Office -
                                Surabaya</h5>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Harbour Nine Business Districy Block C-16. Jln. Gresik no 16, Surabaya
                                    60177</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-person"></i>
                                <span>Mr. Alexander (PIC)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>0313557115 (Office)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>commercial@oremus.co.id</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>agency@oremus.co.id</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="branch-card">
                            <h5><i class="fas fa-anchor me-2" style="color: var(--ocean-green);"></i>Gresik Port</h5>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Jln. Bangka B-17 RT 002 RW 001, Desa Sidorukun, Kecamatan Gresik, Kabupaten
                                    Gresik, East Java, Indonesia</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-person"></i>
                                <span>Mr. Teguh (PIC)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>+62 812-3389-1963 (Mobile)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>commercial@oremus.co.id</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>agency@oremus.co.id</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="branch-card">
                            <h5><i class="fas fa-ship me-2" style="color: var(--ocean-green);"></i>Rembang Port</h5>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Kelurahan Magersari RT 02 RW 02, Kecamatan Rembang, Kabupaten Rembang, Central
                                    Java, Indonesia </span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-person"></i>
                                <span>Mr. Deka (PIC)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>+62 857-4709-1955 (Mobile)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>commercial@oremus.co.id</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>agency@oremus.co.id</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="branch-card">
                            <h5><i class="fas fa-anchor me-2" style="color: var(--ocean-green);"></i>Lamongan Port
                            </h5>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Jln. Raya Daendels No.16 KM Sby 63.9 RT 007 RW 001, Desa Kemantren, Kec. Paciran,
                                    Kabupaten Lamongan, East Java, Indonesia</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-person"></i>
                                <span>Mr. Zaenal (PIC)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>+62 813-3530-1309 (Mobile)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>commercial@oremus.co.id</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>agency@oremus.co.id</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="branch-card">
                            <h5><i class="fas fa-ship me-2" style="color: var(--ocean-green);"></i>Balikpapan Port
                            </h5>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Jln. Prapatan no.14 RT 26, Kelurahan Prapatan, Kecamatan Balikpapan Kota, East
                                    Kalimantan, Indonesia</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-person"></i>
                                <span>Mr. Karyadi (PIC)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>+62 852-9969-2912 (Mobile)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>commercial@oremus.co.id</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>agency@oremus.co.id</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="branch-card">
                            <h5><i class="fas fa-anchor me-2" style="color: var(--ocean-green);"></i>Telaga Biru Port
                            </h5>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Jln. Pelabuhan no.65B Telaga Biru, Kecamatan Tanjung Bumi, Kabupaten Bangkalan,
                                    Madura, East Java, Indonesia</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-person"></i>
                                <span>Mr. Abd Rauf (PIC)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>+62 853-4246-6830 (Mobile)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>commercial@oremus.co.id</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>agency@oremus.co.id</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="branch-card">
                            <h5><i class="fas fa-anchor me-2" style="color: var(--ocean-green);"></i>Samboja Port</h5>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Perumahan Bumi Pemedas Permai Blok J no.11 RT 008, Kel. Teluk Pemedas, Kec.
                                    Samboja, Kabupaten Kutai Kartanegara, East Kalimantan - Indonesia</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-person"></i>
                                <span>Mr. Alwin (PIC)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>+62 813-4374-2015 (Mobile)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>commercial@oremus.co.id</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>agency@oremus.co.id</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="branch-card">
                            <h5><i class="fas fa-anchor me-2" style="color: var(--ocean-green);"></i>Bawean Port</h5>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Jln. Gurdam Sak  Gang Masjid A awabin no.183 RT 004 RW 004, Dusun Telok, Desa
                                    Sungai Teluk, Kec. Sangkapura, Kab. Gresik, East Java - Indonesia</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-person"></i>
                                <span>Mr. Dedi (PIC)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>+62 813-3530-1309 (Mobile)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>commercial@oremus.co.id</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>agency@oremus.co.id</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="branch-card">
                            <h5><i class="fas fa-anchor me-2" style="color: var(--ocean-green);"></i>Samarinda Port
                            </h5>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Jln. Marsda A. Saleh Gg.5 Blok B no.22 RT 40, Kel. Sidomulyo, Kec. Samarinda Ilir,
                                    Kota Samarinda, East Kalimantan - Indonesia</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-person"></i>
                                <span>Mr. Syamsul (PIC)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>+62 811-5455-576 (Mobile)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>commercial@oremus.co.id</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>agency@oremus.co.id</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="branch-card">
                            <h5><i class="fas fa-anchor me-2" style="color: var(--ocean-green);"></i>Probolinggo Port
                            </h5>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Dusun Krajan RT 012 RW 003, Desa Leces, Kecamatan Leces, Kabupaten Probolinggo,
                                    East Java - Indonesia</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-person"></i>
                                <span>Mrs. Dessy (PIC)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>+62 812-5949-831 (Mobile)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>commercial@oremus.co.id</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>agency@oremus.co.id</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="branch-card">
                            <h5><i class="fas fa-anchor me-2" style="color: var(--ocean-green);"></i>Makassar Port
                            </h5>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Perumahan Green River View, Cluster Laurus, Jalan Scarlet Leaf no.7, Kecamatan
                                    Tamalate, Kota Makassar, South Sulawesi - Indonesia</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-person"></i>
                                <span>Mr. Abd. Rauf (PIC)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>+62 853-4246-6830 (Mobile)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>commercial@oremus.co.id</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>agency@oremus.co.id</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="branch-card">
                            <h5><i class="fas fa-anchor me-2" style="color: var(--ocean-green);"></i>Bontang Port</h5>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Jln. Selamat Makssar, Rt 24 No 43,
                                    Kel Tanjung Laut, Kec Bontang Selatan,
                                    Kota Bontang
                                </span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-person"></i>
                                <span>Mr. Yafed Baken (PIC)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>+62 821-5306-1218 (Mobile)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>commercial@oremus.co.id</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>agency@oremus.co.id</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="branch-card">
                            <h5><i class="fas fa-anchor me-2" style="color: var(--ocean-green);"></i>Tanjung Priok
                                Port</h5>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Tanjung Priok Jakarta
                                    Jln. Tenggiri no. 103A Tanjung Priok, Jakarta Utara 14310 DKI Jakarta - Indonesia
                                </span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-person"></i>
                                <span>Mr. Dharma (PIC)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>+62 812-1919-822 (Mobile)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>+6221 29743107 (Phone)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-fax"></i>
                                <span>+6221 29743107 (Fax)</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>commercial@oremus.co.id</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>agency@oremus.co.id</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact CTA Section -->
        <section class="section"
            style="background-color: var(--dark-blue); color: white; position: relative; overflow: hidden;"
            id="contact">
            {{-- <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8" data-aos="fade-up">
                        <h2 class="mb-4" style="font-weight: 700;">Ready to Experience Excellence in Maritime
                            Services?</h2>
                        <p class="lead mb-5">Contact our team today to discuss how we can support your maritime
                            operations</p>

                        <!-- Contact Form -->
                        <div class="card"
                            style="background-color: rgba(255, 255, 255, 0.1); border: none; border-radius: 10px;">
                            <div class="card-body p-4">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <input type="text" class="form-control" placeholder="Your Name"
                                                style="background-color: rgba(255, 255, 255, 0.2); border: none; color: white;">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input type="email" class="form-control" placeholder="Your Email"
                                                style="background-color: rgba(255, 255, 255, 0.2); border: none; color: white;">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Subject"
                                            style="background-color: rgba(255, 255, 255, 0.2); border: none; color: white;">
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" rows="5" placeholder="Your Message"
                                            style="background-color: rgba(255, 255, 255, 0.2); border: none; color: white;"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-lg px-5 py-3"
                                        style="background-color: var(--ocean-green); color: white; font-weight: 600;">Send
                                        Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Animated Waves -->
            <div class="wave-animation" style="opacity: 0.2;">
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
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-wave">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                    class="shape-fill"></path>
            </svg>
        </div>
        <div class="container">
            <div class="row">
                <!-- Company Logo & Description -->
                <div class="col-lg-4 col-md-6 mb-5">
                    <img src="{{ Storage::url('/images/logo.png') }}" alt="Ship Agency Logo" class="mb-4"
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
                            <i class="fas fa-person"></i>
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
                                <strong>Lamongann</strong><br>
                            </a>
                        </li>
                        <li>
                            <a href="#location">
                                <i class="fas fa-anchor me-2"></i>
                                <strong>Balikpapan</strong><br>
                            </a>
                        </li>
                        <li>
                            <a href="#location">
                                <i class="fas fa-anchor me-2"></i>
                                <strong>Telaga Biru Madura</strong><br>
                            </a>
                        </li>
                        <li>
                            <a href="#location">
                                <i class="fas fa-anchor me-2"></i>
                                <strong>Samboja</strong><br>
                            </a>
                        </li>
                        <li>
                            <a href="#location">
                                <i class="fas fa-anchor me-2"></i>
                                <strong>Bawean</strong><br>
                            </a>
                        </li>
                        <li>
                            <a href="#location">
                                <i class="fas fa-anchor me-2"></i>
                                <strong>Samarinda</strong><br>
                            </a>
                        </li>
                        <li>
                            <a href="#location">
                                <i class="fas fa-anchor me-2"></i>
                                <strong>Probolinggo</strong><br>
                            </a>
                        </li>
                        <li>
                            <a href="#location">
                                <i class="fas fa-anchor me-2"></i>
                                <strong>Makassar</strong><br>
                            </a>
                        </li>
                        <li>
                            <a href="#location">
                                <i class="fas fa-anchor me-2"></i>
                                <strong>Bontang</strong><br>
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
                        <p class="mb-0">&copy; 2025 PT. Oremus Bahari Mandiri. All Rights Reserved.</p>
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

    <!-- Ship Animation -->
    <div class="ship-container">
        <svg width="120" height="60" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M416 320H96C43.06 320 0 363.06 0 416V480H512V416C512 363.06 468.94 320 416 320Z" fill="#0A3D62" />
            <path d="M512 416V480H0V416C0 363.06 43.06 320 96 320H416C468.94 320 512 363.06 512 416Z" fill="#0A3D62" />
            <path d="M400 192H240V96H400V192Z" fill="#3AB795" />
            <path d="M400 96H240V64C240 46.33 254.33 32 272 32H368C385.67 32 400 46.33 400 64V96Z" fill="#A8D8FF" />
            <path d="M400 192V416H240V192H400Z" fill="#0A3D62" />
            <path
                d="M272 160C276.418 160 280 156.418 280 152C280 147.582 276.418 144 272 144C267.582 144 264 147.582 264 152C264 156.418 267.582 160 272 160Z"
                fill="white" />
            <path
                d="M336 160C340.418 160 344 156.418 344 152C344 147.582 340.418 144 336 144C331.582 144 328 147.582 328 152C328 156.418 331.582 160 336 160Z"
                fill="white" />
        </svg>
    </div>

    <!-- Initialize AOS with specific settings -->
    <script>
        // Initialize AOS with more aggressive settings
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: false,
                mirror: true,
                offset: 50,
                delay: 0,
                anchorPlacement: 'top-bottom'
            });
        });
    </script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- jQuery and Slick Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Custom JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true
            });

            // Initialize Slick Carousel for clients
            $('.clients-carousel').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                dots: true,
                arrows: false,
                infinite: true,
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
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

            // Initialize Leaflet map - with a small delay to ensure container is ready
            setTimeout(function() {
                initMap();
            }, 100);

            // Force map resize on any scroll action to fix rendering issues
            window.addEventListener('scroll', function() {
                if (document.getElementById('map') && typeof L !== 'undefined') {
                    setTimeout(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 50);
                }
            });

            // Counter Animation
            const counters = document.querySelectorAll('.counter');
            const speed = 200;

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = entry.target;
                        const targetNumber = target.innerText.replace(/,/g, '').replace(/\+/g, '');
                        let count = 0;
                        const updateCount = () => {
                            const finalNumber = parseInt(targetNumber);
                            const increment = finalNumber / speed;

                            if (count < finalNumber) {
                                count += increment;
                                target.innerText = Math.ceil(count) + (targetNumber.includes(
                                    '+') ? '+' : '');
                                setTimeout(updateCount, 1);
                            } else {
                                target.innerText = targetNumber;
                            }
                        };

                        updateCount();
                        observer.unobserve(target);
                    }
                });
            }, {
                threshold: 0.5
            });

            counters.forEach(counter => {
                observer.observe(counter);
            });

            // Form validation and enhancement
            const contactForm = document.querySelector('#contact form');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    // Basic form validation
                    const formData = new FormData(this);
                    const name = this.querySelector('input[placeholder="Your Name"]').value;
                    const email = this.querySelector('input[placeholder="Your Email"]').value;
                    const message = this.querySelector('textarea').value;

                    if (name && email && message) {
                        // Show success message (you can replace this with actual form submission)
                        alert('Thank you for your message! We will get back to you soon.');
                        this.reset();
                    } else {
                        alert('Please fill in all required fields.');
                    }
                });
            }

            // Add hover effects to branch cards
            const branchCards = document.querySelectorAll('.branch-card');
            branchCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                    this.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.15)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.05)';
                });
            });

            // Monitor scrolling to ensure map loads properly
            window.addEventListener('scroll', debounce(function() {
                // Fix AOS animations that might not trigger
                AOS.refresh();

                // Fix map if it's in viewport
                if (isElementInViewport(document.getElementById('map')) && window.shipAgencyMap) {
                    window.shipAgencyMap.invalidateSize();
                }
            }, 200));

            // Helper function to check if element is in viewport
            function isElementInViewport(el) {
                if (!el) return false;
                const rect = el.getBoundingClientRect();
                return (
                    rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.bottom >= 0
                );
            }

            // Debounce function to limit how often a function is called
            function debounce(func, wait) {
                let timeout;
                return function() {
                    const context = this,
                        args = arguments;
                    clearTimeout(timeout);
                    timeout = setTimeout(function() {
                        func.apply(context, args);
                    }, wait);
                };
            }
        });

        // Function to initialize the map
        function initMap() {
            // Check if map container exists
            const mapContainer = document.getElementById('map');
            if (!mapContainer) {
                console.error('Map container not found');
                return;
            }

            // Set a minimum height to ensure the container is visible
            mapContainer.style.minHeight = "500px";

            // Initialize map centered on Indonesia
            const map = L.map('map', {
                scrollWheelZoom: false // Disable scroll wheel zoom to prevent conflicts with page scrolling
            }).setView([-2.5489, 118.0149], 5);

            // Store map reference globally so we can access it later
            window.shipAgencyMap = map;

            // Add tile layer (OpenStreetMap)
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                maxZoom: 18,
            }).addTo(map);

            // Custom icon for markers
            const createCustomIcon = (color) => {
                return L.divIcon({
                    className: 'custom-div-icon',
                    html: `<div style="
                    background-color: ${color};
                    width: 25px;
                    height: 25px;
                    border-radius: 50%;
                    border: 3px solid white;
                    box-shadow: 0 2px 5px rgba(0,0,0,0.3);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                ">
                    <i class="fas fa-anchor" style="color: white; font-size: 12px;"></i>
                </div>`,
                    iconSize: [25, 25],
                    iconAnchor: [12, 12]
                });
            };

            // Branch office locations with coordinates
            const branchOffices = [{
                    coords: [-7.231826874003529, 112.72712398431823],
                    title: "Main Office - Surabaya",
                    content: `
                    <div style="padding: 10px; min-width: 250px;">
                        <h6 style="color: #0A3D62; margin-bottom: 10px; font-weight: bold;">Main Office - Surabaya</h6>
                        <p style="margin: 5px 0; font-size: 14px;"><i class="fas fa-map-marker-alt" style="color: #3AB795; margin-right: 8px;"></i>Harbour Nine Business Districy Block C-16. Jln. Gresik no 16, Surabaya 60177</p>
                    </div>
                `,
                    color: '#dc3545' // Red for main office
                },
                {
                    coords: [-7.168208955469719, 112.66021777824521],
                    title: "Gresik Port",
                    content: `
                    <div style="padding: 10px; min-width: 250px;">
                        <h6 style="color: #0A3D62; margin-bottom: 10px; font-weight: bold;">Gresik Port</h6>
                        <p style="margin: 5px 0; font-size: 14px;"><i class="fas fa-map-marker-alt" style="color: #3AB795; margin-right: 8px;"></i>Jl. Lombok No.7 Blok A, RT.02/RW.01,  Sidorukun, Kec. Gresik, Kabupaten Gresik, Jawa Timur 61112 - Indonesia</p>
                    </div>
                `,
                    color: '#007bff'
                },
                {
                    coords: [-6.700637388960823, 111.32297505830293],
                    title: "Rembang Port",
                    content: `
                    <div style="padding: 10px; min-width: 250px;">
                        <h6 style="color: #0A3D62; margin-bottom: 10px; font-weight: bold;">Rembang Branch</h6>
                        <p style="margin: 5px 0; font-size: 14px;"><i class="fas fa-map-marker-alt" style="color: #3AB795; margin-right: 8px;"></i>Kelurahan Magersari RT 02 RW 02, Kecamatan Rembang, Kabupaten Rembang, Central Java - Indonesia </p>
                    </div>
                `,
                    color: '#007bff'
                },
                {
                    coords: [-6.876628069969104, 112.40721246864304],
                    title: "Lamongan Port",
                    content: `
                    <div style="padding: 10px; min-width: 250px;">
                        <h6 style="color: #0A3D62; margin-bottom: 10px; font-weight: bold;">Lamongan Port</h6>
                        <p style="margin: 5px 0; font-size: 14px;"><i class="fas fa-map-marker-alt" style="color: #3AB795; margin-right: 8px;"></i>Jln. Raya Deandels no.16 KM Sby 63.9 RT 007 RW 001, Desa Kemantren, Kec. Paciran, Kabupaten Lamongan, East Java - Indonesia </p>
                    </div>
                `,
                    color: '#007bff'
                },
                {
                    coords: [-1.2745133965490056, 116.81244773977738],
                    title: "Balikpapan Port",
                    content: `
                    <div style="padding: 10px; min-width: 250px;">
                        <h6 style="color: #0A3D62; margin-bottom: 10px; font-weight: bold;">Lamongan Port</h6>
                        <p style="margin: 5px 0; font-size: 14px;"><i class="fas fa-map-marker-alt" style="color: #3AB795; margin-right: 8px;"></i>Jln. Prapatan no.14 RT 26, Kelurahan Prapatan, Kecamatan Balikpapan Kota, East Kalimantan - Indonesia </p>
                    </div>
                `,
                    color: '#007bff' // Purple
                },
                {
                    coords: [-6.886993761866401, 113.08010926494315],
                    title: "Telaga Biru Port",
                    content: `
                    <div style="padding: 10px; min-width: 250px;">
                        <h6 style="color: #0A3D62; margin-bottom: 10px; font-weight: bold;">⚓ Telaga Biru Port</h6>
                        <p style="margin: 5px 0; font-size: 14px;"><i class="fas fa-map-marker-alt" style="color: #3AB795; margin-right: 8px;"></i>Jln. Pelabuhan no.65B Telaga Biru, Kecamatan Tanjung Bumi, Kabupaten Bangkalan - Madura East Java - Indonesia</p>
                    </div>
                `,
                    color: '#007bff' // Orange
                },
                {
                    coords: [-0.995964927487794, 117.13179765141979],
                    title: "Samboja Port",
                    content: `
                    <div style="padding: 10px; min-width: 250px;">
                        <h6 style="color: #0A3D62; margin-bottom: 10px; font-weight: bold;">Samboja Port</h6>
                        <p style="margin: 5px 0; font-size: 14px;"><i class="fas fa-map-marker-alt" style="color: #3AB795; margin-right: 8px;"></i>Jln. Prapatan no.14 RT 26, Kelurahan Prapatan, Kecamatan Balikpapan Kota, East Kalimantan - Indonesia </p>
                    </div>
                `,
                    color: '#007bff' // Purple
                },
                {
                    coords: [-0.995964927487794, 117.13179765141979],
                    title: "Bawean Port",
                    content: `
                    <div style="padding: 10px; min-width: 250px;">
                        <h6 style="color: #0A3D62; margin-bottom: 10px; font-weight: bold;">Bawean Port</h6>
                        <p style="margin: 5px 0; font-size: 14px;"><i class="fas fa-map-marker-alt" style="color: #3AB795; margin-right: 8px;"></i>Jln. Gurdam Sak  Gang Masjid A awabin no.183 RT 004 RW 004, Dusun Telok, Desa Sungai Teluk, Kec. Sangkapura, Kab. Gresik, East Java - Indonesia</p>
                    </div>
                `,
                    color: '#007bff' // Purple
                },
                {
                    coords: [-0.4925701738401669, 117.16118611094073],
                    title: "Samarinda Port",
                    content: `
                    <div style="padding: 10px; min-width: 250px;">
                        <h6 style="color: #0A3D62; margin-bottom: 10px; font-weight: bold;">Samarinda Port</h6>
                        <p style="margin: 5px 0; font-size: 14px;"><i class="fas fa-map-marker-alt" style="color: #3AB795; margin-right: 8px;"></i>Jln. Marsda A. Saleh Gg.5 Blok B no.22 RT 40, Kel. Sidomulyo, Kec. Samarinda Ilir, Kota Samarinda, East Kalimantan - Indonesia</p>
                    </div>
                `,
                    color: '#007bff' // Purple
                },
                {
                    coords: [-7.8564786301517975, 113.30056320761658],
                    title: "Probolinggo Port",
                    content: `
                    <div style="padding: 10px; min-width: 250px;">
                        <h6 style="color: #0A3D62; margin-bottom: 10px; font-weight: bold;">Probolinggo Port</h6>
                        <p style="margin: 5px 0; font-size: 14px;"><i class="fas fa-map-marker-alt" style="color: #3AB795; margin-right: 8px;"></i>Dusun Krajan RT 012 RW 003, Desa Leces, Kecamatan Leces, Kabupaten Probolinggo, East Java - Indonesia</p>
                    </div>
                `,
                    color: '#007bff' // Purple
                },
                {
                    coords: [-7.8564786301517975, 113.30056320761658],
                    title: "Makassar Port",
                    content: `
                    <div style="padding: 10px; min-width: 250px;">
                        <h6 style="color: #0A3D62; margin-bottom: 10px; font-weight: bold;">Makassar Port</h6>
                        <p style="margin: 5px 0; font-size: 14px;"><i class="fas fa-map-marker-alt" style="color: #3AB795; margin-right: 8px;"></i>Perumahan Green River View, Cluster Laurus, Jalan Scarlet Leaf no.7, Kecamatan Tamalate, Kota Makassar, South Sulawesi - Indonesia</p>
                    </div>
                `,
                    color: '#007bff' // Purple
                },
                {
                    coords: [0.11936060325602912, 117.48324551094059],
                    title: "Bontang Port",
                    content: `
                    <div style="padding: 10px; min-width: 250px;">
                        <h6 style="color: #0A3D62; margin-bottom: 10px; font-weight: bold;">Bontang Port</h6>
                        <p style="margin: 5px 0; font-size: 14px;"><i class="fas fa-map-marker-alt" style="color: #3AB795; margin-right: 8px;"></i>Jln. Selamat Makssar, Rt 24 No 43, Kel Tanjung Laut, Kec Bontang Selatan, Kota Bontang </p>
                    </div>
                `,
                    color: '#007bff' // Purple
                },
                {
                    coords: [-6.111235104481959, 106.88275958027936],
                    title: "Tanjung Priok Port",
                    content: `
                    <div style="padding: 10px; min-width: 250px;">
                        <h6 style="color: #0A3D62; margin-bottom: 10px; font-weight: bold;">Tanjung Priok Port</h6>
                        <p style="margin: 5px 0; font-size: 14px;"><i class="fas fa-map-marker-alt" style="color: #3AB795; margin-right: 8px;"></i>Jln. Tenggiri no. 103A Tanjung Priok, Jakarta Utara 14310 DKI Jakarta - Indonesia</p>
                    </div>
                `,
                    color: '#007bff' // Purple
                },
            ];

            // Add markers for each branch office
            branchOffices.forEach(office => {
                const marker = L.marker(office.coords, {
                    icon: createCustomIcon(office.color)
                }).addTo(map);

                // Add popup with office information
                marker.bindPopup(office.content, {
                    maxWidth: 300,
                    className: 'custom-popup'
                });

                // Add tooltip on hover
                marker.bindTooltip(office.title, {
                    permanent: false,
                    direction: 'top',
                    offset: [0, -10]
                });
            });

            // Add a scale control
            L.control.scale().addTo(map);

            // Optional: Add zoom control with custom position
            map.removeControl(map.zoomControl);
            L.control.zoom({
                position: 'bottomright'
            }).addTo(map);

            // Add a custom control for office information
            const info = L.control({
                position: 'topright'
            });
            info.onAdd = function(map) {
                this._div = L.DomUtil.create('div', 'info');
                this._div.innerHTML = `
                <div style="
                    background: rgba(255,255,255,0.9);
                    padding: 10px;
                    border-radius: 8px;
                    box-shadow: 0 3px 10px rgba(0,0,0,0.2);
                    font-family: 'Poppins', sans-serif;
                    font-size: 12px;
                    max-width: 200px;
                ">
                    <h6 style="margin: 0 0 8px 0; color: #0A3D62; font-weight: bold;">PT. Oremus Bahari Mandiri</h6>
                    <p style="margin: 0; color: #666;">Click on any marker to view branch office details</p>
                </div>
            `;
                return this._div;
            };
            info.addTo(map);
        }
    </script>
</body>

</html>
