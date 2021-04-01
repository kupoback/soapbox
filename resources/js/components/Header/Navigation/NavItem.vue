<template>
    <li class="nav-item">
        <router-link :to="{name: link}"
                     class="nav-link"
                     exact-active-class="fw-bold"
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
