import Vue from "vue";
import RootApp from "./RootApp.vue";

import router from "./routes/index.js";
import store from "./stores/index.js";

import BootstrapVue from "bootstrap-vue";
import VueSweetAlert2 from "vue-sweetalert2";
import Antd from "ant-design-vue";
import Vuelidate from "vuelidate";

Vue.use(BootstrapVue);
Vue.use(VueSweetAlert2);
Vue.use(Antd);
Vue.use(Vuelidate);

import "bootstrap-vue/dist/bootstrap-vue.css";
import "ant-design-vue/dist/antd.css";

new Vue({
    el: "#root",
    router,
    store,
    components: {
        "root-app": RootApp
    }
});
