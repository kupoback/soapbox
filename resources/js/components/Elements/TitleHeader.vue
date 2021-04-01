<template>
    <div :class="`col-12 ${cssClasses}`">
        <slot name="date-time"></slot>
        <h1 :class="hClasses"
            v-text="title" />
    </div>
</template>

<script type="application/javascript">
    export default {
        props: {
            cssClasses: String,
            hClasses: String,
            title: String,
        },
        name: "TitleHeader"
    };
</script>

<style scoped>

</style>
