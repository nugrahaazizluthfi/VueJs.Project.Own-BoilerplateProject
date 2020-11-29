<template>
    <div class="breadcrumb">
        <li v-for="(link, index) in links" :key="index">
            <router-link :to="link.to">
                <i class="fa" :class="link.icon"></i> {{ link.name }}
            </router-link>
        </li>
        <li class="active">{{ $route.meta.title }}</li>
    </div>
</template>

<script>
export default {
    props: ["links"],
    name: "Breadcrumbs"
};
</script>

<style scoped></style>
