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
    userLogin(store, state) {
        // axios.get('/api/auth-user')
        //      .then(({ data } = {}) => commit('setAuthUser', data))
        //      .catch(error => console.error(error));
    },
    toggleSidebarVisibility(store, opts) {
        store.commit("toggleSidebar", {opts});
    },
    setViewport(store, opts) {
        const winWidth = window.innerWidth;
        
        let viewportName = "desktop";
        if (winWidth < 768) viewportName = "mobile";
        else if (winWidth >= 768 && winWidth <= 1200) viewportName = "tablet";
        
        if (this.viewport !== viewportName) {
            store.commit("setViewport", {viewportName});
        }
    },
    getTeamListing(store, userId) {
        axios.get('/api/teams')
             .then(({status, data}) => {
                 if (status === 200 && data) {
                     store.commit("setTeamList", data.data);
                     return true;
                 }
             })
            .catch(e => {
                console.error(e);
                return false;
            });
    },
};
