<template>
    <Layout container-classes="d-flex overflow-scroll"
            row-classes="profile-row"
            :with-sidebar="true">
        <template v-slot:body>
            <section class="col-12 col-md-9 col-lg-8 offset-xl-1 main-content agenda">
                <Loading v-if="loading" />
                <div v-if="loading && agendaList.length"
                     class="row g-0 row-full-height pt-4">
                    <TitleHeader css-classes="mb-4 agenda__header"
                                 title="Team Title">
                        <template v-slot:date-time>
                            <p class="date-time">March 2nd, 4:30pm</p>
                        </template>
                    </TitleHeader>
                    <div class="col-12 mb-5 pb-4 agenda__description">
                        <p class="muted-text">Description</p>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
                    </div>
                    <div class="col-12 agenda__cards">
                        <draggable
                            :list="agendaList"
                            item-key="id"
                            tag="div"
                            class="list-group list-group-flush"
                            handle=".handle"
                            @end="consoleItem">
                            <template #item="{element, index}">
                                <AgendaItem :id="element.id"
                                            :title="element.title"
                                            :comment-count="element.commentCount" />
                            </template>
                        </draggable>
                    </div>
                    <div class="col-12 order-last align-self-end position-sticky bottom-0 bg-white create-new-item">
                        <form class="row gx-3 align-items-center no-gutters create-new-item__form">
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
            <AgendaModal />
        </template>
    </Layout>
</template>

<script type="application/javascript">
    
    import AgendaItem from "../Partials/AgendaItem.vue";
    import AgendaModal from "../Partials/AgendaModal.vue";
    import Layout from "../Layout/Layout.vue";
    import TitleHeader from "../Elements/TitleHeader.vue";
    import Loading from "../Elements/Loading.vue";
    
    export default {
        setup() {
            return {};
        },
        data() {
            return {
                agendaList: [
                    {
                        id: "ID_0193",
                        title: "An agenda item",
                        commentCount: 10,
                    },
                    {
                        id: "ID_01424",
                        title: "An agenda item 2",
                        commentCount: 1,
                    },
                    {
                        id: "ID_017452",
                        title: "An agenda item 3",
                        commentCount: 12,
                    },
                    {
                        id: "ID_0548",
                        title: "An agenda item 4",
                        commentCount: 10,
                    },
                    {
                        id: "ID_87515",
                        title: "An agenda item 5",
                        commentCount: 7,
                    },
                    {
                        id: "ID_99845",
                        title: "An agenda item 6",
                        commentCount: 4,
                    },
                    {
                        id: "ID_5212",
                        title: "An agenda item 7",
                        commentCount: 5,
                    },
                    {
                        id: "ID_02585",
                        title: "An agenda item 8",
                        commentCount: 1,
                    },
                    {
                        id: "ID_0165",
                        title: "An agenda item 9",
                        commentCount: 15,
                    },
                    {
                        id: "ID_01254",
                        title: "An agenda item 10",
                        commentCount: 20,
                    },
                
                ],
                data: false,
                dragging: false,
                error: false,
                loading: true,
            };
        },
        created() {
            this.$watch(
                () => this.$route.params,
                () => {
                    this.fetchData();
                },
                // fetch the data when the view is created and the data is
                // already being observed
                { immediate: true }
            )
        },
        methods: {
            consoleItem(evt) {
                if (evt.item) {
                    const itemId = evt.item.dataset.agendaId;
                    // Execute axios call here to update the sort order
                    console.log(itemId);
                }
            },
            fetchData() {
                this.error = this.data = null;
                this.loading = true
                axios.get(`/api/team/${this.$route.params.slug}`)
                     .then(res => console.log(res))
                // getPost(this.$route.params.slug, (err, post) => {
                //     this.loading = false
                //     if (err) {
                //         this.error = err.toString()
                //     } else {
                //         this.post = post
                //     }
                // })
            }
        },
        components: {
            Loading,
            Layout,
            TitleHeader,
            AgendaModal,
            AgendaItem
        },
        name: "Agenda"
    };
</script>

<style scoped>

</style>
