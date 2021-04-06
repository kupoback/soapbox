<template>
    <p class="list-group-item nav-item">
        <router-link :to="`/teams/${slug}`"
                     class="nav-link"
                     v-text="title" />
    </p>
</template>

<script type="application/javascript">
    export default {
        props: {
            title: String,
            slug: String,
        },
    
        name: "SidebarItem"
    };
</script>

<style scoped>

</style>
