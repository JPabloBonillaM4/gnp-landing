<template>
    <section class="opinions" id="como-elegir">
        <div class="opinions__container">
            <!-- Header -->
            <div class="opinions__header">
                <h2 class="opinions__title">Lo que dicen nuestros clientes</h2>
                <p class="opinions__subtitle">Miles de familias ya confían en nosotros</p>
            </div>

            <!-- Cards Grid -->
            <div class="opinions__grid">
                <div
                    v-for="(opinion, index) in opinions"
                    :key="index"
                    class="opinion-card"
                    :class="[
                        `opinion-card--${opinion.color}`,
                        { 'opinion-card--visible': visibleCards[index] }
                    ]"
                    :style="{ '--animation-delay': `${index * 0.2}s` }"
                    ref="cardRefs"
                >
                    <!-- Quote Icon -->
                    <div class="opinion-card__quote-icon">
                        <svg
                            width="60"
                            height="60"
                            viewBox="0 0 60 60"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M15 35C15 29.477 19.477 25 25 25V20C16.716 20 10 26.716 10 35C10 43.284 16.716 50 25 50H30V35H15Z"
                                fill="currentColor"
                                opacity="0.2"
                            />
                            <path
                                d="M35 35C35 29.477 39.477 25 45 25V20C36.716 20 30 26.716 30 35C30 43.284 36.716 50 45 50H50V35H35Z"
                                fill="currentColor"
                                opacity="0.2"
                            />
                        </svg>
                    </div>

                    <!-- Testimonial Text -->
                    <p class="opinion-card__text">{{ opinion.testimonial }}</p>

                    <!-- Client Info -->
                    <div class="opinion-card__client">
                        <img
                            :src="opinion.photo"
                            :alt="opinion.name"
                            class="opinion-card__photo"
                        />
                        <div class="opinion-card__details">
                            <h3 class="opinion-card__name">{{ opinion.name }}</h3>
                            <p class="opinion-card__info">
                                {{ opinion.age }} años, {{ opinion.gender }}, {{ opinion.city }}
                            </p>
                        </div>
                    </div>

                    <!-- Plan Info -->
                    <div class="opinion-card__plan">
                        Eligió el {{ opinion.plan }} y pagó {{ opinion.price }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const opinions = [
    {
        color: 'blue',
        testimonial: '"El proceso fue increíblemente sencillo. Encontré justo lo que necesitaba para proteger a mi familia sin complicaciones."',
        name: 'Roberto Sánchez',
        age: 35,
        gender: 'Masculino',
        city: 'Monterrey',
        plan: 'Plan Básico',
        price: '$1,459/mes',
        photo: '/img/clients/client1.jpg'
    },
    {
        color: 'orange',
        testimonial: '"Me sorprendió lo rápido y fácil que fue contratar. Ahora me siento segura sabiendo que estoy protegida ante cualquier eventualidad."',
        name: 'Laura Páez',
        age: 29,
        gender: 'Femenino',
        city: 'CDMX',
        plan: 'Plan Esencial',
        price: '$1,736/mes',
        photo: '/img/clients/client2.jpg'
    },
    {
        color: 'purple',
        testimonial: '"La cobertura de enfermedades graves fue decisiva para mí. El servicio al cliente es de primer nivel y siempre están atentos."',
        name: 'Carlos Ruiz',
        age: 45,
        gender: 'Masculino',
        city: 'Guadalajara',
        plan: 'Plan Amplio',
        price: '$2,703/mes',
        photo: '/img/clients/client3.jpg'
    }
];

const visibleCards = ref([false, false, false]);
const cardRefs = ref([]);
let observers = [];

onMounted(() => {
    // Create Intersection Observer for each card
    cardRefs.value.forEach((card, index) => {
        if (!card) return;

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        visibleCards.value[index] = true;
                        observer.unobserve(entry.target);
                    }
                });
            },
            {
                threshold: 0.2,
                rootMargin: '0px 0px -50px 0px'
            }
        );

        observer.observe(card);
        observers.push(observer);
    });
});

onUnmounted(() => {
    observers.forEach((observer) => observer.disconnect());
});
</script>

<style scoped>
.opinions {
    padding: 6rem 0;
    background: linear-gradient(to bottom, #ffffff 0%, #f8f9fa 100%);
    overflow: hidden;
}

.opinions__container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 2rem;
}

/* Header */
.opinions__header {
    text-align: center;
    margin-bottom: 4rem;
}

.opinions__title {
    font-size: 2.75rem;
    color: var(--blue-primary);
    margin-bottom: 1rem;
    line-height: 1.2;
}

.opinions__subtitle {
    font-size: 1.25rem;
    color: #6b7280;
    font-weight: 400;
}

/* Grid */
.opinions__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
}

/* Opinion Card */
.opinion-card {
    background: white;
    border-radius: 24px;
    padding: 2.5rem;
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
    position: relative;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;

    /* Initial state for animation */
    opacity: 0;
    transform: translateY(60px) scale(0.95);
    transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1),
                transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    transition-delay: var(--animation-delay);
}

.opinion-card--visible {
    opacity: 1;
    transform: translateY(0) scale(1);
}

.opinion-card:hover {
    transform: translateY(-8px) scale(1);
    box-shadow: 0 30px 80px rgba(0, 0, 0, 0.16);
}

/* Card Colors */
.opinion-card--blue {
    background: linear-gradient(135deg, var(--blue-secondary) 0%, var(--blue-primary) 100%);
    color: white;
}

.opinion-card--orange {
    background: linear-gradient(135deg, var(--orange-secondary) 0%, var(--orange-primary) 100%);
    color: white;
}

.opinion-card--purple {
    background: linear-gradient(135deg, var(--purple-secondary) 0%, var(--purple-primary) 100%);
    color: white;
}

/* Quote Icon */
.opinion-card__quote-icon {
    color: currentColor;
    align-self: flex-start;
}

/* Testimonial Text */
.opinion-card__text {
    font-size: 1.1rem;
    line-height: 1.7;
    font-weight: 400;
    flex: 1;
}

/* Client Info */
.opinion-card__client {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.opinion-card__photo {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid rgba(255, 255, 255, 0.3);
}

.opinion-card__details {
    flex: 1;
}

.opinion-card__name {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 0.25rem;
}

.opinion-card__info {
    font-size: 0.95rem;
    opacity: 0.9;
}

/* Plan Info */
.opinion-card__plan {
    padding: 0.875rem 1.25rem;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.95rem;
    text-align: center;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

/* Responsive Design */

/* Tablet (768px - 1024px) */
@media (max-width: 1024px) {
    .opinions__grid {
        grid-template-columns: 1fr;
        max-width: 600px;
        margin: 0 auto;
    }

    .opinions__title {
        font-size: 2.25rem;
    }

    .opinion-card {
        padding: 2rem;
    }
}

/* Mobile (< 768px) */
@media (max-width: 768px) {
    .opinions {
        padding: 4rem 0;
    }

    .opinions__container {
        padding: 0 1.5rem;
    }

    .opinions__header {
        margin-bottom: 3rem;
    }

    .opinions__title {
        font-size: 2rem;
    }

    .opinions__subtitle {
        font-size: 1.1rem;
    }

    .opinions__grid {
        gap: 1.5rem;
    }

    .opinion-card {
        padding: 1.75rem;
    }

    .opinion-card__text {
        font-size: 1rem;
    }

    .opinion-card__photo {
        width: 50px;
        height: 50px;
    }

    .opinion-card__name {
        font-size: 1.1rem;
    }

    .opinion-card__info {
        font-size: 0.9rem;
    }

    .opinion-card__plan {
        font-size: 0.9rem;
        padding: 0.75rem 1rem;
    }
}

/* Small Mobile (< 480px) */
@media (max-width: 480px) {
    .opinions {
        padding: 3rem 0;
    }

    .opinions__container {
        padding: 0 1rem;
    }

    .opinions__title {
        font-size: 1.75rem;
    }

    .opinions__subtitle {
        font-size: 1rem;
    }

    .opinion-card {
        padding: 1.5rem;
        gap: 1.25rem;
    }

    .opinion-card__quote-icon svg {
        width: 50px;
        height: 50px;
    }
}
</style>