/* global import */
import axios from "axios";
import { createApp } from 'vue';
// import {store} from "./Vuex/store.js";
// import { MediaQueries } from "vue-media-queries";

// Components
import App from "./components/App.vue";
import Header from "./components/Header/Header.vue";

if (document.getElementById('app')) {
    createApp(App).mount('#app');
}
