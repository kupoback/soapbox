<template>
    <aside class="col-12 col-md-3 col-lg-2 sidebar-content" id="sidebar" data-collapsed="false" ref="sidebar">
        <nav class="sticky-md-top">
            <div class="flex-column pt-5">
                <h3 class="navbar-brand">Team List</h3>
                <div class="list-group list-group-flush">
                    <p class="list-group-item nav-item">
                        <a href="#" class="nav-link">Engineering Monthly Meeting</a>
                    </p>
                    <p class="list-group-item nav-item">
                        <a href="#" class="nav-link">Decoupled WordPress</a>
                    </p>
                    <p class="list-group-item nav-item">
                        <a href="#" class="nav-link">Decoupled React</a>
                    </p>
                </div>
            </div>
        </nav>
        <SidebarToggler id="sidebar-toggler" v-if="viewport !== 'mobile'" />
    </aside>

</template>

<script type="application/javascript">
    import SidebarToggler from "./SidebarToggler.vue";
    export default {
       components: {
            SidebarToggler
        },
        mounted() {
           if (this.viewport === 'mobile') {
               this.$store.dispatch('toggleSidebarVisibility', {visibility: false});
           }
        },
        methods: {
           toggleSidebar(sidebarStatus) {
               const mainWrapper = document.getElementById('main');
               const sidebarToggler = document.querySelector('.sidebar-toggle');
               const sidebar = this.$refs.sidebar;
               const vp = this.viewport;
               
               const sidebarWidth = parseInt(sidebar.offsetWidth - 1);
               const mainWrapperClass = 'sidebar-hidden';
               
               if (!this.sidebarOpened) {
                   mainWrapper.classList.add(mainWrapperClass);
                   sidebar.dataset.collapsed = "true";
                   
                   if (vp === 'mobile') sidebar.style.marginLeft = `-100%`;
                   else sidebar.style.marginLeft = `-${sidebarWidth}px`;
               }
               else {
                   mainWrapper.classList.remove(mainWrapperClass);
                   sidebar.dataset.collapsed = "false";
                   sidebar.style.marginLeft = null;
               }
               
           }
        },
        computed: {
            sidebarOpened() {
                return this.$store.state.sidebarOpened;
            },
            viewport() {
                return this.$store.state.viewport;
            },
        },
        watch: {
            viewport() {
                const viewport = this.$store.state.viewport;
                if (viewport === 'mobile') {
                
                }
            },
            sidebarOpened() {
                this.toggleSidebar(this.$store.state.sidebarOpened)
            }
        },
        name: "Sidebar"
    };
</script>

<style scoped>

</style>
