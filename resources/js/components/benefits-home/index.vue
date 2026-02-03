<template>
    <section class="benefits-section" ref="sectionRef">
        <div class="benefits-container">
            <!-- Header -->
            <div class="benefits-header" :class="{ 'benefits-header--visible': isVisible }">
                <h2 class="benefits-title">Beneficios que realmente importan</h2>
                <p class="benefits-subtitle">Diseñado para cuidar de ti y tu familia en cada momento</p>
            </div>

            <!-- Benefits Grid -->
            <div class="benefits-grid">
                <div
                    v-for="(benefit, index) in benefits"
                    :key="index"
                    class="benefit-pill"
                    :class="{ 'benefit-pill--visible': visibleBenefits[index] }"
                    :style="{ animationDelay: `${index * 0.1}s` }"
                >
                    {{ benefit }}
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const isVisible = ref(false);
const visibleBenefits = ref([]);
const sectionRef = ref(null);
let observer = null;

const benefits = [
    'Acceso a la mejor red de hospitales',
    'Asistencia dental con Dentalia',
    'Libre elección de médicos',
    'Médico a domicilio con costo preferente',
    'Cero deducible por accidente',
    'Consulta videollamada gratis',
    'Asistencia Psicológica 2 consultas gratis al mes',
    'Alta tecnología'
];

// Initialize visibility array
visibleBenefits.value = benefits.map(() => false);

onMounted(() => {
    observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    isVisible.value = true;
                    // Stagger the benefit pills animation
                    benefits.forEach((_, index) => {
                        setTimeout(() => {
                            visibleBenefits.value[index] = true;
                        }, 200 + index * 100);
                    });
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
.benefits-section {
    padding: 5rem 2rem;
    background-color: #ffffff;
}

.benefits-container {
    max-width: 1100px;
    margin: 0 auto;
}

/* Header */
.benefits-header {
    text-align: center;
    margin-bottom: 3rem;
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.7s cubic-bezier(0.16, 1, 0.3, 1);
}

.benefits-header--visible {
    opacity: 1;
    transform: translateY(0);
}

.benefits-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--blue-primary);
    margin-bottom: 0.75rem;
}

.benefits-subtitle {
    font-size: 1.1rem;
    color: #666666;
}

/* Benefits Grid */
.benefits-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    justify-content: center;
}

.benefit-pill {
    flex: 0 0 calc(33.333% - 0.75rem);
}

/* Last row adjustment - 2 items as 2-column layout */
.benefits-grid .benefit-pill:nth-last-child(2),
.benefits-grid .benefit-pill:last-child {
    flex: 0 0 calc(50% - 0.5rem);
    max-width: calc(50% - 0.5rem);
}

.benefit-pill {
    border-radius: 12px;
    padding: 1.25rem 1.5rem;
    text-align: center;
    font-size: 1rem;
    font-weight: 600;
    color: var(--blue-primary);
    box-shadow: 0 2px 2px #c5c5c5;
    transition: all 0.3s ease;
    opacity: 0;
    transform: translateY(20px);
}

.benefit-pill--visible {
    opacity: 1;
    transform: translateY(0);
}

.benefit-pill:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 16px #c5c5c5;
}

/* Responsive */
@media (max-width: 1024px) {
    .benefits-grid .benefit-pill:nth-last-child(2) {
        width: 100%;
        justify-self: center;
    }

    .benefits-grid .benefit-pill:last-child {
        width: 60%;
    }
}

@media (max-width: 768px) {
    .benefits-section {
        padding: 3.5rem 1.5rem;
    }

    .benefits-title {
        font-size: 2rem;
    }

    .benefits-subtitle {
        font-size: 1rem;
    }

    .benefits-grid {
        gap: 0.875rem;
    }

    .benefit-pill {
        flex: 0 0 calc(50% - 0.5rem);
    }

    .benefits-grid .benefit-pill:nth-last-child(2),
    .benefits-grid .benefit-pill:last-child {
        flex: 0 0 calc(50% - 0.5rem);
        max-width: calc(50% - 0.5rem);
    }

    .benefit-pill {
        padding: 1rem 1.25rem;
        font-size: 0.95rem;
    }
}

@media (max-width: 480px) {
    .benefits-section {
        padding: 2.5rem 1rem;
    }

    .benefits-title {
        font-size: 1.6rem;
    }

    .benefits-subtitle {
        font-size: 0.95rem;
    }

    .benefits-grid {
        gap: 0.75rem;
    }

    .benefit-pill {
        flex: 0 0 100%;
    }

    .benefits-grid .benefit-pill:nth-last-child(2),
    .benefits-grid .benefit-pill:last-child {
        flex: 0 0 100%;
        max-width: 100%;
    }

    .benefit-pill {
        padding: 1rem;
        font-size: 0.9rem;
    }
}
</style>