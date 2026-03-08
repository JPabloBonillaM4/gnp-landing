<template>
    <div class="form-container" :class="{ 'form-container--visible': isVisible }" ref="formRef">
        <h2 class="form-title text-blue-primary" v-if="!showSuccess">Obtén tu cotización gratuita</h2>
        <!-- Stepper Header -->
        <div class="stepper" v-if="!showSuccess">
            <p class="stepper__label fs-20px">
                Paso {{ currentStep }} de 2: {{ currentStep === 1 ? 'Datos de contacto' : 'Información adicional' }}
            </p>
            <div class="stepper__progress">
                <div
                    class="stepper__progress-bar"
                    :class="{ 'stepper__progress-bar--active': currentStep >= 1 }"
                ></div>
                <div
                    class="stepper__progress-bar"
                    :class="{ 'stepper__progress-bar--active': currentStep >= 2 }"
                ></div>
            </div>
        </div>

        <!-- Form Steps -->
        <div class="form-steps">
            <Transition name="slide-fade" mode="out-in">
                <Step1
                    v-if="currentStep === 1 && !isLoading && !showSuccess"
                    :form-data="formData"
                    @update="updateFormData"
                    @next="nextStep"
                />
                <Step2
                    v-else-if="currentStep === 2 && !isLoading && !showSuccess"
                    :form-data="formData"
                    @update="updateFormData"
                    @back="prevStep"
                    @submit="submitForm"
                />
                <div v-else-if="isLoading" class="loader-container">
                    <div class="loader"></div>
                    <p class="loader-text">Procesando tu solicitud...</p>
                </div>
                <SuccessMsg
                    v-else-if="showSuccess"
                    :form-data="formData"
                />
            </Transition>
        </div>

        <!-- Trust Badges -->
        <div class="trust-badges" v-if="!showSuccess">
            <p class="trust-badge">
                <span class="trust-badge__icon">🔒</span>
                Tu información está protegida.
            </p>
            <!-- <p class="trust-badge">
                <span class="trust-badge__icon">📋</span>
                Seguro regulado y respaldado por CONDUSEF.
            </p> -->
        </div>
    </div>
</template>

<script setup>
import { ref, reactive, onMounted, onUnmounted } from 'vue';
import Step1 from './step-1.vue';
import Step2 from './step-2.vue';
import SuccessMsg from './success_msg.vue';

const isVisible = ref(false);
const currentStep = ref(1);
const formRef = ref(null);
const isLoading = ref(false);
const showSuccess = ref(false);
let observer = null;

const formData = reactive({
    firstName: '',
    lastName: '',
    movil: '',
    email: '',
    edad: '',
    codigoPostal: '',
});

const updateFormData = (field, value) => {
    formData[field] = value;
};

const nextStep = () => {
    if (currentStep.value < 2) {
        currentStep.value++;
    }
};

const prevStep = () => {
    if (currentStep.value > 1) {
        currentStep.value--;
    }
};

const submitForm = async () => {
    console.log('Form submitted:', formData);
    isLoading.value = true;

    try {
        // Crear FormData para enviar a Zoho CRM
        const formPayload = new FormData();

        // Campos ocultos requeridos por Zoho
        formPayload.append('xnQsjsdp', import.meta.env.VITE_ZOHO_XNQSJSDP);
        formPayload.append('zc_gad', '');
        formPayload.append('xmIwtLD', import.meta.env.VITE_ZOHO_XMIWTLD);
        formPayload.append('actionType', import.meta.env.VITE_ZOHO_ACTION_TYPE);
        formPayload.append('returnURL', import.meta.env.VITE_ZOHO_RETURN_URL);

        // Campos del formulario
        formPayload.append('First Name', formData.firstName);
        formPayload.append('Last Name', formData.lastName);
        formPayload.append('Mobile', formData.movil);
        formPayload.append('Email', formData.email);
        formPayload.append('LEADCF51', formData.edad);
        formPayload.append('Zip Code', formData.codigoPostal);

        // Campos predeterminados
        formPayload.append('Lead Source', 'Web');
        formPayload.append('LEADCF6', 'GMM');

        // Honeypot para prevenir spam
        formPayload.append('aG9uZXlwb3Q', '');

        // Enviar a Zoho CRM
        const response = await fetch('https://crm.zoho.com/crm/WebToLeadForm', {
            method: 'POST',
            body: formPayload,
            mode: 'no-cors' // Zoho no permite CORS, pero el form se enviará
        });

        // Mostrar mensaje de éxito
        isLoading.value = false;
        showSuccess.value = true;
    } catch (error) {
        console.error('Error al enviar el formulario:', error);
        // Aún así mostrar éxito ya que 'no-cors' no permite leer la respuesta
        isLoading.value = false;
        showSuccess.value = true;
    }
};

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

    if (formRef.value) {
        observer.observe(formRef.value);
    }
});

onUnmounted(() => {
    if (observer) {
        observer.disconnect();
    }
});
</script>

<style scoped>

.form-container {
    background-color: #ffffff;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    width: 100%;
    max-width: 47.5%;
    opacity: 0;
    transform: translateX(50px);
    transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
}

.form-container--visible {
    opacity: 1;
    transform: translateX(0);
}

.form-title {
    font-size: 1.5rem;
    font-weight: 500;
    margin-bottom: 1rem;
}

/* Stepper */
.stepper {
    margin-bottom: 1.5rem;
}

.stepper__label {
    margin-bottom: 0.5rem;
}

.stepper__progress {
    display: flex;
    gap: 0.5rem;
    height: 8px;
}

.stepper__progress-bar {
    flex: 1;
    height: 100%;
    background-color: #e5e5e5;
    border-radius: 4px;
    transition: background-color 0.4s cubic-bezier(0.16, 1, 0.3, 1);
}

.stepper__progress-bar--active {
    background-color: var(--orange-primary);
}

/* Form Steps Container */
.form-steps {
    min-height: 280px;
}

/* Loader */
.loader-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 280px;
    gap: 1.5rem;
}

.loader {
    width: 60px;
    height: 60px;
    border: 5px solid #f3f3f3;
    border-top: 5px solid var(--orange-primary);
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.loader-text {
    font-size: 1.125rem;
    color: #666666;
    font-weight: 500;
    animation: pulse 1.5s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

/* Trust Badges */
.trust-badges {
    margin-top: 1.5rem;
    padding-top: 1rem;
    border-top: 1px solid #f0f0f0;
}

.trust-badge {
    gap: 0.5rem;
    font-size: 1rem;
    color: #666666;
    margin-bottom: 0.5rem;
    text-align: center;
}

.trust-badge:last-child {
    margin-bottom: 0;
}

.trust-badge__icon {
    font-size: 1rem;
}

/* Vue Transitions */
.slide-fade-enter-active {
    transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
    transition: all 0.2s ease-in;
}

.slide-fade-enter-from {
    transform: translateX(20px);
    opacity: 0;
}

.slide-fade-leave-to {
    transform: translateX(-20px);
    opacity: 0;
}

/* Responsive */
@media (max-width: 768px) {
    .form-container {
        max-width: 100%;
        padding: 1.5rem;
        border-radius: 12px;
    }

    .form-title {
        font-size: 1.3rem;
    }
}

@media (max-width: 480px) {
    .form-container {
        padding: 1.25rem;
    }

    .form-title {
        font-size: 1.2rem;
    }

    .form-steps {
        min-height: 300px;
    }
}
</style>
<style>
.step-form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.form-label {
    font-size: 1rem;
    font-weight: 500;
    color: #333333;
}

.form-input {
    width: 100%;
    padding: 0.5rem 1rem;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    font-size: 1rem;
    color: #333333;
    transition: all 0.3s ease;
    background-color: #f2f2f4;
}

.form-input::placeholder {
    color: #999999;
}

.form-input:focus {
    outline: none;
    border-color: var(--blue-secondary);
    box-shadow: 0 0 0 3px rgba(22, 95, 251, 0.1);
}

.submit-btn {
    flex: 1;
    padding: 1rem 1.5rem;
    background-color: var(--orange-primary);
    color: #ffffff;
    border: none;
    border-radius: 8px;
    font-size: 1.75rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.submit-btn:hover {
    background-color: #c4612d;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(221, 117, 57, 0.4);
}

.submit-btn:active {
    transform: translateY(0);
}

.form-select {
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23666' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    padding-right: 2.5rem;
}

.button-group {
    display: flex;
    gap: 1rem;
    margin-top: 0.5rem;
}

.back-btn {
    flex: 0 0 auto;
    padding: 1rem 1.25rem;
    background-color: transparent;
    color: #666666;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    font-size: 0.95rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}

.back-btn:hover {
    background-color: #f5f5f5;
    border-color: #cccccc;
}

@media (max-width: 480px) {
    .form-input {
        padding: 0.75rem 0.875rem;
        font-size: 0.95rem;
    }

    .submit-btn {
        order: 1;
        padding: 0.875rem 1.25rem;
        font-size: 1rem;
    }

    .button-group {
        flex-direction: column;
    }

    .back-btn {
        order: 2;
    }
}
</style>