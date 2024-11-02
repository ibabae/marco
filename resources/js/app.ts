import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, DefineComponent, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob<DefineComponent>('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});

// resources/js/app.ts

import '../../public/assets/css/main.css';
import '../../public/assets/css/marco.css';
import '../../public/assets/css/style.css';

import '../../public/assets/js/vendor/jquery-3.6.0.min.js';
import '../../public/vendors/bootstrap/bootstrap.bundle.min.js';
import '../../public/assets/js/vendor/modernizr-3.6.0.min.js';
import '../../public/vendors/slick/slick.min.js';
import '../../public/assets/js/plugins/jquery.syotimer.min.js';
// import '../../public/assets/js/plugins/wow.js';
import '../../public/assets/js/plugins/jquery-ui.js';
import '../../public/assets/js/plugins/perfect-scrollbar.js';
import '../../public/assets/js/plugins/magnific-popup.js';
import '../../public/assets/js/plugins/select2.min.js';
import '../../public/assets/js/plugins/waypoints.js';
import '../../public/assets/js/plugins/counterup.js';
import '../../public/assets/js/plugins/jquery.countdown.min.js';
import '../../public/assets/js/plugins/images-loaded.js';
import '../../public/assets/js/plugins/isotope.js';
import '../../public/assets/js/plugins/scrollup.js';
import '../../public/assets/js/plugins/jquery.vticker-min.js';
import '../../public/assets/js/plugins/jquery.theia.sticky.js';
import '../../public/assets/js/plugins/jquery.elevatezoom.js';
import '../../public/assets/js/main.js';
import '../../public/assets/js/shop.js';
