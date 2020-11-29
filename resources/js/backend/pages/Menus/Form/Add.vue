<template>
    <div class="form-container">
        <form-add submit-type="newdata" />
    </div>
</template>

<script>
import Form from "./Form.vue";

export default {
    name: "MenusAdd",
    components: {
        "form-add": Form
    }
};
</script>

<style scoped></style>
