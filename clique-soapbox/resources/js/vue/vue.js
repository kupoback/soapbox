/* global import */
// Vue Items
import Vue, {createApp, reactive} from "vue";
import {store} from "./vuex/store.js";
// import {MediaQueries} from "vue-media-queries";

// Additional Plugins
import axios from "axios";

// Project Items
import router from "./router/router.js";

// Components
import App from "./components/App.vue";

if (document.getElementById("app")) {
    
    const app = createApp(App);
    
    app.config.globalProperties.$axios = axios;
    
    app.use(store)
       .use(router);
    
    // Mount our component
    app.mount("#app");
}
