import axios from "axios";
import { createStore } from 'vuex';

export const store = createStore({
    state () {
        return {
        
        };
    },
    getters: {},
    mutations: {
        // BUILD_NAVIGATION(currentState, {data, viewport}) {
        //     if (viewport === "desktop") {
        //         currentState.desktopNav = data;
        //     }
        //     if (viewport === "mobile") {
        //         currentState.mobileNav = data;
        //     }
        // },
    },
    actions: {
        // getNavigation(store, opts) {
        //     let api = NAV.api;
        //     let config;
        //
        //     config = {
        //         params: {
        //             viewport: opts.viewport,
        //             navID: opts.navID,
        //         }
        //     };
        //
        //     axios.get(api, config)
        //          .then(({data, status}) => {
        //              if (status === 200 && data.status !== 404) {
        //                  store.commit("BUILD_NAVIGATION", {
        //                      viewport: opts.viewport,
        //                      data: data || null,
        //                  });
        //              }
        //          })
        //          .catch(err => console.error(err));
        //     return;
        // },
    },
    modules: {},
})
