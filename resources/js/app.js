import './bootstrap';
import './sass/app.sass';

import { createApp, h } from 'vue';
import router from "./route";

import main from './Pages/app.vue'

const app  = createApp({
    render: ()=>h(main)
});

app
    .use(router)
    .mount('#app')

