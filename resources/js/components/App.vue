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
            this.$store.commit('storeTitle', this.$route.meta.title);
            if (this.user) {
                const user = JSON.parse(this.user)
                this.$store.commit('SET_USER', user)
            }
            if (!this.teams) {
                this.getTeams();
            }
        },
        mounted() {
            // this.$store.dispatch('fetchAuthUser');
            window.addEventListener('resize', () => {
                this.$store.dispatch('setViewport');
            })
        },
        methods: {
            async getTeams() {
                try {
                    return await this.$store.dispatch("getTeamListing");
                } catch (error) {
                    console.error(error);
                }
            }
        },
        computed: {
            // ...mapGetters({ authUser: 'authUser' })
        },
        watch: {
            $route(to, from) {
                this.$store.commit('storeTitle', to.meta.title);
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
