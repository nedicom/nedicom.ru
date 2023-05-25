import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import CKEditor from '@ckeditor/ckeditor5-vue';
import 'flowbite';
import VueYandexMetrika from 'vue-yandex-metrika'  

createInertiaApp({
    title: (title) => `${title}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(CKEditor)
            .use(ZiggyVue, Ziggy)
            .mount(el)
            .use(VueYandexMetrika, {
                id: 24900584,
                router: router,
                env: process.env.NODE_ENV
                // other options
            });
    },
});

InertiaProgress.init({ color: '#4B5563'});
