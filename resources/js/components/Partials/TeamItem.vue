<template>
    <li class="list-group-item nav-item team__list-item">
        <router-link :to="`/agenda-list/${slug}`"
                     class="nav-link"
                     v-text="title" />
    </li>
</template>

<script type="application/javascript">
    export default {
        props: {
            title: String,
            slug: String,
        },
        name: "TeamItem"
    };
</script>

<style scoped>

</style>
