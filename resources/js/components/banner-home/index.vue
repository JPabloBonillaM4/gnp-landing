<template>
    <section id="cotizar" class="hero-section">
        <div class="hero-container">
            <!-- Badge Mobile (visible only on mobile, before form) -->
            <div class="badge-mobile fs-20px">
                <svg class="badge__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
                Cotiza hoy y obtén cobertura inmediata
            </div>

            <!-- Left Content -->
            <ContentLeft class="content-left-wrapper" />

            <!-- Right Form -->
            <FormRight class="form-right-wrapper" />
        </div>
    </section>
</template>

<script setup>
import ContentLeft from './components/content-left.vue';
import FormRight from './components/form-right/index.vue';
</script>

<style scoped>
.hero-section {
    min-height: 100vh;
    background: linear-gradient(to bottom, var(--blue-primary) 0%, var(--blue-secondary) 100%);
    padding: 120px 2rem 4rem;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
}

/* Background decoration */
.hero-section::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 80%;
    height: 150%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.05) 0%, transparent 70%);
    pointer-events: none;
}

.hero-section::after {
    content: '';
    position: absolute;
    bottom: -30%;
    left: -10%;
    width: 50%;
    height: 80%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.03) 0%, transparent 60%);
    pointer-events: none;
}

.hero-container {
    width: 100%;
    max-width: 1360px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 4rem;
    position: relative;
    z-index: 1;
}

/* Badge Mobile */
.badge-mobile {
    display: none;
    padding: 0.5rem 1rem;
    background-color: rgba(255, 255, 255, 0.15);
    border-radius: 50px;
    color: #ffffff;
    font-weight: 600;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    margin: 0 auto;
    gap: 0.5rem;
    align-items: center;
    animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    font-size: 0.85rem !important;
    width: 100%;
    justify-content: center !important;
}

.badge__icon {
    width: 20px;
    height: 20px;
    min-width: 20px;
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive */
@media (max-width: 1024px) {
    .hero-section {
        padding: 100px 1.5rem 3rem;
    }

    .hero-container {
        gap: 3rem;
    }
}

@media (max-width: 768px) {
    .hero-section {
        padding: 100px 1.25rem 2.5rem;
        min-height: auto;
    }

    .hero-container {
        flex-direction: column;
        gap: 2.5rem;
    }
    
    .badge-mobile {
        display: flex;
        order: 1;
    }
    
    .form-right-wrapper {
        order: 2;
    }
    
    .content-left-wrapper {
        order: 3;
    }
}

@media (max-width: 480px) {
    .hero-section {
        padding: 80px 1rem 2rem;
    }

    .hero-container {
        gap: 2rem;
    }
}
</style>