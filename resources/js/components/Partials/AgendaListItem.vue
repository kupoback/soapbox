<template>
    <div class="d-flex agenda__cards-card list-group-has-handle"
         :data-agenda-id="id">
        <DragHandle drag-class="handle" />
        <div class="list-group-item list-group-item-action">
            <div class="agenda__cards-card__right">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
            </div>
            <div class="agenda__cards-card__left d-fill"
                 aria-current="true"
                 @click="triggerModal(element)">
                <AgendaItem :title="title"
                            :status="statusObj"
                            :commentCount="commentCount"/>
            </div>
        </div>
    </div>
</template>

<script type="application/javascript">
    import AgendaItem from "../Elements/AgendaItem.vue";
    import DragHandle from "../Elements/Drag-Handle.vue";
    import mixins from "../../util/mixins.js";
    
    export default {
        props: {
            id: [Number, String],
            commentCount: Number,
            status: String,
            title: String,
            element: [Array, Object]
        },
        data() {
            return {
                statusObj: false
            }
        },
        mounted() {
            this.statusObj = this.statusParse(this.status);
        },
        methods: {
            triggerModal(elmData) {
                this.$emit('openModal', elmData);
            }
        },
        components: {
            DragHandle,
            AgendaItem
        },
        mixins: [mixins],
        name: "AgendaListItem"
    };
</script>

<style scoped>

</style>
