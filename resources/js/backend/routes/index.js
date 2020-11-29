import Vue from "vue";
import Router from "vue-router";
import store from "../stores/index.js";
import Home from "../pages/Home.vue";
import Login from "../pages/Login.vue";

// Menus Module
import MenuIndex from "../pages/Menus/Index.vue";
import Menus from "../pages/Menus/Display/Menus.vue";
import MenusAdd from "../pages/Menus/Form/Add.vue";
import MenusEdit from "../pages/Menus/Form/Edit.vue";

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
            path: `${prefix}/menus`,
            component: MenuIndex,
            name: "menus",
            meta: { requiresAuth: true },
            children: [
                {
                    path: "",
                    name: "menus.data",
                    component: Menus,
                    meta: { title: "Menus: Display Data." }
                },
                {
                    path: "add",
                    name: "menus.add",
                    component: MenusAdd,
                    meta: { title: "Menus: Create New Data." }
                },
                {
                    path: "edit/:id",
                    name: "menus.edit",
                    component: MenusEdit,
                    meta: { title: "Menus: Edit Data." }
                }
            ]
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
