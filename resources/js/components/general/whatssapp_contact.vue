<script setup>
const phoneNumber = '5523452633';
const message = `Hola \u{1F44B}, estoy interesado en cotizar mi seguro de Gastos Médicos Mayores y recibir más información sobre los planes disponibles. \u{1FA7A}

¿Me pueden orientar?`;
const whatsappUrl = `https://wa.me/52${phoneNumber}?text=${encodeURIComponent(message)}`;

const openWhatsApp = () => {
    window.open(whatsappUrl, '_blank');
};
</script>

<template>
    <div class="whatsapp-container">
        <div class="whatsapp-content">
            <a
                :href="whatsappUrl"
                target="_blank"
                class="whatsapp-button"
            >
                <div class="icon-wrapper">
                    <svg class="whatsapp-icon" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                </div>
                <span class="whatsapp-text">Contáctanos</span>
            </a>
        </div>
    </div>
</template>

<style scoped>
.whatsapp-content {
    display: flex;
    align-items: center;
    width: 100%;
    justify-content: flex-end;
}

.whatsapp-container {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 9999;
    transition: width 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.whatsapp-button {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    background-color: #25D366;
    border-radius: 50px;
    box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
    cursor: pointer;
    text-decoration: none;
    overflow: hidden;
    width: 60px;
    height: 60px;
    transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    position: relative;
}

.whatsapp-container:hover {
    width: 200px;
}

.whatsapp-container:hover .whatsapp-button {
    width: 200px;
    padding-right: 10px;
    box-shadow: 0 6px 25px rgba(37, 211, 102, 0.6);
    transform: translateY(-2px);
}

.whatsapp-container:hover .whatsapp-text {
    opacity: 1;
    transform: translateX(0);
    transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55) 0.1s;
}

.whatsapp-text {
    transition: all 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.icon-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 60px;
    height: 60px;
    position: absolute;
    right: 0;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    transition: all 0.3s ease;
}

.whatsapp-icon {
    width: 28px;
    height: 28px;
    color: #ffffff;
    transition: transform 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.whatsapp-button:hover .whatsapp-icon {
    transform: scale(1.1) rotate(5deg);
}

.whatsapp-button .whatsapp-icon {
    transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.whatsapp-text {
    color: white;
    font-weight: 600;
    font-size: 15px;
    opacity: 0;
    white-space: nowrap;
    transform: translateX(20px);
    transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    margin-right: 70px;
}

.whatsapp-button.expanded .whatsapp-text {
    opacity: 1;
    transform: translateX(0);
}

/* Animación de pulso sutil */
@keyframes pulse {
    0% {
        box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
    }
    50% {
        box-shadow: 0 4px 25px rgba(37, 211, 102, 0.6);
    }
    100% {
        box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
    }
}

.whatsapp-button {
    animation: pulse 2s infinite;
}

.whatsapp-button:hover {
    animation: none;
}

/* Responsive */
@media (max-width: 768px) {
    .whatsapp-container {
        bottom: 20px;
        right: 20px;
    }

    .whatsapp-button {
        width: 55px;
        height: 55px;
    }

    .icon-wrapper {
        min-width: 55px;
        height: 55px;
    }

    .whatsapp-icon {
        width: 24px;
        height: 24px;
    }

    .whatsapp-button.expanded {
        width: 180px;
    }

    .whatsapp-text {
        font-size: 14px;
        margin-right: 65px;
    }
}
</style>