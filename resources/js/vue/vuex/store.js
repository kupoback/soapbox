import {createStore} from "vuex";

// Store Values
import state from "./options/state";
import mutations from "./options/mutations";
import getters from "./options/getters";
import actions from "./options/actions";
import modules from "./options/modules";

export const store = createStore({
    state,
    getters,
    mutations,
    actions,
    modules,
});
