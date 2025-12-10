<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->title }} - PT. Oremus Bahari Mandiri</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="manifest" href="/site.webmanifest" />


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
            background-color: #f8faff;
            color: #333;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #ffffff !important;
            backdrop-filter: blur(10px);
            transition: all 0.4s ease;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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

        .nav-link:hover:before,
        .nav-link.active:before {
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

        /* News Header */
        .news-header {
            background: linear-gradient(135deg, var(--dark-blue) 0%, #051e31 100%);
            padding: 140px 0 60px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .news-header-container {
            position: relative;
            z-index: 5;
            text-align: center;
        }

        .news-topic {
            display: inline-block;
            background-color: var(--ocean-green);
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(58, 183, 149, 0.3);
        }

        .news-title {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 25px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .news-meta {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 30px;
            margin-bottom: 40px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            font-size: 1rem;
            opacity: 0.9;
        }

        .meta-item i {
            margin-right: 10px;
            color: var(--ocean-green);
        }

        /* Image Gallery */
        .image-gallery {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            margin-bottom: -80px;
            position: relative;
            z-index: 10;
        }

        /* Single Image Layout */
        .single-image-layout {
            width: 100%;
            height: 450px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        }

        .single-image-layout img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .single-image-layout:hover img {
            transform: scale(1.05);
        }

        /* Two Images Layout */
        .two-images-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            height: 400px;
        }

        .two-images-layout .image-container {
            height: 100%;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        }

        .two-images-layout img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .two-images-layout .image-container:hover img {
            transform: scale(1.05);
        }

        /* Three Images Layout */
        .three-images-layout {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            grid-template-rows: repeat(2, 1fr);
            gap: 15px;
            height: 450px;
        }

        .three-images-layout .image-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        }

        .three-images-layout .main-image {
            grid-row: span 2;
        }

        .three-images-layout img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .three-images-layout .image-container:hover img {
            transform: scale(1.05);
        }

        /* Lightbox */
        .lightbox {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1001;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .lightbox.active {
            display: flex;
            opacity: 1;
        }

        .lightbox-img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
        }

        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 20px;
            color: white;
            font-size: 30px;
            cursor: pointer;
            background: none;
            border: none;
            transition: transform 0.3s ease;
        }

        .lightbox-close:hover {
            transform: scale(1.2);
        }

        .lightbox-nav {
            position: absolute;
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
        }

        .lightbox-prev,
        .lightbox-next {
            color: white;
            font-size: 30px;
            cursor: pointer;
            background: rgba(0, 0, 0, 0.5);
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s ease;
        }

        .lightbox-prev:hover,
        .lightbox-next:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        /* Content Section */
        .news-content-section {
            padding: 120px 0 80px;
            background-color: white;
            position: relative;
        }

        .news-content-grid {
            display: grid;
            grid-template-columns: 7fr 3fr;
            gap: 50px;
        }

        .news-body {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #444;
        }

        .news-body p {
            margin-bottom: 25px;
        }

        .news-body h2 {
            font-size: 1.8rem;
            color: var(--dark-blue);
            margin: 40px 0 20px;
            position: relative;
        }

        .news-body h2:after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background-color: var(--ocean-green);
            bottom: -10px;
            left: 0;
        }

        .news-body h3 {
            font-size: 1.5rem;
            color: var(--dark-blue);
            margin: 30px 0 15px;
        }

        .news-body img {
            width: 100%;
            border-radius: 10px;
            margin: 30px 0;
        }

        .news-body ul,
        .news-body ol {
            margin: 20px 0 20px 20px;
        }

        .news-body li {
            margin-bottom: 10px;
        }

        .news-body blockquote {
            background-color: rgba(58, 183, 149, 0.05);
            border-left: 4px solid var(--ocean-green);
            padding: 20px;
            margin: 30px 0;
            font-style: italic;
            color: #555;
            border-radius: 0 10px 10px 0;
        }

        /* Sidebar */
        .news-sidebar {
            position: sticky;
            top: 100px;
        }

        .sidebar-widget {
            background-color: #f8faff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(10, 75, 120, 0.08);
            margin-bottom: 30px;
        }

        .widget-header {
            background: linear-gradient(135deg, var(--dark-blue) 0%, var(--ocean-blue) 100%);
            color: white;
            padding: 20px;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .widget-content {
            padding: 20px;
        }

        .related-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .related-item {
            display: flex;
            gap: 15px;
            text-decoration: none;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(10, 75, 120, 0.1);
            transition: all 0.3s ease;
        }

        .related-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .related-item:hover {
            transform: translateX(5px);
        }

        .related-img {
            flex: 0 0 80px;
            height: 60px;
            border-radius: 8px;
            overflow: hidden;
        }

        .related-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .related-item:hover .related-img img {
            transform: scale(1.1);
        }

        .related-content {
            flex: 1;
        }

        .related-date {
            font-size: 0.8rem;
            color: #777;
            display: block;
            margin-bottom: 5px;
        }

        .related-title {
            font-size: 1rem;
            color: var(--dark-blue);
            margin: 0;
            line-height: 1.4;
            transition: color 0.3s ease;
        }

        .related-item:hover .related-title {
            color: var(--ocean-green);
        }

        .tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .tag {
            display: inline-block;
            padding: 6px 15px;
            background-color: rgba(10, 75, 120, 0.05);
            border-radius: 50px;
            color: var(--dark-blue);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .tag:hover,
        .tag.active {
            background-color: var(--ocean-green);
            color: white;
            transform: translateY(-3px);
        }

        .contact-info p {
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .contact-link {
            display: inline-flex;
            align-items: center;
            background: linear-gradient(135deg, var(--ocean-green) 0%, var(--dark-blue) 100%);
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(58, 183, 149, 0.2);
            transition: all 0.3s ease;
        }

        .contact-link i {
            margin-left: 8px;
            transition: transform 0.3s ease;
        }

        .contact-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(58, 183, 149, 0.3);
            color: white;
        }

        .contact-link:hover i {
            transform: translateX(5px);
        }

        /* Social Share */
        .social-share {
            display: flex;
            align-items: center;
            margin-top: 50px;
            padding-top: 30px;
            border-top: 1px solid rgba(10, 75, 120, 0.1);
        }

        .share-label {
            margin-right: 20px;
            font-weight: 600;
            color: var(--dark-blue);
        }

        .share-buttons {
            display: flex;
            gap: 10px;
        }

        .share-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .share-btn:hover {
            transform: translateY(-5px) scale(1.1);
        }

        .btn-facebook {
            background-color: #3b5998;
        }

        .btn-twitter {
            background-color: #1da1f2;
        }

        .btn-linkedin {
            background-color: #0077b5;
        }

        .btn-email {
            background-color: #ea4335;
        }

        /* More News Section */
        .more-news {
            background: linear-gradient(135deg, #f5f9ff 0%, var(--light-blue) 100%);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .more-news-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 50px;
        }

        .section-title {
            font-size: 2.2rem;
            color: var(--dark-blue);
            position: relative;
            padding-bottom: 15px;
            font-weight: 700;
        }

        .section-title:after {
            content: '';
            position: absolute;
            width: 70px;
            height: 4px;
            background-color: var(--ocean-green);
            bottom: 0;
            left: 0;
        }

        .view-all-link {
            display: inline-flex;
            align-items: center;
            color: var(--ocean-green);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .view-all-link i {
            margin-left: 8px;
            transition: transform 0.3s ease;
        }

        .view-all-link:hover {
            color: var(--dark-blue);
        }

        .view-all-link:hover i {
            transform: translateX(5px);
        }

        .news-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .news-card {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(10, 75, 120, 0.08);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(10, 75, 120, 0.15);
        }

        .card-img {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .news-card:hover .card-img img {
            transform: scale(1.1);
        }

        .card-date {
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

        .card-date-day {
            display: block;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
        }

        .card-date-month {
            display: block;
            font-size: 0.9rem;
            text-transform: uppercase;
            font-weight: 500;
        }

        .card-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .card-topic {
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

        .card-title {
            font-size: 1.3rem;
            color: var(--dark-blue);
            margin-bottom: 12px;
            line-height: 1.4;
            transition: color 0.3s ease;
        }

        .news-card:hover .card-title {
            color: var(--ocean-green);
        }

        .card-excerpt {
            color: #666;
            margin-bottom: 20px;
            line-height: 1.6;
            flex-grow: 1;
        }

        .card-link {
            display: inline-flex;
            align-items: center;
            color: var(--ocean-green);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-top: auto;
        }

        .card-link i {
            margin-left: 8px;
            transition: transform 0.3s ease;
        }

        .card-link:hover {
            color: var(--dark-blue);
        }

        .card-link:hover i {
            transform: translateX(5px);
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

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--ocean-green);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 99;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(58, 183, 149, 0.3);
        }

        .back-to-top.active {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background-color: var(--dark-blue);
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(10, 75, 120, 0.4);
        }

        /* Responsive Styles */
        @media screen and (max-width: 1024px) {
            .news-content-grid {
                grid-template-columns: 1fr;
            }

            .news-sidebar {
                position: static;
                margin-top: 50px;
            }

            .news-cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .news-title {
                font-size: 2.5rem;
            }

            .single-image-layout {
                height: 350px;
            }

            .two-images-layout,
            .three-images-layout {
                height: auto;
            }

            .three-images-layout {
                grid-template-columns: 1fr;
                grid-template-rows: auto;
                gap: 15px;
            }

            .three-images-layout .main-image {
                grid-row: auto;
                height: 300px;
            }

            .three-images-layout .image-container:not(.main-image) {
                height: 200px;
            }
        }

        @media screen and (max-width: 768px) {
            .navbar-brand img {
                height: 50px;
            }

            .navbar.scrolled .navbar-brand img {
                height: 30px;
            }

            .news-header {
                padding: 120px 0 40px;
            }

            .news-title {
                font-size: 2rem;
            }

            .news-meta {
                flex-direction: column;
                gap: 15px;
            }

            .single-image-layout {
                height: 250px;
            }

            .two-images-layout {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .two-images-layout .image-container {
                height: 200px;
            }

            .news-content-section {
                padding: 80px 0 60px;
            }

            .news-cards {
                grid-template-columns: 1fr;

            }

            .more-news-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .footer h4 {
                margin-top: 30px;
            }
        }

        @media screen and (max-width: 576px) {
            .news-title {
                font-size: 1.8rem;
            }

            .single-image-layout,
            .two-images-layout .image-container,
            .three-images-layout .image-container {
                height: 200px;
            }

            .news-body {
                font-size: 1rem;
            }

            .social-share {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
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
        }
    </style>
</head>

<body>
    @include('layouts.navbar')

    <!-- News Header Section -->
    <header class="news-header">
        <div class="container">
            <div class="news-header-container" data-aos="fade-up" data-aos-duration="1000">
                <span class="news-topic">{{ $news->topic }}</span>
                <h1 class="news-title">{{ $news->title }}</h1>
                <div class="news-meta">
                    <div class="meta-item">
                        <i class="far fa-calendar-alt"></i>
                        <span>{{ \Carbon\Carbon::parse($news->created_at)->format('d F Y') }}</span>
                    </div>
                    <div class="meta-item">
                        <i class="far fa-user"></i>
                        <span>PT. Oremus Bahari Mandiri</span>
                    </div>
                </div>

                <!-- Dynamic Image Gallery Based on Number of Images -->
                <div class="image-gallery" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    @php
                        // For demonstration purposes - in a real implementation,
                        // you would retrieve these images from your database
                        // This example assumes $news->images is an array of image paths
                        $images = [$news->image];
                        // Add additional images if they exist
                        if (isset($news->image2) && !empty($news->image2)) {
                            $images[] = $news->image2;
                        }
                        if (isset($news->image3) && !empty($news->image3)) {
                            $images[] = $news->image3;
                        }
                        $imageCount = count($images);
                    @endphp

                    @if ($imageCount == 1)
                        <!-- Single Image Layout -->
                        <div class="single-image-layout">
                            <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($images[0]) }}"
                                alt="{{ $news->title }}" class="gallery-image" data-index="0">
                        </div>
                    @elseif($imageCount == 2)
                        <!-- Two Images Layout -->
                        <div class="two-images-layout">
                            <div class="image-container">
                                <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($images[0]) }}"
                                    alt="{{ $news->title }}" class="gallery-image" data-index="0">
                            </div>
                            <div class="image-container">
                                <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($images[1]) }}"
                                    alt="{{ $news->title }}" class="gallery-image" data-index="1">
                            </div>
                        </div>
                    @elseif($imageCount == 3)
                        <!-- Three Images Layout -->
                        <div class="three-images-layout">
                            <div class="image-container main-image">
                                <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($images[0]) }}"
                                    alt="{{ $news->title }}" class="gallery-image" data-index="0">
                            </div>
                            <div class="image-container">
                                <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($images[1]) }}"
                                    alt="{{ $news->title }}" class="gallery-image" data-index="1">
                            </div>
                            <div class="image-container">
                                <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($images[2]) }}"
                                    alt="{{ $news->title }}" class="gallery-image" data-index="2">
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Lightbox for Image Gallery -->
        <div class="lightbox">
            <button class="lightbox-close">&times;</button>
            <div class="lightbox-nav">
                <button class="lightbox-prev"><i class="fas fa-chevron-left"></i></button>
                <button class="lightbox-next"><i class="fas fa-chevron-right"></i></button>
            </div>
            <img src="" alt="" class="lightbox-img">
        </div>
    </header>

    <!-- News Content Section -->
    <section class="news-content-section">
        <div class="container">
            <div class="news-content-grid">
                <div class="news-content">
                    <div class="news-body" data-aos="fade-up" data-aos-duration="1000">
                        {!! $news->news !!}

                        <div class="social-share">
                            <span class="share-label">Share this article:</span>
                            <div class="share-buttons">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('publicnews.show', $news->id)) }}"
                                    target="_blank" class="share-btn btn-facebook" aria-label="Share on Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('publicnews.show', $news->id)) }}&text={{ urlencode($news->title) }}"
                                    target="_blank" class="share-btn btn-twitter" aria-label="Share on Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('publicnews.show', $news->id)) }}&title={{ urlencode($news->title) }}"
                                    target="_blank" class="share-btn btn-linkedin" aria-label="Share on LinkedIn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="mailto:?subject={{ $news->title }}&body={{ urlencode(route('publicnews.show', $news->id)) }}"
                                    class="share-btn btn-email" aria-label="Share via Email">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="news-sidebar">
                    @if ($relatedNews->count() > 0)
                        <div class="sidebar-widget" data-aos="fade-left" data-aos-duration="1000"
                            data-aos-delay="200">
                            <div class="widget-header">
                                <i class="fas fa-newspaper"></i> Related Articles
                            </div>
                            <div class="widget-content">
                                <div class="related-list">
                                    @foreach ($relatedNews as $related)
                                        <a href="{{ route('publicnews.show', $related->id) }}" class="related-item">
                                            <div class="related-img">
                                                <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($related->image) }}"
                                                    alt="{{ $related->title }}">
                                            </div>
                                            <div class="related-content">
                                                <span
                                                    class="related-date">{{ \Carbon\Carbon::parse($related->created_at)->format('d M Y') }}</span>
                                                <h4 class="related-title">{{ $related->title }}</h4>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="sidebar-widget" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                        <div class="widget-header">
                            <i class="fas fa-tags"></i> Topics
                        </div>
                        <div class="widget-content">
                            <div class="tags-container">
                                <a href="{{ route('publicnews.index', ['topic' => 'Company']) }}"
                                    class="tag {{ $news->topic == 'Company' ? 'active' : '' }}">Company</a>
                                <a href="{{ route('publicnews.index', ['topic' => 'Industry']) }}"
                                    class="tag {{ $news->topic == 'Industry' ? 'active' : '' }}">Industry</a>
                                <a href="{{ route('publicnews.index', ['topic' => 'Maritime']) }}"
                                    class="tag {{ $news->topic == 'Maritime' ? 'active' : '' }}">Maritime</a>
                                <a href="{{ route('publicnews.index', ['topic' => 'Events']) }}"
                                    class="tag {{ $news->topic == 'Events' ? 'active' : '' }}">Events</a>
                                <a href="{{ route('publicnews.index', ['topic' => 'Updates']) }}"
                                    class="tag {{ $news->topic == 'Updates' ? 'active' : '' }}">Updates</a>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-widget" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
                        <div class="widget-header">
                            <i class="fas fa-phone-alt"></i> Contact Us
                        </div>
                        <div class="widget-content">
                            <div class="contact-info">
                                <p>For inquiries about our services or more information about PT. Oremus Bahari Mandiri,
                                    please don't hesitate to contact us.</p>
                                <p><i class="fas fa-user me-2"></i>Mr. Alexander (PIC)</p>
                                <p><i class="fas fa-phone me-2"></i>0313557115 (Office)</p>
                                <p><i class="fas fa-envelope me-2"></i>commercial@oremus.co.id</p>
                                <a href="{{ route('landing') }}#contact" class="contact-link mt-3">
                                    Contact Us <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- More News Section -->
    <section class="more-news">
        <div class="container">
            <div class="more-news-header">
                <h2 class="section-title">More News</h2>
                <a href="{{ route('publicnews.index') }}" class="view-all-link">
                    View All News <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="news-cards" style="padding-bottom: 80px;">
                @foreach ($latestNews->take(3) as $item)
                    <div class="news-card" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="card-img">
                            <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($item->image) }}"
                                alt="{{ $item->title }}">
                            <div class="card-date">
                                <span
                                    class="card-date-day">{{ \Carbon\Carbon::parse($item->created_at)->format('d') }}</span>
                                <span
                                    class="card-date-month">{{ \Carbon\Carbon::parse($item->created_at)->format('M') }}</span>
                            </div>
                        </div>
                        <div class="card-content">
                            <span class="card-topic">{{ $item->topic }}</span>
                            <h3 class="card-title">{{ $item->title }}</h3>
                            <p class="card-excerpt">{{ Str::limit(strip_tags($item->news), 100) }}</p>
                            <a href="{{ route('publicnews.show', $item->id) }}" class="card-link">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!--Ship Animation -->
        <div class="ship-container">
            <svg width="120" height="60" viewBox="0 0 512 512" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M416 320H96C43.06 320 0 363.06 0 416V480H512V416C512 363.06 468.94 320 416 320Z"
                    fill="#0A3D62" />
                <path d="M512 416V480H0V416C0 363.06 43.06 320 96 320H416C468.94 320 512 363.06 512 416Z"
                    fill="#0A3D62" />
                <path d="M400 192H240V96H400V192Z" fill="#3AB795" />
                <path d="M400 96H240V64C240 46.33 254.33 32 272 32H368C385.67 32 400 46.33 400 64V96Z"
                    fill="#A8D8FF" />
                <path d="M400 192V416H240V192H400Z" fill="#0A3D62" />
                <path
                    d="M272 160C276.418 160 280 156.418 280 152C280 147.582 276.418 144 272 144C267.582 144 264 147.582 264 152C264 156.418 267.582 160 272 160Z"
                    fill="white" />
                <path
                    d="M336 160C340.418 160 344 156.418 344 152C344 147.582 340.418 144 336 144C331.582 144 328 147.582 328 152C328 156.418 331.582 160 336 160Z"
                    fill="white" />
            </svg>
        </div>

        <!--Wave Animation -->
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
    </section>

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
                    <img src="{{ asset('/images/logo.png') }}" alt="PT. Oremus Bahari Mandiri Logo" class="mb-4"
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
                            <span>Harbour Nine Business District Block C-16. Jln. Gresik no 16, Surabaya 60177</span>
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
                        <li><a href="{{ route('landing') }}#services"><i class="fas fa-ship me-2"></i>Ship
                                Handling</a></li>
                        <li><a href="{{ route('landing') }}#services"><i class="fas fa-box me-2"></i>Provision
                                Supply</a></li>
                        <li><a href="{{ route('landing') }}#services"><i class="fas fa-ambulance me-2"></i>Medivac
                                Operation</a></li>
                        <li><a href="{{ route('landing') }}#services"><i class="fas fa-users me-2"></i>Crew
                                Handling</a></li>
                        <li><a href="{{ route('landing') }}#activities"><i class="fas fa-anchor me-2"></i>Cable
                                Laying</a></li>
                        <li><a href="{{ route('landing') }}#activities"><i class="fas fa-exchange-alt me-2"></i>Ship
                                to Ship</a></li>
                    </ul>
                </div>

                <!-- Branch Offices -->
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4><i class="fas fa-map-marked-alt me-2"></i>Branches</h4>
                    <ul class="footer-links list-unstyled">
                        <li>
                            <a href="{{ route('landing') }}#location">
                                <i class="fas fa-anchor me-2"></i>
                                <strong>Surabaya</strong>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('landing') }}#location">
                                <i class="fas fa-anchor me-2"></i>
                                <strong>Gresik</strong>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('landing') }}#location">
                                <i class="fas fa-anchor me-2"></i>
                                <strong>Rembang</strong>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('landing') }}#location">
                                <i class="fas fa-anchor me-2"></i>
                                <strong>Lamongan</strong>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('landing') }}#location">
                                <i class="fas fa-anchor me-2"></i>
                                <strong>Balikpapan</strong>
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
                        <p class="mb-0">&copy; {{ date('Y') }} PT. Oremus Bahari Mandiri. All Rights Reserved.
                        </p>
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

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

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

            // Back to Top Button
            const backToTop = document.querySelector('.back-to-top');
            if (window.scrollY > 300) {
                backToTop.classList.add('active');
            } else {
                backToTop.classList.remove('active');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                if (this.getAttribute('href') === '#') return;

                const targetId = this.getAttribute('href');
                if (targetId.startsWith('#')) {
                    e.preventDefault();
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
                }
            });
        });

        // Back to top button functionality
        document.querySelector('.back-to-top').addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Lightbox functionality
        const lightbox = document.querySelector('.lightbox');
        const lightboxImg = document.querySelector('.lightbox-img');
        const lightboxClose = document.querySelector('.lightbox-close');
        const lightboxPrev = document.querySelector('.lightbox-prev');
        const lightboxNext = document.querySelector('.lightbox-next');
        const galleryImages = document.querySelectorAll('.gallery-image');

        let currentIndex = 0;

        // Open lightbox
        galleryImages.forEach(image => {
            image.addEventListener('click', function() {
                currentIndex = parseInt(this.getAttribute('data-index'));
                lightboxImg.src = this.src;
                lightboxImg.alt = this.alt;
                lightbox.classList.add('active');
                document.body.style.overflow = 'hidden'; // Prevent scrolling when lightbox is open
            });
        });

        // Close lightbox
        lightboxClose.addEventListener('click', function() {
            lightbox.classList.remove('active');
            document.body.style.overflow = ''; // Re-enable scrolling
        });

        // Close lightbox when clicking outside the image
        lightbox.addEventListener('click', function(e) {
            if (e.target === lightbox) {
                lightbox.classList.remove('active');
                document.body.style.overflow = ''; // Re-enable scrolling
            }
        });

        // Navigate to previous image
        lightboxPrev.addEventListener('click', function() {
            currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
            lightboxImg.src = galleryImages[currentIndex].src;
            lightboxImg.alt = galleryImages[currentIndex].alt;
        });

        // Navigate to next image
        lightboxNext.addEventListener('click', function() {
            currentIndex = (currentIndex + 1) % galleryImages.length;
            lightboxImg.src = galleryImages[currentIndex].src;
            lightboxImg.alt = galleryImages[currentIndex].alt;
        });

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (!lightbox.classList.contains('active')) return;

            if (e.key === 'Escape') {
                lightbox.classList.remove('active');
                document.body.style.overflow = ''; // Re-enable scrolling
            } else if (e.key === 'ArrowLeft') {
                currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
                lightboxImg.src = galleryImages[currentIndex].src;
                lightboxImg.alt = galleryImages[currentIndex].alt;
            } else if (e.key === 'ArrowRight') {
                currentIndex = (currentIndex + 1) % galleryImages.length;
                lightboxImg.src = galleryImages[currentIndex].src;
                lightboxImg.alt = galleryImages[currentIndex].alt;
            }
        });

        // Create ocean bubbles effect
        function createBubbles() {
            const header = document.querySelector('.news-header');

            for (let i = 0; i < 10; i++) {
                const bubble = document.createElement('div');
                bubble.classList.add('bubble');

                // Random size between 10px and 30px
                const size = Math.random() * 20 + 10;
                bubble.style.width = `${size}px`;
                bubble.style.height = `${size}px`;

                // Random position
                bubble.style.left = `${Math.random() * 100}%`;
                bubble.style.bottom = `${Math.random() * 20}%`;

                // Random animation delay and duration
                bubble.style.animationDelay = `${Math.random() * 5}s`;
                bubble.style.animationDuration = `${Math.random() * 10 + 10}s`;

                header.appendChild(bubble);
            }
        }

        // Add bubbles to the header for ocean effect
        createBubbles();

        // Dynamic content sections - if there are accordions or tabs in the news content
        const accordionItems = document.querySelectorAll('.accordion-item');
        if (accordionItems.length > 0) {
            accordionItems.forEach(item => {
                const header = item.querySelector('.accordion-header');
                const content = item.querySelector('.accordion-content');

                header.addEventListener('click', function() {
                    // Toggle active class
                    item.classList.toggle('active');

                    // Toggle content visibility
                    if (content.style.maxHeight) {
                        content.style.maxHeight = null;
                    } else {
                        content.style.maxHeight = content.scrollHeight + "px";
                    }
                });
            });
        }

        // Handle any image lazy loading
        const lazyImages = document.querySelectorAll('.lazy-image');
        if (lazyImages.length > 0) {
            const lazyLoadObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy-image');
                        observer.unobserve(img);
                    }
                });
            });

            lazyImages.forEach(image => {
                lazyLoadObserver.observe(image);
            });
        }

        // Handle related news hover effects
        const relatedItems = document.querySelectorAll('.related-item');
        relatedItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.querySelector('.related-title').style.color = 'var(--ocean-green)';
            });

            item.addEventListener('mouseleave', function() {
                this.querySelector('.related-title').style.color = 'var(--dark-blue)';
            });
        });

        // Add subtle parallax effect to header
        window.addEventListener('scroll', function() {
            const scrollPosition = window.scrollY;
            const headerImages = document.querySelectorAll('.image-gallery img');

            headerImages.forEach(img => {
                // Move the image slightly slower than the scroll speed
                img.style.transform = `translateY(${scrollPosition * 0.15}px)`;
            });
        });
    </script>
</body>

</html>
