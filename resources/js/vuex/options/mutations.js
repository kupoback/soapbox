export default {
    // BUILD_NAVIGATION(currentState, {data, viewport}) {
    //     if (viewport === "desktop") {
    //         currentState.desktopNav = data;
    //     }
    //     if (viewport === "mobile") {
    //         currentState.mobileNav = data;
    //     }
    // },
    toggleSidebar(currentState, {opts}) {
        currentState.sidebarOpened = opts.visibility;
    },
    setViewport(currentState, {viewportName}) {
        currentState.viewport = viewportName;
    },
    setSecrets(currentState, {data}) {
        currentState.secrets = data && data;
    },
    hasLoginError(currentState, error) {
        currentState.loginError = error;
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
