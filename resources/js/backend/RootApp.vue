<template>
    <div>
        <header-component v-if="isAuth"></header-component>
        <sidebar-component v-if="isAuth"></sidebar-component>
        <div :class="{ 'content-wrapper': isAuth }">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import Header from "./components/Header.vue";
import Sidebar from "./components/Sidebar.vue";
import Footer from "./components/Footer.vue";
export default {
    name: "RootApp",
    components: {
        "header-component": Header,
        "sidebar-component": Sidebar,
        "footer-component": Footer
    },
    computed: {
        ...mapGetters(["isAuth"])
    }
};
</script>

<style>
.errors-group {
    display: block;
    min-height: 25px;
}

.errors-group .information {
    margin-top: 5px;
    margin-bottom: 15px;
    padding: 7px;
    background: rgba(255, 228, 171, 0.5);
    font-size: 11px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.error {
    color: red;
    font-size: 11px;
    font-weight: bold;
    margin-bottom: 10px;
}

.form-group {
    margin-bottom: 0px !important;
    clear: both;
}

.from-group-mb {
    margin-bottom: 20px !important;
}

.login-box-body {
    border: 1px solid #ddd;
    border-top-right-radius: 5px;
    border-bottom-left-radius: 5px;
    background: #fff;
}

.divider {
    display: block;
    height: 20px;
}

.filter-toggle {
    text-align: right;
}

th.column-center,
td.column-center {
    text-align: center !important;
}

.page-title {
    margin-top: 20px;
}
</style>
