import './bootstrap';
import '../css/app.css';
import 'vue-final-modal/style.css';

import { createApp, h } from 'vue';
import { createInertiaApp, InertiaLinkInertiaLink } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import { createVfm } from 'vue-final-modal';
import { Inertia } from '@inertiajs/inertia';
import { VueReCaptcha } from 'vue-recaptcha-v3';
import 'flowbite';

const vfm = createVfm();

createInertiaApp({
    title: (title) => `${title}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        //const captcheKey = props.initialPage.props.recaptcha_site_key;
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(VueReCaptcha, { siteKey: '<6Lf0-tAZAAAAAIxKP1YOtKrCfqSm_yl3QF-IzglK>' } )
            .use(vfm)
            .use(InertiaLinkInertiaLink)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563'});

Inertia.on('navigate', (event) => {
    const path = event.detail.page.url;
    ym(24900584, 'hit', path);
});