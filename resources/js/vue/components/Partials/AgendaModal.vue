<template>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <button type="button" class="modal__agenda-close btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="tab-content modal-tabs">
                    <div id="modal-details"
                         :class="`modal-tabs__block modal__agenda-content ${viewport === 'mobile' ? `${tabPaneClasses} ${activePane}`: '' }`"
                         role="tabpanel"
                         aria-labelledby="modal-details-tab">
                        <div class="modal__agenda-content__header mb-2">
                            <h5 class="modal-title" id="exampleModalLabel">Team Name</h5>
                            <p class="lead muted-text modal__agenda-content__header__added-by">Added by <span class="modal__agenda-content__header__added-by__name">Clique Studios</span></p>
                        </div>
                        <div class="modal__agenda-content__body">
                            <div class="modal__body--title mb-2">
                                <h3 class="mb-3">Topic Title</h3>
                                <div class="agenda-status">
                                    <p class="agenda-status__text text-danger"><i class="bi bi-exclamation-circle-fill"></i> High Priority</p>
                                    <p class="agenda-status__text text-success"><i class="bi bi-caret-down-fill"></i> Low Priority</p>
                                </div>
                            </div>
                            <div class="modal__body--description">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
                                <p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium tenetur ratione excepturi voluptate recusandae! Temporibus optio eum in dolorum laboriosam nemo. Ipsa nesciunt quibusdam beatae iste rem perspiciatis, voluptatum alias!</p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum eligendi tempora explicabo, soluta impedit minima, magni, perferendis velit dolore quibusdam veritatis. Blanditiis beatae velit aliquid reprehenderit inventore esse quibusdam ut.</p>
                            </div>
                            <div class="modal__body-todo-list">
                                <p class="muted-text">Next Steps</p>
                                <draggable
                                    :list="toDoList"
                                    item-key="id"
                                    tag="div"
                                    class="list-group list-group-flush"
                                    handle=".todo-handle"
                                    @end="consoleItem">
                                    <template #item="{element, index}">
                                        <div class="list-group-has-handle">
                                            <DragHandle drag-class="todo-handle" />
                                            <div class="list-group-item list-group-item-action">
                                                <input :id="element.formID"
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
                                <div v-for="({date, commentList}, index) in comments"
                                     :key="index"
                                     class="comment-date-group">
                                    <div class="comment-list__date-group">
                                        <span v-text="date"></span>
                                    </div>
                                    <div v-if="commentList.length"
                                         class="comment-group-item">
                                        <div v-for="({author, comment, isCurrentUser}, index) in commentList"
                                             :key="index"
                                             :class="`comment-item comment-item--${!!isCurrentUser ? 'current' : 'other'}-user-authored`">
                                            <div class="comment-item__container">
                                                <div class="comment-item__comment" v-html="comment">
                                                </div>
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
    
    export default {
        props: {},
        data() {
            return {
                comments: [
                    {
                        date: "January 1st, 2021",
                        commentList: [
                            {
                                author: "Jane Doe",
                                comment:
                                    "<p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>",
                                isCurrentUser: false,
                            },
                            {
                                author: "John Doe",
                                comment:
                                    "<p>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.</p>",
                                isCurrentUser: true,
                            },
                            {
                                author: "Patricia Doe",
                                comment:
                                    "<p>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</p>",
                                isCurrentUser: false,
                            },
                            {
                                author: "John Doe",
                                comment:
                                    "<p>Donec nec justo eget felis facilisis fermentum.</p>",
                                isCurrentUser: true,
                            },
                        ]
                    },
                    {
                        date: "Feburary 1st, 2021",
                        commentList: [
                            {
                                author: "Jane Doe",
                                comment:
                                    "<p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>",
                                isCurrentUser: false,
                            },
                            {
                                author: "John Doe",
                                comment:
                                    "<p>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.</p>",
                                isCurrentUser: true,
                            },
                            {
                                author: "John Doe",
                                comment:
                                    "<p>Donec nec justo eget felis facilisis fermentum.</p>",
                                isCurrentUser: true,
                            },
                        ]
                    },
                    {
                        date: "March 1st, 2021",
                        commentList: [
                            {
                                author: "John Doe",
                                comment:
                                    "<p>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.</p>",
                                isCurrentUser: true,
                            },
                            {
                                author: "Jane Doe",
                                comment:
                                    "<p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>",
                                isCurrentUser: false,
                            },
                            {
                                author: "Patricia Doe",
                                comment:
                                    "<p>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</p>",
                                isCurrentUser: false,
                            },
                            {
                                author: "John Doe",
                                comment:
                                    "<p>Donec nec justo eget felis facilisis fermentum.</p>",
                                isCurrentUser: true,
                            },
                        ]
                    },
                ],
                tabPaneClasses: 'tab-pane fade',
                activePane: 'show active',
                toDoList: [
                    {
                        id: 'tt_01',
                        title: 'Item 01',
                        formID: 'item-01',
                    },
                    {
                        id: 'tt_02',
                        title: 'Item 02',
                        formID: 'item-02',
                    },
                    {
                        id: 'tt_03',
                        title: 'Item 03',
                        formID: 'item-03',
                    },
                    {
                        id: 'tt_04',
                        title: 'Item 04',
                        formID: 'item-04',
                    },
                    {
                        id: 'tt_05',
                        title: 'Item 05',
                        formID: 'item-05',
                    },
                    {
                        id: 'tt_06',
                        title: 'Item 06',
                        formID: 'item-06',
                    },
                    {
                        id: 'tt_07',
                        title: 'Item 07',
                        formID: 'item-07',
                    },
                    {
                        id: 'tt_08',
                        title: 'Item 08',
                        formID: 'item-08',
                    },
                ]
            };
        },
        methods: {
            consoleItem(evt) {
                if (evt.item) {
                    const itemId = evt.item.dataset.agendaId;
                    // Execute axios call here to update the sort order
                    console.log(itemId);
                }
            }
        },
        computed: {
            viewport() {
                return this.$store.state.viewport;
            },
        },
        components: {
            DragHandle,
        },
        name: "AgendaModal"
    };
</script>

<style scoped>

</style>
