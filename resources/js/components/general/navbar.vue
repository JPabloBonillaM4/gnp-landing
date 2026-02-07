<template>
    <nav class="navbar" :class="{ 'navbar--visible': isVisible }">
        <!-- Logo Section -->
        <div class="navbar__logo">
            <a href="/">
                <img src="/img/logo.png" alt="GNP Seguros" class="navbar__logo-img" />
            </a>
        </div>

        <!-- Navigation Links (Desktop) -->
        <div class="navbar__links">
            <a href="#coberturas" class="navbar__link" @click.prevent="scrollToSection('coberturas')">Coberturas</a>
            <a href="#beneficios" class="navbar__link" @click.prevent="scrollToSection('beneficios')">Beneficios</a>
            <a href="#como-elegir" class="navbar__link" @click.prevent="scrollToSection('como-elegir')">Cómo elegir</a>
        </div>

        <!-- CTA Button (Desktop) -->
        <a href="#cotizar" class="navbar__cta navbar__cta--desktop" @click.prevent="scrollToSection('cotizar')">
            Cotizar ahora
        </a>

        <!-- Mobile Menu Button -->
        <button
            class="navbar__hamburger"
            :class="{ 'navbar__hamburger--active': isMobileMenuOpen }"
            @click="toggleMobileMenu"
            aria-label="Menú de navegación"
        >
            <span class="navbar__hamburger-line"></span>
            <span class="navbar__hamburger-line"></span>
            <span class="navbar__hamburger-line"></span>
        </button>

        <!-- Mobile Menu Overlay -->
        <Transition name="fade">
            <div
                v-if="isMobileMenuOpen"
                class="navbar__overlay"
                @click="closeMobileMenu"
            ></div>
        </Transition>

        <!-- Mobile Menu -->
        <Transition name="slide">
            <div v-if="isMobileMenuOpen" class="navbar__mobile-menu">
                <div class="navbar__mobile-links">
                    <a
                        href="#coberturas"
                        class="navbar__mobile-link"
                        @click.prevent="scrollToSection('coberturas')"
                    >
                        Coberturas
                    </a>
                    <a
                        href="#beneficios"
                        class="navbar__mobile-link"
                        @click.prevent="scrollToSection('beneficios')"
                    >
                        Beneficios
                    </a>
                    <a
                        href="#como-elegir"
                        class="navbar__mobile-link"
                        @click.prevent="scrollToSection('como-elegir')"
                    >
                        Cómo elegir
                    </a>
                </div>
                <a
                    href="#cotizar"
                    class="navbar__cta navbar__cta--mobile"
                    @click.prevent="scrollToSection('cotizar')"
                >
                    Cotizar ahora
                </a>
            </div>
        </Transition>
    </nav>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

// Reactive state
const isVisible = ref(false);
const isMobileMenuOpen = ref(false);

// Methods
const toggleMobileMenu = () => {
    isMobileMenuOpen.value = !isMobileMenuOpen.value;
    document.body.style.overflow = isMobileMenuOpen.value ? 'hidden' : '';
};

const closeMobileMenu = () => {
    isMobileMenuOpen.value = false;
    document.body.style.overflow = '';
};

const scrollToSection = (sectionId) => {
    // Close mobile menu if open
    if (isMobileMenuOpen.value) {
        closeMobileMenu();
    }

    // Find the section element
    const element = document.getElementById(sectionId);
    
    if (element) {
        // Calculate offset for fixed navbar (70px height)
        const navbarHeight = 70;
        const elementPosition = element.getBoundingClientRect().top + window.pageYOffset;
        const offsetPosition = elementPosition - navbarHeight;

        // Smooth scroll to section
        window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
        });
    }
};

const handleResize = () => {
    if (window.innerWidth > 768 && isMobileMenuOpen.value) {
        closeMobileMenu();
    }
};

// Lifecycle hooks
onMounted(() => {
    // Trigger entry animation
    setTimeout(() => {
        isVisible.value = true;
    }, 100);

    // Listen for resize events
    window.addEventListener('resize', handleResize);
});

onUnmounted(() => {
    window.removeEventListener('resize', handleResize);
    document.body.style.overflow = '';
});
</script>

<style scoped>
/* Ensure smooth scrolling globally */
:global(html) {
    scroll-behavior: smooth;
}

.navbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 70px;
    background-color: #ffffff;
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
    padding-left: 2rem;

    /* Initial state for animation */
    opacity: 0;
    transform: translateY(-100%);
    transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}

.navbar--visible {
    opacity: 1;
    transform: translateY(0);
}

/* Logo Section */
.navbar__logo {
    display: flex;
    align-items: center;
    height: 100%;
    z-index: 1001;
}

.navbar__logo-img {
    height: 80px;
    width: auto;
    object-fit: cover;
}

/* Navigation Links (Desktop) */
.navbar__links {
    display: flex;
    align-items: center;
    gap: 2.5rem;
    height: 100%;
}

.navbar__link {
    position: relative;
    color: #333333;
    text-decoration: none;
    font-weight: 500;
    font-size: 1.15rem;
    padding: 0.5rem 0;
    transition: color 0.3s ease;
}

.navbar__link::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    width: 0;
    height: 2px;
    background-color: var(--orange-primary);
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    transform: translateX(-50%);
}

.navbar__link:hover {
    color: var(--orange-primary);
}

.navbar__link:hover::after {
    width: 100%;
}

/* CTA Button */
.navbar__cta {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    padding: 0 2rem;
    background-color: var(--orange-secondary);
    color: #ffffff;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    letter-spacing: 0.02em;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.navbar__cta::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        90deg,
        transparent,
        rgba(255, 255, 255, 0.2),
        transparent
    );
    transition: left 0.5s ease;
}

.navbar__cta:hover {
    background-color: var(--orange-primary);;
}

.navbar__cta:hover::before {
    left: 100%;
}

/* Hamburger Menu Button */
.navbar__hamburger {
    display: none;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 5px;
    width: 70px;
    height: 100%;
    background: transparent;
    border: none;
    cursor: pointer;
    z-index: 1001;
    padding: 0;
}

.navbar__hamburger-line {
    display: block;
    width: 24px;
    height: 4px;
    background-color: #333333;
    border-radius: 2px;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}

.navbar__hamburger--active .navbar__hamburger-line:nth-child(1) {
    transform: rotate(45deg) translate(5px, 7.5px);
}

.navbar__hamburger--active .navbar__hamburger-line:nth-child(2) {
    opacity: 0;
    transform: translateX(-10px);
}

.navbar__hamburger--active .navbar__hamburger-line:nth-child(3) {
    transform: rotate(-45deg) translate(5px, -7.5px);
}

/* Mobile Menu Overlay */
.navbar__overlay {
    position: fixed;
    top: 70px;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 999;
}

/* Mobile Menu */
.navbar__mobile-menu {
    position: fixed;
    top: 70px;
    right: 0;
    width: 100%;
    max-width: 320px;
    height: calc(100vh - 70px);
    background-color: #ffffff;
    box-shadow: -4px 0 20px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    display: flex;
    flex-direction: column;
    overflow-y: auto;
}

.navbar__mobile-links {
    display: flex;
    flex-direction: column;
    padding: 1.5rem 0;
    flex: 1;
}

.navbar__mobile-link {
    display: block;
    padding: 1rem 2rem;
    color: #333333;
    text-decoration: none;
    font-weight: 500;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    position: relative;
}

.navbar__mobile-link::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 3px;
    height: 0;
    background-color: var(--orange-primary);
    transition: height 0.3s ease;
}

.navbar__mobile-link:hover {
    color: var(--orange-primary);
    background-color: rgba(221, 117, 57, 0.05);
}

.navbar__mobile-link:hover::before {
    height: 60%;
}

.navbar__cta--mobile {
    margin: 1.5rem;
    height: 56px;
    border-radius: 8px;
}

/* Vue Transitions */
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

.slide-enter-active,
.slide-leave-active {
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}

.slide-enter-from,
.slide-leave-to {
    transform: translateX(100%);
}

.navbar__cta--desktop {
    font-size: 25px;
}

/* Responsive Breakpoints */

/* Tablet (768px - 1024px) */
@media (max-width: 1024px) {
    .navbar__links {
        gap: 1.5rem;
    }

    .navbar__link {
        font-size: 0.9rem;
    }

    .navbar__cta--desktop {
        padding: 0 1.5rem;
        font-size: 0.9rem;
    }
}

/* Mobile (< 768px) */
@media (max-width: 768px) {
    .navbar {
        padding-left: 0;
        justify-content: center;
    }

    .navbar__logo {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
    }

    .navbar__logo-img {
        height: 100px;
    }

    .navbar__links {
        display: none;
    }

    .navbar__cta--desktop {
        display: none;
    }

    .navbar__hamburger {
        display: flex;
        margin-left: auto;
    }
}

/* Small Mobile (< 480px) */
@media (max-width: 480px) {
    .navbar {
        height: 60px;
    }

    .navbar__logo-img {
        height: 40px;
    }

    .navbar__hamburger {
        width: 60px;
    }

    .navbar__overlay {
        top: 60px;
    }

    .navbar__mobile-menu {
        top: 60px;
        height: calc(100vh - 60px);
        max-width: 100%;
    }

    .navbar__mobile-link {
        padding: 1.25rem 1.5rem;
    }

    .navbar__cta--mobile {
        margin: 1rem;
    }
}
</style>