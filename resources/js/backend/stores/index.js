import Vue from "vue";
import Vuex from "vuex";

import auth from "./auth/index.js";
import menus from "./menus/index.js";

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        auth,
        menus
    },
    state: {
        token: localStorage.getItem("token"),
        errors: [],
        flashMessage: ""
    },
    getters: {
        isAuth: state => {
            return state.token != "null" && state.token != null;
        }
    },
    mutations: {
        SET_TOKEN(state, payload) {
            state.token = payload;
        },
        SET_ERRORS(state, payload) {
            state.errors = payload;
        },
        CLEAR_ERRORS(state) {
            state.errors = [];
        },
        SET_FLASH_MESSAGE(state, payload) {
            state.flashMessage = payload;
        }
    },
    actions: {
        setFlashMessage({ commit }, payload) {
            commit("SET_FLASH_MESSAGE", payload);
        }
    }
});

export default store;
