<template>
    <form class="form-horizontal" @submit.prevent="save">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="box-body">
                    <div class="form-group">
                        <label for="menu" class="col-sm-2 control-label">
                            Menu
                        </label>
                        <div class="col-sm-10">
                            <a-input
                                placeholder="Manajemen Menu"
                                v-model.trim="$v.data.name.$model"
                            />
                            <div class="errors-group">
                                <div
                                    class="error"
                                    v-if="
                                        $v.data.name.$dirty &&
                                            !$v.data.name.required
                                    "
                                >
                                    Field is required.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ////////////////////////// -->
                    <div class="form-group">
                        <label for="path" class="col-sm-2 control-label">
                            Path
                        </label>
                        <div class="col-sm-10">
                            <a-input
                                placeholder="/menus"
                                v-model.trim="$v.data.path.$model"
                            />
                            <div class="errors-group">
                                <div
                                    class="error"
                                    v-if="
                                        $v.data.path.$dirty &&
                                            !$v.data.path.required
                                    "
                                >
                                    Field is required.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ////////////////////////// -->
                    <div class="form-group">
                        <label for="icon" class="col-sm-2 control-label">
                            Icon
                        </label>
                        <div class="col-sm-10">
                            <a-select
                                show-search
                                v-model.trim="data.icon"
                                placeholder="Select a Icon"
                                @search="handleSearch"
                            >
                                <a-select-option value="">
                                    <small>No Icon</small>
                                </a-select-option>
                                <a-select-option
                                    v-for="(icon, index) in optionsIcon"
                                    :value="icon"
                                    :key="index"
                                >
                                    <i class="fa" :class="icon"></i>
                                    {{ icon }}
                                </a-select-option>
                            </a-select>
                            <div class="errors-group">
                                <div class="information">
                                    Kosongkan atau pilih
                                    <strong><small>No Icon</small></strong>
                                    jika tidak akan menggunakan icon.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ////////////////////////// -->
                    <div class="form-group">
                        <label for="parent" class="col-sm-2 control-label">
                            Parent
                        </label>
                        <div class="col-sm-10">
                            <a-select
                                show-search
                                v-model.trim="data.parent"
                                placeholder="Select a Parent"
                            >
                                <a-select-option value="" style="color:#999">
                                    <small>Parent</small>
                                </a-select-option>
                                <a-select-option
                                    v-for="(parent, index) in optionsParent"
                                    :value="parent.key"
                                    :key="index"
                                >
                                    {{ parent.name }}
                                </a-select-option>
                            </a-select>
                            <div class="errors-group">
                                <div class="information">
                                    Kosongkan atau pilih
                                    <strong><small>Parent</small></strong>
                                    jika menu ini akan dijadikan parent.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ////////////////////////// -->
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="box-footer">
            <button
                type="button"
                @click="$render({ name: 'menus.data' })"
                class="btn btn-danger"
            >
                Cancel
            </button>
            <button
                ref="submit"
                type="submit"
                class="btn btn-info pull-right"
                :disabled="isSubmit"
            >
                {{ isSubmit ? "Submited..." : "Save" }}
            </button>
        </div>
        <!-- /.box-footer -->
    </form>
</template>

<script>
import { mapState, mapActions, mapMutations } from "vuex";
import { required, minLength } from "vuelidate/lib/validators";
import icons from "../../../stores/menus/icons.js";
import notification from "../../../utils/notification.js";

export default {
    props: ["submitType"],
    name: "MenusAdd",
    data() {
        return {
            data: {
                name: "",
                path: "",
                icon: "",
                parent: ""
            },
            type: "",
            message: ""
        };
    },
    validations: {
        data: {
            name: {
                required
            },
            path: {
                required
            }
        }
    },
    computed: {
        ...mapState("menus", ["optionsIcon", "optionsParent", "isSubmit"])
    },
    methods: {
        ...mapActions("menus", [
            "callOptionsIcons",
            "callOptionsParent",
            "submit",
            "update",
            "fetchById"
        ]),
        handleSearch(value) {
            this.callOptionsIcons(value);
        },
        save() {
            this.$v.$touch();
            let payload = this.data;

            if (!this.$v.$invalid) {
                if (this.submitType === "newdata") {
                    this.submit(payload).then(response => {
                        const { meta } = response;
                        this.$notif(this, meta.status, meta.message);
                    });
                } else {
                    const id = this.$route.params.id;
                    this.update({
                        payload,
                        id
                    }).then(response => {
                        const { meta } = response;
                        this.$notif(this, meta.status, meta.message);
                    });
                }

                this.$router.push({ name: "menus.data" });
            }
        },
        setEditForm({ results }) {
            const { name, path, icon, parent } = results;
            const bind = {
                name,
                path,
                icon: icon === null || icon === "" ? "" : ricon,
                parent: parent === null || parent === 0 ? "" : parent
            };

            this.data = bind;
        }
    },
    created() {
        this.callOptionsIcons();
        this.callOptionsParent();

        if (this.submitType === "updatedata") {
            this.fetchById(this.$route.params.id).then(res => {
                this.setEditForm(res);
            });
        }
    }
};
</script>

<style scoped></style>
