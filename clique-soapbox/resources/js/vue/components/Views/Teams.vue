<template>
    <div class="container-fluid flex-grow-1">
        <div class="row justify-content-center h-100 main-row">
            <section class="col-sm-8 col-md-7 ptb-5 main-content team">
                <h1 class="display-1">Your Teams</h1>
                <hr>
                <ul class="list-group list-group-flush team__list">
                    <TeamItem v-if="teams"
                              v-for="({_id, slug, title}) in teams"
                              :key="_id"
                              :title="title"
                              :slug="slug" />
                </ul>
            </section>
        </div>
    </div>
</template>

<script type="application/javascript">
    import TeamItem from "../Partials/TeamItem.vue";
    
    export default {
        setup() {
            return {};
        },
        computed: {
            teams() {
                return this.$store.state.teams;
            }
        },
        components: {
            TeamItem,
        },
        name: "TeamListing"
    };
</script>

<style scoped>

</style>
