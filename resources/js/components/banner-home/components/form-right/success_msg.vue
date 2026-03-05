<template>
    <div class="success-message">
        <h2 class="success-title">{{ fullName.toUpperCase() }}</h2>

        <p class="success-intro text-blue-primary">
            Gracias por cotizar tu seguro de <strong>Gastos Médicos</strong> con GNP.
        </p>

        <p class="success-description">
            En breve un asesor especializado se pondrá en contacto contigo para explicarte todos los beneficios de tu póliza.
        </p>

        <div class="content-section">
            <!-- <div class="mb-3 text-blue-primary text-center">
                <p>Con una aportación mensual de <strong class="monthly-amount">$2,461.00</strong>, podrás protegerte ante una enfermedad o accidente:</p>
            </div> -->
            <ul class="benefits-list text-blue-primary">
                <li>Acceso a todos los hospitales de México, incluye los de alta tecnología como ABC y Ángeles</li>
                <li>Honorarios Médicos</li>
                <li>Medicamentos</li>
                <li>Check up dental Básico</li>
                <li>Video consulta médico general sin costo</li>
                <li>Cero deducible por accidente en algunos hospitales</li>
                <li>Ambulancia terrestre y aérea</li>
                <li>Médico a domicilio a costo preferente</li>
                <li>Cirugía Robótica</li>
                <li>Estudios de laboratorio</li>
                <li>Convenio con ABC</li>
                <li class="more-benefits">Y muchos beneficios más</li>
            </ul>
        </div>

        <!-- <p class="payment-info text-blue-primary">
            Además, si pagas de contado, <strong class="discount-amount">$27,352.00</strong>, pueden hacerlo a 3, 6 y 12 meses sin intereses (Pregunta por nuestras tarjetas participantes)
        </p> -->

        <div class="contact-section">
            <p class="contact-title">Deseo contratar:</p>
            <div class="contact-buttons">
                <a href="https://wa.me/525611090653" target="_blank" class="contact-btn contact-btn--whatsapp">
                    WhatsApp
                </a>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
    formData: {
        type: Object,
        required: true
    }
});

const fullName = computed(() => {
    return `${props.formData.firstName || ''} ${props.formData.lastName || ''}`.trim();
});
</script>

<style scoped>
.content-section {
    border: 3px solid #e2edfc;
    padding: 2rem;
    border-radius: 10px;
    margin-bottom: 1.5rem;
}
.success-message {
    padding: 1.5rem 0.5rem;
    border-radius: 12px;
    position: relative;
    overflow: hidden;
}

.success-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--blue-primary);
    text-align: center;
    margin-bottom: 1rem;
    letter-spacing: 0.5px;
}

.success-intro {
    text-align: center;
    font-size: 1rem;
    margin-bottom: 0.75rem;
    line-height: 1.5;
}

.success-description {
    text-align: center;
    font-size: 0.95rem;
    margin-bottom: 1.25rem;
    line-height: 1.5;
}

.success-highlight {
    background-color: #f0f7ff;
    padding: 1rem;
    border-radius: 8px;
    margin-bottom: 1rem;
    border-left: 4px solid var(--blue-primary);
}

.success-highlight p {
    font-size: 0.95rem;
    color: #333333;
    margin: 0;
    line-height: 1.5;
}

.monthly-amount {
    color: var(--blue-primary);
    font-size: 1.25rem;
    font-weight: 700;
}

.benefits-list {
    list-style: none;
    padding: 0;
    margin: 0 0 1rem 0;
}

.benefits-list li {
    padding: 0.4rem 0 0.4rem 1.75rem;
    font-size: 0.875rem;
    line-height: 1.4;
    position: relative;
}

.benefits-list li::before {
    content: "●";
    position: absolute;
    left: 0;
    color: var(--blue-primary);
    font-weight: bold;
    font-size: 1.1rem;
}


.payment-info {
    font-size: 0.875rem;
    margin-bottom: 1.25rem;
    line-height: 1.5;
    text-align: center;
}

.discount-amount {
    color: var(--blue-primary);
    font-weight: 700;
}

.contact-section {
    text-align: center;
}

.contact-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--blue-primary);
    margin-bottom: 1rem;
}

.contact-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
}

.contact-btn {
    flex: 1;
    max-width: 150px;
    padding: 0.875rem 1.5rem;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    text-decoration: none;
    text-align: center;
    transition: all 0.3s ease;
    cursor: pointer;
}

.contact-btn--phone {
    background-color: var(--blue-primary);
    color: #ffffff;
}

.contact-btn--phone:hover {
    background-color: #0847b8;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(10, 74, 206, 0.3);
}

.contact-btn--whatsapp {
    background-color: var(--blue-primary);
    color: #ffffff;
}

.contact-btn--whatsapp:hover {
    background-color: #0847b8;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(10, 74, 206, 0.3);
}

@media (max-width: 480px) {
    .success-message {
        padding: 1rem;
    }

    .success-title {
        font-size: 1.5rem;
    }

    .benefits-list li {
        font-size: 0.8rem;
        padding: 0.35rem 0 0.35rem 1.5rem;
    }

    .contact-buttons {
        flex-direction: column;
        align-items: center;
    }

    .contact-btn {
        max-width: 100%;
        width: 100%;
    }

    .monthly-amount {
        font-size: 1.1rem;
    }
}
</style>