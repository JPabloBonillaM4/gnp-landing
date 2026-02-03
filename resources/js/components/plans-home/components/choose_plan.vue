<template>
    <div class="choose-plan" :class="{ 'choose-plan--visible': isVisible }" ref="sectionRef">
        <h3 class="choose-plan__title">Elige el plan perfecto para ti</h3>

        <div class="choose-plan__card">
            <!-- User Info -->
            <div class="choose-plan__user">
                <div class="choose-plan__avatar">
                    <span class="choose-plan__avatar-text">CS</span>
                </div>
                <div class="choose-plan__user-info">
                    <p class="choose-plan__user-name">
                        <strong>Carlos Salazar</strong>
                    </p>
                    <p class="choose-plan__user-subtitle">Ejemplo de cotización</p>
                </div>
            </div>

            <!-- User Details -->
            <div class="choose-plan__details">
                <div class="choose-plan__detail">
                    <span class="choose-plan__detail-label">Edad</span>
                    <span class="choose-plan__detail-value text-blue-primary">35 años</span>
                </div>
                <div class="choose-plan__detail">
                    <span class="choose-plan__detail-label">Género</span>
                    <span class="choose-plan__detail-value text-blue-primary">Masculino</span>
                </div>
                <div class="choose-plan__detail">
                    <span class="choose-plan__detail-label">Ciudad</span>
                    <span class="choose-plan__detail-value text-blue-primary">CDMX</span>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="choose-plan__cta-section">
                <p class="choose-plan__cta-text text-blue-primary">¿Quieres saber tu precio personalizado?</p>
                <button class="choose-plan__cta-btn">
                    ¡Da clic aquí y ponte en contacto ahora!
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const isVisible = ref(false);
const sectionRef = ref(null);
let observer = null;

onMounted(() => {
    observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    isVisible.value = true;
                }
            });
        },
        { threshold: 0.3 }
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
.choose-plan {
    /* background-color: #ffffff; */
    /* border-radius: 16px; */
    /* padding: 2.5rem; */
    /* box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); */
    text-align: center;
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.7s cubic-bezier(0.16, 1, 0.3, 1);
}

.choose-plan--visible {
    opacity: 1;
    transform: translateY(0);
}

.choose-plan__title {
    font-size: 1.75rem;
    color: var(--blue-primary);
    margin-bottom: 2rem;
}

.choose-plan__card {
    max-width: 700px;
    margin: 0 auto;
    background-color: #fbf6f1;
    border-radius: 16px;
    border: 3px solid #e2edfc;
    padding: 1.5rem 2rem;
}

/* User Section */
.choose-plan__user {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    padding: 1rem 2rem;
    border-radius: 50px;
    max-width: 280px;
    margin-left: auto;
    margin-right: auto;
}

.choose-plan__user-name {
    font-size: 1.1rem;
    color: var(--blue-primary);
    margin: 0;
}

.choose-plan__user-subtitle {
    font-size: 0.8rem;
    color: #666666;
    margin: 0;
}

.choose-plan__user-info {
    text-align: left;
}

/* Details Section */
.choose-plan__details {
    display: flex;
    justify-content: space-around;
    gap: 3rem;
    background-color: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    padding: 1rem 2rem;
}

.choose-plan__detail {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.25rem;
}

.choose-plan__detail-label {
    font-size: 0.85rem;
}

.choose-plan__detail-value {
    font-size: 1rem;
    font-weight: 600;
    color: #1a1a1a;
}

/* CTA Section */
.choose-plan__cta-section {
    padding-top: 1rem;
}

.choose-plan__cta-text {
    font-size: 1.25rem;
    font-weight: 600;
    color: #1a1a1a;
    margin-bottom: 0.5rem;
}

.choose-plan__cta-btn {
    width: 100%;
    padding: 0.5rem;
    background: linear-gradient(135deg, var(--orange-primary) 0%, var(--orange-secondary) 100%);
    color: #ffffff;
    border: none;
    border-radius: 8px;
    font-size: 1.25rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.choose-plan__cta-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(221, 117, 57, 0.4);
}

.choose-plan__cta-btn:active {
    transform: translateY(-1px);
}

.choose-plan__avatar {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--blue-primary) 0%, var(--blue-secondary) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.choose-plan__avatar-text {
    color: #ffffff;
    font-weight: 700;
    font-size: 1.1rem;
}

/* Responsive */
@media (max-width: 768px) {
    .choose-plan {
        padding: 2rem 1.5rem;
    }

    .choose-plan__title {
        font-size: 1.35rem;
    }

    .choose-plan__details {
        gap: 2rem;
    }

    .choose-plan__cta-btn {
        padding: 1rem 1.5rem;
        font-size: 1rem;
    }
}

@media (max-width: 480px) {
    .choose-plan {
        padding: 1.5rem 1rem;
    }

    .choose-plan__user {
        flex-direction: column;
        text-align: center;
        border-radius: 16px;
        padding: 1.25rem;
    }

    .choose-plan__user-info {
        text-align: center;
    }

    .choose-plan__details {
        flex-direction: column;
        gap: 1rem;
    }

    .choose-plan__cta-text {
        font-size: 1rem;
    }

    .choose-plan__cta-btn {
        padding: 1rem 1rem;
        font-size: 0.95rem;
    }
}
</style>