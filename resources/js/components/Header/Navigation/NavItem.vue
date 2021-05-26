<template>
    <li :class="`nav-item ${liClass || ''}`">
        <router-link :to="{ name: name, params: {slug: (slug || '')} }"
                     :class="`nav-link ${navClass || ''}`"
                     v-text="title" />
    </li>
</template>

<script type="application/javascript">
    export default {
        props: {
            liClass: String,
            name: String,
            navClass: String,
            slug: String,
            title: String,
        },
        name: "NavItem"
    };
</script>

<style scoped>

</style>
