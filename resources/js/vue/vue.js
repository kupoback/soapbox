/* global import */
// Vue Items
import Vue, {createApp, reactive} from "vue";
import {store} from "./vuex/store";

// Additional Plugins
import axios from "axios";

// Project Items
import router from "./router/router";

// Main Component
import App from "./components/App";
import Sidebar from "./components/Partials/Sidebar";
import draggable from "vuedraggable";

// Our mounting element
const mountElmTarget = document.getElementById("app");

// Create our SPA
if (mountElmTarget) {
    const app = createApp(App, {...mountElmTarget.dataset});
    
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
