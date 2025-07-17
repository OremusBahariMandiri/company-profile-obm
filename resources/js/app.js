// import './bootstrap';
// import.meta.glob(["../images/**"]);

import './bootstrap';
import '../css/app.css';
import * as bootstrap from 'bootstrap';

// Initialize Bootstrap components
window.bootstrap = bootstrap;

// Animate On Scroll library initialization
document.addEventListener('DOMContentLoaded', function() {
    // Navbar behavior
    const navbar = document.querySelector('.navbar');
    if (navbar) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }

    // Initialize dropdown menus
    const dropdownElementList = document.querySelectorAll('.dropdown-toggle');
    const dropdownList = [...dropdownElementList].map(dropdownToggleEl => new bootstrap.Dropdown(dropdownToggleEl));

    // Initialize tooltips
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

    // Ship animation reset
    const shipContainer = document.querySelector('.ship-container');
    if (shipContainer) {
        shipContainer.addEventListener('animationiteration', function() {
            console.log('Ship animation reset');
        });
    }

    // Carousel with pause on hover
    const carousels = document.querySelectorAll('.carousel');
    carousels.forEach(carousel => {
        const carouselInstance = new bootstrap.Carousel(carousel, {
            interval: 5000,
            touch: true
        });

        carousel.addEventListener('mouseenter', () => {
            carouselInstance.pause();
        });

        carousel.addEventListener('mouseleave', () => {
            carouselInstance.cycle();
        });
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
            }
        });
    });

    // Add floating animation to elements with .floating class
    const floatingElements = document.querySelectorAll('.floating');
    floatingElements.forEach((element, index) => {
        element.style.animationDelay = `${index * 0.2}s`;
    });

    // Add maritime animation elements
    addMaritimeAnimations();
});

// Function to add random maritime animations
function addMaritimeAnimations() {
    // Add bubbles
    const sectionsForBubbles = document.querySelectorAll('.section');
    sectionsForBubbles.forEach(section => {
        if (Math.random() > 0.7) { // Add to some sections randomly
            createBubbles(section);
        }
    });
}

// Create bubble animation
function createBubbles(element) {
    const bubbleContainer = document.createElement('div');
    bubbleContainer.className = 'bubble-container';
    bubbleContainer.style.cssText = `
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        pointer-events: none;
        z-index: 1;
    `;

    // Create multiple bubbles
    for (let i = 0; i < 15; i++) {
        createBubble(bubbleContainer);
    }

    element.appendChild(bubbleContainer);
    element.style.position = element.style.position || 'relative';
}

// Create individual bubble
function createBubble(container) {
    const bubble = document.createElement('div');
    const size = Math.random() * 20 + 5; // Random size between 5-25px
    const positionLeft = Math.random() * 100; // Random horizontal position
    const delay = Math.random() * 15; // Random delay for animation start
    const duration = Math.random() * 10 + 10; // Random duration between 10-20s

    bubble.className = 'bubble';
    bubble.style.cssText = `
        position: absolute;
        bottom: -${size * 2}px;
        left: ${positionLeft}%;
        width: ${size}px;
        height: ${size}px;
        background-color: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        animation: rise ${duration}s linear ${delay}s infinite;
        z-index: 1;
    `;

    // Add keyframes for the rise animation if not already added
    if (!document.getElementById('bubble-animation')) {
        const style = document.createElement('style');
        style.id = 'bubble-animation';
        style.innerHTML = `
            @keyframes rise {
                0% {
                    transform: translateY(0) rotate(0);
                    opacity: 0.5;
                }
                25% {
                    transform: translateY(-25vh) translateX(${Math.random() * 10 - 5}px) rotate(${Math.random() * 360}deg);
                    opacity: 0.7;
                }
                50% {
                    transform: translateY(-50vh) translateX(${Math.random() * 20 - 10}px) rotate(${Math.random() * 720}deg);
                    opacity: 0.5;
                }
                75% {
                    transform: translateY(-75vh) translateX(${Math.random() * 30 - 15}px) rotate(${Math.random() * 1080}deg);
                    opacity: 0.3;
                }
                100% {
                    transform: translateY(-100vh) translateX(${Math.random() * 40 - 20}px) rotate(${Math.random() * 1440}deg);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }

    container.appendChild(bubble);

    // Remove and recreate bubble after animation completes to save resources
    setTimeout(() => {
        bubble.remove();
        createBubble(container);
    }, (duration + delay) * 1000);
}