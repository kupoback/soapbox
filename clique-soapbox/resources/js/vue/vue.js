/* global import */
// Vue Items
import Vue, { createApp } from 'vue';
import {store} from "./vuex/store.js";
import { MediaQueries } from "vue-media-queries";

// Additional Plugins
import axios from "axios";

// Project Items
import router from "./router/router.js";

// Components
import App from "./components/App.vue";
import Header from "./components/Header/Header.vue";

if (document.getElementById('app')) {
    const mediaQueries = new MediaQueries();
    
    const app = createApp(App, {
        mediaQueries: mediaQueries,
    });
    
    app.config.globalProperties.$axios = axios;
    
    app.use(store);
    app.use(router);
    
    // Mount our component
    app.mount('#app');
}
