<template>
    <div class="d-flex agenda__cards-card"
         :data-agenda-id="id">
        <div class="agenda__cards-card__handle">
            <div class="agenda__cards-card__handle-icons">
                <div class="agenda__cards-card__handle-icons__icon handle">
                    <svg viewBox="0 0 122 220" width="15px" height="20px">
                        <rect stroke="#9a98ae" fill="#9a98ae" stroke-width="1" x="73.5" y="24.5" width="24" height="24"></rect>
                        <rect stroke="#9a98ae" fill="#9a98ae" stroke-width="1" x="24.5" y="73.5" width="24" height="24"></rect>
                        <rect stroke="#9a98ae" fill="#9a98ae" stroke-width="1" x="24.5" y="24.5" width="24" height="24"></rect>
                        <rect stroke="#9a98ae" fill="#9a98ae" stroke-width="1" x="73.5" y="73.5" width="24" height="24"></rect>
                        <rect stroke="#9a98ae" fill="#9a98ae" stroke-width="1" x="73.5" y="122.5" width="24" height="24"></rect>
                        <rect stroke="#9a98ae" fill="#9a98ae" stroke-width="1" x="24.5" y="171.5" width="24" height="24"></rect>
                        <rect stroke="#9a98ae" fill="#9a98ae" stroke-width="1" x="24.5" y="122.5" width="24" height="24"></rect>
                        <rect stroke="#9a98ae" fill="#9a98ae" stroke-width="1" x="73.5" y="171.5" width="24" height="24"></rect>
                    </svg>
                </div>
            </div>
        </div>
        <div class="list-group-item list-group-item-action">
            <div class="agenda__cards-card__right">
                <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
            </div>
            <div class="agenda__cards-card__left d-fill" aria-current="true" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <div class="d-flex justify-content-between agenda__cards-card--header">
                    <p>{{ title }}</p>
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
    export default {
        props: {
            id: [Number, String],
            commentCount: Number,
            title: String,
        },
        name: "AgendaItem"
    };
</script>

<style scoped>

</style>
