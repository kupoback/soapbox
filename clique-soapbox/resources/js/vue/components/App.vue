<template>
    <main class="main" id="main" role="main">
        <Header />
        <router-view/>
        <Footer />
    </main>
</template>

<script type="application/javascript">
    import Header from "./Header/Header.vue";
    import Footer from "./Footer/Footer.vue";
    export default {
        created() {
            this.$store.dispatch('setViewport');
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
