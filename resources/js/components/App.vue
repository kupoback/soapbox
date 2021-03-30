<template>
    <main class="main" id="main-app" role="main">
        <Header :app-name="appName" />
        <router-view/>
        <Footer />
    </main>
</template>

<script type="application/javascript">
    import Header from "./Header/Header.vue";
    import Footer from "./Footer/Footer.vue";
    export default {
        props:{
            appName: String,
        },
        created() {
            this.$store.dispatch('setViewport');
            this.$store.dispatch('setPageTitle', this.$route.meta.title);
            if (this.user) {
                const user = JSON.parse(this.user)
                this.$store.commit('SET_USER', user)
            }
        },
        mounted() {
            // this.$store.dispatch('fetchAuthUser');
            window.addEventListener('resize', () => {
                this.$store.dispatch('setViewport');
            })
        },
        computed: {
            // ...mapGetters({ authUser: 'authUser' })
        },
        watch: {
            $route(to, from) {
                this.$store.dispatch('setPageTitle', to.meta.title);
            }
        },
        components: {
            Footer,
            Header,
        },
        name: "App"
    };
</script>

<style scoped>

</style>
