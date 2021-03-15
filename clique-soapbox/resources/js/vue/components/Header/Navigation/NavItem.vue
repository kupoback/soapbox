<template>
    <li class="nav-item">
        <router-link :to="link" v-text="title" class="nav-link" />
    </li>
</template>

<script type="application/javascript">
    export default {
        props: {
            link: String,
            title: String,
        },
        name: "NavItem"
    };
</script>

<style scoped>

</style>
