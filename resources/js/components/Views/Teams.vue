<template>
    <Layout row-classes="justify-content-center h-100">
        <template v-slot:body>
            <section class="col-sm-8 col-md-7 ptb-5 main-content team">
                <TitleHeader css-classes="mb-5 teams__header"
                             title="Your Teams" />
                <hr>
                <ul class="list-group list-group-flush team__list">
                    <Loading v-if="loading"
                             fill="#FF6700" />
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
    import Loading from "../Elements/Loading.vue";
    import TeamItem from "../Partials/TeamItem.vue";
    import TitleHeader from "../Elements/TitleHeader.vue";
    
    export default {
        setup() {
            return {};
        },
        data() {
            return {
                loading: true,
            };
        },
        mounted() {
            this.getTeams();
        },
        methods: {
            async getTeams() {
                this.loading = true;
                let response = false;
                try {
                    response = await this.$store.dispatch("getTeamListing");
                } catch (error) {
                    console.error(error);
                }
                this.loading = !!response;
            }
        },
        computed: {
            teams() {
                return this.$store.state.teams;
            }
        },
        components: {
            Layout,
            Loading,
            TitleHeader,
            TeamItem,
        },
        name: "TeamListing"
    };
</script>

<style scoped>

</style>
