<template>
    <div v-if="isVisible"
         class="save-button agenda__save">
        <button type="button"
                class="btn btn-success"
                v-text="`Save`" />
    </div>
</template>

<script type="application/javascript">
    export default {
        props: {
            isVisible: Boolean,
        },
        name: "SaveButton"
    };
</script>

<style scoped>

</style>
