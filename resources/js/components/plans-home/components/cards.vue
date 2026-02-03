<template>
    <div class="cards-wrapper">
        <div
            v-for="(plan, index) in plans"
            :key="plan.id"
            class="plan-card"
            :class="[
                `plan-card--${plan.color}`,
                { 'plan-card--visible': visibleCards[index] },
                { 'plan-card--featured': plan.featured }
            ]"
            :style="{ animationDelay: `${index * 0.15}s` }"
            ref="cardRefs"
        >
            <!-- Card Header -->
            <div class="plan-card__header" :class="`plan-card__header--${plan.color}`">
                <div class="plan-card__user">
                    <span class="plan-card__user-name">{{ plan.username }}</span>
                    <span class="plan-card__badge">EJEMPLO</span>
                </div>
                <p class="plan-card__user-info">35 años, Masculino</p>
                <p class="plan-card__user-location">CDMX</p>
                <!--  -->
                <p class="plan-card__label mt-5">Eligió el plan</p>
                <h3 class="plan-card__name">
                    <span v-if="plan.featured">★ </span>{{ plan.name }}<span v-if="plan.featured"> ★</span>
                </h3>
                <!--  -->
                <div class="plan-card__price">
                    <span class="plan-card__price-current">${{ plan.price.toLocaleString() }}</span>
                    <span class="plan-card__price-period">/mes</span>
                    <span class="plan-card__price-original">${{ plan.originalPrice.toLocaleString() }}</span>
                </div>
            </div>

            <!-- Card Body -->
            <div class="plan-card__body">
                <div class="plan-card__features">
                    <p class="plan-card__features-title">Incluye:</p>
                    <ul class="plan-card__features-list">
                        <li
                            v-for="(feature, fIndex) in plan.features"
                            :key="fIndex"
                            class="plan-card__feature"
                        >
                            <svg class="plan-card__feature-icon" :class="`plan-card__feature-icon--${plan.color}`" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span>{{ feature }}</span>
                        </li>
                    </ul>
                </div>

                <button
                    class="plan-card__cta"
                    :class="`plan-card__cta--${plan.color}`"
                >
                    Quiero cotizar mi {{ plan.name }}
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const visibleCards = ref([false, false, false]);
const cardRefs = ref([]);

const plans = [
    {
        id: 1,
        name: 'Plan Básico',
        username : 'Carlos',
        color: 'blue',
        price: 1459,
        originalPrice: 1546,
        featured: false,
        features: [
            'Hospitales: Red Limitada',
            'Suma Asegurada: $15,900,000',
            'Deducible: $15,500 - $40,500',
            'Cero deducible por accidente: Amparado',
            'Coaseguro: 5% - 20%',
            'Cobertura en viajes: Amparada',
            'Membresía Medica Móvil: Amparada'
        ]
    },
    {
        id: 2,
        name: 'Plan Esencial',
        username : 'Carlos',
        color: 'orange',
        price: 1736,
        originalPrice: 1840,
        featured: true,
        features: [
            'Hospitales: Red Amplia',
            'Suma Asegurada: $37,100,000',
            'Deducible: $15,500 - $40,500',
            'Cero deducible por accidente: Amparado',
            'Coaseguro: 5% - 20%',
            'Cobertura en viajes: Amparada',
            'Membresía Medica Móvil: Amparada'
        ]
    },
    {
        id: 3,
        name: 'Plan Amplio',
        username : 'Carlos',
        color: 'purple',
        price: 2703,
        originalPrice: 2865,
        featured: false,
        features: [
            'Hospitales: Red Amplia',
            'Suma Asegurada: $37,100,000',
            'Deducible: $15,500 - $40,500',
            'Cero deducible por accidente: Amparado',
            'Coaseguro: 5% - 20%',
            'Cobertura en viajes: Amparada',
            'Membresía Medica Móvil: Amparada',
            'Emergencia en el extranjero: Amparada',
            'Alta tecnología y medicina de vanguardia'
        ]
    }
];

let observer = null;

onMounted(() => {
    observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const index = cardRefs.value.indexOf(entry.target);
                    if (index !== -1) {
                        setTimeout(() => {
                            visibleCards.value[index] = true;
                        }, index * 150);
                    }
                }
            });
        },
        { threshold: 0.2 }
    );

    cardRefs.value.forEach((card) => {
        if (card) observer.observe(card);
    });
});

onUnmounted(() => {
    if (observer) {
        observer.disconnect();
    }
});
</script>

<style scoped>
.cards-wrapper {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
    margin-bottom: 4rem;
    align-items: start;
}

/* Plan Card Base */
.plan-card {
    background-color: #ffffff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    display: flex;
    flex-direction: column;
    height: 650px;
}

.plan-card--visible {
    opacity: 1;
    transform: translateY(0);
}

.plan-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
}

.plan-card--featured {
    transform: translateY(40px);
}

.plan-card--featured.plan-card--visible {
    transform: translateY(0);
}

.plan-card--featured:hover {
    transform: translateY(-8px);
}

/* Card Header */
.plan-card__header {
    padding: 1.25rem 1.5rem;
    color: #ffffff;
}

.plan-card__header--blue {
    background: linear-gradient(135deg, var(--blue-secondary) 0%, var(--blue-primary) 100%);
}

.plan-card__header--orange {
    background: linear-gradient(135deg, var(--orange-primary) 0%, var(--orange-secondary) 100%);
}

.plan-card__header--purple {
    background: linear-gradient(135deg, var(--purple-primary) 0%, var(--purple-secondary) 100%);
}

.plan-card__user {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 0.25rem;
}

.plan-card__user-name {
    font-weight: 600;
    font-size: 1rem;
}

.plan-card__badge {
    background-color: rgba(255, 255, 255, 0.25);
    padding: 0.15rem 0.5rem;
    border-radius: 4px;
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 0.5px;
}

.plan-card__user-info,
.plan-card__user-location {
    font-size: 0.85rem;
    opacity: 0.9;
    margin: 0;
}

/* Card Body */
.plan-card__body {
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.plan-card__label {
    font-size: 0.85rem;
    color: #fff;
    margin-bottom: 0.25rem;
}

.plan-card__name {
    font-size: 1.25rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: 0.75rem;
}

.plan-card__price {
    display: flex;
    align-items: baseline;
    gap: 0.25rem;
}

.plan-card__price-current {
    font-size: 2rem;
    font-weight: 700;
    color: #fff;
}

.plan-card__price-period {
    font-size: 1rem;
    color: #fff;
}

.plan-card__price-original {
    font-size: 0.9rem;
    color: #999999;
    text-decoration: line-through;
    margin-left: 0.5rem;
    background-color: #f0f0f0;
    padding: 0.15rem 0.4rem;
    border-radius: 4px;
}

/* Features */
.plan-card__features {
    margin-bottom: 1.5rem;
    flex-grow: 1;
}

.plan-card__features-title {
    font-size: 0.9rem;
    font-weight: 600;
    color: #333333;
    margin-bottom: 0.75rem;
}

.plan-card__features-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.plan-card__feature {
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
    font-size: 0.85rem;
    color: #555555;
    margin-bottom: 0.5rem;
    line-height: 1.4;
}

.plan-card__feature-icon {
    width: 16px;
    height: 16px;
    flex-shrink: 0;
    margin-top: 2px;
}

.plan-card__feature-icon--blue {
    color: var(--blue-secondary);
}

.plan-card__feature-icon--orange {
    color: var(--orange-primary);
}

.plan-card__feature-icon--purple {
    color: var(--purple-primary);
}

/* CTA Button */
.plan-card__cta {
    width: 100%;
    padding: 1rem 1.5rem;
    border: none;
    border-radius: 8px;
    font-size: 0.95rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.plan-card__cta--blue {
    background-color: var(--blue-primary);
    color: #ffffff;
}

.plan-card__cta--blue:hover {
    background-color: var(--blue-secondary);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(22, 95, 251, 0.3);
}

.plan-card__cta--orange {
    background-color: var(--orange-primary);
    color: #ffffff;
}

.plan-card__cta--orange:hover {
    background-color: var(--orange-secondary);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(221, 117, 57, 0.4);
}

.plan-card__cta--purple {
    background-color: var(--purple-primary);
    color: #ffffff;
}

.plan-card__cta--purple:hover {
    background-color: var(--purple-secondary);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(153, 19, 250, 0.3);
}

/* Responsive */
@media (max-width: 1024px) {
    .cards-wrapper {
        grid-template-columns: repeat(2, 1fr);
        gap: 1.25rem;
    }
}

@media (max-width: 768px) {
    .cards-wrapper {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .plan-card:last-child {
        max-width: 100%;
    }

    .plan-card--featured {
        transform: translateY(40px);
    }

    .plan-card--featured.plan-card--visible {
        transform: translateY(0);
    }

    .plan-card--featured:hover {
        transform: translateY(-8px);
    }
}

@media (max-width: 480px) {
    .plan-card__header {
        padding: 1rem 1.25rem;
    }

    .plan-card__body {
        padding: 1.25rem;
    }

    .plan-card__price-current {
        font-size: 1.75rem;
    }

    .plan-card__cta {
        padding: 0.875rem 1.25rem;
        font-size: 0.9rem;
    }
}
</style>