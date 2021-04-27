<template>
    <Layout container-classes="d-flex overflow-scroll"
            row-classes="profile-row"
            :with-sidebar="true">
        <template v-slot:body>
            <section class="col-12 col-md-9 col-lg-8 offset-xl-1 main-content agenda">
                <Loading v-if="loading" />
                <div v-if="!loading && teamData"
                     class="row g-0 row-full-height pt-4">
                    <TitleHeader css-classes="mb-4 agenda__header"
                                 :title="teamData.title">
                        <template v-slot:date-time>
                            <p class="date-time"
                               v-text="teamData.created_at" />
                        </template>
                    </TitleHeader>
                    <div v-if="teamData.description"
                         class="col-12 mb-5 pb-4 agenda__description">
                        <p class="muted-text">Description</p>
                        <p v-text="teamData.description" />
                    </div>
                    <div v-if="agendaList"
                         class="col-12 agenda__cards">
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
                                            :comment-count="element.commentCount"
                                            :element="element"
                                            @openModal="openModal" />
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
            <section v-if="modalLoading"
                     class="modal-container position-absolute w-100 h-100">
                <Loading v-if="modalLoading" />
            </section>
            <AgendaModal v-if="activeModalItem"
                         :actionable-items="activeModalItem.actionable_items"
                         :comments="activeModalItem.comments"
                         :created="activeModalItem.created_at"
                         :description="activeModalItem.description"
                         :priority-status="activeModalItem.priority_status"
                         :team-title="teamData.title"
                         :title="activeModalItem.title"
                         :updated="activeModalItem.updated_at"
                         @closeModal="closeModal" />
        </template>
    </Layout>
</template>

<script type="application/javascript">
    import {Modal} from "bootstrap";
    import mixins from "../../util/mixins.js";
    
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
                agendaList: null,
                activeModalItem: null,
                // Temp Data
                // agendaList: [
                //     {
                //         id: "ID_0193",
                //         title: "An agenda item",
                //         commentCount: 10,
                //     },
                //     {
                //         id: "ID_01424",
                //         title: "An agenda item 2",
                //         commentCount: 1,
                //     },
                //     {
                //         id: "ID_017452",
                //         title: "An agenda item 3",
                //         commentCount: 12,
                //     },
                //     {
                //         id: "ID_0548",
                //         title: "An agenda item 4",
                //         commentCount: 10,
                //     },
                //     {
                //         id: "ID_87515",
                //         title: "An agenda item 5",
                //         commentCount: 7,
                //     },
                //     {
                //         id: "ID_99845",
                //         title: "An agenda item 6",
                //         commentCount: 4,
                //     },
                //     {
                //         id: "ID_5212",
                //         title: "An agenda item 7",
                //         commentCount: 5,
                //     },
                //     {
                //         id: "ID_02585",
                //         title: "An agenda item 8",
                //         commentCount: 1,
                //     },
                //     {
                //         id: "ID_0165",
                //         title: "An agenda item 9",
                //         commentCount: 15,
                //     },
                //     {
                //         id: "ID_01254",
                //         title: "An agenda item 10",
                //         commentCount: 20,
                //     },
                //
                // ],
                dragging: false,
                error: false,
                id: null,
                loading: true,
                modalLoading: false,
                teamData: null,
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
                {immediate: true}
            );
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
                this.loading = true;
                axios.get(`/api/team/${this.$route.params.slug}`)
                     .then(({status, data}) => {
                         if (status === 200 && !this.isObjEmpty(data)) {
                             this.teamData = data;
                             this.agendaList = data.topics.length && data.topics;
                         }
                     })
                     .catch(e => console.error(e))
                     .finally(() => this.loading = false);
            },
            openModal(elmData) {
                this.modalLoading = true;
                const {id} = elmData;
                axios.get(`/api/topic/${id}`)
                     .then(({status, data}) => !this.isObjEmpty(data) && data)
                     .then(data => this.activeModalItem = data)
                     .then(() => this.modalGet().show())
                     .catch(e => console.error(e))
                    .finally(() => this.modalLoading = false)
            },
            closeModal() {
                setTimeout(() => this.activeModalItem = null, 500);
            },
            modalGet() {
                const modalElm = document.getElementById('agendaModal');
                return new Modal(modalElm);
            }
        },
        components: {
            Loading,
            Layout,
            TitleHeader,
            AgendaModal,
            AgendaItem
        },
        mixins: [mixins],
        name: "Agenda"
    };
</script>

<style lang="scss" scoped>

    .modal-container {
        z-index: 1000;
        display: flex;
        flex-flow: row wrap;
        align-items: center;
        justify-content: center;
    }
    
</style>
