<template>
    <div id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
            <NavItem link="/teams"
                     title="Teams" />
        </ul>
    </div>
</template>

<script type="application/javascript">
    import NavItem from "./NavItem.vue";
    export default {
        components: {
            NavItem
        },
        name: "MainNavigation"
    };
</script>

<style scoped>

</style>
