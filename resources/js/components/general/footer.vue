<template>
    <footer class="footer">
        <div class="footer-container">
            <!-- Logo Section -->
            <div class="footer-section logo-section" data-aos="fade-up" data-aos-delay="100">
                <div class="logo-box">
                    <img src="/img/logo.png" alt="Agente GNP Seguros" class="footer-logo">
                </div>
            </div>

            <!-- Enlaces Rápidos Section -->
            <div class="footer-section links-section" data-aos="fade-up" data-aos-delay="200">
                <h3 class="footer-title">Enlaces rápidos</h3>
                <ul class="footer-links">
                    <li><a href="#planes">Planes y coberturas</a></li>
                    <li><a href="#beneficios">Beneficios</a></li>
                    <li><a href="#elegir">Cómo elegir</a></li>
                </ul>
            </div>

            <!-- Contacto Section -->
            <div class="footer-section contact-section" data-aos="fade-up" data-aos-delay="300">
                <h3 class="footer-title">Contacto</h3>
                <div class="contact-info">
                    <div class="contact-item">
                        <svg class="icon-phone" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <div>
                            <p class="contact-label">Lunes a Viernes 9AM-7PM</p>
                            <p class="contact-value">+52 55 5887 0510</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <svg class="icon-location" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <div>
                            <p class="contact-value">Ciudad de México, México</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom" data-aos="fade-up" data-aos-delay="400">
            <p class="copyright">© 2026 Asiste Salud. Todos los derechos reservados</p>
            <p class="registry">Operado por GNP Seguros</p>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'Footer',
    mounted() {
        // Initialize AOS (Animate On Scroll) if available
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                once: true,
                offset: 50
            });
        }
    }
}
</script>

<style scoped>
.footer {
    background: linear-gradient(135deg, #003d82 0%, #0052a8 100%);
    color: white;
    padding: 60px 20px 30px;
    font-family: Arial, sans-serif;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 40px;
    margin-bottom: 40px;
}

/* Logo Section */
.logo-section {
    display: flex;
    align-items: flex-start;
}

.logo-box {
    background: white;
    padding: 0 80px;
    border-radius: 12px;
    display: inline-block;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.footer-logo {
    max-width: 150px;
    height: auto;
}

/* Links Section */
.footer-title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 20px;
    color: white;
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 12px;
}

.footer-links a {
    color: white;
    text-decoration: none;
    font-size: 15px;
    transition: all 0.3s ease;
    display: inline-block;
}

.footer-links a:hover {
    color: #ffa500;
    transform: translateX(5px);
}

/* Contact Section */
.contact-info {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.contact-item {
    display: flex;
    gap: 15px;
    align-items: flex-start;
}

.contact-item svg {
    min-width: 24px;
    width: 24px;
    height: 24px;
    color: white;
    flex-shrink: 0;
}

.contact-label {
    font-size: 13px;
    color: rgba(255, 255, 255, 0.9);
    margin: 0 0 5px 0;
}

.contact-value {
    font-size: 15px;
    font-weight: 500;
    color: white;
    margin: 2px 0;
}

/* Footer Bottom */
.footer-bottom {
    max-width: 1200px;
    margin: 0 auto;
    padding-top: 30px;
    border-top: 1px solid rgba(255, 255, 255, 0.2);
    text-align: center;
}

.copyright,
.registry {
    font-size: 13px;
    color: rgba(255, 255, 255, 0.9);
    margin: 5px 0;
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

[data-aos="fade-up"] {
    animation: fadeInUp 0.8s ease-out forwards;
    opacity: 0;
}

[data-aos-delay="100"] {
    animation-delay: 0.1s;
}

[data-aos-delay="200"] {
    animation-delay: 0.2s;
}

[data-aos-delay="300"] {
    animation-delay: 0.3s;
}

[data-aos-delay="400"] {
    animation-delay: 0.4s;
}

/* Responsive Design */
@media (max-width: 992px) {
    .footer-container {
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }
    
    .logo-section {
        grid-column: 1 / -1;
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .footer {
        padding: 40px 20px 20px;
    }
    
    .footer-container {
        grid-template-columns: 1fr;
        gap: 30px;
        text-align: center;
    }
    
    .logo-section {
        justify-content: center;
    }
    
    .contact-item {
        justify-content: center;
    }
    
    .footer-links {
        text-align: center;
    }
}

@media (max-width: 480px) {
    .footer-title {
        font-size: 16px;
    }
    
    .footer-links a,
    .contact-value {
        font-size: 14px;
    }
    
    .logo-box {
        padding: 15px 20px;
    }
    
    .footer-logo {
        max-width: 120px;
    }
    
    .copyright,
    .registry {
        font-size: 12px;
    }
}
</style>