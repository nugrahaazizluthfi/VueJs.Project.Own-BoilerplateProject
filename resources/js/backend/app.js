import Vue from "vue";
import RootApp from "./RootApp.vue";

import router from "./routes/index.js";
import store from "./stores/index.js";

import { BootstrapVue, BootstrapVueIcons } from "bootstrap-vue";
import VueSweetAlert2 from "vue-sweetalert2";
import Antd from "ant-design-vue";
import Vuelidate from "vuelidate";
import notif from "./utils/notification.js";
import render from "./utils/render.js";

Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons);
Vue.use(VueSweetAlert2);
Vue.use(Antd);
Vue.use(Vuelidate);

Vue.prototype.$notif = notif;
Vue.prototype.$render = render;

import "bootstrap-vue/dist/bootstrap-vue.css";
import "bootstrap-vue/dist/bootstrap-vue-icons.min.css";
import "ant-design-vue/dist/antd.css";

new Vue({
    el: "#root",
    router,
    store,
    components: {
        "root-app": RootApp
    }
});
