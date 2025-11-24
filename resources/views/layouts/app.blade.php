<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="/favicon3.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PT. Oremus Bahari Mandiri - Professional Maritime Services</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="PT. Oremus Bahari Mandiri - Leading maritime services company providing ship handling, provision supply, medivac operations, and crew handling across Indonesian ports.">
    <meta name="keywords" content="maritime services, ship agency, Indonesia ports, ship handling, provision supply, medivac operations">
    <meta name="author" content="PT. Oremus Bahari Mandiri">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="PT. Oremus Bahari Mandiri - Professional Maritime Services">
    <meta property="og:description" content="Leading maritime services company in Indonesia">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">

    <!-- Google Fonts - Professional Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon3.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon3.png">
    <link rel="manifest" href="/site.webmanifest">

    <!-- Theme Meta Tags -->
    <meta name="theme-color" content="#0B1426">
    <meta name="msapplication-TileColor" content="#0B1426">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png?v=3">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- PERBAIKAN KHUSUS: CSS untuk tombol carousel kanan -->
    <style>
 /* OVERRIDE FINAL - MEMAKSA CONTROLS BERFUNGSI */
 body .carousel-control-prev,
    body .carousel-control-next,
    html .carousel-control-prev,
    html .carousel-control-next {
        z-index: 99999 !important;
        pointer-events: all !important;
        cursor: pointer !important;
    }

    body .carousel-overlay,
    html .carousel-overlay {
        pointer-events: none !important;
    }

    body .carousel-content,
    html .carousel-content,
    body .carousel-content *,
    html .carousel-content * {
        pointer-events: none !important;
    }

    body .activity-tabs .nav-link,
    html .activity-tabs .nav-link {
        z-index: 9999 !important;
        pointer-events: all !important;
        cursor: pointer !important;
    }

    /* Custom popup styles */
    .custom-popup .leaflet-popup-content-wrapper {
        border-radius: 12px !important;
        box-shadow: 0 8px 30px rgba(11, 20, 38, 0.15) !important;
        border: 1px solid rgba(56, 178, 172, 0.2) !important;
    }

    .custom-tooltip {
        background: var(--navy-primary) !important;
        color: white !important;
        border: none !important;
        border-radius: 8px !important;
        font-family: 'Inter', sans-serif !important;
        font-weight: 500 !important;
        font-size: 13px !important;
        padding: 8px 12px !important;
        box-shadow: 0 4px 15px rgba(11, 20, 38, 0.3) !important;
    }

    .info-control {
        pointer-events: auto !important;
    }
    </style>
</head>

<body>
    @include('layouts.navbar')

    <main>
        @yield('content')
    </main>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- jQuery and Slick Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- PERBAIKAN KHUSUS: JavaScript untuk tombol carousel kanan -->
    <script>
        // Immediate fix untuk carousel buttons
        (function() {
            let attempts = 0;
            const maxAttempts = 10;

            function fixCarouselButtons() {
                attempts++;
                console.log(`Attempt ${attempts} to fix carousel buttons...`);

                const heroCarousel = document.querySelector('#heroCarousel');
                if (!heroCarousel && attempts < maxAttempts) {
                    setTimeout(fixCarouselButtons, 500);
                    return;
                }

                if (!heroCarousel) {
                    console.error('Carousel not found after maximum attempts');
                    return;
                }

                // Get or create carousel instance
                let carousel;
                try {
                    carousel = bootstrap.Carousel.getOrCreateInstance(heroCarousel);
                } catch (e) {
                    console.error('Failed to get carousel instance:', e);
                    return;
                }

                // Fix tombol kanan (next button)
                const nextButton = heroCarousel.querySelector('.carousel-control-next');
                if (nextButton) {
                    console.log('Fixing next button...');

                    // Remove all existing event listeners by cloning
                    const newNextButton = nextButton.cloneNode(true);
                    nextButton.parentNode.replaceChild(newNextButton, nextButton);

                    // Apply aggressive CSS fixes
                    Object.assign(newNextButton.style, {
                        position: 'absolute',
                        zIndex: '999',
                        pointerEvents: 'auto',
                        cursor: 'pointer',
                        right: '40px',
                        top: '50%',
                        transform: 'translateY(-50%)',
                        width: '60px',
                        height: '60px',
                        background: 'rgba(255, 255, 255, 0.1)',
                        border: '1px solid rgba(255, 255, 255, 0.2)',
                        borderRadius: '50%',
                        backdropFilter: 'blur(10px)',
                        opacity: '0.8',
                        transition: 'all 0.3s ease',
                        display: 'flex',
                        alignItems: 'center',
                        justifyContent: 'center'
                    });

                    // Multiple event handlers
                    const handleNext = function(e) {
                        e.preventDefault();
                        e.stopImmediatePropagation();
                        console.log('Next button triggered!');

                        // Visual feedback
                        newNextButton.style.background = 'rgba(255, 255, 255, 0.3)';
                        newNextButton.style.transform = 'translateY(-50%) scale(1.1)';

                        // Trigger next slide
                        carousel.next();

                        // Reset visual
                        setTimeout(() => {
                            newNextButton.style.background = 'rgba(255, 255, 255, 0.1)';
                            newNextButton.style.transform = 'translateY(-50%)';
                        }, 200);
                    };

                    // Add multiple event types
                    ['click', 'touchstart', 'mousedown'].forEach(eventType => {
                        newNextButton.addEventListener(eventType, handleNext, {
                            capture: true,
                            passive: false
                        });
                    });

                    // Hover effects
                    newNextButton.addEventListener('mouseenter', function() {
                        this.style.opacity = '1';
                        this.style.background = 'rgba(255, 255, 255, 0.2)';
                    });

                    newNextButton.addEventListener('mouseleave', function() {
                        this.style.opacity = '0.8';
                        this.style.background = 'rgba(255, 255, 255, 0.1)';
                    });

                    console.log('Next button fixed successfully');
                }

                // Fix tombol kiri (prev button) untuk konsistensi
                const prevButton = heroCarousel.querySelector('.carousel-control-prev');
                if (prevButton) {
                    console.log('Fixing prev button...');

                    const newPrevButton = prevButton.cloneNode(true);
                    prevButton.parentNode.replaceChild(newPrevButton, prevButton);

                    Object.assign(newPrevButton.style, {
                        position: 'absolute',
                        zIndex: '999',
                        pointerEvents: 'auto',
                        cursor: 'pointer',
                        left: '40px',
                        top: '50%',
                        transform: 'translateY(-50%)',
                        width: '60px',
                        height: '60px',
                        background: 'rgba(255, 255, 255, 0.1)',
                        border: '1px solid rgba(255, 255, 255, 0.2)',
                        borderRadius: '50%',
                        backdropFilter: 'blur(10px)',
                        opacity: '0.8',
                        transition: 'all 0.3s ease',
                        display: 'flex',
                        alignItems: 'center',
                        justifyContent: 'center'
                    });

                    const handlePrev = function(e) {
                        e.preventDefault();
                        e.stopImmediatePropagation();
                        console.log('Prev button triggered!');

                        newPrevButton.style.background = 'rgba(255, 255, 255, 0.3)';
                        newPrevButton.style.transform = 'translateY(-50%) scale(1.1)';

                        carousel.prev();

                        setTimeout(() => {
                            newPrevButton.style.background = 'rgba(255, 255, 255, 0.1)';
                            newPrevButton.style.transform = 'translateY(-50%)';
                        }, 200);
                    };

                    ['click', 'touchstart', 'mousedown'].forEach(eventType => {
                        newPrevButton.addEventListener(eventType, handlePrev, {
                            capture: true,
                            passive: false
                        });
                    });

                    newPrevButton.addEventListener('mouseenter', function() {
                        this.style.opacity = '1';
                        this.style.background = 'rgba(255, 255, 255, 0.2)';
                    });

                    newPrevButton.addEventListener('mouseleave', function() {
                        this.style.opacity = '0.8';
                        this.style.background = 'rgba(255, 255, 255, 0.1)';
                    });
                }

                // Test functions
                window.testCarouselButtons = function() {
                    console.log('Testing carousel buttons...');
                    const nextBtn = document.querySelector('.carousel-control-next');
                    const prevBtn = document.querySelector('.carousel-control-prev');

                    if (nextBtn) {
                        console.log('Next button found, triggering click...');
                        nextBtn.click();
                    }

                    setTimeout(() => {
                        if (prevBtn) {
                            console.log('Prev button found, triggering click...');
                            prevBtn.click();
                        }
                    }, 2000);
                };

                console.log('Carousel buttons fix completed');
            }

            // Start fixing process
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', fixCarouselButtons);
            } else {
                fixCarouselButtons();
            }
        })();

        document.addEventListener('DOMContentLoaded', function () {
            console.log('DOM loaded, initializing scripts...');

            // Initialize AOS with improved settings
            AOS.init({
                duration: 800,
                easing: 'ease-out-cubic',
                once: true,
                offset: 100,
                delay: 100
            });

            // Enhanced Slick Carousel for clients
            $('.clients-carousel').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                dots: true,
                arrows: false,
                infinite: true,
                pauseOnHover: true,
                pauseOnFocus: true,
                accessibility: true,
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
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
                            slidesToScroll: 1,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            dots: true
                        }
                    }
                ]
            });

            // Enhanced Navbar scroll effect
            const navbar = document.querySelector('.navbar');
            let lastScrollY = window.scrollY;

            function updateNavbar() {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
                lastScrollY = window.scrollY;
            }

            window.addEventListener('scroll', updateNavbar, { passive: true });

            // Enhanced smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        // Close mobile navbar if open
                        const navbarCollapse = document.querySelector('.navbar-collapse');
                        if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                            const bsCollapse = new bootstrap.Collapse(navbarCollapse, { hide: true });
                        }

                        // Smooth scroll to target
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // PERBAIKAN: Enhanced Activity Tabs
            const activityTabs = document.querySelectorAll('#activitiesTabs .nav-link');
            const activityTabPanes = document.querySelectorAll('#activitiesTabContent .tab-pane');

            console.log('Activity tabs found:', activityTabs.length);

            function activateTab(clickedTab) {
                const targetId = clickedTab.getAttribute('data-bs-target');
                console.log(`Activating tab with target: ${targetId}`);

                // Remove active class from all tabs and panes
                activityTabs.forEach(t => t.classList.remove('active'));
                activityTabPanes.forEach(pane => {
                    pane.classList.remove('show', 'active');
                });

                // Add active class to clicked tab
                clickedTab.classList.add('active');

                // Show corresponding tab pane
                const targetPane = document.querySelector(targetId);
                if (targetPane) {
                    targetPane.classList.add('show', 'active');
                    console.log(`Tab pane ${targetId} activated successfully`);

                    // Visual feedback
                    clickedTab.style.transform = 'translateY(-3px)';
                    setTimeout(() => {
                        clickedTab.style.transform = 'translateY(-2px)';
                    }, 200);
                } else {
                    console.error(`Target pane ${targetId} not found`);
                }
            }

            activityTabs.forEach((tab, index) => {
                ['click', 'touchstart'].forEach(eventType => {
                    tab.addEventListener(eventType, function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        console.log(`Tab ${index} triggered with event:`, eventType);
                        activateTab(this);
                    }, { passive: false });
                });

                tab.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        activateTab(this);
                    }
                });
            });

            // Initialize map with delay for better loading
            setTimeout(function () {
                initMap();
            }, 200);

            // Enhanced counter animation
            const counters = document.querySelectorAll('.counter');
            const observerOptions = {
                threshold: 0.7,
                rootMargin: '0px 0px -50px 0px'
            };

            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        counterObserver.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            counters.forEach(counter => {
                counterObserver.observe(counter);
            });

            function animateCounter(counter) {
                const target = parseInt(counter.innerText.replace(/[^0-9]/g, ''));
                let current = 0;
                const increment = target / 100;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    counter.innerText = Math.floor(current) + (counter.dataset.suffix || '');
                }, 20);
            }

            // Enhanced WhatsApp Chat Widget
            initWhatsAppWidget();

            // Enhanced scroll-triggered animations
            const scrollElements = document.querySelectorAll('[data-scroll]');
            const elementInView = (el, dividend = 1) => {
                const elementTop = el.getBoundingClientRect().top;
                return (
                    elementTop <= (window.innerHeight || document.documentElement.clientHeight) / dividend
                );
            };

            const displayScrollElement = (element) => {
                element.classList.add('scrolled');
            };

            const hideScrollElement = (element) => {
                element.classList.remove('scrolled');
            };

            const handleScrollAnimation = () => {
                scrollElements.forEach((el) => {
                    if (elementInView(el, 1.25)) {
                        displayScrollElement(el);
                    }
                });
            };

            window.addEventListener('scroll', handleScrollAnimation, { passive: true });

            // Enhanced branch card hover effects
            const branchCards = document.querySelectorAll('.branch-card');
            branchCards.forEach(card => {
                card.addEventListener('mouseenter', function () {
                    this.style.transform = 'translateY(-8px)';
                    this.style.boxShadow = '0 15px 40px rgba(11, 20, 38, 0.18)';
                });

                card.addEventListener('mouseleave', function () {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = '0 4px 20px rgba(11, 20, 38, 0.08)';
                });
            });

            // Enhanced performance optimizations
            const debounce = (func, wait) => {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            };

            const throttle = (func, limit) => {
                let lastFunc;
                let lastRan;
                return function() {
                    const context = this;
                    const args = arguments;
                    if (!lastRan) {
                        func.apply(context, args);
                        lastRan = Date.now();
                    } else {
                        clearTimeout(lastFunc);
                        lastFunc = setTimeout(function() {
                            if ((Date.now() - lastRan) >= limit) {
                                func.apply(context, args);
                                lastRan = Date.now();
                            }
                        }, limit - (Date.now() - lastRan));
                    }
                }
            };

            // Optimized scroll handling
            window.addEventListener('scroll', throttle(function () {
                AOS.refresh();
                if (window.shipAgencyMap) {
                    window.shipAgencyMap.invalidateSize();
                }
            }, 100), { passive: true });

            // Enhanced accessibility
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    // Close WhatsApp widget if open
                    const chatBox = document.querySelector('.whatsapp-chat-box');
                    if (chatBox && chatBox.classList.contains('active')) {
                        chatBox.classList.remove('active');
                    }
                }
            });

            // Improved loading states
            window.addEventListener('load', function() {
                document.body.classList.add('loaded');
                console.log('Page fully loaded');
            });
        });

        // Enhanced WhatsApp Widget Functionality
        function initWhatsAppWidget() {
            const whatsappButton = document.querySelector('.whatsapp-button');
            const chatBox = document.querySelector('.whatsapp-chat-box');
            const closeButton = document.querySelector('.chat-header-close');
            const chatInput = document.querySelector('.chat-input');
            const sendButton = document.querySelector('.chat-send');
            const chatMessages = document.getElementById('chat-messages');
            const quickReplyButtons = document.querySelectorAll('.quick-reply-button');

            if (!whatsappButton || !chatBox) return;

            // Open/close chat box
            whatsappButton.addEventListener('click', function () {
                chatBox.classList.toggle('active');
                const badge = whatsappButton.querySelector('.notification-badge');
                if (badge) badge.style.display = 'none';

                if (chatBox.classList.contains('active')) {
                    setTimeout(() => {
                        if (chatInput) chatInput.focus();
                    }, 300);
                }

                scrollChatToBottom();
            });

            if (closeButton) {
                closeButton.addEventListener('click', function () {
                    chatBox.classList.remove('active');
                });
            }

            // Send message functionality
            function sendMessage(text) {
                if (!text.trim() || !chatMessages) return;

                // Add user message
                const userMsg = document.createElement('div');
                userMsg.className = 'message message-sent';
                userMsg.innerHTML = `
                    <div>${escapeHtml(text)}</div>
                    <div class="message-time">${getCurrentTime()}</div>
                `;
                chatMessages.appendChild(userMsg);

                if (chatInput) {
                    chatInput.value = '';
                    chatInput.style.height = 'auto';
                }

                scrollChatToBottom();
                showTypingIndicator();

                setTimeout(() => {
                    removeTypingIndicator();
                    respondToMessage(text);
                }, 1200);
            }

            // Enhanced bot responses with better context handling
            function respondToMessage(text) {
                if (!chatMessages) return;

                let response = '';
                let quickReplies = [];
                const lowerText = text.toLowerCase();

                // Improved response logic
                if (lowerText.includes('service') || lowerText.includes('what you do')) {
                    response = "We offer comprehensive maritime services including ship handling, provision supply, medivac operations, and crew handling. Which service interests you?";
                    quickReplies = ['Ship Handling', 'Provision Supply', 'Medivac', 'Crew Handling'];
                } else if (lowerText.includes('ship handling')) {
                    response = "Our ship handling services include acting as general agents, local agents, and owner protecting agents for vessels including tankers, bulk cargo, cruise ships, and offshore vessels.";
                    quickReplies = ['Other Services', 'Contact Info', 'Speak to Agent'];
                } else if (lowerText.includes('provision')) {
                    response = "We provide comprehensive provision supply services including food, fresh water, bunker fuel, and essential supplies to vessels, even when anchored.";
                    quickReplies = ['Other Services', 'Contact Info', 'Speak to Agent'];
                } else if (lowerText.includes('medivac') || lowerText.includes('medical')) {
                    response = "Our medivac operations support P&I clubs and ship owners in emergencies, including sick crew management, deceased crew handling, and medical evacuations.";
                    quickReplies = ['Other Services', 'Contact Info', 'Speak to Agent'];
                } else if (lowerText.includes('crew')) {
                    response = "We handle all crew management aspects including crew changes, visa processing, work permits, and repatriation for domestic and foreign crew.";
                    quickReplies = ['Other Services', 'Contact Info', 'Speak to Agent'];
                } else if (lowerText.includes('contact') || lowerText.includes('office')) {
                    response = "Main Office: Harbour Nine Business District Block C-16, Jln. Gresik no 16, Surabaya 60177. Phone: 0313557115. Email: commercial@oremus.co.id";
                    quickReplies = ['Branch Offices', 'Services', 'Speak to Agent'];
                } else if (lowerText.includes('port') || lowerText.includes('branch')) {
                    response = "We operate in major Indonesian ports: Surabaya, Gresik, Rembang, Lamongan, Balikpapan, Telaga Biru Madura, Samboja, Bawean, Samarinda, Probolinggo, Makassar, Bontang, and Tanjung Priok.";
                    quickReplies = ['Main Office', 'Services', 'Speak to Agent'];
                } else if (lowerText.includes('agent') || lowerText.includes('human')) {
                    response = "I'll connect you with our team. Click below to start a WhatsApp chat with our representatives.";
                    quickReplies = ['Connect via WhatsApp'];
                } else if (lowerText.includes('connect') || lowerText.includes('whatsapp')) {
                    window.open('https://wa.me/6285186841616', '_blank');
                    response = "WhatsApp chat opened. If it didn't work, please contact us at +62 851-8684-1616";
                    quickReplies = ['Other Questions'];
                } else if (lowerText.includes('hello') || lowerText.includes('hi')) {
                    response = "Hello! Welcome to PT. Oremus Bahari Mandiri. How can I assist you today?";
                    quickReplies = ['Services', 'Contact Info', 'Ports Coverage', 'Talk to Agent'];
                } else if (lowerText.includes('thank')) {
                    response = "You're welcome! Is there anything else I can help you with?";
                    quickReplies = ['Services', 'Contact Info', 'Talk to Agent'];
                } else if (lowerText.includes('bye') || lowerText.includes('no thanks')) {
                    response = "Thank you for contacting PT. Oremus Bahari Mandiri. Have a great day!";
                } else {
                    response = "I'd be happy to help! Please choose from the options below or ask about our maritime services.";
                    quickReplies = ['Services', 'Contact Info', 'Ports Coverage', 'Talk to Agent'];
                }

                addBotMessage(response, quickReplies);
            }

            function addBotMessage(response, quickReplies = []) {
                const botMsg = document.createElement('div');
                botMsg.className = 'message message-received';
                botMsg.innerHTML = `
                    <div>${escapeHtml(response)}</div>
                    <div class="message-time">${getCurrentTime()}</div>
                `;
                chatMessages.appendChild(botMsg);

                // Add quick replies if any
                if (quickReplies.length > 0) {
                    const quickRepliesDiv = document.createElement('div');
                    quickRepliesDiv.className = 'quick-replies';

                    quickReplies.forEach(reply => {
                        const button = document.createElement('button');
                        button.className = 'quick-reply-button';
                        button.textContent = reply;
                        button.addEventListener('click', function () {
                            sendMessage(this.textContent);
                            this.parentElement.remove();
                        });
                        quickRepliesDiv.appendChild(button);
                    });

                    chatMessages.appendChild(quickRepliesDiv);
                }

                scrollChatToBottom();
            }

            // Send button and enter key events
            if (sendButton && chatInput) {
                sendButton.addEventListener('click', function () {
                    sendMessage(chatInput.value);
                });

                chatInput.addEventListener('keypress', function (e) {
                    if (e.key === 'Enter' && !e.shiftKey) {
                        e.preventDefault();
                        sendMessage(this.value);
                    }
                });

                // Auto-resize textarea
                chatInput.addEventListener('input', function () {
                    this.style.height = 'auto';
                    this.style.height = Math.min(this.scrollHeight, 120) + 'px';
                });
            }

            // Quick reply buttons
            quickReplyButtons.forEach(button => {
                button.addEventListener('click', function () {
                    sendMessage(this.textContent);
                });
            });

            // Helper functions
            function showTypingIndicator() {
                const typingIndicator = document.createElement('div');
                typingIndicator.className = 'message message-received typing-indicator-container';
                typingIndicator.innerHTML = `
                    <div class="typing-indicator">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                `;
                chatMessages.appendChild(typingIndicator);
                scrollChatToBottom();
            }

            function removeTypingIndicator() {
                const typingIndicator = document.querySelector('.typing-indicator-container');
                if (typingIndicator) {
                    typingIndicator.remove();
                }
            }

            function scrollChatToBottom() {
                if (chatMessages) {
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }
            }

            function getCurrentTime() {
                const now = new Date();
                let hours = now.getHours();
                let minutes = now.getMinutes();
                const ampm = hours >= 12 ? 'PM' : 'AM';
                hours = hours % 12;
                hours = hours ? hours : 12;
                minutes = minutes < 10 ? '0' + minutes : minutes;
                return hours + ':' + minutes + ' ' + ampm;
            }

            function escapeHtml(unsafe) {
                return unsafe
                    .replace(/&/g, "&amp;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;")
                    .replace(/"/g, "&quot;")
                    .replace(/'/g, "&#039;");
            }
        }

        // Enhanced Map Initialization
        function initMap() {
            const mapContainer = document.getElementById('map');
            if (!mapContainer) {
                console.error('Map container not found');
                return;
            }

            mapContainer.style.minHeight = "600px";

            try {
                // Initialize map with improved settings
                const map = L.map('map', {
                    scrollWheelZoom: false,
                    zoomControl: false,
                    attributionControl: true
                }).setView([-2.5489, 118.0149], 5);

                // Store map reference globally
                window.shipAgencyMap = map;

                // Enhanced tile layer
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                    maxZoom: 18,
                    minZoom: 4,
                }).addTo(map);

                // Custom icon function
                const createCustomIcon = (color, isMain = false) => {
                    return L.divIcon({
                        className: 'custom-div-icon',
                        html: `<div style="
                            background: linear-gradient(135deg, ${color} 0%, ${isMain ? '#D69E2E' : '#2C7A7B'} 100%);
                            width: ${isMain ? 35 : 30}px;
                            height: ${isMain ? 35 : 30}px;
                            border-radius: 50%;
                            border: 3px solid white;
                            box-shadow: 0 4px 15px rgba(11, 20, 38, 0.3);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            position: relative;
                        ">
                            <i class="fas fa-anchor" style="color: white; font-size: ${isMain ? 16 : 14}px;"></i>
                            ${isMain ? '<div style="position: absolute; top: -8px; right: -8px; width: 20px; height: 20px; background: #D69E2E; border-radius: 50%; border: 2px solid white; display: flex; align-items: center; justify-content: center;"><i class="fas fa-star" style="color: white; font-size: 8px;"></i></div>' : ''}
                        </div>`,
                        iconSize: [isMain ? 35 : 30, isMain ? 35 : 30],
                        iconAnchor: [isMain ? 17 : 15, isMain ? 17 : 15]
                    });
                };

                // Enhanced branch office locations (using original data but with improved styling)
                const branchOffices = [
                    {
                        coords: [-7.231826874003529, 112.72712398431823],
                        title: "Main Office - Surabaya",
                        content: `
                            <div style="padding: 15px; min-width: 280px; font-family: 'Inter', sans-serif;">
                                <div style="display: flex; align-items: center; margin-bottom: 12px;">
                                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #0B1426 0%, #D69E2E 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                                        <i class="fas fa-building" style="color: white; font-size: 16px;"></i>
                                    </div>
                                    <div>
                                        <h6 style="color: #0B1426; margin: 0; font-weight: 600; font-size: 16px;">Main Office</h6>
                                        <p style="color: #38B2AC; margin: 0; font-size: 14px; font-weight: 500;">Surabaya</p>
                                    </div>
                                </div>
                                <div style="background: linear-gradient(135deg, #F7FAFC 0%, #E2E8F0 100%); padding: 12px; border-radius: 8px; margin-bottom: 10px;">
                                    <p style="margin: 0; font-size: 14px; color: #4A5568; line-height: 1.5;">
                                        <i class="fas fa-map-marker-alt" style="color: #38B2AC; margin-right: 8px;"></i>
                                        Harbour Nine Business District Block C-16, Jln. Gresik no 16, Surabaya 60177
                                    </p>
                                </div>
                                <div style="display: flex; gap: 8px;">
                                    <a href="tel:0313557115" style="flex: 1; background: #38B2AC; color: white; padding: 8px 12px; border-radius: 6px; text-decoration: none; text-align: center; font-size: 12px; font-weight: 600;">
                                        <i class="fas fa-phone" style="margin-right: 4px;"></i> Call
                                    </a>
                                    <a href="mailto:commercial@oremus.co.id" style="flex: 1; background: #0B1426; color: white; padding: 8px 12px; border-radius: 6px; text-decoration: none; text-align: center; font-size: 12px; font-weight: 600;">
                                        <i class="fas fa-envelope" style="margin-right: 4px;"></i> Email
                                    </a>
                                </div>
                            </div>
                        `,
                        color: '#0B1426',
                        isMain: true
                    },
                    {
                        coords: [-7.168208955469719, 112.66021777824521],
                        title: "Gresik Port",
                        content: `
                            <div style="padding: 12px; min-width: 260px; font-family: 'Inter', sans-serif;">
                                <h6 style="color: #0B1426; margin-bottom: 8px; font-weight: 600;">Gresik Port</h6>
                                <p style="margin: 5px 0; font-size: 13px; color: #4A5568; line-height: 1.4;">
                                    <i class="fas fa-map-marker-alt" style="color: #38B2AC; margin-right: 6px;"></i>
                                    Jl. Lombok No.7 Blok A, RT.02/RW.01, Sidorukun, Kec. Gresik, Kabupaten Gresik, Jawa Timur 61112
                                </p>
                            </div>
                        `,
                        color: '#2C7A7B'
                    },
                    {
                        coords: [-6.700637388960823, 111.32297505830293],
                        title: "Rembang Port",
                        content: `
                            <div style="padding: 12px; min-width: 260px; font-family: 'Inter', sans-serif;">
                                <h6 style="color: #0B1426; margin-bottom: 8px; font-weight: 600;">Rembang Port</h6>
                                <p style="margin: 5px 0; font-size: 13px; color: #4A5568; line-height: 1.4;">
                                    <i class="fas fa-map-marker-alt" style="color: #38B2AC; margin-right: 6px;"></i>
                                    Kelurahan Magersari RT 02 RW 02, Kecamatan Rembang, Kabupaten Rembang, Central Java
                                </p>
                            </div>
                        `,
                        color: '#2C7A7B'
                    },
                    {
                        coords: [-6.876628069969104, 112.40721246864304],
                        title: "Lamongan Port",
                        content: `
                            <div style="padding: 12px; min-width: 260px; font-family: 'Inter', sans-serif;">
                                <h6 style="color: #0B1426; margin-bottom: 8px; font-weight: 600;">Lamongan Port</h6>
                                <p style="margin: 5px 0; font-size: 13px; color: #4A5568; line-height: 1.4;">
                                    <i class="fas fa-map-marker-alt" style="color: #38B2AC; margin-right: 6px;"></i>
                                    Jln. Raya Deandels no.16 KM Sby 63.9, Desa Kemantren, Kec. Paciran, Kabupaten Lamongan
                                </p>
                            </div>
                        `,
                        color: '#2C7A7B'
                    },
                    {
                        coords: [-1.2745133965490056, 116.81244773977738],
                        title: "Balikpapan Port",
                        content: `
                            <div style="padding: 12px; min-width: 260px; font-family: 'Inter', sans-serif;">
                                <h6 style="color: #0B1426; margin-bottom: 8px; font-weight: 600;">Balikpapan Port</h6>
                                <p style="margin: 5px 0; font-size: 13px; color: #4A5568; line-height: 1.4;">
                                    <i class="fas fa-map-marker-alt" style="color: #38B2AC; margin-right: 6px;"></i>
                                    Jln. Prapatan no.14 RT 26, Kelurahan Prapatan, Kecamatan Balikpapan Kota, East Kalimantan
                                </p>
                            </div>
                        `,
                        color: '#2C7A7B'
                    }
                    // Add other offices following the same pattern if needed
                ];

                // Add markers with enhanced styling
                branchOffices.forEach(office => {
                    const marker = L.marker(office.coords, {
                        icon: createCustomIcon(office.color, office.isMain)
                    }).addTo(map);

                    marker.bindPopup(office.content, {
                        maxWidth: 320,
                        className: 'custom-popup',
                        closeButton: true
                    });

                    marker.bindTooltip(office.title, {
                        permanent: false,
                        direction: 'top',
                        offset: [0, -15],
                        className: 'custom-tooltip'
                    });

                    // Enhanced hover effects
                    marker.on('mouseover', function() {
                        this.openTooltip();
                    });
                    marker.on('mouseout', function() {
                        this.closeTooltip();
                    });
                });

                // Enhanced map controls
                L.control.zoom({
                    position: 'bottomright'
                }).addTo(map);

                L.control.scale({
                    position: 'bottomleft'
                }).addTo(map);

                // Enhanced info control
                const info = L.control({ position: 'topright' });
                info.onAdd = function(map) {
                    this._div = L.DomUtil.create('div', 'info-control');
                    this._div.innerHTML = `
                        <div style="
                            background: rgba(255, 255, 255, 0.95);
                            backdrop-filter: blur(10px);
                            padding: 15px 20px;
                            border-radius: 12px;
                            box-shadow: 0 8px 30px rgba(11, 20, 38, 0.15);
                            font-family: 'Inter', sans-serif;
                            border: 1px solid rgba(56, 178, 172, 0.2);
                            max-width: 250px;
                        ">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <div style="width: 30px; height: 30px; background: linear-gradient(135deg, #38B2AC 0%, #2C7A7B 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 10px;">
                                    <i class="fas fa-anchor" style="color: white; font-size: 12px;"></i>
                                </div>
                                <h6 style="margin: 0; color: #0B1426; font-weight: 600; font-size: 14px;">PT. Oremus Bahari Mandiri</h6>
                            </div>
                            <p style="margin: 0; color: #4A5568; font-size: 12px; line-height: 1.4;">Click markers to view office details and contact information</p>
                        </div>
                    `;
                    return this._div;
                };
                info.addTo(map);

                // Enhanced map resize handling
                const resizeObserver = new ResizeObserver(entries => {
                    map.invalidateSize();
                });
                resizeObserver.observe(mapContainer);

            } catch (error) {
                console.error('Error initializing map:', error);
                mapContainer.innerHTML = `
                    <div style="display: flex; align-items: center; justify-content: center; height: 400px; background: #F7FAFC; border-radius: 20px; color: #4A5568;">
                        <div style="text-align: center;">
                            <i class="fas fa-map-marked-alt" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.5;"></i>
                            <p>Map temporarily unavailable</p>
                        </div>
                    </div>
                `;
            }
        }

        // Helper function to check if element is in viewport
        function isElementInViewport(el) {
            if (!el) return false;
            const rect = el.getBoundingClientRect();
            return (
                rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.bottom >= 0
            );
        }

        // Enhanced performance monitoring
        if ('performance' in window) {
            window.addEventListener('load', () => {
                setTimeout(() => {
                    const perfData = performance.getEntriesByType('navigation')[0];
                    if (perfData) {
                        console.log(`Page load time: ${Math.round(perfData.loadEventEnd - perfData.loadEventStart)}ms`);
                    }
                }, 0);
            });
        }

        // Enhanced error handling
        window.addEventListener('error', function(e) {
            console.error('JavaScript error:', e.error);
        });

        window.addEventListener('unhandledrejection', function(e) {
            console.error('Unhandled promise rejection:', e.reason);
        });
    </script>
</body>

</html>