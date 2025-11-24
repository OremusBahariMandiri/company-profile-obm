<nav class="navbar navbar-expand-xl fixed-top">
    <div class="container-fluid px-4">
        <!-- Brand Section -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route ('landing')}}">
            <img src="{{ asset('images/logo.png') }}" alt="PT. Oremus Bahari Mandiri Logo" class="navbar-logo">
            <div class="brand-text ms-3">
                <div class="company-name">PT. Oremus Bahari Mandiri</div>
                <div class="company-tagline">Shipping Agency</div>
            </div>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- Main Navigation -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route ('landing')}}">Home</a>
                </li>

                <!-- About -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route ('landing')}}#about">About</a>
                </li>

                <!-- Services -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route ('landing')}}#services">Services</a>
                </li>

                <!-- Company Info Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        Company
                    </a>
                    <ul class="dropdown-menu modern-dropdown">
                        <li><a class="dropdown-item" href="{{route ('landing')}}#achievements">
                            <i class="fas fa-trophy"></i>Achievements</a></li>
                        <li><a class="dropdown-item" href="{{route ('landing')}}#team">
                            <i class="fas fa-user-tie"></i>Our Team</a></li>
                        <li><a class="dropdown-item" href="{{route ('landing')}}#clients">
                            <i class="fas fa-handshake"></i>Our Clients</a></li>
                    </ul>
                </li>

                <!-- Media Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        Media
                    </a>
                    <ul class="dropdown-menu modern-dropdown">
                        <li><a class="dropdown-item" href="{{route ('landing')}}#news">
                            <i class="fas fa-newspaper"></i>Latest News</a></li>
                        <li><a class="dropdown-item" href="{{route ('landing')}}#activities">
                            <i class="fas fa-camera"></i>Activities</a></li>
                    </ul>
                </li>

                <!-- Locations -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route ('landing')}}#location">Branches</a>
                </li>

                <!-- Contact CTA -->
                <li class="nav-item ms-2">
                    <a class="nav-link contact-cta" href="{{route ('landing')}}#contact">
                        <i class="fas fa-phone"></i>Contact Us
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
/* Modern Navbar Base */
.navbar {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(25px);
    -webkit-backdrop-filter: blur(25px);
    transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
    padding: 18px 0;
    box-shadow: 0 2px 20px rgba(11, 20, 38, 0.08);
    border-bottom: 1px solid rgba(56, 178, 172, 0.1);
    min-height: 85px;
}

.navbar.scrolled {
    padding: 10px 0;
    background: rgba(255, 255, 255, 0.98);
    box-shadow: 0 5px 30px rgba(11, 20, 38, 0.15);
    min-height: 70px;
}

/* Enhanced Brand */
.navbar-brand {
    text-decoration: none !important;
    transition: transform 0.3s ease;
    z-index: 1001;
}

.navbar-brand:hover {
    transform: scale(1.02);
}

.navbar-logo {
    height: 55px;
    transition: all 0.4s ease;
    filter: drop-shadow(0 2px 8px rgba(11, 20, 38, 0.1));
}

.navbar.scrolled .navbar-logo {
    height: 42px;
}

.brand-text {
    display: flex;
    flex-direction: column;
}

.company-name {
    font-family: 'Playfair Display', serif;
    font-size: 1.35rem;
    font-weight: 700;
    color: #0B1426;
    line-height: 1.1;
    margin-bottom: 2px;
    transition: font-size 0.4s ease;
}

.navbar.scrolled .company-name {
    font-size: 1.1rem;
}

.company-tagline {
    font-family: 'Inter', sans-serif;
    font-size: 0.7rem;
    font-weight: 500;
    color: #38B2AC;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    transition: font-size 0.4s ease;
}

.navbar.scrolled .company-tagline {
    font-size: 0.65rem;
}

/* Clean Navigation Links */
.navbar-nav {
    align-items: center;
    gap: 2px;
}

.nav-link {
    font-family: 'Inter', sans-serif;
    font-weight: 600;
    font-size: 0.9rem;
    color: #2D3748 !important;
    padding: 12px 18px !important;
    border-radius: 8px;
    transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
    position: relative;
    white-space: nowrap;
}

/* .nav-link::after {
    content: '';
    position: absolute;
    bottom: 8px;
    left: 50%;
    width: 0;
    height: 2px;
    background: linear-gradient(90deg, #2C7A7B, #38B2AC);
    transition: all 0.3s ease;
    transform: translateX(-50%);
    border-radius: 1px;
} */

.nav-link:hover,
.nav-link.active {
    color: #38B2AC !important;
    background: rgba(56, 178, 172, 0.06);
    transform: translateY(-1px);
}

/* .nav-link:hover::after,
.nav-link.active::after {
    width: 60%;
} */

/* Contact CTA Button */
.contact-cta {
    background: linear-gradient(135deg, #2C7A7B 0%, #38B2AC 100%) !important;
    color: white !important;
    border-radius: 25px !important;
    padding: 10px 20px !important;
    font-weight: 600;
    box-shadow: 0 4px 15px rgba(44, 122, 123, 0.25);
    border: 2px solid transparent;
}

.contact-cta:hover {
    background: linear-gradient(135deg, #0B1426 0%, #1A2942 100%) !important;
    color: white !important;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(11, 20, 38, 0.3);
}

.contact-cta::after {
    display: none;
}

.contact-cta i {
    margin-right: 6px;
    font-size: 0.85rem;
}

/* Modern Dropdown */
.modern-dropdown {
    background: rgba(255, 255, 255, 0.98);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(56, 178, 172, 0.15);
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(11, 20, 38, 0.12);
    padding: 8px 0;
    margin-top: 8px;
    min-width: 200px;
}

.dropdown-item {
    padding: 10px 16px;
    font-size: 0.9rem;
    font-weight: 500;
    color: #2D3748;
    transition: all 0.3s ease;
    border-radius: 6px;
    margin: 2px 8px;
    display: flex;
    align-items: center;
}

.dropdown-item i {
    width: 16px;
    margin-right: 10px;
    color: #38B2AC;
    font-size: 0.8rem;
}

.dropdown-item:hover {
    background: linear-gradient(135deg, rgba(56, 178, 172, 0.08) 0%, rgba(44, 122, 123, 0.04) 100%);
    color: #2C7A7B;
    transform: translateX(3px);
}



/* Custom Toggle for Mobile */
.navbar-toggler {
    border: none;
    padding: 8px 10px;
    border-radius: 8px;
    background: transparent;
    position: relative;
    width: 40px;
    height: 40px;
}

.navbar-toggler:focus {
    box-shadow: none;
    outline: 2px solid rgba(56, 178, 172, 0.3);
}

.navbar-toggler span {
    display: block;
    width: 20px;
    height: 2px;
    background: #2C7A7B;
    margin: 4px 0;
    transition: all 0.3s ease;
    border-radius: 1px;
}

.navbar-toggler:not(.collapsed) span:nth-child(1) {
    transform: rotate(45deg) translate(5px, 5px);
}

.navbar-toggler:not(.collapsed) span:nth-child(2) {
    opacity: 0;
}

.navbar-toggler:not(.collapsed) span:nth-child(3) {
    transform: rotate(-45deg) translate(7px, -6px);
}

/* Mobile Styles */
@media (max-width: 1199.98px) {
    .navbar-collapse {
        background: linear-gradient(135deg, #0B1426 0%, #1A2942 100%);
        margin: 15px -15px -15px;
        padding: 25px 20px;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 10px 30px rgba(11, 20, 38, 0.3);
    }

    .navbar-nav {
        gap: 0;
    }

    .nav-link {
        color: rgba(255, 255, 255, 0.9) !important;
        padding: 12px 16px !important;
        margin: 4px 0;
        border-radius: 10px;
        font-size: 1rem;
    }

    .nav-link:hover,
    .nav-link.active {
        background: rgba(56, 178, 172, 0.2) !important;
        color: #38B2AC !important;
    }

    .nav-link::after {
        display: none;
    }

    .contact-cta {
        margin-top: 10px;
        text-align: center;
        background: linear-gradient(135deg, #38B2AC 0%, #2C7A7B 100%) !important;
    }

    .modern-dropdown {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.1);
    }

    .dropdown-item {
        color: rgba(255, 255, 255, 0.9);
    }

    .dropdown-item:hover {
        background: rgba(56, 178, 172, 0.2);
        color: white;
    }
}

@media (max-width: 768px) {
    .navbar-logo {
        height: 45px;
    }

    .company-name {
        font-size: 1.1rem;
    }

    .company-tagline {
        font-size: 0.65rem;
    }
}

@media (max-width: 576px) {
    .brand-text {
        display: none;
    }

    .navbar {
        padding: 12px 0;
    }

    .navbar-logo {
        height: 40px;
    }
}

/* Smooth Animations */
.dropdown-menu {
    animation: dropdownSlide 0.3s ease-out;
}

@keyframes dropdownSlide {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Accessibility */
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        transition-duration: 0.01ms !important;
    }
}

/* Focus indicators */
.nav-link:focus,
.dropdown-item:focus {
    outline: 2px solid #38B2AC;
    outline-offset: 2px;
}
</style>