<template>
    <form class="step-form" @submit.prevent="handleSubmit">
        <!-- Edad -->
        <div class="form-group">
            <label class="form-label" for="edad">Edad</label>
            <input
                id="edad"
                type="text"
                class="form-input"
                placeholder="Ej. 35"
                :value="formData.edad"
                @input="$emit('update', 'edad', $event.target.value)"
                maxlength="9"
                required
            />
        </div>

        <!-- Código Postal -->
        <div class="form-group">
            <label class="form-label" for="codigoPostal">Código Postal</label>
            <input
                id="codigoPostal"
                type="text"
                class="form-input"
                placeholder="Ej. 06600"
                maxlength="30"
                :value="formData.codigoPostal"
                @input="$emit('update', 'codigoPostal', $event.target.value)"
                required
            />
        </div>

        <!-- Buttons -->
        <div class="button-group">
            <button type="button" class="back-btn" @click="$emit('back')">
                ← Atrás
            </button>
            <button type="submit" class="submit-btn">
                Quiero proteger a mi familia
            </button>
        </div>
    </form>
</template>

<script setup>
defineProps({
    formData: {
        type: Object,
        required: true
    }
});

const emit = defineEmits(['update', 'back', 'submit']);

const handleSubmit = () => {
    emit('submit');
};
</script>