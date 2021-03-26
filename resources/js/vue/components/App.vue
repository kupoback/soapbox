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
            if (this.user) {
                const user = JSON.parse(this.user)
                this.$store.commit('SET_USER', user)
            }
        },
        mounted() {
            window.addEventListener('resize', () => {
                this.$store.dispatch('setViewport');
            })
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
