<template>
    <section class="hero-section">
        <div class="hero-container">
            <!-- Left Content -->
            <ContentLeft />
            <!-- Right Form -->
            <FormRight />
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