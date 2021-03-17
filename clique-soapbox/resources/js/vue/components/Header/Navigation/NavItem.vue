<template>
    <li class="nav-item">
        <router-link :to="link"
                     class="nav-link"
                     v-text="title" />
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
