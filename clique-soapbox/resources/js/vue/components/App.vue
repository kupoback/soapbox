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
        components: {
            Footer,
            Header,
        },
        name: "App"
    };
</script>

<style scoped>

</style>
