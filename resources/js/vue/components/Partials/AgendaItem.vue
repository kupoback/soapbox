<template>
    <div class="d-flex agenda__cards-card list-group-has-handle"
         :data-agenda-id="id">
        <DragHandle drag-class="handle" />
        <div class="list-group-item list-group-item-action">
            <div class="agenda__cards-card__right">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
            </div>
            <div class="agenda__cards-card__left d-fill" aria-current="true" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <div class="d-flex justify-content-between agenda__cards-card--header">
                    <p class="agenda__cards-card__left-title">{{ title }}</p>
                    <p class="pull-right badge bg-secondary rounded-pill">
                        {{ commentCount }}
                        <i class="bi bi-chat-fill"></i>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="application/javascript">
    import DragHandle from "../Elements/Drag-Handle.vue";
    
    export default {
        props: {
            id: [Number, String],
            commentCount: Number,
            title: String,
        },
        components: {
            DragHandle
        },
        name: "AgendaItem"
    };
</script>

<style scoped>

</style>
