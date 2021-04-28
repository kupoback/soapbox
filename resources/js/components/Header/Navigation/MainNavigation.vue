<template>
    <div id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
            <li v-if="teams"
                class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                   href="#"
                   id="teamDropdown"
                   type="button"
                   aria-expanded="false"
                   aria-label="Profile Toggle"
                   data-bs-toggle="dropdown">
                    <span class="d-none d-lg-inline-block" v-text="`Clique User`"/>
                </a>
                <ul class="dropdown-menu" aria-labelledby="teamDropdown">
                    <li class="d-lg-none">
                        <a href="#" class="dropdown-item">
                            Signed in as Clique User
                        </a>
                    </li>
                    <li class="d-lg-none">
                        <hr class="dropdown-divider">
                    </li>
                    <NavItem v-for="({name, text}, index) in links"
                             :key="index"
                             nav-class="dropdown-item"
                             :link="name"
                             :title="text" />
                </ul>
            </li>
            <NavItem v-else
                     link="teams"
                     title="Teams" />
            
        </ul>
    </div>
</template>

<script type="application/javascript">
    import NavItem from "./NavItem.vue";
    export default {
        computed: {
            teams() {
                return this.$store.state.teams;
            },
        },
        components: {
            NavItem
        },
        name: "MainNavigation"
    };
</script>

<style scoped>

</style>
