const mutations = {
    SET_DATA(state, payload) {
        state.data = payload;
    },
    SET_LOADING(state, payload) {
        state.isLoading = payload;
    },
    SET_OPTIONS_ICON(state, payload) {
        state.optionsIcon = payload;
    },
    SET_OPTIONS_PARENT(state, payload) {
        state.optionsParent = payload;
    },
    SET_SUBMIT(state, payload) {
        state.isSubmit = payload;
    }
};

export default mutations;
