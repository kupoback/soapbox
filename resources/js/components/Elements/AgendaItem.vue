<template>
    <div class="d-flex justify-content-between agenda__cards-card--header">
        <p class="agenda__cards-card__left-title">{{ title }}</p>
        <p v-if="status"
           :class="`float-end ${status.pClass}`">
            <i :class="`bi ${status.icon}`"></i>
        </p>
        <p class="float-end badge bg-secondary rounded-pill">
            {{ commentCount }}
            <i class="bi bi-chat-fill"></i>
        </p>
    </div>
</template>

<script type="application/javascript">
    export default {
        props: {
            commentCount: [Array, Object, String],
            status: [Boolean, Object],
            title: String,
        },
        data() {
            return {
                statusObj: false,
            }
        },
        name: "AgendaItem"
    };
</script>

<style scoped>

</style>
