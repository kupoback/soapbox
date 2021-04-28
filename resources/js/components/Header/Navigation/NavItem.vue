<template>
    <li :class="`nav-item ${liClass}`">
        <router-link :to="{name: link}"
                     :class="navClass || 'nav-link'"
                     v-text="title" />
    </li>
</template>

<script type="application/javascript">
    export default {
        props: {
            link: String,
            title: String,
            navClass: String,
            liClass: String,
        },
        name: "NavItem"
    };
</script>

<style scoped>

</style>
