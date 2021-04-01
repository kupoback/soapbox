<template>
    <Layout row-classes="justify-content-center h-100">
        <template v-slot:body>
            <section class="col-sm-8 col-md-7 ptb-5 main-content team">
                <TitleHeader css-classes="mb-5 teams__header"
                             title="Your Teams" />
                <hr>
                <ul class="list-group list-group-flush team__list">
                    <TeamItem v-if="teams"
                              v-for="({_id, slug, title}) in teams"
                              :key="_id"
                              :title="title"
                              :slug="slug" />
                </ul>
            </section>
        </template>
        
    </Layout>
</template>

<script type="application/javascript">
    import Layout from "../Layout/Layout.vue";
    import TeamItem from "../Partials/TeamItem.vue";
    import TitleHeader from "../Elements/TitleHeader.vue";
    
    export default {
        setup() {
            return {};
        },
        mounted() {
            this.getTeams();
        },
        methods: {
            getTeams() {
                axios.get('/teams')
                     .then(res => {
                    // console.log(res);
                });
            }
        },
        computed: {
            teams() {
                return this.$store.state.teams;
            }
        },
        components: {
            Layout,
            TitleHeader,
            TeamItem,
        },
        name: "TeamListing"
    };
</script>

<style scoped>

</style>
