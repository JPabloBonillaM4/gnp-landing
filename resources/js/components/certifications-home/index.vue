<template>
    <section class="certifications">
        <div class="certifications__container">
            <!-- Header -->
            <div class="certifications__header">
                <h2 class="certifications__title">Respaldado por las mejores certificaciones</h2>
                <p class="certifications__subtitle">Tu confianza es nuestra prioridad</p>
            </div>

            <!-- Stats Grid -->
            <div class="certifications__stats">
                <div
                    v-for="(stat, index) in stats"
                    :key="index"
                    class="stat-card"
                    :class="{ 'stat-card--visible': visibleStats[index] }"
                    :style="{ '--animation-delay': `${index * 0.15}s` }"
                    ref="statRefs"
                >
                    <div class="stat-card__icon" v-html="stat.icon"></div>
                    <div class="stat-card__value">{{ stat.value }}</div>
                    <div class="stat-card__label">{{ stat.label }}</div>
                </div>
            </div>

            <!-- Certifications Grid -->
            <div class="certifications__badges">
                <div
                    v-for="(badge, index) in badges"
                    :key="index"
                    class="cert-badge"
                    :class="[
                        { 'cert-badge--visible': visibleBadges[index] },
                        { 'cert-badge--span-full': index === 2 }
                    ]"
                    :style="{ '--animation-delay': `${(stats.length * 0.15) + (index * 0.15)}s` }"
                    ref="badgeRefs"
                >
                    <div class="cert-badge__icon" :style="{ color: badge.color }" v-html="badge.icon"></div>
                    <div class="cert-badge__content">
                        <div class="cert-badge__title">{{ badge.title }}</div>
                        <div class="cert-badge__subtitle">{{ badge.subtitle }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const stats = [
    {
        icon: `<svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2L4 6V11C4 16.55 7.84 21.74 13 23C18.16 21.74 22 16.55 22 11V6L12 2Z" 
            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
        </svg>`,
        value: '150,000+',
        label: 'Familias protegidas'
    },
    {
        icon: `<svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" fill="none"/>
            <path d="M8 12L11 15L16 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>`,
        value: '98%',
        label: 'Satisfacción del cliente'
    },
    {
        icon: `<svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="12" cy="8" r="6" stroke="currentColor" stroke-width="1.5"/>
        </svg>`,
        value: '#1',
        label: 'En siniestros pagados'
    },
    {
        icon: `<svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <polyline points="17 6 23 6 23 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>`,
        value: '24/7',
        label: 'Atención continua'
    }
];

const badges = [
    {
        icon: `<svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2L4 6V11C4 16.55 7.84 21.74 13 23C18.16 21.74 22 16.55 22 11V6L12 2Z" 
            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
        </svg>`,
        title: 'Certificado',
        subtitle: 'CONDUSEF',
        color: 'var(--blue-primary)'
    },
    {
        icon: `<svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="12" cy="8" r="6" fill="currentColor"/>
            <path d="M12 14L8 18H16L12 14Z" fill="currentColor"/>
            <rect x="11" y="17" width="2" height="5" fill="currentColor"/>
        </svg>`,
        title: 'Respaldo',
        subtitle: 'GNP Seguros',
        color: 'var(--orange-primary)'
    },
    {
        icon: `<svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" fill="none"/>
            <path d="M8 12L11 15L16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>`,
        title: 'AMASFAC',
        subtitle: 'Calidad certificada',
        color: 'var(--green-primary)'
    }
];

const visibleStats = ref([false, false, false, false]);
const visibleBadges = ref([false, false, false]);
const statRefs = ref([]);
const badgeRefs = ref([]);
let observers = [];

onMounted(() => {
    // Observe stats
    statRefs.value.forEach((stat, index) => {
        if (!stat) return;

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        visibleStats.value[index] = true;
                        observer.unobserve(entry.target);
                    }
                });
            },
            {
                threshold: 0.3,
                rootMargin: '0px 0px -100px 0px'
            }
        );

        observer.observe(stat);
        observers.push(observer);
    });

    // Observe badges
    badgeRefs.value.forEach((badge, index) => {
        if (!badge) return;

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        visibleBadges.value[index] = true;
                        observer.unobserve(entry.target);
                    }
                });
            },
            {
                threshold: 0.3,
                rootMargin: '0px 0px -100px 0px'
            }
        );

        observer.observe(badge);
        observers.push(observer);
    });
});

onUnmounted(() => {
    observers.forEach((observer) => observer.disconnect());
});
</script>

<style scoped>
.certifications {
    background: linear-gradient(90deg, var(--blue-primary) 0%, var(--blue-secondary) 100%);
    padding: 6rem 0;
    color: white;
    position: relative;
    overflow: hidden;
}

.certifications::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.03) 0%, transparent 50%),
                      radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.03) 0%, transparent 50%);
    pointer-events: none;
}

.certifications__container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 2rem;
    position: relative;
    z-index: 1;
}

/* Header */
.certifications__header {
    text-align: center;
    margin-bottom: 4rem;
}

.certifications__title {
    font-size: 2.75rem;
    font-weight: 700;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.certifications__subtitle {
    font-size: 1.25rem;
    font-weight: 400;
    opacity: 0.9;
}

/* Stats Grid */
.certifications__stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 2rem;
    margin-bottom: 4rem;
}

.stat-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    padding: 2.5rem 1.5rem;
    text-align: center;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);

    /* Initial state */
    opacity: 0;
    transform: translateY(50px) scale(0.9);
    transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1),
                transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    transition-delay: var(--animation-delay);
}

.stat-card--visible {
    opacity: 1;
    transform: translateY(0) scale(1);
}

.stat-card:hover {
    background: rgba(255, 255, 255, 0.15);
    transform: translateY(-8px) scale(1);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
}

.stat-card__icon {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 1.25rem;
    color: white;
}

.stat-card__value {
    font-size: 2.75rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    line-height: 1;
}

.stat-card__label {
    font-size: 1rem;
    font-weight: 500;
    opacity: 0.9;
    line-height: 1.3;
}

/* Certifications Badges */
.certifications__badges {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
    max-width: 1000px;
    margin: 0 auto;
}

.cert-badge {
    background: white;
    color: #333;
    border-radius: 16px;
    padding: 2rem 2.5rem;
    display: flex;
    align-items: center;
    gap: 1.5rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);

    /* Initial state */
    opacity: 0;
    transform: translateY(50px) scale(0.9);
    transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1),
                transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    transition-delay: var(--animation-delay);
}

.cert-badge--visible {
    opacity: 1;
    transform: translateY(0) scale(1);
}

.cert-badge:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.cert-badge__icon {
    flex-shrink: 0;
}

.cert-badge__content {
    flex: 1;
    text-align: left;
}

.cert-badge__title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.25rem;
}

.cert-badge__subtitle {
    font-size: 0.95rem;
    font-weight: 500;
    color: #6b7280;
}

/* Responsive Design */

/* Tablet (768px - 1024px) */
@media (max-width: 1024px) {
    .certifications__stats {
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }

    .certifications__badges {
        grid-template-columns: 1fr;
        max-width: 500px;
    }

    .certifications__title {
        font-size: 2.25rem;
    }

    .stat-card {
        padding: 2rem 1.25rem;
    }

    .stat-card__value {
        font-size: 2.25rem;
    }
}

/* Mobile (< 768px) */
@media (max-width: 768px) {
    .certifications {
        padding: 4rem 0;
    }

    .certifications__container {
        padding: 0 1.5rem;
    }

    .certifications__header {
        margin-bottom: 3rem;
    }

    .certifications__title {
        font-size: 2rem;
    }

    .certifications__subtitle {
        font-size: 1.1rem;
    }

    .certifications__stats {
        grid-template-columns: repeat(2, 1fr);
        gap: 1.25rem;
        margin-bottom: 3rem;
    }

    .stat-card {
        padding: 1.75rem 1.25rem;
    }

    .stat-card__icon svg {
        width: 50px;
        height: 50px;
    }

    .stat-card__value {
        font-size: 2rem;
    }

    .stat-card__label {
        font-size: 0.95rem;
    }

    .certifications__badges {
        grid-template-columns: repeat(2, 1fr);
        max-width: 100%;
    }

    .cert-badge {
        padding: 1.5rem 1.75rem;
        gap: 1.25rem;
    }

    .cert-badge--span-full {
        grid-column: 1 / -1;
    }

    .cert-badge__icon svg {
        width: 40px;
        height: 40px;
    }

    .cert-badge__title {
        font-size: 1rem;
    }

    .cert-badge__subtitle {
        font-size: 0.9rem;
    }
}

/* Small Mobile (< 480px) */
@media (max-width: 480px) {
    .certifications {
        padding: 3rem 0;
    }

    .certifications__container {
        padding: 0 1rem;
    }

    .certifications__title {
        font-size: 1.75rem;
    }

    .certifications__subtitle {
        font-size: 1rem;
    }

    .certifications__header {
        margin-bottom: 2.5rem;
    }

    .stat-card {
        padding: 1.5rem 1rem;
    }

    .stat-card__value {
        font-size: 1.75rem;
    }

    .cert-badge {
        padding: 1.25rem 1.5rem;
        flex-direction: column;
        text-align: center;
    }

    .cert-badge__content {
        text-align: center;
    }
}
</style>