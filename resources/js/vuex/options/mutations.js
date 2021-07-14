export default {
    // BUILD_NAVIGATION(currentState, {data, viewport}) {
    //     if (viewport === "desktop") {
    //         currentState.desktopNav = data;
    //     }
    //     if (viewport === "mobile") {
    //         currentState.mobileNav = data;
    //     }
    // },
    toggleSidebar(state, {opts}) {
        state.sidebarOpened = opts.visibility;
    },
    setViewport(state, {viewportName}) {
        state.viewport = viewportName;
    },
    setSecrets(state, data) {
        console.log(data);
        state.secrets = data && data;
    },
    hasLoginError(state, error) {
        state.loginError = error;
    },
    setAuthUser(state, user) {
        state.user = user;
    },
    storeTitle(state, title) {
        if (title) {
            state.pageTitle = title;
            document.title = title;
        }
    },
    setTeamList(state, teams) {
        state.teams = teams;
    }
};
