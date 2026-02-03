<template>
    <form class="step-form" @submit.prevent="handleSubmit">
        <!-- Nombre completo -->
        <div class="form-group">
            <label class="form-label" for="nombre">Nombre completo</label>
            <input
                id="nombre"
                type="text"
                class="form-input"
                placeholder="Ej. Juan Pérez"
                :value="formData.nombre"
                @input="$emit('update', 'nombre', $event.target.value)"
                required
            />
        </div>

        <!-- Teléfono -->
        <div class="form-group">
            <label class="form-label" for="telefono">Teléfono</label>
            <input
                id="telefono"
                type="tel"
                class="form-input"
                placeholder="Ej. 5512345678"
                :value="formData.telefono"
                @input="$emit('update', 'telefono', $event.target.value)"
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