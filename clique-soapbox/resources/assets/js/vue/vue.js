/* global import */
import axios from "axios";
import { createApp } from 'vue';
// import {store} from "./Vuex/store.js";
// import { MediaQueries } from "vue-media-queries";

// Components
import HelloWorld from "./components/HelloWorld.vue";

if (document.getElementById('vue-hello')) {
    createApp(HelloWorld).mount('#vue-hello');
}
