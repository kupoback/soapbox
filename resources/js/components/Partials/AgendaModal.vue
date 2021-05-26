<template>
    <div class="modal fade" id="agendaModal" tabindex="-1" aria-labelledby="agendaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl modal__agenda">
            <div class="modal-content">
                <nav v-if="viewport === 'mobile'"
                     class="d-flex col-12 modal-tabs">
                    <ul class="nav nav-tabs w-100"
                        id="nav-tab"
                        role="tablist">
                        <li class="nav-link"
                            role="presentation">
                            <a href="#modal-details-tab"
                               id="modal-details-tab"
                               data-bs-toggle="tab"
                               data-bs-target="#modal-details"
                               role="tab"
                               aria-controls="modal-details"
                               aria-selected="true"
                               class="active">Details</a>
                        </li>
                        <li class="nav-link"
                            role="presentation">
                            <a href="#modal-comments"
                               id="modal-comment-tab"
                               data-bs-toggle="tab"
                               data-bs-target="#modal-comments"
                               role="tab"
                               aria-controls="modal-comments"
                               aria-selected="true">Comments</a></li>
                    </ul>
                </nav>
                <button type="button" class="modal__agenda-close btn-close" data-bs-dismiss="modal" aria-label="Close" @click="closeModal"></button>
                <div class="tab-content modal-tabs">
                    <div id="modal-details"
                         :class="`modal-tabs__block modal__agenda-content ${viewport === 'mobile' ? `${tabPaneClasses} ${activePane}`: '' }`"
                         role="tabpanel"
                         aria-labelledby="modal-details-tab">
                        <div class="modal__agenda-content__header mb-2">
                            <h5 v-if="teamTitle"
                                class="modal-title"
                                id="agendaModalLabel"
                                v-html="teamTitle" />
                            <p class="lead muted-text modal__agenda-content__header__added-by">Added by <span class="modal__agenda-content__header__added-by__name">Clique Studios</span></p>
                        </div>
                        <div class="modal__agenda-content__body">
                            <div class="modal__body--title mb-2">
                                <h3 v-if="title"
                                    class="mb-3"
                                    v-html="title" />
                                <div v-if="priorityStatus"
                                     class="agenda-status">
                                    <!-- Need to figure this out at some point -->
                                    <p v-if="statusObj"
                                       :class="`agenda-status__text ${statusObj.pClass} `"><i :class="`bi ${statusObj.icon}`"></i> {{statusObj.statusText}}</p>
                                </div>
                                <div v-if="created || updated" class="date-created">
                                    <p v-if="created" class="small text-muted mb-0" v-html="`Created: ${created}`" />
                                    <p v-if="updated" class="small text-muted mb-0" v-html="`Updated: ${updated}`" />
                                </div>
                            </div>
                            <div class="modal__body--description">
                                <p v-if="description" v-html="description" />
                            </div>
                            <div class="modal__body-todo-list">
                                <p class="muted-text">Next Steps</p>
                                <draggable
                                    v-if="actionableItems"
                                    :list="actionableItems"
                                    item-key="id"
                                    tag="div"
                                    class="list-group list-group-flush"
                                    handle=".todo-handle"
                                    @end="consoleItem">
                                    <template #item="{element, index}">
                                        <div class="list-group-has-handle">
                                            <DragHandle drag-class="todo-handle" />
                                            <div class="list-group-item list-group-item-action">
                                                <input :id="element.id"
                                                       class="form-check-input me-1"
                                                       type="checkbox"
                                                       value=""
                                                       aria-label="..." />
                                                {{ element.title }}
                                            </div>
                                        </div>
                                    </template>
                                </draggable>
                            </div>
                        </div>
                    </div>
                    <div id="modal-comments"
                         role="tabpanel"
                         aria-labelledby="modal-comments-tab"
                         :class="`modal-tabs__block modal__agenda-comments bg-muted ${viewport === 'mobile' ? tabPaneClasses : ''}`">
                        <div class="modal__agenda-comments-container">
                            <div class="modal__agenda-comments-container__header">
                                <h5 class="modal-title">Comments</h5>
                            </div>
                            <div class="overflow-auto modal__agenda-comments-container__body comment-list">
<!--                                <div v-for="({created_at, commentList}, index) in comments"-->
<!--                                     :key="index"-->
<!--                                     class="comment-date-group">-->
<!--                                    <div class="comment-list__date-group">-->
<!--                                        <span v-text="created_at" />-->
<!--                                    </div>-->
<!--                                    <div v-if="commentList.length"-->
<!--                                         class="comment-group-item">-->
<!--                                        <div v-for="({author, comment, isCurrentUser}, index) in commentList"-->
<!--                                             :key="index"-->
<!--                                             :class="`comment-item comment-item&#45;&#45;${!!isCurrentUser ? 'current' : 'other'}-user-authored`">-->
<!--                                            <div class="comment-item__container">-->
<!--                                                <div class="comment-item__comment" v-html="comment" />-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
                                <div v-for="({created_at, comment}, index) in comments"
                                     :key="index"
                                     class="comment-date-group">
<!--                                    <div class="comment-list__date-group">-->
<!--                                        <span v-text="created_at" />-->
<!--                                    </div>-->
                                    <div v-if="comment.length"
                                         class="comment-group-item">
                                        <div :class="`comment-item comment-item--other-user-authored`">
                                            <div class="comment-item__container">
                                                <div class="comment-item__comment" v-html="comment" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal__agenda-comments-container__footer comment-add">
                                <form class="w-100">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <label for="comment-entry" class="visually-hidden-focusable">Add a comment...</label>
                                            <textarea class="form-control" id="comment-entry" placeholder="Add a comment..." rows="2"></textarea>
                                        </div>
                                        <div class="form-footer col-auto">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script type="application/javascript">

    import DragHandle from "../Elements/Drag-Handle.vue";
    import mixins from "../../util/mixins.js";
    
    export default {
        props: {
            actionableItems: [Array, Object],
            comments: [Array, Object],
            created: String,
            description: String,
            priorityStatus: String,
            teamTitle: String,
            title: String,
            updated: String,
        },
        data() {
            return {
                tabPaneClasses: 'tab-pane fade',
                activePane: 'show active',
                statusObj: false,
            };
        },
        mounted() {
            this.statusObj = this.statusParse(this.priorityStatus);
        },
        methods: {
            consoleItem(evt) {
                if (evt.item) {
                    const itemId = evt.item.dataset.agendaId;
                    // Execute axios call here to update the sort order
                    console.log(itemId);
                }
            },
            closeModal() {
                this.$emit('closeModal');
            },
        },
        computed: {
            viewport() {
                return this.$store.state.viewport;
            },
        },
        components: {
            DragHandle,
        },
        mixins: [mixins],
        name: "AgendaModal"
    };
</script>

<style scoped>

</style>
