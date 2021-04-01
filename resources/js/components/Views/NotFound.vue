<template>
    <Layout row-classes="justify-content-center align-items-center">
        <template v-slot:body>
            <section class="col-sm-8 col-md-7 text-center">
                <TitleHeader title="404: Not Found" />
                <p>The content you're looking for cannot be found.</p>
            </section>
        </template>
    </Layout>
</template>

<script type="application/javascript">
    import Layout from "../Layout/Layout.vue";
    import TitleHeader from "../Elements/TitleHeader.vue";
    
    export default {
        name: "NotFound",
        components: {TitleHeader, Layout}
    };
</script>

<style scoped>

</style>
