export default {
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
        store.commit("TOGGLE_SIDEBAR", {opts});
    },
    setViewport(store, opts) {
        const winWidth = window.innerWidth;
        
        let viewportName = "desktop";
        if (winWidth < 768) viewportName = "mobile";
        else if (winWidth >= 768 && winWidth <= 1200) viewportName = "tablet";
        
        if (this.viewport !== viewportName) {
            store.commit("SET_VIEWPORT", {viewportName});
        }
    },
    getTeamListing(store, opts) {
    
    },
};
