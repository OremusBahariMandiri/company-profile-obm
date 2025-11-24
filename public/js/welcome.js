// Enhanced Welcome.js for PT. Oremus Bahari Mandiri
// Professional Maritime Company Website

document.addEventListener('DOMContentLoaded', function () {
    // Initialize AOS with professional settings
    AOS.init({
        duration: 800,
        easing: 'ease-out-cubic',
        once: true,
        offset: 120,
        delay: 50,
        disable: 'phone' // Disable on mobile for better performance
    });

    // Enhanced Slick Carousel initialization
    initializeClientCarousel();

    // Enhanced Navbar functionality
    initializeNavbar();

    // Enhanced Hero Carousel
    initializeHeroCarousel();

    // Enhanced smooth scrolling
    initializeSmoothScrolling();

    // Initialize map with improved error handling
    setTimeout(() => initializeMap(), 300);

    // Enhanced counter animations
    initializeCounterAnimations();

    // Enhanced WhatsApp widget
    initializeWhatsAppWidget();

    // Enhanced scroll effects
    initializeScrollEffects();

    // Enhanced branch card effects
    initializeBranchCardEffects();

    // Performance optimizations
    initializePerformanceOptimizations();

    // Accessibility improvements
    initializeAccessibilityFeatures();

    // Initialize additional features
    initializeAllFeatures();
});

// Enhanced Client Carousel
function initializeClientCarousel() {
    if ($('.clients-carousel').length) {
        $('.clients-carousel').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3500,
            dots: true,
            arrows: false,
            infinite: true,
            pauseOnHover: true,
            pauseOnFocus: true,
            accessibility: true,
            lazyLoad: 'ondemand',
            speed: 600,
            cssEase: 'cubic-bezier(0.4, 0, 0.2, 1)',
            responsive: [
                {
                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        autoplaySpeed: 3000
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
                        autoplaySpeed: 2500
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        autoplaySpeed: 2000
                    }
                }
            ]
        });
    }
}

// Enhanced Navbar
function initializeNavbar() {
    const navbar = document.querySelector('.navbar');
    if (!navbar) return;

    let lastScrollY = window.scrollY;
    let ticking = false;

    function updateNavbar() {
        const currentScrollY = window.scrollY;

        if (currentScrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }

        lastScrollY = currentScrollY;
        ticking = false;
    }

    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(updateNavbar);
            ticking = true;
        }
    }

    window.addEventListener('scroll', requestTick, { passive: true });
}

// Enhanced Hero Carousel
function initializeHeroCarousel() {
    const heroCarousel = document.querySelector('#heroCarousel');
    if (!heroCarousel) return;

    // Initialize Bootstrap carousel with better settings
    const carousel = new bootstrap.Carousel(heroCarousel, {
        interval: 7000,
        ride: 'carousel',
        pause: 'hover',
        wrap: true,
        keyboard: true,
        touch: true
    });

    // Fixed carousel navigation - remove event listeners to let Bootstrap handle it naturally
    const prevBtn = document.querySelector('.carousel-control-prev');
    const nextBtn = document.querySelector('.carousel-control-next');

    // Remove any existing event listeners and let Bootstrap handle the clicks
    if (prevBtn) {
        prevBtn.style.pointerEvents = 'auto';
        prevBtn.style.zIndex = '10';
    }

    if (nextBtn) {
        nextBtn.style.pointerEvents = 'auto';
        nextBtn.style.zIndex = '10';
    }

    // Fixed indicator controls - let Bootstrap handle it
    document.querySelectorAll('.carousel-indicators [data-bs-target]').forEach(indicator => {
        // Remove our custom handlers and let Bootstrap handle them
        indicator.style.pointerEvents = 'auto';
    });

    // Accessibility improvements
    heroCarousel.addEventListener('focusin', () => carousel.pause());
    heroCarousel.addEventListener('focusout', () => carousel.cycle());

    // Pause on reduced motion preference
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        carousel.pause();
    }

    // Add swipe support for mobile
    let startX = 0;
    let endX = 0;

    heroCarousel.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
    }, { passive: true });

    heroCarousel.addEventListener('touchend', (e) => {
        endX = e.changedTouches[0].clientX;
        handleSwipe();
    }, { passive: true });

    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = startX - endX;

        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                carousel.next();
            } else {
                carousel.prev();
            }
        }
    }
}

// Enhanced smooth scrolling
function initializeSmoothScrolling() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);
            if (!targetElement) return;

            // Close mobile navbar if open
            const navbarCollapse = document.querySelector('.navbar-collapse');
            if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                if (bsCollapse) {
                    bsCollapse.hide();
                }
            }

            // Calculate scroll position with navbar offset
            const navbarHeight = document.querySelector('.navbar').offsetHeight || 0;
            const targetPosition = targetElement.offsetTop - navbarHeight - 20;

            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        });
    });
}

// Enhanced map initialization
function initializeMap() {
    const mapContainer = document.getElementById('map');
    if (!mapContainer) return;

    mapContainer.style.minHeight = "600px";
    mapContainer.style.borderRadius = "20px";
    mapContainer.style.overflow = "hidden";

    try {
        // Initialize map with professional settings
        const map = L.map('map', {
            scrollWheelZoom: false,
            zoomControl: false,
            attributionControl: true,
            fadeAnimation: true,
            zoomAnimation: true,
            markerZoomAnimation: true
        }).setView([-2.5489, 118.0149], 5);

        // Store map reference globally
        window.shipAgencyMap = map;

        // Add tile layer with retina support
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            maxZoom: 18,
            minZoom: 4,
            detectRetina: true
        }).addTo(map);

        // Custom marker icon function
        const createCustomIcon = (color, isMain = false) => {
            const size = isMain ? 35 : 30;
            const iconSize = isMain ? 16 : 14;

            return L.divIcon({
                className: 'custom-div-icon',
                html: `<div style="
                    background: linear-gradient(135deg, ${color} 0%, ${isMain ? '#D69E2E' : '#2C7A7B'} 100%);
                    width: ${size}px;
                    height: ${size}px;
                    border-radius: 50%;
                    border: 3px solid white;
                    box-shadow: 0 4px 15px rgba(11, 20, 38, 0.3);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    position: relative;
                    transition: transform 0.3s ease;
                ">
                    <i class="fas fa-anchor" style="color: white; font-size: ${iconSize}px;"></i>
                    ${isMain ? '<div style="position: absolute; top: -8px; right: -8px; width: 20px; height: 20px; background: #D69E2E; border-radius: 50%; border: 2px solid white; display: flex; align-items: center; justify-content: center;"><i class="fas fa-star" style="color: white; font-size: 8px;"></i></div>' : ''}
                </div>`,
                iconSize: [size, size],
                iconAnchor: [size/2, size/2]
            });
        };

        // Branch offices data (keeping original locations)
        const branchOffices = [
            {
                coords: [-7.231826874003529, 112.72712398431823],
                title: "Main Office - Surabaya",
                content: createPopupContent("Main Office", "Surabaya", "Harbour Nine Business District Block C-16, Jln. Gresik no 16, Surabaya 60177", true),
                color: '#0B1426',
                isMain: true
            },
            {
                coords: [-7.168208955469719, 112.66021777824521],
                title: "Gresik Port",
                content: createPopupContent("Gresik Port", "", "Jl. Lombok No.7 Blok A, RT.02/RW.01, Sidorukun, Kec. Gresik, Kabupaten Gresik, Jawa Timur 61112"),
                color: '#2C7A7B'
            },
            {
                coords: [-6.700637388960823, 111.32297505830293],
                title: "Rembang Port",
                content: createPopupContent("Rembang Port", "", "Kelurahan Magersari RT 02 RW 02, Kecamatan Rembang, Kabupaten Rembang, Central Java"),
                color: '#2C7A7B'
            },
            {
                coords: [-6.876628069969104, 112.40721246864304],
                title: "Lamongan Port",
                content: createPopupContent("Lamongan Port", "", "Jln. Raya Deandels no.16 KM Sby 63.9, Desa Kemantren, Kec. Paciran, Kabupaten Lamongan"),
                color: '#2C7A7B'
            },
            {
                coords: [-1.2745133965490056, 116.81244773977738],
                title: "Balikpapan Port",
                content: createPopupContent("Balikpapan Port", "", "Jln. Prapatan no.14 RT 26, Kelurahan Prapatan, Kecamatan Balikpapan Kota, East Kalimantan"),
                color: '#2C7A7B'
            }
        ];

        // Add markers with enhanced interactions
        branchOffices.forEach(office => {
            const marker = L.marker(office.coords, {
                icon: createCustomIcon(office.color, office.isMain),
                riseOnHover: true
            }).addTo(map);

            marker.bindPopup(office.content, {
                maxWidth: 320,
                className: 'custom-popup',
                closeButton: true,
                autoPan: true
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
                if (this.getElement()) {
                    this.getElement().style.transform = 'scale(1.1)';
                }
            });

            marker.on('mouseout', function() {
                this.closeTooltip();
                if (this.getElement()) {
                    this.getElement().style.transform = 'scale(1)';
                }
            });
        });

        // Add enhanced controls
        L.control.zoom({
            position: 'bottomright'
        }).addTo(map);

        L.control.scale({
            position: 'bottomleft',
            metric: true,
            imperial: false
        }).addTo(map);

        // Add info control
        addMapInfoControl(map);

        // Enhanced resize handling
        const resizeObserver = new ResizeObserver(entries => {
            requestAnimationFrame(() => {
                if (map) map.invalidateSize();
            });
        });
        resizeObserver.observe(mapContainer);

    } catch (error) {
        console.error('Map initialization failed:', error);
        showMapError(mapContainer);
    }
}

// Helper function to create popup content
function createPopupContent(title, subtitle, address, isMain = false) {
    return `
        <div style="padding: 15px; min-width: 280px; font-family: 'Inter', sans-serif;">
            <div style="display: flex; align-items: center; margin-bottom: 12px;">
                <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #0B1426 0%, ${isMain ? '#D69E2E' : '#2C7A7B'} 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                    <i class="fas ${isMain ? 'fa-building' : 'fa-anchor'}" style="color: white; font-size: 16px;"></i>
                </div>
                <div>
                    <h6 style="color: #0B1426; margin: 0; font-weight: 600; font-size: 16px;">${title}</h6>
                    ${subtitle ? `<p style="color: #38B2AC; margin: 0; font-size: 14px; font-weight: 500;">${subtitle}</p>` : ''}
                </div>
            </div>
            <div style="background: linear-gradient(135deg, #F7FAFC 0%, #E2E8F0 100%); padding: 12px; border-radius: 8px; margin-bottom: 10px;">
                <p style="margin: 0; font-size: 14px; color: #4A5568; line-height: 1.5;">
                    <i class="fas fa-map-marker-alt" style="color: #38B2AC; margin-right: 8px;"></i>
                    ${address}
                </p>
            </div>
            ${isMain ? `
                <div style="display: flex; gap: 8px;">
                    <a href="tel:0313557115" style="flex: 1; background: #38B2AC; color: white; padding: 8px 12px; border-radius: 6px; text-decoration: none; text-align: center; font-size: 12px; font-weight: 600;">
                        <i class="fas fa-phone" style="margin-right: 4px;"></i> Call
                    </a>
                    <a href="mailto:commercial@oremus.co.id" style="flex: 1; background: #0B1426; color: white; padding: 8px 12px; border-radius: 6px; text-decoration: none; text-align: center; font-size: 12px; font-weight: 600;">
                        <i class="fas fa-envelope" style="margin-right: 4px;"></i> Email
                    </a>
                </div>
            ` : ''}
        </div>
    `;
}

// Add map info control
function addMapInfoControl(map) {
    const info = L.control({ position: 'topright' });
    info.onAdd = function() {
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
}

// Show map error
function showMapError(container) {
    container.innerHTML = `
        <div style="display: flex; align-items: center; justify-content: center; height: 400px; background: #F7FAFC; border-radius: 20px; color: #4A5568;">
            <div style="text-align: center;">
                <i class="fas fa-map-marked-alt" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.5;"></i>
                <p style="margin: 0; font-size: 16px;">Map temporarily unavailable</p>
                <p style="margin: 8px 0 0; font-size: 14px; opacity: 0.8;">Please try refreshing the page</p>
            </div>
        </div>
    `;
}

// Enhanced counter animations
function initializeCounterAnimations() {
    const counters = document.querySelectorAll('.counter');
    if (counters.length === 0) return;

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
        const suffix = counter.dataset.suffix || '';
        let current = 0;
        const increment = target / 100;
        const duration = 2000;
        const stepTime = duration / 100;

        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            counter.innerText = Math.floor(current) + suffix;
        }, stepTime);
    }
}

// Enhanced WhatsApp widget
function initializeWhatsAppWidget() {
    const whatsappButton = document.querySelector('.whatsapp-button');
    const chatBox = document.querySelector('.whatsapp-chat-box');

    if (!whatsappButton || !chatBox) return;

    const closeButton = document.querySelector('.chat-header-close');
    const chatInput = document.querySelector('.chat-input');
    const sendButton = document.querySelector('.chat-send');
    const chatMessages = document.getElementById('chat-messages');

    // Open/close chat box with enhanced animations
    whatsappButton.addEventListener('click', function () {
        chatBox.classList.toggle('active');
        const badge = whatsappButton.querySelector('.notification-badge');
        if (badge) badge.style.display = 'none';

        if (chatBox.classList.contains('active')) {
            setTimeout(() => {
                if (chatInput) chatInput.focus();
                scrollChatToBottom();
            }, 300);
        }
    });

    if (closeButton) {
        closeButton.addEventListener('click', function () {
            chatBox.classList.remove('active');
        });
    }

    // Enhanced message sending
    function sendMessage(text) {
        if (!text.trim() || !chatMessages) return;

        addUserMessage(text);

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

    function addUserMessage(text) {
        const userMsg = document.createElement('div');
        userMsg.className = 'message message-sent';
        userMsg.innerHTML = `
            <div>${escapeHtml(text)}</div>
            <div class="message-time">${getCurrentTime()}</div>
        `;
        chatMessages.appendChild(userMsg);
    }

    function respondToMessage(text) {
        const responses = getResponse(text.toLowerCase());
        addBotMessage(responses.message, responses.quickReplies);
    }

    function getResponse(text) {
        const responses = {
            service: {
                message: "We offer comprehensive maritime services including ship handling, provision supply, medivac operations, and crew handling. Which service interests you?",
                quickReplies: ['Ship Handling', 'Provision Supply', 'Medivac', 'Crew Handling']
            },
            'ship handling': {
                message: "Our ship handling services include acting as general agents, local agents, and owner protecting agents for various vessel types including tankers, bulk cargo, cruise ships, and offshore vessels.",
                quickReplies: ['Other Services', 'Contact Info', 'Speak to Agent']
            },
            provision: {
                message: "We provide comprehensive provision supply services including food, fresh water, bunker fuel, and essential supplies to vessels, even when anchored.",
                quickReplies: ['Other Services', 'Contact Info', 'Speak to Agent']
            },
            medivac: {
                message: "Our medivac operations support P&I clubs and ship owners in emergencies, including sick crew management, deceased crew handling, and medical evacuations.",
                quickReplies: ['Other Services', 'Contact Info', 'Speak to Agent']
            },
            crew: {
                message: "We handle all crew management aspects including crew changes, visa processing, work permits, and repatriation for domestic and foreign crew.",
                quickReplies: ['Other Services', 'Contact Info', 'Speak to Agent']
            },
            contact: {
                message: "Main Office: Harbour Nine Business District Block C-16, Jln. Gresik no 16, Surabaya 60177. Phone: 0313557115. Email: commercial@oremus.co.id",
                quickReplies: ['Branch Offices', 'Services', 'Speak to Agent']
            },
            port: {
                message: "We operate in major Indonesian ports: Surabaya, Gresik, Rembang, Lamongan, Balikpapan, Telaga Biru Madura, Samboja, Bawean, Samarinda, Probolinggo, Makassar, Bontang, and Tanjung Priok.",
                quickReplies: ['Main Office', 'Services', 'Speak to Agent']
            },
            hello: {
                message: "Hello! Welcome to PT. Oremus Bahari Mandiri. How can I assist you today?",
                quickReplies: ['Services', 'Contact Info', 'Ports Coverage', 'Talk to Agent']
            }
        };

        // Find matching response
        for (const [key, response] of Object.entries(responses)) {
            if (text.includes(key)) {
                return response;
            }
        }

        // Default response
        return {
            message: "I'd be happy to help! Please choose from the options below or ask about our maritime services.",
            quickReplies: ['Services', 'Contact Info', 'Ports Coverage', 'Talk to Agent']
        };
    }

    function addBotMessage(message, quickReplies = []) {
        const botMsg = document.createElement('div');
        botMsg.className = 'message message-received';
        botMsg.innerHTML = `
            <div>${escapeHtml(message)}</div>
            <div class="message-time">${getCurrentTime()}</div>
        `;
        chatMessages.appendChild(botMsg);

        if (quickReplies.length > 0) {
            addQuickReplies(quickReplies);
        }

        scrollChatToBottom();
    }

    function addQuickReplies(replies) {
        const quickRepliesDiv = document.createElement('div');
        quickRepliesDiv.className = 'quick-replies';

        replies.forEach(reply => {
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

    // Event listeners
    if (sendButton && chatInput) {
        sendButton.addEventListener('click', () => sendMessage(chatInput.value));

        chatInput.addEventListener('keypress', function (e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                sendMessage(this.value);
            }
        });

        chatInput.addEventListener('input', function () {
            this.style.height = 'auto';
            this.style.height = Math.min(this.scrollHeight, 120) + 'px';
        });
    }

    // Helper functions
    function showTypingIndicator() {
        const indicator = document.createElement('div');
        indicator.className = 'message message-received typing-indicator-container';
        indicator.innerHTML = `
            <div class="typing-indicator">
                <span></span><span></span><span></span>
            </div>
        `;
        chatMessages.appendChild(indicator);
        scrollChatToBottom();
    }

    function removeTypingIndicator() {
        const indicator = document.querySelector('.typing-indicator-container');
        if (indicator) indicator.remove();
    }

    function scrollChatToBottom() {
        if (chatMessages) {
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
    }

    function getCurrentTime() {
        return new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
}

// Enhanced scroll effects
function initializeScrollEffects() {
    let ticking = false;

    function updateScrollEffects() {
        // Refresh AOS animations
        AOS.refresh();

        // Update map if visible
        if (window.shipAgencyMap && isElementInViewport(document.getElementById('map'))) {
            window.shipAgencyMap.invalidateSize();
        }

        ticking = false;
    }

    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(updateScrollEffects);
            ticking = true;
        }
    }

    window.addEventListener('scroll', requestTick, { passive: true });
}

// Enhanced branch card effects
function initializeBranchCardEffects() {
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
}

// Performance optimizations
function initializePerformanceOptimizations() {
    // Throttle function
    function throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        }
    }

    // Debounce function
    function debounce(func, wait, immediate) {
        let timeout;
        return function() {
            const context = this;
            const args = arguments;
            const later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            const callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }

    // Store functions for global use
    window.throttle = throttle;
    window.debounce = debounce;

    // Performance monitoring
    if ('performance' in window) {
        window.addEventListener('load', () => {
            setTimeout(() => {
                const perfData = performance.getEntriesByType('navigation')[0];
                if (perfData && console.log) {
                    console.log(`Page load time: ${Math.round(perfData.loadEventEnd - perfData.loadEventStart)}ms`);
                }
            }, 0);
        });
    }
}

// Accessibility improvements
function initializeAccessibilityFeatures() {
    // Escape key handling
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const chatBox = document.querySelector('.whatsapp-chat-box');
            if (chatBox && chatBox.classList.contains('active')) {
                chatBox.classList.remove('active');
            }
        }
    });

    // Reduced motion handling
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        // Disable animations for users who prefer reduced motion
        const style = document.createElement('style');
        style.textContent = `
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        `;
        document.head.appendChild(style);
    }

    // Loading state management
    window.addEventListener('load', function() {
        document.body.classList.add('loaded');
    });
}

// Initialize additional features
function initializeAllFeatures() {
    // Lazy loading images
    const images = document.querySelectorAll('img[data-src]');
    if (images.length > 0) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });
        images.forEach(img => imageObserver.observe(img));
    }
}

// Helper function to check viewport
function isElementInViewport(el) {
    if (!el) return false;
    const rect = el.getBoundingClientRect();
    return (
        rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.bottom >= 0 &&
        rect.left <= (window.innerWidth || document.documentElement.clientWidth) &&
        rect.right >= 0
    );
}

// Enhanced error handling
window.addEventListener('error', function(e) {
    console.error('JavaScript error:', {
        message: e.message,
        filename: e.filename,
        lineno: e.lineno,
        colno: e.colno,
        error: e.error
    });
});

window.addEventListener('unhandledrejection', function(e) {
    console.error('Unhandled promise rejection:', e.reason);
    e.preventDefault(); // Prevent the default browser handling
});

// Export functions for global access if needed
window.MaritimeWebsite = {
    initializeClientCarousel,
    initializeNavbar,
    initializeHeroCarousel,
    initializeSmoothScrolling,
    initializeMap,
    initializeCounterAnimations,
    initializeWhatsAppWidget,
    isElementInViewport,
    throttle: window.throttle,
    debounce: window.debounce
};
