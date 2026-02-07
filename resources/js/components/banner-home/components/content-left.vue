<template>
    <div class="content-left" :class="{ 'content-left--visible': isVisible }" ref="sectionRef">
        <!-- Badge -->
        <div class="badge fs-20px">
            <svg class="badge__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <polyline points="12 6 12 12 16 14"></polyline>
            </svg>
            Cotiza hoy y obtén cobertura inmediata
        </div>

        <!-- Main Title -->
        <h1 class="main-title">
            Protege tu salud<br>
            y tu economía
        </h1>

        <!-- Subtitle -->
        <p class="subtitle fs-20px text-justify">
            Un <strong>Seguro de Gastos Médicos Mayores</strong> que se adapta a ti, con
            el respaldo de <strong>GNP</strong> y acceso a la red médica más sólida del país.
        </p>

        <!-- Benefits Grid -->
        <div class="benefits-grid">
            <div
                v-for="(benefit, index) in benefits"
                :key="index"
                class="benefit-card"
                :style="{ animationDelay: `${0.4 + index * 0.1}s` }"
            >
                <div class="benefit-card__header">
                    <svg class="benefit-card__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        <path d="M9 12l2 2 4-4"/>
                    </svg>
                    <h3 class="benefit-card__title">{{ benefit.title }}</h3>
                </div>
                <p class="benefit-card__description">{{ benefit.description }}</p>
            </div>
        </div>

        <!-- Trust Badges -->
        <div class="trust-badges">
            <span class="trust-badge">Certificado CONDUSEF</span>
            <span class="trust-badge">#1 en siniestros pagados</span>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const isVisible = ref(false);
const sectionRef = ref(null);
let observer = null;

const benefits = [
    {
        title: 'Acceso a toda la red GNP',
        description: 'Hospitales y médicos de alto nivel en todo México.'
    },
    {
        title: 'Libre elección de médicos y hospitales',
        description: 'Tú decides dónde y con quién atenderte.'
    },
    {
        title: 'Red Dentalia incluida',
        description: 'Atención dental preferencial sin trámites complicados.'
    },
    {
        title: 'Paga a Meses Sin Intereses',
        description: 'Cuida tu salud sin descapitalizarte.'
    }
];

onMounted(() => {
    observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    isVisible.value = true;
                }
            });
        },
        { threshold: 0.2 }
    );

    if (sectionRef.value) {
        observer.observe(sectionRef.value);
    }
});

onUnmounted(() => {
    if (observer) {
        observer.disconnect();
    }
});
</script>

<style scoped>
.content-left {
    color: #ffffff;
    max-width: 47.5%;
    opacity: 0;
    transform: translateX(-50px);
    transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
}

.content-left--visible {
    opacity: 1;
    transform: translateX(0);
}

/* Badge */
.badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background-color: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    padding: 0.625rem 1.25rem;
    border-radius: 50px;
    margin-bottom: 1.5rem;
    animation: fadeInDown 0.6s ease-out forwards;
}

.badge__icon {
    width: 18px;
    height: 18px;
    color: #ffffff;
    flex-shrink: 0;
}

/* Main Title */
.main-title {
    font-size: 4.5rem;
    font-weight: 700;
    line-height: 1.1;
    margin-bottom: 1.5rem;
    animation: fadeInUp 0.6s ease-out 0.1s forwards;
    opacity: 0;
}

/* Subtitle */
.subtitle {
    line-height: 1.6;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 2rem;
    animation: fadeInUp 0.6s ease-out 0.2s forwards;
    opacity: 0;
}

.subtitle strong {
    color: #ffffff;
    font-weight: 600;
}

/* Benefits Grid */
.benefits-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 0.75rem;
    margin-bottom: 2rem;
}

.benefit-card {
    background-color: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(10px);
    border-radius: 12px;
    padding: 1rem;
    transition: all 0.3s ease;
    animation: fadeInUp 0.6s ease-out forwards;
    opacity: 0;
    font-size: 17.5px !important;
}

.benefit-card:hover {
    background-color: rgba(255, 255, 255, 0.18);
    transform: translateY(-4px);
}

.benefit-card__header {
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
    margin-bottom: 0.5rem;
}

.benefit-card__icon {
    width: 22px;
    height: 22px;
    color: #ffffff;
    flex-shrink: 0;
    margin-top: 2px;
}

.benefit-card__title {
    font-weight: 600;
    line-height: 1.3;
}

.benefit-card__description {
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.5;
}

/* Trust Badges */
.trust-badges {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    animation: fadeInUp 0.6s ease-out 0.8s forwards;
    opacity: 0;
}

.trust-badge {
    display: inline-flex;
    align-items: center;
    padding: 0.25rem 0.5rem;
    background-color: rgba(255, 255, 255, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    font-size: 0.85rem;
    font-weight: 500;
}

/* Animations */
@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

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
    .main-title {
        font-size: 2.75rem;
    }

    .subtitle {
        font-size: 1.05rem;
    }
}

@media (max-width: 768px) {
    .content-left {
        max-width: 100%;
        text-align: center;
    }

    .badge {
        display: none;
    }

    .main-title {
        font-size: 2.25rem;
    }

    .subtitle {
        font-size: 1rem;
    }

    .benefits-grid {
        grid-template-columns: 1fr;
        gap: 0.75rem;
    }

    .benefit-card {
        text-align: left;
    }

    .trust-badges {
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .main-title {
        font-size: 1.875rem;
    }

    .subtitle {
        font-size: 0.95rem;
    }

    .benefit-card {
        padding: 1rem;
    }

    .benefit-card__title {
        font-size: 0.9rem;
    }

    .benefit-card__description {
        font-size: 0.8rem;
    }

    .trust-badges {
        flex-direction: column;
        align-items: center;
    }

    .trust-badge {
        font-size: 0.8rem;
    }
}
</style>