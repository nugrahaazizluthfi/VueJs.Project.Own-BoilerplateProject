<!-- HTML SECTION -->
<template>
    <div class="login-box">
        <div class="login-logo">
            <router-link :to="{ name: 'home' }">
                Simple App
            </router-link>
        </div>
        <div class="login-box-body">
            <form @submit.prevent="login">
                <p class="login-box-msg">Sign in to start your session</p>

                <div
                    class="form-group"
                    :class="{ 'form-group--error': $v.data.email.$error }"
                >
                    <input
                        type="email"
                        class="form-control"
                        placeholder="Email"
                        :readonly="isSubmit"
                        v-model.trim="$v.data.email.$model"
                    />
                    <span
                        class="glyphicon glyphicon-envelope form-control-feedback"
                    ></span>
                </div>
                <div class="errors-group">
                    <div
                        class="error"
                        v-if="$v.data.email.$dirty && !$v.data.email.required"
                    >
                        Field is required.
                    </div>
                </div>
                <!-- ////////////////////////// -->
                <div
                    class="form-group"
                    :class="{ 'form-group--error': $v.data.password.$error }"
                >
                    <input
                        type="password"
                        class="form-control"
                        placeholder="Password"
                        :readonly="isSubmit"
                        v-model.trim="$v.data.password.$model"
                    />
                    <span
                        class="glyphicon glyphicon-lock form-control-feedback"
                    ></span>
                </div>
                <div class="errors-group">
                    <div
                        class="error"
                        v-if="
                            $v.data.password.$dirty &&
                                !$v.data.password.required
                        "
                    >
                        Field is required.
                    </div>
                </div>
                <!-- ////////////////////////// -->

                <div class="row">
                    <div class="col-xs-8"></div>
                    <div class="col-xs-4">
                        <button
                            type="submit"
                            class="btn btn-primary btn-block btn-flat"
                            :disabled="isSubmit"
                        >
                            {{ isSubmit ? "Submited..." : "Login" }}
                        </button>
                    </div>
                </div>

                <a href="#">I forgot my password</a><br />
            </form>
        </div>
        <div class="login-box-message">
            <div class="error" v-if="errors.invalid">
                {{ errors.invalid }}
            </div>
        </div>
    </div>
</template>

<script>
import { required, minLength } from "vuelidate/lib/validators";
import { mapActions, mapGetters, mapMutations, mapState } from "vuex";

export default {
    name: "Login",
    data() {
        return {
            data: {
                email: "",
                password: ""
            }
        };
    },
    validations: {
        data: {
            email: {
                required
            },
            password: {
                required
            }
        }
    },
    created() {
        if (this.isAuth) {
            this.$router.push({ name: "home" });
        }
    },
    computed: {
        ...mapGetters(["isAuth"]),
        ...mapState(["errors"]),
        ...mapState("auth", ["isSubmit"])
    },
    methods: {
        ...mapActions("auth", ["submit"]),
        ...mapMutations(["CLEAR_ERRORS"]),
        login() {
            this.$v.$touch();
            if (!this.$v.$invalid) {
                this.submit(this.data)
                    .then(() => {
                        if (this.isAuth) {
                            this.CLEAR_ERRORS();
                            this.$router.push({ name: "home" });
                        }
                    })
                    .catch(error => {
                        setTimeout(() => {
                            this.CLEAR_ERRORS();
                        }, 4000);
                    });
            }
        }
    }
};
</script>
<style scoped>
.login-box-message {
    text-align: center;
    margin-top: 10px;
}

.login-box-message .error {
    font-size: 13px;
}
</style>
