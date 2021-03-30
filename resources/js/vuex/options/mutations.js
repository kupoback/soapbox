export default {
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
    },
    SET_SECRETS(currentState, {data}) {
        currentState.secrets = data && data;
    },
    HAS_LOGIN_ERROR(currentState, error) {
        currentState.loginError = error;
    },
    setAuthUser(state, user) {
        state.user = user;
    }
};
