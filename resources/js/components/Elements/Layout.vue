<template>
    <div :class="`container-fluid flex-grow-1 ${containerClasses}`">
        <div :class="`row main-row  h-100 ${rowClasses}`">
            <Sidebar v-if="withSidebar" />
            <slot name="body"></slot>
        </div>
    </div>
</template>

<script type="application/javascript">
    export default {
        props: {
            containerClasses: String,
            rowClasses: String,
            withSidebar: Boolean,
        },
        name: "Layout"
    };
</script>

<style scoped>

</style>
