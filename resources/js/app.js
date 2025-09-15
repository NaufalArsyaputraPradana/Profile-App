import './bootstrap';

// Enhanced interactions for the portfolio
document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize AOS
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    }

    // Smooth scroll behavior
    const smoothScroll = {
        init: function() {
            const links = document.querySelectorAll('a[href^="#"]');
            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        }
    };

    // Typing animation
    const typeWriter = {
        init: function() {
            const elements = document.querySelectorAll('.typewriter');
            elements.forEach(element => {
                this.animate(element);
            });
        },

        animate: function(element) {
            const text = element.textContent;
            element.textContent = '';
            element.style.borderRight = '3px solid #2563eb';
            
            let index = 0;
            const timer = setInterval(() => {
                element.textContent += text.charAt(index);
                index++;
                
                if (index > text.length) {
                    clearInterval(timer);
                    setTimeout(() => {
                        element.style.borderRight = 'none';
                    }, 1000);
                }
            }, 100);
        }
    };

    // Counter animation
    const counters = {
        init: function() {
            const counterElements = document.querySelectorAll('.counter');
            
            const observerOptions = {
                threshold: 0.5
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.animateCounter(entry.target);
                    }
                });
            }, observerOptions);

            counterElements.forEach(counter => observer.observe(counter));
        },

        animateCounter: function(element) {
            const target = parseInt(element.textContent) || 0;
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;

            const timer = setInterval(() => {
                current += step;
                element.textContent = Math.floor(current);
                
                if (current >= target) {
                    element.textContent = target;
                    clearInterval(timer);
                }
            }, 16);
        }
    };

    // Button ripple effect
    const rippleEffect = {
        init: function() {
            const buttons = document.querySelectorAll('.ripple, .btn, button');
            buttons.forEach(button => {
                button.addEventListener('click', this.createRipple);
            });
        },

        createRipple: function(e) {
            const button = e.currentTarget;
            const rect = button.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            const ripple = document.createElement('span');
            ripple.style.cssText = 'position: absolute; width: ' + size + 'px; height: ' + size + 'px; left: ' + x + 'px; top: ' + y + 'px; background: rgba(255, 255, 255, 0.3); border-radius: 50%; transform: scale(0); animation: ripple-animation 0.6s linear; pointer-events: none;';

            button.style.position = 'relative';
            button.style.overflow = 'hidden';
            button.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 600);
        }
    };

    // Initialize all modules
    smoothScroll.init();
    typeWriter.init();
    counters.init();
    rippleEffect.init();
});
