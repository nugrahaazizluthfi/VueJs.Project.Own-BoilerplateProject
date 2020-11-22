import Vue from "vue";
import Router from "vue-router";
import store from "../stores/index.js";
import Home from "../pages/Home.vue";
import Hello from "../pages/Hello.vue";
import Login from "../pages/Login.vue";
import TesTable from "../pages/TesTable.vue";

Vue.use(Router);

const prefix = "/bo";

const router = new Router({
    mode: "history",
    routes: [
        {
            path: `${prefix}/`,
            component: Home,
            name: "home",
            meta: { requiresAuth: true }
        },
        {
            path: `${prefix}/hello`,
            component: Hello
        },
        {
            path: `${prefix}/tes-table`,
            component: TesTable
        },
        {
            path: `${prefix}/login`,
            component: Login,
            name: "login"
        }
    ]
});

router.beforeEach((to, from, next) => {
    store.commit("CLEAR_ERRORS");
    if (to.matched.some(record => record.meta.requiresAuth)) {
        let auth = store.getters.isAuth;
        if (!auth) {
            next({ name: "login" });
        } else {
            next();
        }
    } else {
        next();
    }
});

export default router;
