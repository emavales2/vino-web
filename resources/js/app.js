require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import VueSocialSharing from 'vue-social-sharing';
const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Vino';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        const focusDirective = {
            mounted(el) {
                el.focus();
            },
        };
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(VueSocialSharing)
            .mixin(require('./base'))
            .mixin({ methods: { route }})
            .directive('focus', focusDirective)
            .mount(el)
            .$nextTick(() => { delete el.dataset.page });
    },
});

InertiaProgress.init({ color: '#4B5563' });
