import $axios from "../../utils/api.js";

const actions = {
    setToken({ commit }, payload) {
        localStorage.setItem("token", payload);
        commit("SET_TOKEN", payload, { root: true });
    },
    setSubmit({ commit }, payload) {
        commit("SET_SUBMIT", payload);
    },
    submit({ dispatch, commit }, payload) {
        dispatch("setToken", null);
        dispatch("setSubmit", true);
        return new Promise((resolve, reject) => {
            $axios
                .post("/auth/signin", payload)
                .then(response => {
                    const { results, meta } = response.data;
                    if (meta.status == "success") {
                        dispatch("setToken", results.token);
                        commit("SET_USER_INFORMATION", results.user);
                    } else {
                        commit(
                            "SET_ERRORS",
                            {
                                invalid: "Email/Password Salah"
                            },
                            { root: true }
                        );
                    }

                    dispatch("setSubmit", false);
                    resolve(response.data);
                })
                .catch(error => {
                    const { meta } = error.response.data;
                    if (meta.code == 401) {
                        commit(
                            "SET_ERRORS",
                            { invalid: meta.message },
                            { root: true }
                        );
                    }

                    dispatch("setSubmit", false);
                    reject(error.response.data);
                });
        });
    }
};

export default actions;
