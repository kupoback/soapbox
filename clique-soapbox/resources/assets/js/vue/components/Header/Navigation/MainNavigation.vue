<template>
    <div class="collapse navbar-collapse order-4 order-lg-2" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <NavItem link="/teams" title="Teams" />
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
