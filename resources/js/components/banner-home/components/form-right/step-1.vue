<template>
    <form class="step-form" @submit.prevent="handleSubmit">
        <!-- Nombre -->
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

        <!-- Apellidos -->
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

        <!-- Móvil -->
        <div class="form-group">
            <label class="form-label" for="movil">Móvil</label>
            <input
                id="movil"
                type="tel"
                class="form-input"
                placeholder="Ej. 5512345678"
                :value="formData.movil"
                @input="$emit('update', 'movil', $event.target.value)"
                maxlength="30"
                required
            />
        </div>

        <!-- Correo electrónico -->
        <div class="form-group">
            <label class="form-label" for="email">Correo electrónico</label>
            <input
                id="email"
                type="email"
                class="form-input"
                placeholder="Ej. juan@ejemplo.com"
                :value="formData.email"
                @input="$emit('update', 'email', $event.target.value)"
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

const handleSubmit = () => {
    emit('next');
};
</script>