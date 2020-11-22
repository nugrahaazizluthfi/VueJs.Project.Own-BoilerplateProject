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
    min-height: 10px;
}
.error {
    color: red;
    font-size: 11px;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group {
    margin-bottom: 0px !important;
    clear: both;
}

.login-box-body {
    border: 1px solid #ddd;
    border-top-right-radius: 5px;
    border-bottom-left-radius: 5px;
    background: #fff;
}
</style>
