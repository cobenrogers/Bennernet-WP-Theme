/**
 * Bennernet Theme JavaScript
 *
 * @package Bennernet
 */

(function() {
    'use strict';

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const menuToggle = document.querySelector('.menu-toggle');
        const navMenu = document.querySelector('.nav-menu');

        if (!menuToggle || !navMenu) return;

        menuToggle.addEventListener('click', function() {
            const expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);
            navMenu.classList.toggle('is-open');
            this.classList.toggle('is-open');
        });

        // Close menu on outside click
        document.addEventListener('click', function(e) {
            if (!menuToggle.contains(e.target) && !navMenu.contains(e.target)) {
                menuToggle.setAttribute('aria-expanded', 'false');
                navMenu.classList.remove('is-open');
                menuToggle.classList.remove('is-open');
            }
        });

        // Close menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && navMenu.classList.contains('is-open')) {
                menuToggle.setAttribute('aria-expanded', 'false');
                navMenu.classList.remove('is-open');
                menuToggle.classList.remove('is-open');
                menuToggle.focus();
            }
        });
    }

    /**
     * Header Search Toggle
     */
    function initHeaderSearch() {
        const searchToggle = document.querySelector('.search-toggle');
        const headerSearch = document.querySelector('.header-search');
        const searchField = document.querySelector('.header-search-form .search-field');

        if (!searchToggle || !headerSearch) return;

        searchToggle.addEventListener('click', function(e) {
            e.preventDefault();
            headerSearch.classList.toggle('is-open');

            // Focus on search field when opened
            if (headerSearch.classList.contains('is-open') && searchField) {
                setTimeout(() => searchField.focus(), 100);
            }
        });

        // Close on outside click
        document.addEventListener('click', function(e) {
            if (!headerSearch.contains(e.target)) {
                headerSearch.classList.remove('is-open');
            }
        });

        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && headerSearch.classList.contains('is-open')) {
                headerSearch.classList.remove('is-open');
                searchToggle.focus();
            }
        });
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    e.preventDefault();
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });

                    // Update focus for accessibility
                    targetElement.setAttribute('tabindex', '-1');
                    targetElement.focus();
                }
            });
        });
    }

    /**
     * Homepage Slider
     */
    function initSlider() {
        const slider = document.querySelector('.homepage-slider');
        if (!slider) return;

        const slides = slider.querySelectorAll('.slider-item');
        const prevBtn = slider.querySelector('.slider-prev');
        const nextBtn = slider.querySelector('.slider-next');
        const dots = slider.querySelectorAll('.slider-dot');

        let currentSlide = 0;
        let autoplayInterval;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('is-active', i === index);
                if (dots[i]) {
                    dots[i].classList.toggle('is-active', i === index);
                }
            });
            currentSlide = index;
        }

        function nextSlide() {
            showSlide((currentSlide + 1) % slides.length);
        }

        function prevSlide() {
            showSlide((currentSlide - 1 + slides.length) % slides.length);
        }

        function startAutoplay() {
            autoplayInterval = setInterval(nextSlide, 5000);
        }

        function stopAutoplay() {
            clearInterval(autoplayInterval);
        }

        // Event listeners
        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                prevSlide();
                stopAutoplay();
                startAutoplay();
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                nextSlide();
                stopAutoplay();
                startAutoplay();
            });
        }

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                showSlide(index);
                stopAutoplay();
                startAutoplay();
            });
        });

        // Keyboard navigation
        slider.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                prevSlide();
                stopAutoplay();
                startAutoplay();
            } else if (e.key === 'ArrowRight') {
                nextSlide();
                stopAutoplay();
                startAutoplay();
            }
        });

        // Pause on hover
        slider.addEventListener('mouseenter', stopAutoplay);
        slider.addEventListener('mouseleave', startAutoplay);

        // Initialize
        showSlide(0);
        startAutoplay();
    }

    /**
     * Print Button Enhancement
     */
    function initPrintButton() {
        const printBtns = document.querySelectorAll('.btn-print');

        printBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();

                // Add URL to body for print stylesheet
                document.body.setAttribute('data-url', window.location.href);

                window.print();
            });
        });
    }

    /**
     * Lazy Load Images
     */
    function initLazyLoad() {
        if ('IntersectionObserver' in window) {
            const lazyImages = document.querySelectorAll('img[data-src]');

            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        if (img.dataset.srcset) {
                            img.srcset = img.dataset.srcset;
                        }
                        img.classList.add('is-loaded');
                        imageObserver.unobserve(img);
                    }
                });
            });

            lazyImages.forEach(img => imageObserver.observe(img));
        }
    }

    /**
     * Scroll to Top Button
     */
    function initScrollToTop() {
        const scrollBtn = document.querySelector('.scroll-to-top');
        if (!scrollBtn) return;

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollBtn.classList.add('is-visible');
            } else {
                scrollBtn.classList.remove('is-visible');
            }
        });

        scrollBtn.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    /**
     * Focus Management for Accessibility
     */
    function initFocusManagement() {
        // Add visible focus outlines for keyboard navigation
        document.body.addEventListener('keydown', (e) => {
            if (e.key === 'Tab') {
                document.body.classList.add('keyboard-nav');
            }
        });

        document.body.addEventListener('mousedown', () => {
            document.body.classList.remove('keyboard-nav');
        });
    }

    /**
     * Gallery Lightbox (Simple Implementation)
     */
    function initGallery() {
        const galleryImages = document.querySelectorAll('.gallery-item a');

        galleryImages.forEach(link => {
            link.addEventListener('click', function(e) {
                // Only prevent if it's an image link
                const href = this.getAttribute('href');
                if (href && href.match(/\.(jpg|jpeg|png|gif|webp)$/i)) {
                    e.preventDefault();

                    // Create lightbox
                    const lightbox = document.createElement('div');
                    lightbox.className = 'lightbox';
                    lightbox.innerHTML = `
                        <div class="lightbox-content">
                            <button class="lightbox-close" aria-label="Close">&times;</button>
                            <img src="${href}" alt="">
                        </div>
                    `;

                    document.body.appendChild(lightbox);
                    document.body.style.overflow = 'hidden';

                    // Close handlers
                    const close = () => {
                        lightbox.remove();
                        document.body.style.overflow = '';
                    };

                    lightbox.querySelector('.lightbox-close').addEventListener('click', close);
                    lightbox.addEventListener('click', (e) => {
                        if (e.target === lightbox) close();
                    });
                    document.addEventListener('keydown', (e) => {
                        if (e.key === 'Escape') close();
                    }, { once: true });
                }
            });
        });
    }

    /**
     * Initialize on DOM Ready
     */
    function init() {
        initMobileMenu();
        initHeaderSearch();
        initSmoothScroll();
        initSlider();
        initPrintButton();
        initLazyLoad();
        initScrollToTop();
        initFocusManagement();
        initGallery();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
