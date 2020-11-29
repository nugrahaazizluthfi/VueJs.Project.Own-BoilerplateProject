<template>
    <div class="container-fluid">
        <div class="page-title">
            <breadcrumb :links="breadcrumbs"></breadcrumb>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- Custom Tabs (Pulled to the right) -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        <li class="active p-5"></li>
                        <li class="pull-left header">
                            <i class="fa fa-th"></i> Page:
                            <strong>Menus</strong>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <router-view></router-view>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</template>

<script>
import Breadcrumbs from "./../../components/Breadcrumbs.vue";

export default {
    name: "MenuIndex",
    data() {
        return {
            breadcrumbs: [
                {
                    name: "Home",
                    to: { name: "menus.data" },
                    icon: "fa-home"
                }
            ]
        };
    },
    components: {
        breadcrumb: Breadcrumbs
    }
};
</script>

<style scoped></style>
