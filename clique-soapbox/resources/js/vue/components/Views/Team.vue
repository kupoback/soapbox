<template>
    <div class="container-fluid flex-grow-1 d-flex overflow-scroll">
        <div class="row main-row profile-row">
            <Sidebar />
            <section class="col-12 col-md-9 col-lg offset-xl-1 main-content agenda">
                <div class="row row-full-height ptb-5">
                    <div class="col-12 mb-4 agenda__header">
                        <p class="date-time">March 2nd, 4:30pm</p>
                        <h1>Team Title</h1>
                    </div>
                    <div class="col-12 mb-5 pb-4 agenda__description">
                        <p class="muted-text">Description</p>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
                    </div>
                    <div class="col-12 pb-3 agenda__cards">
                        <div class="list-group list-group-flush agenda__card">
                            <AgendaItem v-for="(agenda, index) in comments"
                                        :key="index"
                                        :title="agenda.title"
                                        :comment-count="agenda.commentCount" />
                        </div>
                    </div>
                    <AgendaModal />
                    <div class="col-12 order-last align-self-end create-new-item">
                        <form class="row gx-3 align-items-center">
                            <div class="form-floating col-10 col-lg-11">
                                <input type="text" class="form-control" id="newItem" placeholder="Add New Item">
                                <label for="newItem" class="px-4">Add New Item</label>
                            </div>
                            <div class="col-2 col-lg-1 create-new-item__submit ">
                                <button type="submit" class="btn btn-primary btn-circle">
                                    <i class="bi bi-arrow-up"></i>
                                    <span class="visually-hidden-focusable">Add</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>

<script type="application/javascript">
    import AgendaItem from "../Partials/AgendaItem.vue";
    import AgendaModal from "../Partials/AgendaModal.vue";
    import Sidebar from "../Partials/Sidebar.vue";
    
    export default {
        setup() {
            return {
                comments: [
                    {
                        title: "An agenda item",
                        commentCount: 10,
                    },
                    {
                        title: "An agenda item 2",
                        commentCount: 1,
                    },
                    {
                        title: "An agenda item 3",
                        commentCount: 12,
                    },
                    {
                        title: "An agenda item 4",
                        commentCount: 10,
                    },
                    {
                        title: "An agenda item 5",
                        commentCount: 7,
                    },
                    {
                        title: "An agenda item 6",
                        commentCount: 4,
                    },
                    {
                        title: "An agenda item 7",
                        commentCount: 5,
                    },
                    {
                        title: "An agenda item 8",
                        commentCount: 1,
                    },
                    {
                        title: "An agenda item 9",
                        commentCount: 15,
                    },
                    {
                        title: "An agenda item 10",
                        commentCount: 20,
                    },
                
                ]
            };
        },
        components: {
            AgendaModal,
            AgendaItem,
            Sidebar
        },
        name: "Team"
    };
</script>

<style scoped>

</style>
