<template>
    <Layout container-classes="d-flex overflow-scroll"
            row-classes="profile-row"
            :with-sidebar="true">
        <template v-slot:body>
            <section class="col-12 col-md-9 col-lg-8 offset-xl-1 main-content agenda">
                <Loading v-if="isLoading" />
                <p v-if="error" v-html="error" />
                <div v-if="!isLoading && teamData"
                     class="row g-0 row-full-height pt-4">
                    <TitleHeader css-classes="mb-4 agenda__header"
                                 :title="teamData.title">
                        <template #dateTime>
                            <p class="date-time"
                               v-text="teamData.created_at" />
                        </template>
                    </TitleHeader>
                    <div class="col-12 agenda__form-actions">
                        <div class="btn-group row" role="group" aria-label="Edit and Save Buttons">
                            <div class="col-auto">
                                <button type="button"
                                        class="btn btn-primary btn-sm agenda__form-actions__edit"
                                        @click.prevent="editFields(true)"
                                        v-text="`Edit Team`" />
                            </div>
                            <div class="col-auto">
                                <button v-if="fieldDisabled"
                                        type="button"
                                        class="btn btn-success btn-sm col-auto agenda__form-actions__save"
                                        @click.prevent="savefields()"
                                        v-text="`Save`" />
                            </div>
                            <div class="col-auto">
                                <button v-if="fieldDisabled"
                                        type="button"
                                        class="btn btn-danger btn-sm col-auto agenda__form-actions__cancel"
                                        @click.prevent="cancelFields()"
                                        v-text="`Cancel`" />
                            </div>
                        </div>
                    </div>
                    <div v-if="teamData.description"
                         class="col-12 mb-5 pb-4 agenda__description">
                        <label for="team-description" class="muted-text">Description</label>
                        <textarea id="team-description"
                                  class="form-control border-0"
                                  rows="4"
                                  v-model="teamDescription"
                                  :placeholder="teamDescription"
                                  :disabled="!fieldDisabled" />
                        <!--                        <p v-text="teamData.description" />-->
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
                                <AgendaListItem :id="element.id"
                                                :title="element.title"
                                                :status="element.priority_status"
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
    
    import AgendaListItem from "../Partials/AgendaListItem.vue";
    import AgendaModal from "../Partials/AgendaModal.vue";
    import Layout from "../Layout/Layout.vue";
    import Loading from "../Elements/Loading.vue";
    import TitleHeader from "../Elements/TitleHeader.vue";
    
    export default {
        setup() {
            return {};
        },
        data() {
            return {
                agendaList: null,
                activeModalItem: null,
                dragging: false,
                error: false,
                id: null,
                isLoading: true,
                modalLoading: false,
                teamData: null,
                fieldDisabled: false,
            };
        },
        created() {
            this.$watch(
                () => this.$route.params,
                (to, from) => to.slug && this.fetchData(to.slug),
                {
                    immediate: true
                }
            );
        },
        methods: {
            // To be replaced with end event
            consoleItem(evt) {
                if (evt.item) {
                    const itemId = evt.item.dataset.agendaId;
                    // Execute axios call here to update the sort order
                    console.log(itemId);
                }
            },
            fetchData(slug) {
                this.error = this.data = null;
                this.isLoading = true;
                axios.get(`/api/team/${slug}`)
                     .then(({status, data}) => {
                         if (status === 200 && !this.isObjEmpty(data)) {
                             this.teamData = data;
                             this.agendaList = data.topics.length && data.topics;
                         }
                     })
                     .catch(e => console.error(e))
                     .finally(() => this.isLoading = false);
            },
            openModal(elmData) {
                this.modalLoading = true;
                const {id} = elmData;
                axios.get(`/api/topic/${id}`)
                     .then(({status, data}) => !this.isObjEmpty(data) && data)
                     .then(data => this.activeModalItem = data)
                     .then(() => this.modalGet().show())
                     .catch(e => console.error(e))
                     .finally(() => this.modalLoading = false);
            },
            closeModal() {
                setTimeout(() => this.activeModalItem = null, 500);
            },
            modalGet() {
                const modalElm = document.getElementById("agendaModal");
                return new Modal(modalElm);
            },
            editFields(val) {
                this.fieldDisabled = val;
            },
            savefields() {
                console.log(this.teamDescription)
            },
            cancelFields() {
                this.fieldDisabled = false;
            },
        },
        computed: {
            teamDescription() {
                return this.teamData.description;
            },
        },
        components: {
            AgendaListItem,
            AgendaModal,
            Loading,
            Layout,
            TitleHeader,
        },
        mixins: [mixins],
        name: "Agenda"
    };
</script>

<style lang="scss" scoped>
    
    .modal-container {
        z-index:         1000;
        display:         flex;
        flex-flow:       row wrap;
        align-items:     center;
        justify-content: center;
    }

</style>
