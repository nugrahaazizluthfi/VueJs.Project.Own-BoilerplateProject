<template>
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="#">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-th"></i>
                        <span>Setting Application</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <router-link to="/bo/menus">
                                <i class="fa fa-circle-o"></i> Manajemen Menus
                            </router-link>
                        </li>
                        <li>
                            <a href="../../index2.html"
                                ><i class="fa fa-circle-o"></i> Manajemen
                                Roles</a
                            >
                        </li>
                        <li>
                            <a href="../../index.html"
                                ><i class="fa fa-circle-o"></i> Manajemen
                                Users</a
                            >
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>
</template>

<script>
export default {};
</script>
