/* global import */
// Vue Items
import Vue, {createApp, reactive} from "vue";
import {store} from "./vuex/store.js";

// Additional Plugins
import axios from "axios";

// Project Items
import router from "./router/router.js";

// Main Component
import App from "./components/App.vue";

// Create our SPA
if (document.getElementById("app")) {
    const app = createApp(App);
    app.config.globalProperties.$axios = axios;
    app.use(store)
       .use(router);
    
    // Mount our component
    app.mount("#app");
}
