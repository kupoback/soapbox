import {createStore} from "vuex";

// Store Values
import state from "./options/state.js";
import mutations from "./options/mutations.js";
import getters from "./options/getters.js";
import actions from "./options/actions.js";
import modules from "./options/modules.js";

export const store = createStore({
    state,
    getters,
    mutations,
    actions,
    modules,
});
