<template>
    <form class="step-form" @submit.prevent="handleSubmit">
        <!-- Nombre (Zoho: First Name) -->
        <div class="form-group">
            <label class="form-label" for="firstName">Nombre</label>
            <input
                id="firstName"
                type="text"
                class="form-input"
                placeholder="Ej. Juan"
                :value="formData.firstName"
                @input="$emit('update', 'firstName', $event.target.value)"
                maxlength="40"
                required
            />
        </div>

        <!-- Apellidos (Zoho: Last Name) - Campo obligatorio -->
        <div class="form-group">
            <label class="form-label" for="lastName">Apellidos <span style="color:red;">*</span></label>
            <input
                id="lastName"
                type="text"
                class="form-input"
                placeholder="Ej. Pérez García"
                :value="formData.lastName"
                @input="$emit('update', 'lastName', $event.target.value)"
                maxlength="80"
                required
            />
        </div>

        <!-- Móvil (Zoho: Mobile) -->
        <div class="form-group">
            <label class="form-label" for="movil">Móvil</label>
            <input
                id="movil"
                type="tel"
                class="form-input"
                placeholder="Ej. 5512345678"
                :value="formData.movil"
                @input="handlePhoneInput"
                pattern="[0-9]*"
                inputmode="numeric"
                maxlength="15"
                required
            />
        </div>

        <!-- Correo electrónico (Zoho: Email) -->
        <div class="form-group">
            <label class="form-label" for="email">Correo electrónico</label>
            <input
                id="email"
                type="email"
                class="form-input"
                placeholder="Ej. juan@ejemplo.com"
                :value="formData.email"
                @input="handleEmailInput"
                pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
                maxlength="100"
                required
            />
        </div>

        <!-- Submit Button -->
        <button type="submit" class="submit-btn">
            Quiero proteger mi salud hoy
        </button>
    </form>
</template>

<script setup>
defineProps({
    formData: {
        type: Object,
        required: true
    }
});

const emit = defineEmits(['update', 'next']);

const handlePhoneInput = (event) => {
    // Filtrar solo números del valor ingresado
    const value = event.target.value.replace(/\D/g, '');
    emit('update', 'movil', value);
};

const handleEmailInput = (event) => {
    // Convertir a minúsculas y eliminar espacios
    const value = event.target.value.toLowerCase().trim();
    emit('update', 'email', value);
};

const handleSubmit = () => {
    emit('next');
};
</script>