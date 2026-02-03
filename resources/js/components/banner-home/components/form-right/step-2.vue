<template>
    <form class="step-form" @submit.prevent="handleSubmit">
        Info pendiente
        <!-- Edad -->
        <!-- <div class="form-group">
            <label class="form-label" for="edad">Edad</label>
            <input
                id="edad"
                type="number"
                class="form-input"
                placeholder="Ej. 35"
                min="18"
                max="99"
                :value="formData.edad"
                @input="$emit('update', 'edad', $event.target.value)"
                required
            />
        </div> -->

        <!-- Código Postal -->
        <!-- <div class="form-group">
            <label class="form-label" for="codigoPostal">Código Postal</label>
            <input
                id="codigoPostal"
                type="text"
                class="form-input"
                placeholder="Ej. 06600"
                maxlength="5"
                :value="formData.codigoPostal"
                @input="$emit('update', 'codigoPostal', $event.target.value)"
                required
            />
        </div> -->

        <!-- Tipo de Seguro -->
        <!-- <div class="form-group">
            <label class="form-label" for="tipoSeguro">¿Qué tipo de seguro te interesa?</label>
            <select
                id="tipoSeguro"
                class="form-input form-select"
                :value="formData.tipoSeguro"
                @change="$emit('update', 'tipoSeguro', $event.target.value)"
                required
            >
                <option value="" disabled>Selecciona una opción</option>
                <option value="individual">Individual</option>
                <option value="familiar">Familiar</option>
                <option value="empresarial">Empresarial</option>
            </select>
        </div> -->

        <!-- Buttons -->
        <div class="button-group">
            <button type="button" class="back-btn" @click="$emit('back')">
                ← Regresar
            </button>
            <button type="submit" class="submit-btn">
                Enviar cotización
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