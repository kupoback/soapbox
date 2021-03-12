<template>
    <li class="nav-item">
        <a class="nav-link" :href="link" v-text="title"></a>
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
