<template>
    <div class="d-flex col-auto profile-nav">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false" aria-label="Profile Toggle">
                            <span class="profile-image">
                                <img src="'../../../../images/placeholder-headshot-image.jpg" alt="Placeholder Image"
                                     class="nav-image img-fluid img-thumbnail" height="50px" width="50px" />
                            </span>
                    <span class="d-none d-lg-inline-block">Clique User</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="d-lg-none">
                        <a href="#" class="dropdown-item">
                            Signed in as Clique User
                        </a>
                    </li>
                    <li class="d-lg-none">
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <router-link :to="`/profile`" v-text="`Profile`" class="dropdown-item" />
                    </li>
                    <li>
                        <router-link :to="`/log-out`" v-text="`Sign Out`" class="dropdown-item" />
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</template>

<script type="application/javascript">
    export default {
        props: ['user'],
        name: "ProfileNavigation"
    };
</script>

<style scoped>

</style>
