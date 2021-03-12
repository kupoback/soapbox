<template>
    <footer class="footer">
        <div class="row">
            <transition name="fade">
                <div class="col-auto position-absolute bottom-0 closed-toggle" v-if="!sidebarOpened || viewport === 'mobile'">
                    <SidebarToggler id="sidebar-toggler-closed" />
                </div>
            </transition>
        </div>
    </footer>

</template>

<script type="application/javascript">
    import SidebarToggler from "../Partials/SidebarToggler.vue";
    
    export default {
        computed: {
            sidebarOpened() {
                return this.$store.state.sidebarOpened;
            },
            viewport() {
                return this.$store.state.viewport;
            },
        },
        components: {
            SidebarToggler
        },
        name: "Footer"
    };
</script>

<style scoped>

</style>
