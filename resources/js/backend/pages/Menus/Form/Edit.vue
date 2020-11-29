<template>
    <div class="form-container">
        <form-edit submit-type="updatedata" />
    </div>
</template>

<script>
import Form from "./Form.vue";

export default {
    name: "MenusEdit",
    components: {
        "form-edit": Form
    }
};
</script>

<style scoped></style>
