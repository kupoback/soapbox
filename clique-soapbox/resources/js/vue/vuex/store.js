import axios from "axios";
import { createStore } from 'vuex';

export const store = createStore({
    state () {
        return {
            sidebarOpened: true,
            viewport: ''
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
        TOGGLE_SIDEBAR(currentState, {opts}) {
            currentState.sidebarOpened = opts.visibility;
        },
        SET_VIEWPORT(currentState, {viewportName}) {
            currentState.viewport = viewportName;
        }
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
        toggleSidebarVisibility(store, opts) {
            store.commit('TOGGLE_SIDEBAR', {opts});
        },
        setViewport(store, opts) {
            const winWidth = window.innerWidth;
            
            let viewportName = 'desktop';
            if (winWidth < 768) viewportName = 'mobile';
            else if (winWidth >= 768 && winWidth <= 1200) viewportName = 'tablet';
            
            if (this.viewport !== viewportName) {
                store.commit('SET_VIEWPORT', {viewportName});
            }
        }
    },
    modules: {},
})
