import { createApp } from 'vue';
import navbarComponent from '../components/general/navbar.vue';
import footerComponent from '../components/general/footer.vue';
import whatsappContact from '../components/general/whatssapp_contact.vue';
import seoContent from '../components/general/seo-content.vue';
import bannerHome from '../components/banner-home/index.vue';
import plansHome from '../components/plans-home/index.vue';
import benefitsHome from '../components/benefits-home/index.vue';
import opinionsHome from '../components/opinions-home/index.vue';
import certificationsHome from '../components/certifications-home/index.vue';

const app = createApp({
    components: {
        'navbar-component': navbarComponent,
        'footer-component': footerComponent,
        'whatsapp-contact': whatsappContact,
        'seo-content': seoContent,
        'banner-home': bannerHome,
        'plans-home': plansHome,
        'benefits-home': benefitsHome,
        'opinions-home': opinionsHome,
        'certifications-home': certificationsHome,
    }
});

export default app;