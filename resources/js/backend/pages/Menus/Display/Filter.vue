<template>
    <div class="filter">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <a-button type="primary" @click="render({ name: 'menus.add' })">
                    Add Menu
                    <a-icon type="plus-square" />
                </a-button>
            </div>
        </div>
    </div>
</template>

<script>
import render from "../../../utils/render.js";

export default {
    name: "FilterMenu",
    methods: {
        render
    }
};
</script>

<style scoped></style>
