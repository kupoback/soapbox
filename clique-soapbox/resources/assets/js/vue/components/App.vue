<template>
    <main class="main" id="main" role="main">
        <Header />
        
        <Home />
        
        <Footer />
    </main>
</template>

<script type="application/javascript">
    
    import Header from "./Header/Header.vue";
    import Home from "./Pages/Home.vue";
    import Footer from "./Footer/Footer.vue";
    
    export default {
        components: {
            Footer,
            Home,
            Header,
        },
        name: "App"
    };
</script>

<style scoped>

</style>
