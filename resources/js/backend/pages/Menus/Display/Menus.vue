<template>
    <div>
        <div class="tab-pane active" id="tab_1-1">
            <render-filter></render-filter>
            <div class="divider"></div>
            <render-table></render-table>
        </div>
    </div>
</template>

<script>
import RenderFilter from "./Filter.vue";
import RenderTable from "./Data.vue";

export default {
    name: "Menus",
    components: {
        "render-filter": RenderFilter,
        "render-table": RenderTable
    }
};
</script>

<style scoped></style>
