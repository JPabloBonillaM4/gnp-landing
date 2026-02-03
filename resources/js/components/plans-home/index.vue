<template>
    <section class="plans-section">
        <div class="plans-container">
            <!-- Section Header -->
            <div class="plans-header">
                <h2 class="plans-title">Elige el plan perfecto para ti</h2>
            </div>

            <!-- Cards Component -->
            <Cards />

            <!-- Choose Plan Component -->
            <ChoosePlan />
        </div>
    </section>
</template>

<script setup>
import Cards from './components/cards.vue';
import ChoosePlan from './components/choose_plan.vue';
</script>

<style scoped>
.plans-section {
    padding: 5rem 2rem;
    /* background-color: #fff; */
}

.plans-container {
    max-width: 1280px;
    margin: 0 auto;
}

.plans-header {
    text-align: center;
    margin-bottom: 3rem;
}

.plans-title {
    font-size: 2.5rem;
    color: var(--blue-primary);
}

/* Responsive */
@media (max-width: 768px) {
    .plans-section {
        padding: 3rem 1.5rem;
    }

    .plans-title {
        font-size: 2rem;
    }
}

@media (max-width: 480px) {
    .plans-section {
        padding: 2.5rem 1rem;
    }

    .plans-title {
        font-size: 1.75rem;
    }
}
</style>