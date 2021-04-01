/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./scripts/bootstrap');
require('bootstrap/dist/js/bootstrap.esm.min.js');

// Vue Items
import Vue, {createApp, reactive} from "vue";
import {store} from "./vuex/store.js";

// Additional Plugins
import axios from "axios";


// Project Items
import router from "./router/router.js";

// Main Component
import App from "./components/App.vue";
import Sidebar from "./components/Partials/Sidebar.vue";
import draggable from "vuedraggable";

// Our mounting element
const mountElmTarget = document.getElementById("app");

// Create our SPA
if (mountElmTarget) {
    const app = createApp(App, {...mountElmTarget.dataset});
    
    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    axios.defaults.withCredentials = true;
    
    app.config.globalProperties.$axios = axios;
    
    // Global App shared
    app.use(store)
       .use(router);
    
    // Global Component registration
    app.component("Sidebar", Sidebar)
       .component("draggable", draggable);
    
    
    // Mount our component
    app.mount("#app");
}
