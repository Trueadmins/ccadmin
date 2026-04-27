/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import App from "@/App.vue";
import vuetify from "./vuetify.js";
import router from "./router/index.js";
import store from "./store/index.js";
import Toast, {useToast} from "vue-toastification";
import "vue-toastification/dist/index.css";
const options = {
    position: 'bottom-right',
    timeout: 1000,
    closeOnClick: true,
    pauseOnHover: true,
};

const app = createApp(App);


// import ExampleComponent from './components/ExampleComponent.vue';
// app.component('example-component', ExampleComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */
app.use(Toast, options);
app.config.globalProperties.$toast = useToast();
window.Toast = useToast();
app.use(vuetify);
app.use(router);
app.use(store);
app.mount('#app');
