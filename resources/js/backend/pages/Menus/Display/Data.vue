<template>
    <div class="my-table">
        <a-table
            v-if="data.length > 0"
            :columns="columns"
            :data-source="data"
            :loading="isLoading"
            :pagination="false"
            :defaultExpandAllRows="true"
            bordered
            size="small"
        >
            <template slot="icon" slot-scope="text, record">
                <i :class="'fa ' + record.icon"></i>
            </template>
            <span slot="action" slot-scope="text, record">
                <a-button-group>
                    <a-button
                        type="primary"
                        icon="form"
                        @click="
                            $render({
                                name: 'menus.edit',
                                params: { id: record.key }
                            })
                        "
                    />
                    <a-button
                        type="danger"
                        icon="delete"
                        @click="destroy(record.key)"
                    />
                </a-button-group>
            </span>
        </a-table>
    </div>
</template>

<script>
import columns from "./columns.js";
import { mapActions, mapMutations, mapState } from "vuex";

export default {
    name: "DataMenu",
    data() {
        return {
            columns
        };
    },
    mounted() {
        this.fetch();
    },
    computed: {
        ...mapState("menus", ["data", "isLoading"])
    },
    methods: {
        ...mapActions("menus", ["fetch", "delete"]),
        ...mapActions(["renderTo"]),
        destroy(id) {
            this.$confirm({
                title: "Are you sure delete this data?",
                okText: "Yes",
                okType: "danger",
                cancelText: "No",
                onOk: () => {
                    this.delete(id).then(response => {
                        const { meta } = response;
                        this.$notif(this, meta.status, meta.message);
                        this.fetch();
                    });
                }
            });
        }
    }
};
</script>

<style scoped></style>
