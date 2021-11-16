require('./bootstrap');


import { createApp, h} from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';


import FlashMessage from '@smartweb/vue-flash-message';

import Notifications from '@kyvg/vue3-notification'



import VueFlashMessage from '@smartweb/vue-flash-message';
import "datatables.net-bs4";
import 'datatables.net-responsive-bs4';

//Datatable Modules
import "datatables.net-dt/js/dataTables.dataTables"
import "datatables.net-dt/css/jquery.dataTables.min.css"
import "datatables.net-bs4/css/dataTables.bootstrap4.min.css"





const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

window.axios = require('axios');
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .component('notifications', Notifications)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
