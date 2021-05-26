<template>
    <div class="d-flex col-auto profile-nav">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                   href="#"
                   id="profileDropdown"
                   type="button"
                   aria-expanded="false"
                   aria-label="Profile Toggle"
                   data-bs-toggle="dropdown">
                            <span class="profile-image">
                                <img src="'../../../../images/placeholder-headshot-image.jpg" alt="Placeholder Image"
                                     class="nav-image img-fluid img-thumbnail" height="50px" width="50px" />
                            </span>
                    <span class="d-none d-lg-inline-block" v-text="`Clique User`"/>
                </a>
                <ul class="dropdown-menu" aria-labelledby="profileDropdown">
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
                             :name="name"
                             :title="text" />
                </ul>
            </li>
        </ul>
    </div>
</template>

<script type="application/javascript">
    import NavItem from "./NavItem.vue";
    export default {
        components: {NavItem},
        props: ['user'],
        data: () => ({
            dropdown: null,
            dropdownOpen: false,
            links: [
                {
                    name: 'profile',
                    text: 'Profile'
                },
                {
                    name: 'logout',
                    text: 'Sign Out'
                },
            ]
        }),
        name: "ProfileNavigation"
    };
</script>

<style scoped>

</style>
