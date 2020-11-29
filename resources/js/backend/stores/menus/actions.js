import $axios from "../../utils/api.js";
import icons from "./icons.js";

const actions = {
    submit({ commit }, payload) {
        commit("SET_SUBMIT", true);

        return new Promise((resolve, reject) => {
            if (payload.parent === "") payload.parent = 0;
            $axios
                .post("/menus", payload)
                .then(response => {
                    commit("SET_SUBMIT", false);
                    resolve(response.data);
                })
                .catch(error => {
                    reject(error.response.data);
                });
        });
    },
    update({ commit }, { payload, id }) {
        commit("SET_SUBMIT", true);

        return new Promise((resolve, reject) => {
            if (payload.parent === "") payload.parent = 0;
            $axios
                .post(`/menus/${id}`, payload)
                .then(response => {
                    commit("SET_SUBMIT", false);
                    resolve(response.data);
                })
                .catch(error => {
                    reject(error.response.data);
                });
        });
    },
    delete({}, payload) {
        return new Promise((resolve, reject) => {
            $axios
                .delete(`/menus/${payload}`)
                .then(response => {
                    resolve(response.data);
                })
                .catch(error => {
                    reject(error.response.data);
                });
        });
    },
    fetch({ commit }) {
        commit("SET_DATA", []);
        commit("SET_LOADING", true);
        return new Promise((resolve, reject) => {
            $axios
                .get("/menus")
                .then(response => {
                    const { results, meta } = response.data;

                    // DELETE CHILDREN WITH EMPTY VALUE
                    const data = results.map(item => {
                        if (item.children.length <= 0) delete item.children;
                        return item;
                    });

                    if (meta.status == "success") {
                        commit("SET_DATA", data);
                    } else {
                        commit("SET_DATA", []);
                    }

                    commit("SET_LOADING", false);
                    resolve(response.data);
                })
                .catch(error => {
                    const { meta } = error.response.data;
                    if (meta.code == 401) {
                        commit("SET_DATA", []);
                    }

                    reject(error.response.data);
                });
        });
    },
    fetchById({}, payload) {
        return new Promise((resolve, reject) => {
            $axios
                .get(`/menus/${payload}`)
                .then(response => {
                    resolve(response.data);
                })
                .catch(error => {
                    reject(error.response.data);
                });
        });
    },
    callOptionsIcons({ commit }, payload = "") {
        let results = icons;
        if (payload !== "") {
            results = icons.filter(
                item => item.toLowerCase().indexOf(payload) > -1
            );
        }

        commit("SET_OPTIONS_ICON", results);
    },
    callOptionsParent({ commit }) {
        commit("SET_OPTIONS_PARENT", []);
        return new Promise((resolve, reject) => {
            $axios
                .get("/parent-options")
                .then(response => {
                    const { results, meta } = response.data;

                    if (meta.status == "success") {
                        commit("SET_OPTIONS_PARENT", results);
                    } else {
                        commit("SET_OPTIONS_PARENT", []);
                    }

                    resolve(response.data);
                })
                .catch(error => {
                    const { meta } = error.response.data;

                    if (meta.code == 401) {
                        commit("SET_OPTIONS_PARENT", []);
                    }

                    reject(error.response.data);
                });
        });
    }
};

export default actions;
