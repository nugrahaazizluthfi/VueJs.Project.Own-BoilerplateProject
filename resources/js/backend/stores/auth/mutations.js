const mutations = {
    SET_USER_INFORMATION(state, payload) {
        state.user = payload;
    },
    SET_SUBMIT(state, payload) {
        state.isSubmit = payload;
    }
};

export default mutations;
