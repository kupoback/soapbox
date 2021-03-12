<template>
    <header class="main-navigation">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" title="Main Navigation" aria-label="Main Navigation">
            <div class="container-fluid">
                <button class="navbar-toggler col-auto order-1" type="button" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand order-2 order-lg-1" href="/">Clique Soapbox</a>
                
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
            MainNavigation, ProfileNavigation
        },
        name: "Header"
    };
</script>

<style scoped>

</style>
