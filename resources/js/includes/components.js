import { createApp } from 'vue';
import navbarComponent from '../components/general/navbar.vue';
import whatsappContact from '../components/general/whatssapp_contact.vue';
import bannerHome from '../components/banner-home/index.vue';
import plansHome from '../components/plans-home/index.vue';
import benefitsHome from '../components/benefits-home/index.vue';

const app = createApp({
    components: {
        'navbar-component': navbarComponent,
        'whatsapp-contact': whatsappContact,
        'banner-home': bannerHome,
        'plans-home': plansHome,
        'benefits-home': benefitsHome,
    }
});

export default app;