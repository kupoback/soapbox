<template>
    <header class="main-navigation">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" title="Main Navigation" aria-label="Main Navigation">
            <div class="container-fluid">
                
                <router-link class="navbar-brand"
                             :to="`/`"
                             v-text="`Clique Soapbox`" />
                
                <MainNavigation />
                <ProfileNavigation />
            </div>
        </nav>
    </header>
</template>

<script type="application/javascript">
    import MainNavigation from "./Navigation/MainNavigation.vue";
    import ProfileNavigation from "./Navigation/ProfileNavigation.vue";
    
    export default {
        components: {
            MainNavigation,
            ProfileNavigation
        },
        name: "Header"
    };
</script>

<style scoped>

</style>
