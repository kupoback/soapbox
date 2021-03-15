<template>
    <aside class="col-12 col-md-3 col-lg-2 sidebar-content" id="sidebar" data-collapsed="false" ref="sidebar">
        <nav class="sticky-md-top">
            <div class="flex-column pt-5">
                <h3 class="navbar-brand">Team List</h3>
                <div v-if="teams"
                     class="list-group list-group-flush">
                    <SidebarItem v-for="({_id, slug, title}) in teams"
                                 :key="_id"
                                 :slug="slug"
                                 :title="title" />
                </div>
            </div>
        </nav>
        <SidebarToggler id="sidebar-toggler" v-if="viewport !== 'mobile'" />
    </aside>

</template>

<script type="application/javascript">
    import SidebarItem from "./SidebarItem.vue";
    import SidebarToggler from "./SidebarToggler.vue";
    
    export default {
        mounted() {
           this.loadResizedEvent();
           window.addEventListener('resize', () => {
               this.loadResizedEvent();
           })
        },
        methods: {
           loadResizedEvent() {
               this.$store.dispatch('toggleSidebarVisibility', {visibility: this.viewport !== 'mobile'});
           },
           toggleSidebar() {
               const mainWrapper = document.getElementById('main');
               const sidebar = this.$refs.sidebar;
               const vp = this.viewport;
               
               // Need to subtract one extra to compensate for border
               const getSidebarWidth = Number(sidebar.offsetWidth) - 1;
               const sidebarWidth = parseInt( typeof getSidebarWidth);
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
            teams() {
                return this.$store.state.teams;
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
        components: {
            SidebarItem,
            SidebarToggler
        },
        name: "Sidebar"
    };
</script>

<style scoped>

</style>
